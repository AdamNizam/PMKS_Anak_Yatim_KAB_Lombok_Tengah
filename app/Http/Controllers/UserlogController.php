<?php

namespace App\Http\Controllers;

use App\Models\Userlog;
use App\Models\Role;
use App\Models\Verifikator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserlogController extends Controller
{
    //fungsi Untuk menampilkan data Userlog
    public function index()
    {
        $userlogs = Userlog::join('role', 'role.id_role', '=', 'userlog.id_role')->get();
        $role = Role::latest()->get();
        return view('superadmin.userlog.index', compact('userlogs', 'role'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|max:100',
            'password' => 'required|string|max:100',
            'role' => 'required',
        ]);
        $cek_username = Userlog::where('username', '=', $request->username)->get()->first();
        if (!$cek_username) {
            $userlog = Userlog::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'id_role' => $request->role,
                'aktif' => 0,
            ]);
            if ($userlog) {
                return redirect()
                    ->route('userlog.index')
                    ->with([
                        'success' => 'New userlog has been created successfully'
                    ]);
            } else {
                return redirect()
                    ->route('userlog.index')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } else {
            return redirect()
                ->route('userlog.index')
                ->withInput()
                ->with([
                    'error' => 'Username already in use, please try again'
                ]);
        }
    }
    public function edit($id)
    {
        // $userlog = userlog::where('id_userlog', '=', $id)->get()->first();
        $userlog = Userlog::findOrFail($id);
        // var_dump($userlog);
        echo json_encode($userlog);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username_ubah' => 'required|string|max:100',
            'role_ubah' => 'required',
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
                    'id_role' => $request->role_ubah,
                ]);
            } else {
                $userlog->update([
                    'username' => $request->username_ubah,
                    'id_role' => $request->role_ubah,
                ]);
            }

            if ($userlog) {
                return redirect()
                    ->route('userlog.index')
                    ->with([
                        'success' => 'Userlog has been update successfully'
                    ]);
            } else {
                return redirect()
                    ->route('userlog.index')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
        } else {
            return redirect()
                ->route('userlog.index')
                ->withInput()
                ->with([
                    'error' => 'Username already in use, please try again'
                ]);
        }
    }
    public function destroy($id)
    {
        $userlog = Userlog::findOrFail($id);
        $userlog->delete();

        if ($userlog) {
            return redirect()
                ->route('userlog.index')
                ->with([
                    'success' => 'Userlog has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('userlog.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
