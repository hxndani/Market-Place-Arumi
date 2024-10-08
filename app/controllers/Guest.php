<?php

class Guest extends BaseController
{

    function checkSessionLevel($level)
    {
        if ($level == '1'):
            $this->f3->reroute('/dashboard');
        elseif ($level == '2'):
            $this->f3->reroute('/member');
        endif;
    }

    function login($f3)
    {
        echo Template::instance()->render('marketplace/login/header.htm');
        echo Template::instance()->render('marketplace/login/login.htm');
        echo Template::instance()->render('marketplace/login/footer.htm');
        // echo Template::instance()->render('marketplace/basket/card_detail_barang.htm');
    }

    // function daftar($f3){
    //     echo Template::instance()->render('marketplace/login/header.htm');
    //     echo Template::instance()->render('marketplace/login/daftar.htm');
    //     echo Template::instance()->render('marketplace/login/footer.htm');
    //     // echo Template::instance()->render('marketplace/basket/card_detail_barang.htm');
    // }

    function datadiri($f3)
    {
        echo Template::instance()->render('marketplace/login/header.htm');
        echo Template::instance()->render('marketplace/login/datadiri.htm');
        echo Template::instance()->render('marketplace/login/footer.htm');
        // echo Template::instance()->render('marketplace/basket/card_detail_barang.htm');
    }

    function index($f3)
    {
        if (null !== $f3->get('SESSION.level')):
            $this->checkSessionLevel($f3->get('SESSION.level'));
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

    function detail($f3,$params)
    {
        // if($f3->get('SESSION.level') != '1'):
        //     $this->f3->reroute('/');
        // else:
            $id = $params['id'];
            $_product_display = new _product_display($this->db); // 
            $_product_display->load(array('id=?', $id));
        
            // Cek jika produk ditemukan
            if (!$_product_display->dry()) {
                // mengkonversi object ke array
                $product = $_product_display->cast();
        
                // ngiirim data produck ke view
                $f3->set('product', $product);
                
            echo Template::instance()->render('header.htm');
            echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
            echo Template::instance()->render('marketplace/basket/card_detail_barang.htm');
            echo Template::instance()->render('marketplace/basket/card_spesifikasi_barang.htm');
            echo Template::instance()->render('marketplace/basket/card_review_barang.htm');
            echo Template::instance()->render('footer.htm');

        } else{
            $type = false;
            $message = 'Produk tidak ditemukan';
            $this->infoShow($type,$message);
        }

    }
    function cart($f3) {
        $session = $f3->get('SESSION.user');
        if (!$session) {
            $f3->reroute('/login');
        }
        $cart = new Cart($this->db);
        $f3->set('carts', $cart->find(null,['order'=>'id DESC']));

        
        
        echo Template::instance()->render('header.htm');
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        echo Template::instance()->render('marketplace/basket/card_shoppingcart_barang.htm');
        echo Template::instance()->render('footer.htm');
    }
    
    
    function addProduct($f3, $params) {

        $session = $f3->get('SESSION.user');
        if (!$session) {
            $f3->reroute('/login');
        }
        $id = $params['id'];
        $f3->set('SESSION.id_product', $id);

        $qty = (int)$f3->get('POST.qty');
    
        $_product_display = new _product_display($this->db);
        $_product_display->load(array('id=?', $id));
        $product = $_product_display->cast();
    
        $cart = new Cart($this->db);
    
        // Cek udah ada produknya di keranjang atau belum
        $cart->load(array('id=?', $id));
    
        if (!$cart->dry()) {
            // Jika produk udah ada, tambah kuantitas
            $cart->qty += $qty;
            $cart->update();
        } else {
            // Jika produk belum ada, tambahin produk baru
            
            $cart->sku = $product['sku'];
            $cart->name = $product['name'];
            $cart->part = $product['part'];
            $cart->motor = $product['motor'];
            $cart->level = $product['level'];
            $cart->color = $product['color'];
            $cart->image = $product['image'];
            $cart->price = $product['price'];
            $cart->stock_in = $product['stock_in'];
            $cart->stock_out = $product['stock_out'];
            $cart->qty = $qty; // Simpan kuantitas yg diinput user
            $cart->save();
        }
    
        $f3->reroute('/detail/@id');
    }

    function remove(){
        $id = $this->f3->get('PARAMS.id');
        $user = new Cart($this->db);
        $user->load(array('id=?',$id));
        $user->erase();
        $this->f3->reroute("/cart");

    }
    
    function product($f3)
    {
        // if($f3->get('SESSION.level') != '1'):
        //     $this->f3->reroute('/');
        // else:
        echo Template::instance()->render('header.htm');
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        echo Template::instance()->render('marketplace/dashboard/card_semua_barang.htm');
        echo Template::instance()->render('footer.htm');
        // endif;
    }

    function category($f3)
    {
        // if($f3->get('SESSION.level') != '1'):
        //     $this->f3->reroute('/');
        // else:
        echo Template::instance()->render('header.htm');
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        echo Template::instance()->render('marketplace/category/card_banner.htm');
        // echo Template::instance()->render('marketplace/category/card_chosen.htm');
        echo Template::instance()->render('marketplace/category/card_merk_motor.htm');
        // echo Template::instance()->render('marketplace/category/card_trending.htm');
        echo Template::instance()->render('marketplace/category/card_kategori_barang.htm');
        echo Template::instance()->render('footer.htm');
        // endif;
    }

    function merk($f3)
    {
        // if($f3->get('SESSION.level') != '1'):
        //     $this->f3->reroute('/');
        // else:
        echo Template::instance()->render('header.htm');
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        echo Template::instance()->render('marketplace/merk/card_info_merk.htm');
        echo Template::instance()->render('marketplace/merk/card_trending.htm');
        echo Template::instance()->render('marketplace/merk/card_iklan.htm');
        echo Template::instance()->render('marketplace/merk/card_kategori_barang.htm');
        echo Template::instance()->render('footer.htm');
    }

    // profil
    function profil($f3){
        $session = $f3->get('SESSION.user');
        $_access = new _access($this->db);
        $_member = new _member($this->db);
        
        $_member->load(array('username=?', $session));
        
        if($f3->exists('POST.submit')){
            
            $update_name = $f3->get('POST.name');
            $update_phone = $f3->get('POST.phone');
            $update_toko = $f3->get('POST.toko');
            $update_gender = $f3->get('POST.gender');
            //$update_username = $f3->get('POST.username');
            $update_email = $f3->get('POST.email');
            $update_tanggal_lahir = $f3->get('POST.tanggal_lahir');

            //upload gambar
            $nama_file = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];
            $error = $_FILES['gambar']['error'];
            $ukuran_file = $_FILES['gambar']['size'];

            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $nama_file);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
            if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
                $f3->set('error', 'Please upload a valid file (JPG/JPEG/PNG)!');
                
            }
            else if($ukuran_file > 100000){
                $f3->set('error', 'Ukuran file terlalu besar!');
                
            }
            // lolos pengecekan, gambar siap diupload
            // generate name gambar baru
            $nama_file_baru = uniqid();
            $nama_file_baru .= '.';
            $nama_file_baru .= $ekstensiGambar;
            move_uploaded_file($tmp_name, 'public/images/uploadedFile/' . $nama_file_baru);
            
            // $_member->username = $update_username;
            $_member->email = $update_email;
            $_member->name = $update_name;
            $_member->phone = $update_phone;
            $_member->toko = $update_toko;
            $_member->gambar = $nama_file_baru;
            $_member->gender = $update_gender;
            $_member->tanggal_lahir = $update_tanggal_lahir;
            $_member->update();
            
            $f3->set('members', $_member);

            
        }
        else{
                if($_member->load(array('username=?',$session)) == null){

                    $select = $_access->load(array('username=?', $session));
                    $_member->username = $select['username'];
                    $_member->email = $select['email'];
                    $_member->gambar = "https://via.placeholder.com/128";
                    $_member->gender = "";
                    $_member->tanggal_lahir = null;
                    $_member->save();

                    $f3->set('members', $_member->find());
                    

                }else{
                    $_member->load(array('username=?', $session));
                    $f3->set('members', $_member);

                }
            }   
        echo Template::instance()->render('header.htm');
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        echo Template::instance()->render('user/side_bar.htm');
        echo Template::instance()->render('user/card_profil.htm');
        echo Template::instance()->render('footer.htm');

    }
    function uploadGambar($f3){

        

    }

    function bank($f3)
    {
        // if($f3->get('SESSION.level') != '1'):
        //     $this->f3->reroute('/');
        // else:
        echo Template::instance()->render('header.htm');
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        echo Template::instance()->render('user/side_bar.htm');
        echo Template::instance()->render('user/card_bank.htm');
        echo Template::instance()->render('footer.htm');
    }

    function alamat($f3)
    {
        // if($f3->get('SESSION.level') != '1'):
        //     $this->f3->reroute('/');
        // else:
        echo Template::instance()->render('header.htm');
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        echo Template::instance()->render('user/side_bar.htm');
        echo Template::instance()->render('user/card_alamat.htm');
        echo Template::instance()->render('footer.htm');
        // endif;
    }

    function pengiriman($f3)
    {
        // if($f3->get('SESSION.level') != '1'):
        //     $this->f3->reroute('/');
        // else:
        echo Template::instance()->render('header.htm');
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        echo Template::instance()->render('user/side_bar.htm');
        echo Template::instance()->render('user/card_pengiriman_barang.htm');
        echo Template::instance()->render('footer.htm');
        // endif;
    }

    function detail_pengiriman($f3)
    {
        // if($f3->get('SESSION.level') != '1'):
        //     $this->f3->reroute('/');
        // else:
        echo Template::instance()->render('header.htm');
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        echo Template::instance()->render('user/side_bar.htm');
        echo Template::instance()->render('user/card_detail_pengiriman.htm');
        echo Template::instance()->render('footer.htm');
        // endif;
    }

    function voucher($f3)
    {
        echo Template::instance()->render('header.htm');
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        echo Template::instance()->render('user/side_bar.htm');
        echo Template::instance()->render('user/card_voucher.htm');
        echo Template::instance()->render('footer.htm');
    }

    function pengaturan_notifikasi($f3)
    {
        echo Template::instance()->render('header.htm');
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        echo Template::instance()->render('user/side_bar.htm');
        echo Template::instance()->render('user/card_pengaturan_notifikasi.htm');
        echo Template::instance()->render('footer.htm');
    }

    function semua_barang($f3)
    {
        // if($f3->get('SESSION.level') != '1'):
        //     $this->f3->reroute('/');
        // else:
        echo Template::instance()->render('header.htm');
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        // echo $f3->call('ProductDisplay->showCardProducts');
        echo Template::instance()->render('marketplace/dashboard/card_semua_barang.htm');
        echo Template::instance()->render('footer.htm');
        // endif;
    }

    function infoShow($type, $message){
        echo $message;
    }
}
