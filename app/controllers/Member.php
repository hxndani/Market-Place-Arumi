<?php

class Member extends BaseController
{
    function index($f3)
    {
        $_member = new _member($this->db);
        $session = $f3->get('SESSION.user');
        

        if ($f3->get('SESSION.level') != '2'){
            $this->f3->reroute('/');
        }
        else{
            if(!$_member->username ==  $session){

                $_access = new _access($this->db);
                $select = $_access->load(array('username=?', $session));
                $user_id = $f3->get('SESSION.id');
                
                $_member->username = $select['username'];
                $_member->email = $select['email'];
                $_member->gambar = "https://via.placeholder.com/128";
                $_member->save();

                $members = $_member->load(array('username=?', $session));
                $f3->set('members', $_member);

            }else{
                $f3->set('members', $_member->getByUsername($session));
            }
            
            
        }

             // Ambil data pengguna
            echo Template::instance()->render('header.htm');
            echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
            echo Template::instance()->render('marketplace/dashboard/card_banner.htm');
            echo Template::instance()->render('marketplace/dashboard/card_menu.htm');
            echo Template::instance()->render('marketplace/dashboard/card_kategori.htm');
            echo Template::instance()->render('marketplace/dashboard/card_trending.htm');
            echo Template::instance()->render('marketplace/dashboard/card_barang.htm');
            echo Template::instance()->render('footer.htm');
     
    }

}
