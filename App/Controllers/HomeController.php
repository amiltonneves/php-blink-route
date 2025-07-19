<?php

namespace App\Controllers;

use App\Models\User;
use App\Core\Controller;

class HomeController extends Controller
{
    public function index($params)
    {
        $user = new User;
        $users = $user->all();
        $user2 = $user->findBy('id', 2);

        $this->view(
            'home',
            'Home',
            [
                'users' => $users,
                'user2' => $user2
            ]
        );
    }
}