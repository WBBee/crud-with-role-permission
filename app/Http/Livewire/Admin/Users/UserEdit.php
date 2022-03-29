<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Traits\backend\RolePermissionManager;
use Livewire\Component;

class UserEdit extends Component
{
    use RolePermissionManager;
    public $action;
    public $user;

    public function mount($id)
    {
        $this->user = User::find($id);
    }

    public $role_name;
    public function addNewRole()
    {
        $this->validate([
            'role_name' => 'required',
        ]);
        $this->user->assignRole($this->role_name);
        $this->role_list = null;
    }

    public function removeRoleUser($id)
    {
        $role = Role::find($id);
        $this->user->removeRole($role->name);
    }

    public $permission_name;
    public function addNewPermission()
    {
        $this->validate([
            'permission_name' => 'required',
        ]);
        $this->user->givePermissionTo($this->permission_name);
        $this->permission_name = null;
    }

    public function removePermissionUser($id)
    {
        $permission = Permission::find($id);
        $this->user->revokePermissionTo($permission->name);
    }

    public function render()
    {
        $data = $this->getRolePermissionView();
        return view('livewire.admin.users.user-edit', ['data' => $data]);
    }
}
