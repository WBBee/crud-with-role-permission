<?php

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
                'allow_role' => [
                    Role::getRoleList(),
                ],
                'data_pages' => [
                    [
                        'is_multi_page' => false,
                        'page_name' => 'dashboard',
                        'page_route' => 'dashboard',
                        'page_icon' => 'fab fa-readme',
                        'allow_role' => [
                            Role::ROLE_ADMIN
                        ],
                    ],
                ],
            ],

            [
                'header_page_name' => 'Management',
                'allow_role' => [
                    Role::ROLE_ADMIN,
                ],
                'data_pages' => [
                    [
                        'is_multi_page' => false,
                        'page_name' => 'Role & Permission',
                        'page_route' => 'dashboard',
                        'page_icon' => 'fab fa-readme',
                        'allow_role' => [
                            Role::ROLE_ADMIN
                        ],
                    ],
                    [
                        'is_multi_page' => true,
                        'title' => 'Account',
                        'icon' => 'fas fa-fire',
                        'allow_role' => [
                            Role::ROLE_ADMIN
                        ],
                        'data_multi_pages' => [
                            [
                                'page_name' => 'Create Accounts',
                                'page_route' => 'dashboard',
                                'page_icon' => '',
                                'allow_role' => [
                                    Role::ROLE_ADMIN
                                ],
                            ],[
                                'page_name' => 'Data Accounts',
                                'page_route' => 'dashboard',
                                'page_icon' => '',
                                'allow_role' => [
                                    Role::ROLE_ADMIN
                                ],
                            ],
                        ],
                    ],

                    [
                        'is_multi_page' => false,
                        'page_name' => 'Role & Permission',
                        'page_route' => 'dashboard',
                        'page_icon' => 'fab fa-readme',
                        'allow_role' => [
                            Role::ROLE_ADMIN
                        ],
                    ],
                ],
            ], [
                'header_page_name' => 'log',
                'data_pages' => [],
                'allow_role' => [Role::ROLE_ADMIN],
            ]
        ];



        return $view;
    }
}
