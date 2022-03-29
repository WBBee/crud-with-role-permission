<?php
namespace App\Traits\backend;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait RolePermissionManager
{
    public function getRolePermissionView(): array
    {
        switch ($this->action) {
            case 'edit_user':
                $model_role = $this->user->getRoleNames();
                $model_permission = $this->user->getPermissionNames();
                return [
                    'role_used' => $this->user->roles,
                    'role_unused' => Role::getAvailableRoles($model_role),
                    'permission_used' => $this->user->permissions,
                    'permission_unused' => Permission::getAvailablePermission($model_permission),
                ];
                break;
             case 'edit_role':
                $user_has_role = User::whereHas('roles', function (Builder $query){
                    $query->where('name', '=', $this->role->name);
                })->get();
                $model = $this->role->getPermissionNames();
                return [
                    'name' => 'User Has Role',
                    'users' => $user_has_role,
                    'unused' => Permission::getAvailablePermission($model),
                    'used' => $this->role->permissions,
                ];
                break;

            case 'edit_permission':
                $user_has_permission = User::whereHas('permissions', function(Builder $query){
                    $query->where('name', '=', $this->permission->name);
                })->get();
                $model = $this->permission->getRoleNames();
                return [
                    'name' => 'User Has Permission',
                    'users' => $user_has_permission,
                    'unused' => Role::getAvailableRoles($model),
                    'used' => $this->permission->roles,
                ];
                break;

            default:
                # code...
                break;
        }
    }
}
