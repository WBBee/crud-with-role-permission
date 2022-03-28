<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function index()
    {
        return view('pages.admin.permissions.role-permission-page',[
            'permissions' => Permission::class,
            'roles' => Role::class,
        ]);
    }

    public function editRole($id)
    {
        return view('pages.admin.permissions.role.role-edit-page', ['id' => $id]);
    }

    public function editPermission($id)
    {
        return view('pages.admin.permissions.permission.permission-edit-page', ['id' => $id]);
    }
}
