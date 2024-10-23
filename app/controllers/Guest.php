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

    function detail($f3)
    {
            $id = $f3->get('PARAMS.id');
            $_product_display = new _product_display($this->db);//
            // $product = $_product_display->load(array('id = ?', $id));
            $product = $_product_display->getProductDetail($id);
            $_member = new _member($this->db);
            $members = $_member->load(array('username=?', $f3->get('SESSION.user')));
        
            // Cek jika produk ditemukan
            // if (!$_product_display->dry()) {
                // mengkonversi object ke array
                // $product = $_product_display->cast();
        
                // ngiirim data produck ke view
                $f3->set('products', $product);
                $f3->set('members', $members);
                // print_r($product);
                
            echo Template::instance()->render('header.htm');
            echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
            echo Template::instance()->render('marketplace/basket/card_detail_barang.htm');
            echo Template::instance()->render('marketplace/basket/card_spesifikasi_barang.htm');
            echo Template::instance()->render('marketplace/basket/card_review_barang.htm');
            echo Template::instance()->render('footer.htm');

        // } else{
        //     $type = false;
        //     $message = 'Produk tidak ditemukan';
        //     $this->infoShow($type,$message);
        // }

    }
    
    
    function cart($f3) {
        $session = $f3->get('SESSION.user');

        if (!$session) {
            $f3->reroute('/login');
        }

        $_member = new _member($this->db);
        $_member->load(['username=?', $session]);

        $cart = new Cart($this->db);

        // Handle POST request untuk update kuantitas
        if ($f3->get('VERB') === 'POST' && $f3->get('POST.action') === 'update') {
            $cart_id = $f3->get('POST.cart_id');
            $quantity = $f3->get('POST.quantity');
    
            // Debugging - Log data POST untuk cek
            error_log("cart_id: $cart_id, quantity: $quantity");
    
            if (!$cart_id || !$quantity) {
                echo json_encode(['error' => 'Missing cart_id or quantity']);
                return;
            }
    
            try {
                // Mengambil cart item dengan harga final
                $user_id = $f3->get('SESSION.user_id');
                $carts = $cart->getCartWithProductDetails($user_id);
    
                if ($carts) {
                    $cart->load(['id=?', $cart_id]);
                    $cart->quantity = $quantity;
                    $cart->update();
                
                    // Pastikan kita mendapatkan final_price yang benar
                    // $final_price = $cart['final_price'] ?? 0; // Gunakan nilai default jika tidak ada
                    
                    $subtotal = $this->subtotal($cart_id);
                     // Hitung subtotal
                    $totalPrice = $this->calculateTotalPrice($f3->get('SESSION.user_id'));
                
                    header('Content-Type: application/json');
                    
                    echo json_encode([
                        'subtotal' => $subtotal,
                        'total_price' => $totalPrice
                    ]);
                    return;
                }
                
    
                echo json_encode(['error' => 'Cart item not found']);
                return;
            } catch (Exception $e) {
                error_log("Error updating cart: " . $e->getMessage());
                echo json_encode(['error' => 'Internal server error']);
                return;
            }
        }
        
        // Ambil cart dan render halaman jika bukan POST update
        $user_id = $f3->get('SESSION.user_id');
        $carts = $cart->getCartWithProductDetails($user_id);
        $count_product = count($carts);

        $f3->set('carts', $carts);
        $f3->set('count_product', $count_product);
        $f3->set('members', $_member);
        
        echo Template::instance()->render('header.htm');
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        echo Template::instance()->render('marketplace/basket/card_shoppingcart_barang.htm');
        echo Template::instance()->render('footer.htm');
    }
    
    private function calculateTotalPrice($user_id) {
        $cart = new Cart($this->db);
        $carts = $cart->getCartWithProductDetails($user_id);
        $totalPrice = 0;
    
        foreach ($carts as $item) {
            $totalPrice += $item['final_price'] * $item['quantity'];
            
        }
    
        return $totalPrice;
    }

    private function subtotal($cart_id){
        $cart = new Cart($this->db);
        $carts = $cart->getProduct($cart_id);
        $subtotal = 0;

        foreach ($carts as $item) {
            $subtotal = $item['final_price'] * $item['quantity'];
        }

        return $subtotal;
    }
      
    function addProduct($f3) {

        $session = $f3->get('SESSION.user');
        if (!$session) {
            $f3->reroute('/login');
        }
        $product_id = $f3->get('POST.product_id');
        $quantity = (int)$f3->get('POST.quantity');
        $user_id = $f3->get('SESSION.user_id');

        $cart = new Cart($this->db);
        $cart->addToCart($user_id, $product_id, $quantity);
        $f3->reroute('/detail/@id');
    
        
    }

    function remove(){
        $id = $this->f3->get('PARAMS.id');
        $cart = new Cart($this->db);
        $cart->load(array('id=?',$id));
        $cart->erase();
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
        $_access = new _access($this->db);
        $session = $f3->get('SESSION.user');
        if(!$session){
            $f3->reroute('/login');
        }
            
        $_member = new _member($this->db);
            
        $_member->load(array('username=?', $session));
        $f3->set('members', $_member);
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
        $_access = new _access($this->db);
        $session = $f3->get('SESSION.user');

        if(!$session){
            $f3->reroute('/login');
        }
        $_member = new _member($this->db);
                
        $_member->load(array('username=?', $session));
        $f3->set('members', $_member);

        echo Template::instance()->render('header.htm');
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        echo Template::instance()->render('user/side_bar.htm');
        echo Template::instance()->render('user/card_pengiriman_barang.htm');
        echo Template::instance()->render('footer.htm');
        // endif;
    }

    function checkout($f3){
        
        $session = $f3->get('SESSION.user');
        if (!$session) {
            $f3->reroute('/login');
        }

        
        $selected_products = $f3->get('POST.selected_products');

        if(!$selected_products){
            $f3->reroute('/cart');
        }
        $cart = new Cart($this->db);
        $checkoutProducts = [];
        foreach ($selected_products as $productId) {
            // Ambil detail produk dari database
            $product = $cart->getSelectedProducts($selected_products);
            $checkoutProducts = $product;
        }
        
        $_member = new _member($this->db);
        $members = $_member->load(array('username=?', $session));
        // $cart = new Cart($this->db);
        // $checkout_products = $cart->getSelectedProducts($selected_products);
        
        $f3->set('SESSION.checkout_products', $checkoutProducts);
        $f3->set('members', $members);
        
        echo Template::instance()->render('header.htm');
        // print_r($checkoutProducts);
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        echo Template::instance()->render('marketplace/basket/card_checkout_barang.htm');
        

        echo Template::instance()->render('footer.htm');

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
