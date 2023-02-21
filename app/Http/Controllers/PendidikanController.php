<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function index()
    {
        $pendidikan = Pendidikan::latest()->get();
        return view('superadmin.pendidikan.index', compact('pendidikan'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'pendidikan' => 'required|string|max:100',
        ]);
        $cek_pendidikan = Pendidikan::where('pendidikan', '=', $request->pendidikan)->get()->first();
        if (!$cek_pendidikan) {
            $pendidikan = Pendidikan::create([
                'pendidikan' => $request->pendidikan,
            ]);
            if ($pendidikan) {
                return redirect()
                    ->route('pendidikan.index')
                    ->with([
                        'success' => 'New Pendidikan has been created successfully'
                    ]);
            } else {
                return redirect()
                    ->route('pendidikan.index')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } else {
            return redirect()
                ->route('pendidikan.index')
                ->withInput()
                ->with([
                    'error' => 'Pendidikan already exists, please try again'
                ]);
        }
    }
    public function edit($id)
    {
        $role = Pendidikan::findOrFail($id);
        echo json_encode($role);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pendidikan_ubah' => 'required|string|max:100',
        ]);
        $cek_pendidikan = Pendidikan::where('pendidikan', '=', $request->pendidikan_ubah)->where('id_pendidikan', '!=', $id)->get()->first();
        if (!$cek_pendidikan) {
            $kelas = Pendidikan::findOrFail($id);
            $kelas->update([
                'pendidikan' => $request->pendidikan_ubah,
            ]);
            if ($kelas) {
                return redirect()
                    ->route('pendidikan.index')
                    ->with([
                        'success' => 'New pendidikan has been update successfully'
                    ]);
            } else {
                return redirect()
                    ->route('pendidikan.index')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } else {
            return redirect()
                ->route('pendidikan.index')
                ->withInput()
                ->with([
                    'error' => 'Pendidikan already exists, please try again'
                ]);
        }
    }
    public function destroy($id)
    {
        $post = Pendidikan::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('pendidikan.index')
                ->with([
                    'success' => 'Pendidikan has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('pendidikan.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
