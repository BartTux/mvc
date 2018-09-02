<?php
/**
 * Created by PhpStorm.
 * User: bartek
 * Date: 02.09.18
 * Time: 11:54
 */

class Users extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            if(empty($data['name'])) {
                $data['name_error'] = 'Please enter your name';
            }

            if(empty($data['email'])) {
                $data['email_error'] = 'Please enter your e-mail';
            } elseif($this->userModel->findUserByEmail($data['email'])) {
                $data['email_error'] = 'E-mail is already taken';
            }

            if(empty($data['password'])) {
                $data['password_error'] = 'Please enter your password';
            } elseif(strlen($data['password']) < 6) {
                $data['password_error'] = 'Password must be at least 6 characters';
            }

            if(empty($data['confirm_password'])) {
                $data['confirm_password_error'] = 'Please confirm your password';
            } elseif($data['password'] !== $data['confirm_password']) {
                $data['confirm_password_error'] = 'Passwords you gave don\'t match';
            }

            if(empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])) {
                //Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register new user and check if everything is ok
                if($this->userModel->registerNewUser($data)) {
                    redirect('users/login');
                } else {
                    die('Something went wrong :(');
                }
            } else {
                $this->view('users/register', $data);
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_error' => '',
                'password_error' => ''
            ];

            if(empty($data['email'])) {
                $data['email_error'] = 'Please enter your e-mail';
            }

            if(empty($data['password'])) {
                $data['password_error'] = 'Please enter your password';
            }

            if(empty($data['email_error']) && empty($data['password_error'])) {
                die('<p style="color: green">SUCCESS</p>');
            } else {
                $this->view('users/login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => ''
            ];

            $this->view('users/login', $data);
        }
    }
}