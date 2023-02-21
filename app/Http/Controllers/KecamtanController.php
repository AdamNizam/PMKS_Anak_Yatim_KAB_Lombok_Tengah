<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamtanController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::latest()->get();
        return view('superadmin.kecamatan.index', compact('kecamatan'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'kecamatan' => 'required|string|max:100',
        ]);
        $cek_kecamatan = Kecamatan::where('nama_kecamatan', '=', $request->kecamatan)->get()->first();
        if (!$cek_kecamatan) {
            $kecamatan = Kecamatan::create([
                'nama_kecamatan' => $request->kecamatan,
            ]);
            if ($kecamatan) {
                return redirect()
                    ->route('kecamatan.index')
                    ->with([
                        'success' => 'New kecamatan has been created successfully'
                    ]);
            } else {
                return redirect()
                    ->route('kecamatan.index')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } else {
            return redirect()
                ->route('kecamatan.index')
                ->withInput()
                ->with([
                    'error' => 'Kecamatan already exists, please try again'
                ]);
        }
    }
    public function edit($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        echo json_encode($kecamatan);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kecamatan_ubah' => 'required|string|max:100',
        ]);
        $cek_kecamatan = Kecamatan::where('nama_kecamatan', '=', $request->kecamatan_ubah)->where('id_kecamatan', '!=', $id)->get()->first();
        if (!$cek_kecamatan) {
            $kecamatan = Kecamatan::findOrFail($id);
            $kecamatan->update([
                'nama_kecamatan' => $request->kecamatan_ubah,
            ]);
            if ($kecamatan) {
                return redirect()
                    ->route('kecamatan.index')
                    ->with([
                        'success' => 'Kecamatan has been update successfully'
                    ]);
            } else {
                return redirect()
                    ->route('kecamatan.index')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } else {
            return redirect()
                ->route('kecamatan.index')
                ->withInput()
                ->with([
                    'error' => 'Kecamatan already exists, please try again'
                ]);
        }
    }
    public function destroy($id)
    {
        $post = Kecamatan::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('kecamatan.index')
                ->with([
                    'success' => 'Kecamatan has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('kecamatan.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
