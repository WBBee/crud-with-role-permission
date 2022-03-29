<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Repositories\backend\UserRepository;
use App\Repositories\Interfaces\backend\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole(Role::ROLE_ADMIN)) {
            return view('pages.admin.users.user-page', [
                'users' => User::class,
            ]);
        }
    }

    public function edit($id)
    {
        $user = Auth::user();
        if ($user->hasRole(Role::ROLE_ADMIN)) {
            return view('pages.admin.users.user-edit-page', [
                'id' => $id,
            ]);
        }
    }

    public function create()
    {
        $user = Auth::user();
        if ($user->hasRole(Role::ROLE_ADMIN)) {
            return view('pages.admin.users.user-create-page');
        }

    }
}
