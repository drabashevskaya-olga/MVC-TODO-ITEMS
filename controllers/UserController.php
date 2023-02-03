<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\App\App;

class UserController
{
    private $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function login()
    {
        session_start();

        $message = '';
        if (isset($_SESSION['userName'])) {
            $message = 'Hi, ' . $_SESSION['userName'];
        }

        $title = 'Login';
        return view('pages.login', compact('title', 'message'));
    }

    public function signUp()
    {
        $title = 'Login';

        if (empty($_POST)) {
            redirect('login');
        }

        $login = htmlentities($_POST['login'], ENT_QUOTES);
        $pass = htmlentities($_POST['password'], ENT_QUOTES);

        $where = ' `login`="' . $login . '" AND `password`="' . $pass . '"';

        try {
            $currentUser = App::get('db')->selectAll('users', $where);
            session_start();
            $_SESSION['userName'] = !empty($currentUser[0]) ? $currentUser[0]->login : '';
            
            header('Location: /');
        } catch (\Exception $e) {
            header('Location: /login');
        }

        return view('pages.login', compact('title'));
    }
}