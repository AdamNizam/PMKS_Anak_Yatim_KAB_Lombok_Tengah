<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    public function index()
    {
        $pekerjaan = Pekerjaan::latest()->get();
        return view('superadmin.pekerjaan.index', compact('pekerjaan'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'pekerjaan' => 'required|string|max:100',
        ]);
        $cek_pekerjaan = Pekerjaan::where('pekerjaan', '=', $request->pekerjaan)->get()->first();
        if (!$cek_pekerjaan) {
            $pekerjaan = Pekerjaan::create([
                'pekerjaan' => $request->pekerjaan,
            ]);
            if ($pekerjaan) {
                return redirect()
                    ->route('pekerjaan.index')
                    ->with([
                        'success' => 'New pekerjaan has been created successfully'
                    ]);
            } else {
                return redirect()
                    ->route('pekerjaan.index')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } else {
            return redirect()
                ->route('pekerjaan.index')
                ->withInput()
                ->with([
                    'error' => 'Pekerjaan already exists, please try again'
                ]);
        }
    }
    public function edit($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        echo json_encode($pekerjaan);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pekerjaan_ubah' => 'required|string|max:100',
        ]);
        $cek_pekerjaan = Pekerjaan::where('pekerjaan', '=', $request->pekerjaan_ubah)->where('id_pekerjaan', '!=', $id)->get()->first();
        if (!$cek_pekerjaan) {
            $kelas = Pekerjaan::findOrFail($id);
            $kelas->update([
                'pekerjaan' => $request->pekerjaan_ubah,
            ]);
            if ($kelas) {
                return redirect()
                    ->route('pekerjaan.index')
                    ->with([
                        'success' => 'New pekerjaan has been update successfully'
                    ]);
            } else {
                return redirect()
                    ->route('pekerjaan.index')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } else {
            return redirect()
                ->route('pekerjaan.index')
                ->withInput()
                ->with([
                    'error' => 'Pekerjaan already exists, please try again'
                ]);
        }
    }
    public function destroy($id)
    {
        $post = Pekerjaan::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('pekerjaan.index')
                ->with([
                    'success' => 'Pekerjaan has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('pekerjaan.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
