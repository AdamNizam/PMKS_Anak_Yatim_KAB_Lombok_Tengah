<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::latest()->get();
        return view('superadmin.role.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'role' => 'required|string|max:100',
        ]);
        $role = Role::create([
            'role' => $request->role,
        ]);
        if ($role) {
            return redirect()
                ->route('role.index')
                ->with([
                    'success' => 'New role has been created successfully'
                ]);
        } else {
            return redirect()
                ->route('role.index')
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    public function edit($id)
    {
        // $role = Role::where('id_role', '=', $id)->get()->first();
        $role = Role::findOrFail($id);
        // var_dump($role);
        echo json_encode($role);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'role_ubah' => 'required|string|max:100',
        ]);
        $role = Role::findOrFail($id);
        $role->update([
            'role' => $request->role_ubah,
        ]);
        if ($role) {
            return redirect()
                ->route('role.index')
                ->with([
                    'success' => 'New role has been update successfully'
                ]);
        } else {
            return redirect()
                ->route('role.index')
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    public function destroy($id)
    {
        $post = Role::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('role.index')
                ->with([
                    'success' => 'Role has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('role.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
