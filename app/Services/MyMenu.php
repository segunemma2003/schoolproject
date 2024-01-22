<?php

namespace App\Services;

use Pratiksh\Adminetic\Traits\SidebarHelper;
use Pratiksh\Adminetic\Contracts\SidebarInterface;

class MyMenu implements SidebarInterface
{
    use SidebarHelper;

    public function myMenu(): array
    {
        return [
                        [
                'type' => 'breaker',
                'name' => 'General',
                'description' => 'Administration Control',

],
            [
                'type' => 'link',
                'name' => 'Dashboard',
                'icon' => 'fa fa-home',
                'link' => route('dashboard'),
                'is_active' => request()->routeIs('home') ? 'active' : '',
                'conditions' => [
                    [
                        'type' => 'and',
                        'condition' => auth()->user()->hasRole('admin'),
                    ],
                ],
            ],
            [
                'type' => 'menu',
                'name' => 'User Management',
                'icon' => 'fa fa-users',
                'is_active' => request()->routeIs('user*') ? 'active' : '',
                'pill' => [
                    'class' => 'badge badge-info badge-air-info',
                    'value' => \App\Models\User::count(),
                ],
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', \App\Models\User::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', \App\Models\User::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('user', \App\Models\User::class),
            ],
            [
                'type' => 'menu',
                'name' => 'Plant',
                'icon' => 'fa fa-leaf',
                'is_active' => request()->routeIs('plant*') ? 'active' : '',
                'conditions' => [
                [
                'type' => 'or',
                'condition' => auth()->user()->can('view-any', \App\Models\Admin\Plant::class),
                ],
                [
                'type' => 'or',
                'condition' => auth()->user()->can('create', \App\Models\Admin\Plant::class),
                ],
                ],
                "children" => $this->indexCreateChildren("plant", \App\Models\Admin\Plant::class),

                ],

                [
                    'type' => 'menu',
                    'name' => 'Disease',
                    'icon' => 'far fa-user',
                    'is_active' => request()->routeIs('disease*') ? 'active' : '',
                    'conditions' => [
                    [
                    'type' => 'or',
                    'condition' => auth()->user()->can('view-any', \App\Models\Admin\Disease::class),
                    ],
                    [
                    'type' => 'or',
                    'condition' => auth()->user()->can('create', \App\Models\Admin\Disease::class),
                    ],
                    ],
                    "children" => $this->indexCreateChildren("disease", \App\Models\Admin\Disease::class),

                    ],
            [
                'type' => 'menu',
                'name' => 'Role',
                'icon' => 'fa fa-user-tie',
                'is_active' => request()->routeIs('role*') ? 'active' : '',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', \Pratiksh\Adminetic\Models\Admin\Role::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', \Pratiksh\Adminetic\Models\Admin\Role::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('role', \Pratiksh\Adminetic\Models\Admin\Role::class),
            ],
            [
                'type' => 'menu',
                'name' => 'Permission',
                'icon' => 'fa fa-check',
                'is_active' => request()->routeIs('permission*') ? 'active' : '',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', \Pratiksh\Adminetic\Models\Admin\Permission::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', \Pratiksh\Adminetic\Models\Admin\Permission::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('permission', \Pratiksh\Adminetic\Models\Admin\Permission::class),
            ],
            [
                'type' => 'link',
                'name' => 'Setting',
                'icon' => 'fa fa-cog',
                'link' => adminRedirectRoute('setting'),
                'is_active' => request()->routeIs('home') ? 'active' : '',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', \Pratiksh\Adminetic\Models\Admin\Setting::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', \Pratiksh\Adminetic\Models\Admin\Setting::class),
                    ],
                ],
            ],
            [
                'type' => 'menu',
                'name' => 'Preference',
                'icon' => 'fa fa-wrench',
                'is_active' => request()->routeIs('preference*') ? 'active' : '',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', \Pratiksh\Adminetic\Models\Admin\Preference::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', \Pratiksh\Adminetic\Models\Admin\Preference::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('preference', \Pratiksh\Adminetic\Models\Admin\Preference::class),
            ],
            [
                'type' => 'link',
                'name' => 'Activities',
                'icon' => 'fa fa-book',
                'is_active' => request()->routeIs('activities*') ? 'active' : '',
                'link' => adminRedirectRoute('activities'),
                'conditions' => [
                    [
                        'type' => 'and',
                        'condition' => auth()->user()->hasRole('admin'),
                    ],
                ],
            ],

        ];
    }
}
