<?php

namespace App\Controllers;

use App\Models\User;
use App\Core\Controller;

class UserController extends Controller
{
    public function show($params)
    {
        if (!isset($params['user'])) {
            return redirect('/');
        }
        $user = new User;
        $user = $user->findBy('id', $params['user']);

        $this->view(
            'update',
            'Usuário',
            ['user' => $user]
        );
    }

    public function create($params)
    {
        $this->view('create', 'Cadastro');
    }

    public function save($params)
    {
        $user = new User;

        $validate = validate(
            $user,
            ['nome' => 'required', 'email' => 'required|email']
        );

        if (!$validate) {
            return redirect("/user/{$params['user']}");
        }
        $updated = $user->update('id', $params['user'], $validate);

        if (!$updated) {
            setFlash('message', "Ocorreu um erro ao atualizar");
            return redirect("/user/{$params['user']}");
        }
        return redirect('/');
    }
    public function store($params)
    {
        $user = new User;

        $validate = validate(
            $user,
            [
                'nome' => 'required',
                'email' => 'email|unique:usuarios',
                'password' => 'required|maxlen:5'
            ]
        );
        if (!$validate) {
            return redirect('/user/create');
        }
        $validate['password'] = password_hash($validate['password'], PASSWORD_DEFAULT);
        $created = $user->create($validate);

        if (!$created) {
            setFlash('message', "Ocorreu um erro ao cadastrar");
            return redirect('/user/create');
        }
        return redirect('/');
    }

    public function destroy($id)
    {
        if (!$id) {
            setFlash('message', "Ocorreu um erro ao excluir");
            return redirect('/');
        }
        $user = new User;
        $user->delete($id);
    }
}