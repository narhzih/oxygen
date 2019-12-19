<?php

class Users extends Controller
{
    public function __construct()
    {
        
    }

    public function register()
    {
        //Check for POST

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //Proccess Form
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];

        
            

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //Validate name
            if(empty($data['name']))
            {
                $this->error = true;
                $data['name_err'] = "Please enter your name";
            }

            //Validate Email

            if(empty($_POST['email']))
            {
                $this->error = true;
                $data['email_err'] = "Please enter your email";
            }

            //Validate Password field
            if(empty($data['password']))
            {
                $this->error = true;
                $data['password_err'] = "Please enter your password";
            }elseif(strlen($data['password']) < 6)
            {
                $this->error = true;
                $data['password_err'] = "Your password cannot be less than 6 characters";
            }

            //Validate Confirm password field
            if(empty($data['confirm_password']))
            {
                $this->error = true;
                $data['confirm_password_err'] = "Please confirm your password";
            }elseif($data['confirm_password'] != $data['password'])
            {
                $this->error = true;
                $data['confirm_password_err'] = "Password does not match";
            }

            //Check if there is any error

            if($this->error == true)
            {
                //Error is present
                $this->view('auth/register', $data);
            }else{
                die('Validated successfully');
            }
            

            

        }else{
            //Load Form
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];

            //Load view
            $this->view('auth/register', $data);
        }
    }

    public function login()
    {
        //Check for POST

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            if (empty($_POST['email'])) {
                $this->error = true;
                $data['email_err'] = "Please enter your email";
            }

            if (empty($data['password'])) {
                $this->error = true;
                $data['password_err'] = "Please enter your password";
            }

            if ($this->error == true) {
                //Error is present
                $this->view('auth/login~', $data);
            } else {
                die('Validated successfully');
            }
        } else {
            //Load Form
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            //Load view
            $this->view('auth/login', $data);
        }
    }
}