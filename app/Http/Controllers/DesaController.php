<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function index()
    {
        $desa = Desa::join('kecamatan', 'kecamatan.id_kecamatan', '=', 'desa.id_kecamatan')->get();
        $kecamatan = Kecamatan::latest()->get();
        // dd($desa);
        return view('superadmin.desa.index', compact('desa', 'kecamatan'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'desa' => 'required|string|max:100',
            'kec' => 'required',
        ]);
        $cek_desa = Desa::where('nama_desa', '=', $request->desa)->where('id_kecamatan', '=', $request->kec)->get()->first();
        // $data = array(
        //     'id_kecamatan' => $request->kec,
        //     'desa' => $request->desa
        // );
        // dd($data);
        if (!$cek_desa) {
            $desa = Desa::create([
                'id_kecamatan' => $request->kec,
                'nama_desa' => $request->desa,
            ]);
            if ($desa) {
                return redirect()
                    ->route('desa.index')
                    ->with([
                        'success' => 'New Desa has been created successfully'
                    ]);
            } else {
                return redirect()
                    ->route('desa.index')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } else {
            return redirect()
                ->route('desa.index')
                ->withInput()
                ->with([
                    'error' => 'Desa already exists, please try again'
                ]);
        }
    }
    public function edit($id)
    {
        $desa = Desa::findOrFail($id);
        echo json_encode($desa);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'desa_ubah' => 'required|string|max:100',
            'kecamatan_ubah' => 'required',
        ]);
        $cek_desa = Desa::where('nama_desa', '=', $request->desa_ubah)->where('id_kecamatan', '!=', $request->kecamatan_ubah)->get()->first();
        if (!$cek_desa) {
            $desa = Desa::findOrFail($id);
            $desa->update([
                'id_kecamatan' => $request->kecamatan_ubah,
                'nama_desa' => $request->desa_ubah,
            ]);
            if ($desa) {
                return redirect()
                    ->route('desa.index')
                    ->with([
                        'success' => 'Desa has been update successfully'
                    ]);
            } else {
                return redirect()
                    ->route('desa.index')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } else {
            return redirect()
                ->route('desa.index')
                ->withInput()
                ->with([
                    'error' => 'Desa already exists, please try again'
                ]);
        }
    }
    public function destroy($id)
    {
        $desa = Desa::findOrFail($id);
        $desa->delete();

        if ($desa) {
            return redirect()
                ->route('desa.index')
                ->with([
                    'success' => 'Desa has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('desa.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
