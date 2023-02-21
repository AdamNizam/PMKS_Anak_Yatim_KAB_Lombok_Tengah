<?php

namespace App\Http\Controllers;

use App\Models\Userlog;
use App\Models\Survior;
use App\Models\Verifikator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function index(Request $request)
    {
        $request->session()->forget(['id_role', 'username', 'id_userlog', 'aktif', 'nama', 'id_survior', 'id_kecamatan', 'id_desa', 'role']);
        return view('auth.login');
    }
    public function actionlogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|max:100',
            'password' => 'required|string|max:100',
        ]);
        $username = $request->username;
        $password = $request->password;

        $cek_akun = Userlog::join('role', 'role.id_role', '=', 'userlog.id_role')->where('username', '=', $username)->get()->first();
        // dd($cek_akun);
        if ($cek_akun) {
            if (Hash::check($password, $cek_akun->password)) {
                if ($cek_akun->id_role == 1) {
                    $request->session()->put([
                        'id_role' => $cek_akun->id_role,
                        'id_userlog' => $cek_akun->id_userlog,
                        'username' => $cek_akun->username,
                        'aktif' => $cek_akun->aktif,
                        'role' => $cek_akun->role,
                    ]);
                    return redirect('/dashboard/superadmin');
                } elseif ($cek_akun->id_role == 2) {
                    $request->session()->put([
                        'id_role' => $cek_akun->id_role,
                        'id_userlog' => $cek_akun->id_userlog,
                        'username' => $cek_akun->username,
                        'aktif' => $cek_akun->aktif,
                        'role' => $cek_akun->role,
                    ]);
                    return redirect('/pimpinan');
                } elseif ($cek_akun->id_role == 3) {
                    if ($cek_akun->aktif == 1) {
                        $cek_verifi = Verifikator::where('id_userlog', '=', $cek_akun->id_userlog)->get()->first();
                        // dd($cek_verifi);
                        $request->session()->put([
                            'id_role' => $cek_akun->id_role,
                            'id_userlog' => $cek_akun->id_userlog,
                            'username' => $cek_akun->username,
                            'aktif' => $cek_akun->aktif,
                            'role' => $cek_akun->role,
                            'nama' => $cek_verifi->nama_lengkap,
                            'email' => $cek_verifi->email,
                            'id_survior' => $cek_verifi->id_survior,
                        ]);
                        return redirect('/verifikator');
                    } else {
                        $cek_verifi = Verifikator::where('id_userlog', '=', $cek_akun->id_userlog)->get()->first();
                        if (!$cek_verifi) {
                            $request->session()->put([
                                'id_role' => $cek_akun->id_role,
                                'id_userlog' => $cek_akun->id_userlog,
                                'username' => $cek_akun->username,
                                'aktif' => $cek_akun->aktif,
                                'role' => $cek_akun->role,
                            ]);
                            return redirect('/verifikator/create');
                        } else {
                            return redirect()
                                ->route('index')
                                ->withInput()
                                ->with([
                                    'warning' => 'Please open your email for account activation !'
                                ]);
                        }
                    }
                } elseif ($cek_akun->id_role == 4) {
                    $cek_data = Survior::where('id_userlog', '=', $cek_akun->id_userlog)->get()->first();
                    if ($cek_akun->aktif == 1) {
                        $request->session()->put([
                            'id_role' => $cek_akun->id_role,
                            'id_userlog' => $cek_akun->id_userlog,
                            'username' => $cek_akun->username,
                            'aktif' => $cek_akun->aktif,
                            'role' => $cek_akun->role,
                            'nama' => $cek_data->nama_lengkap,
                            'email' => $cek_data->email,
                            'id_survior' => $cek_data->id_survior,
                            'id_kecamatan' => $cek_data->id_kecamatan,
                            'id_desa' => $cek_data->id_desa,
                        ]);
                        return redirect('/survior');
                    } else {
                        if (!$cek_data) {
                            $request->session()->put([
                                'id_role' => $cek_akun->id_role,
                                'id_userlog' => $cek_akun->id_userlog,
                                'username' => $cek_akun->username,
                                'aktif' => $cek_akun->aktif,
                                'role' => $cek_akun->role,
                            ]);
                            return redirect('/survior/create');
                        } else {
                            return redirect()
                                ->route('index')
                                ->withInput()
                                ->with([
                                    'warning' => 'Please activation your account via email !'
                                ]);
                        }
                    }
                } else {
                    return redirect()
                        ->route('index')
                        ->withInput()
                        ->with([
                            'error' => 'You do not have access rights !'
                        ]);
                }
            } else {
                return redirect()
                    ->route('index')
                    ->withInput()
                    ->with([
                        'error' => 'Password is worng, please try again !'
                    ]);
            }
        } else {
            return redirect()
                ->route('index')
                ->withInput()
                ->with([
                    'error' => 'Username not pound, please try again !'
                ]);
        }
    }
    public function activation($token)
    {
        $id_userlog = $token / 2524;
        $userlog = Userlog::findOrFail($id_userlog);
        $userlog->update([
            'aktif' => 1,
        ]);
        if ($userlog) {
            return redirect()
                ->route('index')
                ->with([
                    'success' => 'Your Account has been activation successfully'
                ]);
        } else {
            return redirect()
                ->route('index')
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    public function logout(Request $request)
    {
        $request->session()->forget(['id_role', 'username', 'id_userlog', 'aktif', 'nama', 'id_survior', 'id_kecamatan', 'id_desa', 'role']);
        return redirect()
            ->route('index')
            ->with([
                'success' => 'You Succes Logout !'
            ]);
    }
}
