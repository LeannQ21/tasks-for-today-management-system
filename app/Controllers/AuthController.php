<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'logged_in' => true,
                'user_id'   => $user['id'],
                'username'  => $user['username'],
            ]);

            return redirect()->to('/tasks')->with('success', 'You are now logged in.');
        }

        return redirect()->to('/login')->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/')->with('success', 'You have been logged out.');
    }
}