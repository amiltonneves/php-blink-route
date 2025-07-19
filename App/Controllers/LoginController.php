<?php

namespace App\Controllers;

use App\Models\User;
use App\Core\Controller;

class LoginController extends Controller
{
    public function index()
    {
        $this->view(
            'login',
            'Login',
            []
        );
    }

    public function store()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = htmlspecialchars($_POST['password']);

        if (empty($email) || empty($password)) {
            setMessageAndRedirect('message', 'Não deixe campos em branco');
        }
        $user = new User;
        $user = $user->findBy('email', $email);

        if (!$user) {
            setMessageAndRedirect('message', 'Email ou senha estão incorretos');
        }
        if (!password_verify($password, $user->password)) {
            setMessageAndRedirect('message', 'Email ou senha estão incorretos');
        }

        $_SESSION[LOGGED] = $user;
        return redirect('/');
    }
    public function destroy()
    {
        unset($_SESSION[LOGGED]);
        redirect('/login');
    }
}