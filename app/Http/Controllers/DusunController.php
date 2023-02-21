<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DusunController extends Controller
{
    public function index(Request $request)
    {
        // echo $request->session()->get('id_role');
        // echo $request->session()->get('username');
        // die;
        $dusun = Dusun::join('desa', 'desa.id_desa', '=', 'dusun.id_desa')->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'dusun.id_kecamatan')->get();
        $desa = Desa::latest()->get();
        $kecamatan = Kecamatan::latest()->get();
        // dd($desa);
        return view('superadmin.dusun.index', compact('dusun', 'desa', 'kecamatan'));
    }
    public function getdesa()
    {
        $id = $_GET['id'];
        $kecamatan = Desa::where('id_kecamatan', '=', $id)->get();
        echo json_encode($kecamatan);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'dusun' => 'required|string|max:100',
            'desa' => 'required',
            'kec' => 'required',
        ]);
        // dd($request->kec);
        $dusun = Dusun::create([
            'dusun' => $request->dusun,
            'id_desa' => $request->desa,
            'id_kecamatan' => $request->kec,
        ]);
        if ($dusun) {
            return redirect()
                ->route('dusun.index')
                ->with([
                    'success' => 'New Dusun has been created successfully'
                ]);
        } else {
            return redirect()
                ->route('dusun.index')
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    public function edit($id)
    {
        $dusun = Dusun::findOrFail($id);

        echo json_encode($dusun);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'dusun_ubah' => 'required|string|max:100',
            'desa_ubah' => 'required',
            'kecamatan_ubah' => 'required',
        ]);
        $dusun = Dusun::findOrFail($id);
        $dusun->update([
            'dusun' => $request->dusun_ubah,
            'desa' => $request->desa_ubah,
            'kecamatan' => $request->kecamatan_ubah,
        ]);
        if ($dusun) {
            return redirect()
                ->route('dusun.index')
                ->with([
                    'success' => 'New dusun has been update successfully'
                ]);
        } else {
            return redirect()
                ->route('dusun.index')
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    public function destroy($id)
    {
        $dusun = Dusun::findOrFail($id);
        $dusun->delete();

        if ($dusun) {
            return redirect()
                ->route('dusun.index')
                ->with([
                    'success' => 'Dusun has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('dusun.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
