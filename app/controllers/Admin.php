<?php

class Admin extends BaseController {

    function index($f3) {
        if($f3->get('SESSION.level') != '1'):
            echo Template::instance()->render('admin/header.htm');
            echo Template::instance()->render('admin/login.htm');
            echo Template::instance()->render('admin/footer.htm');
        else:
            $this->f3->reroute('/dashboard');
        endif;
    }

    function dashboard($f3) {
        if($f3->get('SESSION.level') != '1'):
            $this->f3->reroute('/');
        else:
            echo Template::instance()->render('admin/header.htm');
            echo Template::instance()->render('admin/index.htm');
            echo Template::instance()->render('admin/footer.htm');
        endif;
    }

    function products($f3) {
        if($f3->get('SESSION.level') != '1'):
            $this->f3->reroute('/');
        else:
            echo Template::instance()->render('admin/header.htm');
            echo Template::instance()->render('admin/products.htm');
            echo Template::instance()->render('admin/footer.htm');
        endif;
    }

    function sales($f3) {
        if($f3->get('SESSION.level') != '1'):
            $this->f3->reroute('/');
        else:
            echo Template::instance()->render('admin/header.htm');
            echo Template::instance()->render('admin/sales.htm');
            echo Template::instance()->render('admin/footer.htm');
        endif;
    }

    function members($f3) {
        if($f3->get('SESSION.level') != '1'):
            $this->f3->reroute('/');
        else:
            echo Template::instance()->render('admin/header.htm');
            echo Template::instance()->render('admin/members.htm');
            echo Template::instance()->render('admin/footer.htm');
        endif;
    }

    function challenge($f3)
    {
        if($f3->get('PARAMS.action') == 'login'):
            $username = $f3->get('POST.username');
            $password = $f3->get('POST.password');
            // echo "$username, $password";

            if ($this->checkUsername($username)):
                if($this->checkCredentials($username, $password)):
                    $f3->set('SESSION.level', '1');
                    $this->f3->reroute('/');
                else:
                    $type = false;
                    $message = "Please check your email or password.";
                    $this->infoShow($type, $message);
                endif;
            else:
                $type = false;
                $message = "Account not found!";
                $this->infoShow($type, $message);
            endif;
        endif;
    }

    function checkUsername($username)
    {
        $_admin = new _admin($this->db);

        if($_admin->checkUsername($username))
            return true;

        return false;
    }

    function checkCredentials($username, $password)
    {
        $_admin = new _admin($this->db);
        $get_pass = $_admin->getPasswordByUsername($username);

        if ($get_pass)
            return password_verify($password, $get_pass);

        return false;
    }

    function infoShow($type, $message) {
        echo $message;
    }

}