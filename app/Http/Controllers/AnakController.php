<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Userlog;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Dusun;
use App\Models\PrestasiFormal;
use App\Models\PrestasiNonFormal;
use App\Models\KelasPendidikan;
use App\Models\Survior;
use DateTime;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\VarDumper\VarDumper;

class AnakController extends Controller
{
    // Kebutuhan Survior
    //fungsi menampilkan data di suurvior
    public function index(Request $request)
    {

        $anak = Anak::where('anak.id_survior', '=', $request->session()->get('id_survior'))->get();
        // dd($anak);
        return view('survior.anak.index', compact('anak'));
    }
    public function create()
    {
        $pekerjaan = Pekerjaan::latest()->get();
        $pendidikan = Pendidikan::latest()->get();
        $kelas_pendidikan = KelasPendidikan::latest()->get();
        // $nonformal = PrestasiNonFormal::latest()->get();
        return view('survior.anak.formadd', compact('pekerjaan', 'pendidikan', 'kelas_pendidikan'));
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'nama'     => 'required|string|max:100',
            'kk' => 'required|max:16',
            'nik' => 'required|max:16',
            'alamat' => 'required|string|max:100',
            'jk' => 'required',
            'tempat_lahir' => 'required|string|max:100',
            'tgl_lahir' => 'required',
            'nama_wali' => 'required|string|max:100',
            'alamat_sekolah' => 'required|string|max:100',
            'status_anak' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'kelas' => 'required',
        ]);
        // menghitung usia Anak yatim
        $tgl_lahir = $request->tgl_lahir;
        $ulang_tahun = new \DateTime($tgl_lahir);
        $hari_ini = new \DateTime("today");
        $usia = $hari_ini->diff($ulang_tahun)->y;
        // akhir menghitung usia anak yatim

        $cek_nik = Anak::where('nomor_nik', '=', $request->nik)->get()->first();
        // dd($request->non_formal);

        if (!$cek_nik) {
            $anak = Anak::create([
                'id_survior' => $request->session()->get('id_survior'),
                'id_pekerjaan_wali' => $request->pekerjaan,
                'id_pendidikan' => $request->pendidikan,
                'id_kecamatan' => $request->session()->get('id_kecamatan'),
                'id_desa' => $request->session()->get('id_desa'),
                'id_dusun' => 0,
                'id_kelas_pendidikan' => $request->kelas,
                'nama_anak' => $request->nama,
                'nomor_kk' => $request->kk,
                'nomor_nik' => $request->nik,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jk,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'usia' => $usia,
                'nama_wali' => $request->nama_wali,
                'alamat_sekolah' => $request->alamat_sekolah,
                'status_anak' => $request->status_anak,
                'status_verifikasi' => 0,
                'foto_anak'   => '-',
                'latitide' => 0,
                'longitude' => 0,
                'tahun' => date('Y'),
            ]);
            if ($anak) {
                return redirect()
                    ->route('anak.index')
                    ->with([
                        'success' => 'New Anak Yatim has been created successfully'
                    ]);
            } else {
                return redirect()
                    ->route('anak.index')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } else {
            return redirect()
                ->route('anak.create')
                ->with([
                    'error' => 'Nomor Induk Keluarga already in use, please try again'
                ]);
        }
    }
    public function importview()
    {
        return view('survior.anak.import');
    }
    public function importanak(Request $request)
    {
        $this->validate($request, [
            'file_anak' => 'required|file|mimes:xlsx'
        ]);
        $the_file = $request->file('file_anak');

        // dd($the_file);
        try {
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range(2, $row_limit);
            $column_range = range('Y', $column_limit);
            $startcount = 2;
            $data = array();
            // dd($row_range);
            foreach ($row_range as $row) {
                $nama_anak = $sheet->getCell('B' . $row)->getValue();
                $nik =  $sheet->getCell('D' . $row)->getValue();
                $nokk = $sheet->getCell('C' . $row)->getValue();

                // dd(preg_replace("/[^a-zA-Z0-9]/", "", $nokk));


                if ($nama_anak && $nik && $nokk) {

                    // mengecek alamat
                    $alamat_anak = $sheet->getCell('E' . $row)->getValue();
                    if ($alamat_anak) {
                        $alamat = $alamat_anak;
                    } else {
                        $alamat = '-';
                    }
                    // mengecek Jenis Kelamin
                    $jenis_k = $sheet->getCell('F' . $row)->getValue();
                    if ($jenis_k != '') {
                        $jkel = $jenis_k;
                    } else {
                        $jkel = 1;
                    }

                    // echo $jkel;
                    // die;
                    // mengecek tempat lAHIR
                    $tempatl_anak = $sheet->getCell('G' . $row)->getValue();
                    if ($tempatl_anak) {
                        $tempatl = $tempatl_anak;
                    } else {
                        $tempatl = '-';
                    }
                    // mengecek Tgl Lahir
                    $str = $sheet->getCell('H' . $row)->getValue();
                    // $tgl_lahir = date("Y-m-d", ($str - 25569) * 86400);
                    // echo ($tgl_lahir);
                    // die;
                    if ($str) {
                        // Konversi Date Execel Ke Php
                        $tgl_lahir = date("Y-m-d", ($str - 25569) * 86400);
                        // akhir konversi
                    } else {
                        $tgl_lahir = date("Y-m-d");
                    }
                    // mengecek Pendidikan
                    $pendidikan_anak = $sheet->getCell('I' . $row)->getValue();
                    if ($pendidikan_anak) {
                        $pendidikan = $pendidikan_anak;
                    } else {
                        $pendidikan = 2;
                    }
                    // mengecek Kelas Pendidikan
                    $kelas_pendidikan_anak = $sheet->getCell('J' . $row)->getValue();
                    if ($kelas_pendidikan_anak) {
                        $kelas_pendidikan = $kelas_pendidikan_anak;
                    } else {
                        $kelas_pendidikan = 2;
                    }
                    // mengecek alamat Sekolah
                    $alamat_sekolah_anak = $sheet->getCell('K' . $row)->getValue();
                    if ($alamat_sekolah_anak) {
                        $alamat_sekolah = $alamat_sekolah_anak;
                    } else {
                        $alamat_sekolah = '-';
                    }
                    // mengecek Status Anak
                    $status_anak = $sheet->getCell('L' . $row)->getValue();
                    if ($status_anak) {
                        $status_anak_val = $status_anak;
                    } else {
                        $status_anak_val = '-';
                    }
                    // mengecek  Nama Wali
                    $nama_wali = $sheet->getCell('M' . $row)->getValue();
                    if ($nama_wali) {
                        $wali = $nama_wali;
                    } else {
                        $wali = '-';
                    }
                    // mengecek Pekerjaan Wali
                    $pekerjaan_wali = $sheet->getCell('N' . $row)->getValue();
                    if ($pekerjaan_wali) {
                        $pekerjaan = $pekerjaan_wali;
                    } else {
                        $pekerjaan = 7;
                    }
                    // menghitung usia Anak yatim
                    $ulang_tahun = new \DateTime($tgl_lahir);
                    $hari_ini = new \DateTime("today");
                    $usia = $hari_ini->diff($ulang_tahun)->y;
                    // akhir menghitung usia anak yatim

                    $data[] = [
                        'id_survior' => $request->session()->get('id_survior'),
                        'id_pekerjaan_wali' => $pekerjaan,
                        'id_pendidikan'  => $pendidikan,
                        'id_kecamatan' => $request->session()->get('id_kecamatan'),
                        'id_desa'  => $request->session()->get('id_desa'),
                        'id_dusun' => 0,
                        'id_kelas_pendidikan' =>  $kelas_pendidikan,
                        'nama_anak' => $nama_anak,
                        'nomor_kk'  => preg_replace("/[^a-zA-Z0-9]/", "", $nokk),
                        'nomor_nik' => preg_replace("/[^a-zA-Z0-9]/", "", $nik),
                        'alamat'  => $alamat,
                        'jenis_kelamin' => $jkel,
                        'tempat_lahir'  => $tempatl,
                        'tgl_lahir'  => $tgl_lahir,
                        'usia'   => $usia,
                        'nama_wali'  => $wali,
                        'alamat_sekolah'   => $alamat_sekolah,
                        'status_anak'  => $status_anak_val,
                        'foto_anak'   => '-',
                        'status_verifikasi'  => 0,
                        'latitide'   => 0,
                        'longitude'  => 0,
                        'tahun'  => date('Y'),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),

                    ];
                    $startcount++;
                }
                // var_dump($data);
            }
            // die;
            // dd($data);
            $create = DB::table('anak')->insert($data);
            if ($create) {
                return redirect()
                    ->route('anak.index')
                    ->with([
                        'success' => 'All New Anak Yatim has been impported successfully'
                    ]);
            } else {
                return redirect()
                    ->route('anak.index')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } catch (Exception $e) {
            // $error_code = $e->errorInfo[1];
            return redirect()
                ->route('anak.index')
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    public function rekap_hari_ini(Request $request)
    {
        $hari_ini = date('Y-m-d 00:00:00');
        // echo $hari_ini;
        // die();
        $anak = Anak::join('pekerjaan', 'pekerjaan.id_pekerjaan', '=', 'anak.id_pekerjaan_wali')
            ->join('pendidikan', 'pendidikan.id_pendidikan', '=', 'anak.id_pendidikan')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'anak.id_kecamatan')
            ->join('desa', 'desa.id_desa', '=', 'anak.id_desa')
            // ->join('dusun', 'dusun.id_dusun', '=', 'anak.id_dusun')
            ->join('kelas_pendidikan', 'kelas_pendidikan.id_kelas_pendidikan', '=', 'anak.id_kelas_pendidikan')
            ->where('anak.id_survior', '=', $request->session()->get('id_survior'))
            ->where('anak.created_at', '>=', date('Y-m-d 00:00:00'))
            ->get();
        // dd($anak);
        return view('survior.anak.index', compact('anak'));
    }
    public function detail($id)
    {
        $anak = Anak::join('pekerjaan', 'pekerjaan.id_pekerjaan', '=', 'anak.id_pekerjaan_wali')
            ->join('pendidikan', 'pendidikan.id_pendidikan', '=', 'anak.id_pendidikan')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'anak.id_kecamatan')
            ->join('desa', 'desa.id_desa', '=', 'anak.id_desa')
            ->join('kelas_pendidikan', 'kelas_pendidikan.id_kelas_pendidikan', '=', 'anak.id_kelas_pendidikan')
            ->where('anak.id_anak', '=', $id)
            ->get()->first();
        // dd($anak);
        $formal = PrestasiFormal::where('id_anak', '=', $id)->get();
        $nonformal = PrestasiNonFormal::where('id_anak', '=', $id)->get();
        return view('survior.anak.detail', compact('anak', 'formal', 'nonformal'));
    }

    public function upload_gambar(Request $request)
    {
        $this->validate($request, [
            'foto' => 'required|file|max:1024'
        ]);
        $id = $request->id;
        $gambar = $request->file('foto')->store('foto-anak');
        $desa = Anak::findOrFail($id);
        $desa->update([
            'foto_anak' => $gambar,
        ]);
        if ($desa) {
            return redirect()
                ->route('detail', $request->id)
                ->with([
                    'success' => 'Picture has been upload successfully'
                ]);
        } else {
            return redirect()
                ->route('detail', $request->id)
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    public function edit($id)
    {
        $pekerjaan = Pekerjaan::latest()->get();
        $pendidikan = Pendidikan::latest()->get();
        $kelas_pendidikan = KelasPendidikan::latest()->get();
        $anak = Anak::findOrFail($id);
        return view('survior.anak.formedit', compact('anak', 'pekerjaan', 'pendidikan', 'kelas_pendidikan'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama'     => 'required|string|max:100',
            'kk' => 'required|max:16',
            'nik' => 'required|max:16',
            'alamat' => 'required|string|max:100',
            'jk' => 'required',
            'tempat_lahir' => 'required|string|max:100',
            'tgl_lahir' => 'required',
            'nama_wali' => 'required|string|max:100',
            'alamat_sekolah' => 'required|string|max:100',
            'status_anak' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'kelas' => 'required',
        ]);
        // menghitung usia Anak yatim
        $tgl_lahir = $request->tgl_lahir;
        $ulang_tahun = new \DateTime($tgl_lahir);
        $hari_ini = new \DateTime("today");
        $usia = $hari_ini->diff($ulang_tahun)->y;
        // akhir menghitung usia anak yatim

        // $cek_nik = Anak::where('nomor_nik', '=', $request->nik)->where('id_anak', '=', $id)->get()->first();
        // dd($request->non_formal);

        $anak = Anak::findOrFail($id);
        // if (!$cek_nik) {
        $anak->update([

            'id_pekerjaan_wali' => $request->pekerjaan,
            'id_pendidikan' => $request->pendidikan,


            'id_kelas_pendidikan' => $request->kelas,
            'nama_anak' => $request->nama,
            'nomor_kk' => $request->kk,
            'nomor_nik' => $request->nik,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jk,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'usia' => $usia,
            'nama_wali' => $request->nama_wali,
            'alamat_sekolah' => $request->alamat_sekolah,
            'status_anak' => $request->status_anak,

        ]);

        if ($anak) {
            return redirect()
                ->route('anak.index')
                ->with([
                    'success' => 'Data Anak has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
        // } else {
        //     return redirect()
        //         ->route('anak.index')
        //         ->with([
        //             'error' => 'Nomor Induk Keluarga already in use, please try again'
        //         ]);
        // }
    }
    public function destroy($id)
    {
        $anak = Anak::findOrFail($id);
        $anak->delete();

        if ($anak) {
            return redirect()
                ->route('anak.index')
                ->with([
                    'success' => 'Anak has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('anak.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
    // akhir dari kebutuhan Survior
    // Awal Kebutuhan Verifikator
    public function verifikasi()
    {
        $anak = Anak::join('pekerjaan', 'pekerjaan.id_pekerjaan', '=', 'anak.id_pekerjaan_wali')
            ->join('pendidikan', 'pendidikan.id_pendidikan', '=', 'anak.id_pendidikan')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'anak.id_kecamatan')
            ->join('desa', 'desa.id_desa', '=', 'anak.id_desa')
            // ->join('dusun', 'dusun.id_dusun', '=', 'anak.id_dusun')

            ->join('kelas_pendidikan', 'kelas_pendidikan.id_kelas_pendidikan', '=', 'anak.id_kelas_pendidikan')
            ->where('status_verifikasi', '=', 0)
            ->get();
        // dd($anak);
        return view('verifikator.anak.index', compact('anak'));
    }
    public function detail_anak($id)
    {
        $anak = Anak::join('pekerjaan', 'pekerjaan.id_pekerjaan', '=', 'anak.id_pekerjaan_wali')
            ->join('pendidikan', 'pendidikan.id_pendidikan', '=', 'anak.id_pendidikan')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'anak.id_kecamatan')
            ->join('desa', 'desa.id_desa', '=', 'anak.id_desa')
            // ->join('dusun', 'dusun.id_dusun', '=', 'anak.id_dusun')

            ->join('kelas_pendidikan', 'kelas_pendidikan.id_kelas_pendidikan', '=', 'anak.id_kelas_pendidikan')
            // ->where('anak.created_at', '>=', date('Y-m-d 00:00:00'))
            ->where('id_anak', '>=', $id)
            ->get()->first();
        // dd($anak);
        return view('verifikator.anak.detail_anak', compact('anak'));
    }
    public function proses_verifikasi($id)
    {
        $anak = Anak::findOrFail($id);
        $anak->update([
            'status_verifikasi' => 1
        ]);
        if ($anak) {
            return redirect()
                ->route('sudah_verifikasi')
                ->with([
                    'success' => 'Data has been verivaction successfully'
                ]);
        } else {
            return redirect()
                ->route('sudah_verifikasi')
                ->with([
                    'error' => 'Data has been wrong'
                ]);
        }
    }
    public function sudah_verifikasi()
    {
        $anak = Anak::join('pekerjaan', 'pekerjaan.id_pekerjaan', '=', 'anak.id_pekerjaan_wali')
            ->join('pendidikan', 'pendidikan.id_pendidikan', '=', 'anak.id_pendidikan')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'anak.id_kecamatan')
            ->join('desa', 'desa.id_desa', '=', 'anak.id_desa')
            // ->join('dusun', 'dusun.id_dusun', '=', 'anak.id_dusun')

            ->join('kelas_pendidikan', 'kelas_pendidikan.id_kelas_pendidikan', '=', 'anak.id_kelas_pendidikan')
            ->where('status_verifikasi', '=', 1)
            ->get();
        // dd($anak);
        return view('verifikator.anak.sudah_verifikasi', compact('anak'));
    }
    public function laporan()
    {
    }
    // Akhir Kebutuhan Verifikator
    // Awal Kebutuhan Pimpinan
    public function all()
    {
        // ->join('desa', 'desa.id_desa', '=', 'anak.id_desa')
        $data = array(
            'anak' => Anak::all(),
            'kecamatan' => Kecamatan::all(),
            'desa' => Desa::all()
        );
        // $data = 
        echo json_encode($data);
    }
    public function data_anak()
    {
        return view('pimpinan.anak.index');
    }
    public function rekapan_hari_ini()
    {
        $hari_ini = date('Y-m-d 00:00:00');
        $anak = Anak::join('pekerjaan', 'pekerjaan.id_pekerjaan', '=', 'anak.id_pekerjaan_wali')
            ->join('pendidikan', 'pendidikan.id_pendidikan', '=', 'anak.id_pendidikan')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'anak.id_kecamatan')
            ->join('desa', 'desa.id_desa', '=', 'anak.id_desa')
            // ->join('dusun', 'dusun.id_dusun', '=', 'anak.id_dusun')
            // ->join('prestasi_formal', 'prestasi_formal.id_prestasi_formal', '=', 'anak.id_prestasi_formal')
            // ->join('prestasi_non_formal', 'prestasi_non_formal.id_prestasi_non_formal', '=', 'anak.id_prestasi_non_formal')
            ->join('kelas_pendidikan', 'kelas_pendidikan.id_kelas_pendidikan', '=', 'anak.id_kelas_pendidikan')
            ->where('status_verifikasi', '=', 1)
            // ->where('anak.created_at', '>=',  $hari_ini)
            ->get();
        // // dd($anak);
        return view('pimpinan.anak.hari_ini', compact('anak'));
    }
    public function rekapan_minggu_ini()
    {
        $hari_ini = date('Y-m-d 00:00:00');
        $anak = Anak::join('pekerjaan', 'pekerjaan.id_pekerjaan', '=', 'anak.id_pekerjaan_wali')
            ->join('pendidikan', 'pendidikan.id_pendidikan', '=', 'anak.id_pendidikan')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'anak.id_kecamatan')
            ->join('desa', 'desa.id_desa', '=', 'anak.id_desa')
            ->join('kelas_pendidikan', 'kelas_pendidikan.id_kelas_pendidikan', '=', 'anak.id_kelas_pendidikan')
            ->where('status_verifikasi', '=', 0)
            // ->where('anak.created_at', '>=',  $hari_ini)
            ->get();
        // // dd($anak);
        return view('pimpinan.anak.hari_ini', compact('anak'));
    }
    public function rekapan_bulan_ini()
    {
    }
    public function rekapan_tahun_ini()
    {
    }
    // Akhir Kebutuhan Pimpinan
}
