<?php

namespace App\Http\Livewire\Admin\Permissions;

use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;

class RolePermissionCreate extends Component
{

    protected $listeners = ['refresh' => '$refresh'];

    public $role_name;
    public function createNewRole()
    {
        $this->validate([
            'role_name' => 'required|string|min:4|max:10|unique:roles,name'
        ]);
        Role::create([
            'name' => $this->role_name,
            'guard_name' => 'web'
        ]);
        $this->role_name = null;
        $this->emit('refresh');
    }

    public $permission_name;
    public function createNewPermission()
    {
        $this->validate([
            'permission_name' => 'required|string|min:4|unique:permissions,name'
        ]);
        Permission::create([
            'name' => $this->permission_name,
            'guard_name' => 'web'
        ]);
        $this->permission_name = null;
        $this->emit('refresh');
    }

    public function render()
    {
        return view('livewire.admin.permissions.role-permission-create');
    }
}
