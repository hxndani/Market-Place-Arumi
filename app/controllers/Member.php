<?php

class Member extends BaseController
{
    function index($f3)
    {
        if ($f3->get('SESSION.level') != '2'):
            $this->f3->reroute('/');
        else:
            echo Template::instance()->render('header.htm');
            echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
            echo Template::instance()->render('marketplace/dashboard/card_banner.htm');
            echo Template::instance()->render('marketplace/dashboard/card_menu.htm');
            echo Template::instance()->render('marketplace/dashboard/card_kategori.htm');
            echo Template::instance()->render('marketplace/dashboard/card_trending.htm');
            // echo $f3->call('ProductDisplay->showCardProducts');
            echo Template::instance()->render('marketplace/dashboard/card_barang.htm');
            // echo Template::instance()->render('marketplace/dashboard/card_chat.htm');
            echo Template::instance()->render('footer.htm');
        endif;
    }
}
