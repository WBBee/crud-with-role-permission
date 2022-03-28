<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    const ROLE_ADMIN = 'Administrator';
    const ROLE_SELLER = 'Seller';
    const ROLE_VISITOR = 'Visitor';

    public static function getRoleList(): array
    {
        return [
            self::ROLE_ADMIN,
            self::ROLE_SELLER,
            self::ROLE_VISITOR,
        ];
    }

    public static function isRoleExist(string $role_name)
    {
        $query = static::query();
        $query->where('name', '=', $role_name);
        return $query->first();
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%')
            ;
    }
}
