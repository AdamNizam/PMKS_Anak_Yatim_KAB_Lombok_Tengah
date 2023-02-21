<?php

namespace App\Http\Controllers;

use App\Models\PrestasiNonFormal;
use Illuminate\Http\Request;

class PrestasiNonFormalController extends Controller
{
    public function index()
    {
        $non_formal = PrestasiNonFormal::latest()->get();
        return view('superadmin.prestasi_non_formal.index', compact('non_formal'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_non_formal' => 'required|string|max:100',
            'tahun_non_formal' => 'required',
        ]);

        $non_formal = PrestasiNonFormal::create([
            'id_anak' => $request->id_anak_non_formal,
            'prestasi_non_formal' => $request->nama_non_formal,
            'tahun' => $request->tahun_non_formal,
            'bukti' => '-'
        ]);
        if ($non_formal) {
            return redirect()
                ->route('detail', $request->id_anak_non_formal)
                ->with([
                    'success' => 'New Prestasi Non Formal has been created successfully'
                ]);
        } else {
            return redirect()
                ->route('detail', $request->id_anak_non_formal)
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    public function edit($id)
    {
        $role = PrestasiNonFormal::findOrFail($id);
        echo json_encode($role);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_ubah_non_formal' => 'required|string|max:100',
            'tahun_ubah_non_formal' => 'required',
        ]);
        $cek_formal = PrestasiNonFormal::where('prestasi_non_formal', '=', $request->formal_ubah)->where('id_prestasi_non_formal', '!=', $id)->get()->first();
        if (!$cek_formal) {
            $kelas = PrestasiNonFormal::findOrFail($id);
            $kelas->update([
                'id_anak' => $request->id_anak_ubah_non_formal,
                'prestasi_non_formal' => $request->nama_ubah_non_formal,
                'tahun' => $request->tahun_ubah_non_formal,
                'bukti' => '-'
            ]);
            if ($kelas) {
                return redirect()
                    ->route('detail', $request->id_anak_ubah_non_formal)
                    ->with([
                        'success' => 'New Prestasi Formal has been update successfully'
                    ]);
            } else {
                return redirect()
                    ->route('detail', $request->id_anak_ubah_non_formal)
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } else {
            return redirect()
                ->route('non_formal.index')
                ->withInput()
                ->with([
                    'error' => 'Prestasi Formal already exists, please try again'
                ]);
        }
    }
    public function destroy($id)
    {
        $prestasi = PrestasiNonFormal::findOrFail($id);
        $prestasi->delete();

        if ($prestasi) {
            return redirect()
                ->route('detail', $prestasi->id_anak)
                ->with([
                    'success' => 'Prestasi non Formal has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('detail', $prestasi->id_anak)
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
