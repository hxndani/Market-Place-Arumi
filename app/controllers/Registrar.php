<?php

class Registrar extends BaseController
{
    function daftar()
    {
        echo Template::instance()->render('marketplace/login/header.htm');
        echo Template::instance()->render('marketplace/login/datadiri.htm');
        echo Template::instance()->render('marketplace/login/footer.htm');
    }

    function save()
    {
        $username = $this->f3->get('POST.username');
        $email = $this->f3->get('POST.email');
        $password = $this->f3->get('POST.password');

        $users = new _users($this->db);
        $users->username = $username;
        $users->email = $email;
        $users->password = $password;
        $users->save();

        $this->f3->reroute("/login");
    }
}
