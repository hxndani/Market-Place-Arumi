<?php

class Access extends BaseController
{

    function registrar($f3)
    {
        $f3->set('error', null);//inisialisasi variabel error

        if($f3->exists('POST.submit')) {

            $username = $f3->get('POST.username');
            $email = $f3->get('POST.email');
            $password = $f3->get('POST.password');
            $password2 = $f3->get('POST.password2');
            $_access = new _access($this->db);

            if ($this->checkUsername($username) or $this->checkEmail($email)){
                $f3->set('error', 'Email/Username sudah digunakan!');
            } 
            else if($password !== $password2){
                $f3->set('error', 'Konfirmasi password tidak cocok');
            }
                
            else {
                $ref = $this->uniqidReal();
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $data = "('" . $ref .
                "','" . urldecode($f3->get('POST.username')) .
                "','" . urldecode($f3->get('POST.email')) .
                "','" . $hash .
                "','2','1')";
                $new = $_access->newAccess($data);
                // $f3->set('SESSION.email',  $email);

                $this->$f3->reroute('/login');
            }
            echo Template::instance()->render('marketplace/login/header.htm');
            echo Template::instance()->render('marketplace/login/datadiri.htm');
            echo Template::instance()->render('marketplace/login/footer.htm');
    }

    }

    public function challenge($f3)
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $username = $f3->get('POST.username');
        $password = $f3->get('POST.password');
        $email = $f3->get('POST.email');

        if ($this->checkUsername($username) || $this->checkEmail($email)) {
            if ($this->checkCredentialsByUsername($username, $password) || $this->checkCredentialsByEmail($username, $password)) {
                $_access = new _access($this->db);
                $level = $_access->getLevelByUsername($username) | $_access->getLevelByEmail($email);
                
                
                $user_id = $_access['id'];
                $f3->set('SESSION.level', $level);
                $f3->set('SESSION.user', $username);
                $f3->set('SESSION.user_id', $user_id);
                // $f3->set('SESSION.email', $email);

                $f3->reroute('/');
            } else {
                $type = false;
                $message = "Please check your email or password.";
                $this->infoShow($type, $message);
            }
        } else {
            $type = false;
            $message = "Account not found!";
            $this->infoShow($type, $message);
        }
    }


    // function challenge($f3)
    // {
    //     // $username = $f3->get('POST.username');
    //     // $password = $f3->get('POST.password');

    //     // if ($this->checkUsername($username)) {
    //     //     if ($this->checkCredentialsByUsername($username, $password)) {
    //     //         // Set session dan redirect
    //     //         $f3->set('SESSION.user', $username);
    //     //         echo 'Session set: ' . $f3->get('SESSION.user');
    //     //         $f3->reroute('/');
    //     //     } else {
    //     //         echo 'Kredensial tidak valid<br>';
    //     //         $this->infoShow(false, "Please check your email or password.");
    //     //     }
    //     // } else {
    //     //     echo 'Akun tidak ditemukan<br>';
    //     //     $this->infoShow(false, "Account not found!");
    //     // }
    //     // exit;

    //     if ($f3->get('PARAMS.action') == 'login') {
    //         $username = $f3->get('POST.username');
    //         $password = $f3->get('POST.password');
    //         // echo "$username, $password";

    //         if ($this->checkUsername($username) or $this->checkEmail($username)):
    //             if ($this->checkCredentialsByUsername($username, $password) or $this->checkCredentialsByEmail($username, $password)):
    //                 $_access = new _access($this->db);
    //                 $level = $_access->getLevelByUsername($username) ? $_access->getLevelByUsername($username) : $_access->getLevelByEmail($username);
    //                 $f3->set('SESSION.level', $level);
    //                 $f3->set('SESSION.user', $username);
    //                 $this->$f3->reroute('/');
    //             else:
    //                 $type = false;
    //                 $message = "Please check your email or password.";
    //                 $this->infoShow($type, $message);
    //             endif;
    //         else:
    //             $type = false;
    //             $message = "Account not found!";
    //             $this->infoShow($type, $message);
    //         endif;
    //     }
    // }

    function checkUsername($username)
    {
        $_access = new _access($this->db);

        if ($_access->checkUsername($username))
            return true;

        return false;
    }

    function checkEmail($email)
    {
        $_access = new _access($this->db);

        if ($_access->checkEmail($email))
            return true;

        return false;
    }

    function checkCredentialsByUsername($username, $password)
    {
        $_access = new _access($this->db);
        $get_pass = $_access->getPasswordByUsername($username);

        if ($get_pass)
            return password_verify($password, $get_pass);

        return false;
    }

    function checkCredentialsByEmail($email, $password)
    {
        $_access = new _access($this->db);
        $get_pass = $_access->getPasswordByEmail($email);

        if ($get_pass)
            return password_verify($password, $get_pass);

        return false;
    }

    function infoShow($type, $message)
    {
        echo $message;
    }

    public function uniqidReal()
    {
        $lenght = 16;
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }

    function logout($f3)
    {
        $f3->clear('SESSION');
        $f3->reroute('/');
    }
}
