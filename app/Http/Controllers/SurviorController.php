<?php

namespace App\Http\Controllers;

use App\Models\Survior;
use App\Models\Userlog;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SurviorController extends Controller
{
    //
    public function index()
    {
        return view('survior.index');
    }
    public function create()
    {
        $kecamatan = Kecamatan::latest()->get();
        return view('survior.formadd', compact('kecamatan'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|max:100',
            'password' => 'required|string|max:100',
            'nama'     => 'required|string|max:100',
            'no_sk' => 'required|max:15',
            'nik' => 'required|max:16',
            'no_hp' => 'required|max:12',
            'alamat' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'kecamatan' => 'required',
            'desa' => 'required',
            'file_sk' => 'required|mimes:pdf',
        ]);

        // Mengecek Email
        $email = $request->email;
        // dd($email);
        $cek_email = Survior::where('email', '=', $email)->get()->first();
        // dd($cek_email);
        if ($cek_email) {
            return redirect()
                ->route('survior.create')
                ->withInput()
                ->with([
                    'error' => 'Email already in use, please try again'
                ]);
        }
        // Akhir cek Email

        // update Username
        $id_userlog = $request->id_userlog;
        $cek_username = Userlog::where('username', '=', $request->username)->where('id_userlog', '!=', $id_userlog)->get()->first();
        if (!$cek_username) {
            $userlog = Userlog::findOrFail($id_userlog);
            $userlog->update([
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
            if (!$userlog) {
                return redirect()
                    ->route('survior.create')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } else {
            return redirect()
                ->route('survior.create')
                ->withInput()
                ->with([
                    'error' => 'Username already in use, please try again'
                ]);
        }
        // akhir Update Userlog

        // Awal upload file
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file_sk');
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/file_sk/';
        $nama_file = $file->getClientOriginalName();
        // upload file Ke dalam folder
        $file->move($tujuan_upload, $nama_file);
        // Akhir Upload Fiel

        // Mengirim Aktivasi akun
        $nama = $request->nama;
        $email = $request->email;
        $username = $request->username;
        $token = $request->id_userlog * 2524;
        // dd($token);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            // Pengaturan Server
            // $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'diatersenyum.wiki';
            $mail->SMTPAuth = true;
            $mail->Username = 'absensi@diatersenyum.wiki';
            $mail->Password = 'Absensi2524';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            // Siapa yang mengirim email
            $mail->setFrom("absensi@diatersenyum.wiki", "Yayasan Anak Yatim Tersenyum");

            // Siapa yang akan menerima email
            $mail->addAddress($email, $nama);

            $mail->isHTML(true);
            $mail->Subject = "Aktivasi Akun";
            $mail->Body    = "<p>Yth. " . $request->nama . "</p>

                            <p>&nbsp;</p>
                            
                            <p>Terima Kasih telah melengkapi data sebagai survior anak Yatim Piatu. Berikut informasi data yang anda telah kirimkan&nbsp;</p>
                            
                            <p>Nama&nbsp; &nbsp; &nbsp; &nbsp; : " . $nama . "</p>
                            
                            <p>Username : " . $username . "</p>
                            
                            <p>Email&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: " . $email . "</p>
                            
                            <p>Untuk dapat mengunakan Sistem PMKS Yatim Piatu secara penuh.&nbsp; Lakukan aktivasi akun menggunakan tatuan di bawah ini</p>
                            
                            <p>Silahkan lakukan aktivasi pada tatuan berikuti ini : <a href='" . url('auth/activation/' . $token) . "'>Aktivasi akun</a></p>
                            
                            <p>Jika Anda merasa tidak pernah melengkapi data pada Sistem PMKS Yatim Piatu, Maka pesan ini dapat di abaikan</p>
                            
                            <p>&nbsp;</p>
                            
                            <p>Terima Kasih Atas Perhatiannya</p>
                            
                            <p>&nbsp;</p>
                            
                            <p>Salam</p>
                            
                            <p>Yayasan Yatim Tersenyum&nbsp;</p>
                            
                            <p>&nbsp;</p>
                            ";

            $mail->send();
        } catch (Exception $e) {
            return redirect()
                ->route('index')
                ->withInput()
                ->with([
                    'error' => 'Failed Send activation link to email'
                ]);
        }
        // Akhir Aktivasi Akun

        // menginput data Ke Tabel Survior
        $survior = Survior::create([
            'id_userlog' => $request->id_userlog,
            'id_desa' => $request->desa,
            'id_kecamatan' => $request->kecamatan,
            'nama_lengkap' => $request->nama,
            'nomor_sk' => $request->no_sk,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'file_sk' => $nama_file
        ]);
        if ($survior) {
            return redirect()
                ->route('index')
                ->with([
                    'success' => 'Please activate the account via the message sent to the email!'
                ]);
        } else {
            return redirect()
                ->route('index')
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
        // Akhir menginput data Ke Tabel Survior
    }

    public function kontak()
    {
        return view('survior.kontak');
    }
    public function kontak_s()
    {
    }
    public function profile(Request $request)
    {

        $data = Survior::where('id_userlog', '=', $request->session()->get('id_userlog'))->get()->first();
        // dd();
        return view('survior.profile', compact('data'));
    }
    //kebutuhan Superadmin
    public function all_pendata()
    {

        $data = Survior::join('desa', 'desa.id_desa', '=', 'survior.id_desa')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'survior.id_kecamatan')
            ->join('userlog', 'userlog.id_userlog', '=', 'survior.id_userlog')
            ->get();
        // dd($data);
        return view('superadmin.survior.index', compact('data'));
    }
    public function detail($id)
    {
        $data = Survior::join('desa', 'desa.id_desa', '=', 'survior.id_desa')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'survior.id_kecamatan')
            ->join('userlog', 'userlog.id_userlog', '=', 'survior.id_userlog')
            ->where('survior.id_survior', '=', $id)
            ->get()->first();
        // dd($data);
        return view('superadmin.survior.detail', compact('data'));
    }
    public function destroy($id)
    {
        $survior = Survior::findOrFail($id);
        $survior->delete();

        if ($survior) {
            return redirect()
                ->route('all_pendata')
                ->with([
                    'success' => 'Pendata has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('all_pendata')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
    public function update_userlog(Request $request, $id)
    {
        $this->validate($request, [
            'username_ubah' => 'required|string|max:100',
        ]);
        $userlog = Userlog::findOrFail($id);
        $cek_username = Userlog::where('username', '=', $request->username_ubah)->where('id_userlog', '!=', $id)->get()->first();
        // var_dump($cek_username);
        // die;
        if (!$cek_username) {
            if (!empty($request->password_ubah)) {
                $userlog->update([
                    'username' => $request->username_ubah,
                    'password' => Hash::make($request->password_ubah),

                ]);
            } else {
                $userlog->update([
                    'username' => $request->username_ubah,
                ]);
            }

            if ($userlog) {
                return redirect()
                    ->route('all_pendata')
                    ->with([
                        'success' => 'Userlog has been update successfully'
                    ]);
            } else {
                return redirect()
                    ->route('all_pendata')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } else {
            return redirect()
                ->route('all_pendata')
                ->withInput()
                ->with([
                    'error' => 'Username already in use, please try again'
                ]);
        }
    }
}
