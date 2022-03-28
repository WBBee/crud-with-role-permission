<?php

namespace App\Http\Livewire\Admin\Permissions;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Traits\backend\RolePermissionManager;
use Livewire\Component;

class RolePermissionEdit extends Component
{
    use RolePermissionManager;
    public $action = '';

    public $role;
    public $permission;
    public $name;
    public function mount($id)
    {
        if ($this->action == 'edit_role') {
            $this->role = Role::find($id);
            $this->name = $this->role->name;
        }else if ($this->action == 'edit_permission') {
            $this->permission = Permission::find($id);
            $this->name = $this->permission->name;
        }
    }

    public function deletedUsedByUser($id)
    {
        $user = User::find($id);
        if ($this->action == 'edit_role') {
            $user->removeRole($this->role->name);
        }else if ($this->action == 'edit_permission') {
            $user->revokePermissionTo($this->permission->name);
        }
    }

    public $add_by_name;
    public function addByName()
    {
        $this->validate([
            'add_by_name' => 'required|string',
        ]);
        if ($this->action == 'edit_role') {
            $this->role->givePermissionTo($this->add_by_name);
        }else if ($this->action == 'edit_permission') {
            $this->permission->assignRole($this->add_by_name);
        }
        $this->add_by_name = null;
    }

    public function removedById($id)
    {
        if ($this->action == 'edit_role') {
            $permission = Permission::find($id);
            $this->role->revokePermissionTo($permission->name);
        }else if ($this->action == 'edit_permission') {
            $role = Role::find($id);
            $this->permission->removeRole($role->name);
        }
    }

    public function updateByName()
    {
        $this->validate([
            'name' => 'required|string',
        ]);
        if ($this->action == 'edit_role') {
            $this->role->name = $this->name;
            $this->role->save();
        }else if ($this->action == 'edit_permission') {
            $this->permission->name = $this->name;
            $this->permission->save();
        }
    }

    public function render()
    {
        $data = $this->getRolePermissionView();
        return view('livewire.admin.permissions.role-permission-edit', ['data' => $data]);
    }
}
