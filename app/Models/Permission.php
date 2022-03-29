<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    const MANAGE_USERS = 'can manage users';
    const CREATE_USER = 'can create user';
    const VIEW_USER = 'can read user';
    const UPDATE_USER = 'can update user';
    const DELETE_USER = 'can delete user';
    const UPDATE_USER_ROLES = 'can update user roles';
    const UPDATE_USER_PERMISSIONS = 'can update user permissions';

    const MANAGE_ROLES = 'can manage roles';

    const MANAGE_PERMISSIONS = 'can manage permissions';

    public static function getPermissionList(): array
    {
        return [
            self::MANAGE_USERS,
            self::CREATE_USER,
            self::VIEW_USER,
            self::UPDATE_USER,
            self::DELETE_USER,
            self::UPDATE_USER_ROLES,
            self::UPDATE_USER_PERMISSIONS,

            self::MANAGE_ROLES,
            self::MANAGE_PERMISSIONS,
        ];
    }

    public static function isPermissionExist(string $permission_name)
    {
        $query = static::query();
        $query->where('name', '=', $permission_name);
        return $query->first();
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%')
            ;
    }

    public static function getAvailablePermission($model)
    {
        $query = static::query();
        $query->whereNotIn('name', $model);
        return $query->get();
    }
}
