<?php

use App\Models\Permission;
use App\Models\Role;

if (!function_exists('ViewDisplay')) {

    /**
     * description
     *
     * @return array
     *
     */
    function ViewDisplay(): array
    {
        $view = [
            [
                'header_page_name' => 'dashboard',
                'guard' => [
                    'roles' => [
                        Role::ROLE_ADMIN
                    ],
                ],
                'data_pages' => [
                    [
                        'is_multi_page' => false,
                        'page_name' => 'dashboard',
                        'page_route' => 'dashboard',
                        'page_icon' => 'fa-brands fa-readme',
                        'guard' => [
                            'roles' => [
                                Role::ROLE_ADMIN
                            ],
                            'permissions' => [],
                        ],
                    ],
                ],
            ],

            [
                'header_page_name' => 'Management',
                'guard' => [
                    'roles' => [
                        Role::ROLE_ADMIN
                    ],
                ],
                'data_pages' => [
                    [
                        'is_multi_page' => false,
                        'page_name' => 'Role & Permission',
                        'page_route' => 'role-permission',
                        'page_icon' => 'fa-solid fa-user-shield',
                        'guard' => [
                            'roles' => [
                                Role::ROLE_ADMIN
                            ],
                            'permissions' => [
                                Permission::MANAGE_PERMISSIONS, Permission::MANAGE_ROLES
                            ],
                        ],
                    ],
                    [
                        'is_multi_page' => true,
                        'title' => 'Account',
                        'icon' => 'fa-solid fa-users',
                        'guard' => [
                            'roles' => [
                                Role::ROLE_ADMIN
                            ],
                            'permissions' => [
                                Permission::MANAGE_USERS
                            ],
                        ],
                        'data_multi_pages' => [
                            [
                                'page_name' => 'Data Accounts',
                                'page_route' => 'users',
                                'guard' => [
                                    'roles' => [
                                        Role::ROLE_ADMIN
                                    ],
                                    'permissions' => [
                                        Permission::MANAGE_USERS
                                    ],
                                ],
                            ],
                            [
                                'page_name' => 'Create Accounts',
                                'page_route' => 'user.new',
                                'guard' => [
                                    'roles' => [
                                        Role::ROLE_ADMIN
                                    ],
                                    'permissions' => [
                                        Permission::CREATE_USER
                                    ],
                                ],
                            ],
                        ],
                    ],

                ],
            ], [
                'header_page_name' => 'log',
                'data_pages' => [],
                'guard' => [
                    'roles' => [
                        Role::ROLE_ADMIN
                    ],
                    'permissions' => [],
                ],
            ]
        ];



        return $view;
    }
}
