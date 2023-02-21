<?php

namespace App\Http\Controllers;

use App\Models\KelasPendidikan;
use Illuminate\Http\Request;

class KelasPendidikanController extends Controller
{
    public function index()
    {
        $kelas_pendidikan = KelasPendidikan::latest()->get();
        return view('superadmin.kelas_pendidikan.index', compact('kelas_pendidikan'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'kelas' => 'required|string|max:100',
        ]);
        $cek_kelas = KelasPendidikan::where('kelas_pendidikan', '=', $request->kelas)->get()->first();
        if (!$cek_kelas) {
            $kelas = KelasPendidikan::create([
                'kelas_pendidikan' => $request->kelas,
            ]);
            if ($kelas) {
                return redirect()
                    ->route('kelas.index')
                    ->with([
                        'success' => 'New Kelas has been created successfully'
                    ]);
            } else {
                return redirect()
                    ->route('kelas.index')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } else {
            return redirect()
                ->route('kelas.index')
                ->withInput()
                ->with([
                    'error' => 'Kelas already exists, please try again'
                ]);
        }
    }
    public function edit($id)
    {
        $role = KelasPendidikan::findOrFail($id);
        echo json_encode($role);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kelas_ubah' => 'required|string|max:100',
        ]);
        $cek_kelas = KelasPendidikan::where('kelas_pendidikan', '=', $request->kelas_ubah)->where('id_kelas_pendidikan', '!=', $id)->get()->first();
        if (!$cek_kelas) {
            $kelas = KelasPendidikan::findOrFail($id);
            $kelas->update([
                'kelas_pendidikan' => $request->kelas_ubah,
            ]);
            if ($kelas) {
                return redirect()
                    ->route('kelas.index')
                    ->with([
                        'success' => 'New kelas has been update successfully'
                    ]);
            } else {
                return redirect()
                    ->route('kelas.index')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } else {
            return redirect()
                ->route('kelas.index')
                ->withInput()
                ->with([
                    'error' => 'Kelas already exists, please try again'
                ]);
        }
    }
    public function destroy($id)
    {
        $post = KelasPendidikan::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('kelas.index')
                ->with([
                    'success' => 'Kelas has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('kelas.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
