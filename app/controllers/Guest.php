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

            foreach($product as $item){
                if($item['end_date'] == True){
                    $end_date = $item['end_date'];
                    $promo = $this->checkPromo($end_date);
                    $f3->set('promo', $promo);
                }     
            }
                
            // ngiirim data produck ke view
            $f3->set('products', $product);
            $f3->set('members', $members);
                
            echo Template::instance()->render('header.htm');
            echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
            echo Template::instance()->render('marketplace/basket/card_detail_barang.htm');
            echo Template::instance()->render('marketplace/basket/card_spesifikasi_barang.htm');
            echo Template::instance()->render('marketplace/basket/card_review_barang.htm');
            echo Template::instance()->render('footer.htm');

    }

    private function checkPromo($end_date){
        $promo_time = explode("-",$end_date);
        $bulan = $promo_time[1];
        $tanggal = $promo_time[2];
        $tahun = $promo_time[0];

        $promo = mktime(0,0,0, $bulan, $tanggal, $tahun);
        $now = time();
        if($now > $promo){
            return false;
        }

        return true;
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
    function profil($f3) {
        $session = $f3->get('SESSION.user');
        $_access = new _access($this->db);
        $_member = new _member($this->db);
        $_member->load(array('username=?', $session));
    
        // cek apakah ada submit dari tombol simpan
        if ($f3->exists('POST.submit')) {
            $nama_file = null;
            // cek apakah ada file yang diupload
            if ($_FILES['gambar']['error'] !== 4) {
                $nama_file = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];
                $error = $_FILES['gambar']['error'];
                $ukuran_file = $_FILES['gambar']['size'];
    
                // Proses upload gambar
                $upload_result = $_member->uploadGambar($f3, $session, $nama_file, $tmp_name, $error, $ukuran_file);
            }
    
            $update_name = $f3->get('POST.name');
            $update_phone = $f3->get('POST.phone');
            $update_gender = $f3->get('POST.gender');
            $update_email = $f3->get('POST.email');
            $update_tanggal_lahir = $f3->get('POST.tanggal_lahir');
    
            $_member->updateProfile($session, $update_name, $update_phone, $update_gender, $update_email, $update_tanggal_lahir);
    
            // Cek apakah request dari AJAX
            if ($f3->get('AJAX')) {
                echo json_encode([
                    'success' => true,
                    'name' => $update_name,
                    'phone' => $update_phone,
                    'gender' => $update_gender,
                    'email' => $update_email,
                    'tanggal_lahir' => $update_tanggal_lahir,
                    'gambar' => $nama_file ? $nama_file : null // Kirim nama gambar jika diupload
                ]);
                return;
            }
    
            // Jika bukan AJAX, lakukan proses reload biasa
            $_member->load(array('username=?', $session));
        }
    
        // Jika tidak ada submit dari tombol simpan
        $f3->set('members', $_member);
        echo Template::instance()->render('header.htm');
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        echo Template::instance()->render('user/side_bar.htm');
        echo Template::instance()->render('user/card_profil.htm');
        echo Template::instance()->render('footer.htm');
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
        $user_id = $f3->get('SESSION.user_id');
        $_member = new _member($this->db);
        $members = $_member->load(array('username=?', $session));
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
        // check user udah klik tombol buat pesanan apa belum
        $pesanan = $f3->get('POST.buat_pesanan');
        if($pesanan){
            $length = count($checkoutProducts);
            $total_price = 0;
            $orders = new Orders($this->db);
            $orders->user_id = $user_id;
            $orders->save();
            
            for($i=0; $i<$length; $i++){
                $order_detail = new Order_detail($this->db);
                if($checkoutProducts[$i]['final_price'] > 0){
                    $price = $checkoutProducts[$i]['final_price'];
                    $quantity = $checkoutProducts[$i]['quantity'];
                    $subtotal = $price * $quantity;
                }
                else{
                    $price = $checkoutProducts[$i]['price'];
                    $quantity = $checkoutProducts[$i]['quantity'];
                    $subtotal = $price * $quantity;
                }
                $order_id = $orders->id;
                $product_id = $checkoutProducts[$i]['product_id'];
                $order_detail->order_detail($order_id, $product_id, $quantity, $price, $subtotal);
                $total_price += $subtotal;
            }
            $orders->load(array('user_id=?', $user_id));
            $orders->total_price = $total_price;
            $orders->save();
        }

        $f3->set('SESSION.checkout_products', $checkoutProducts);
        $f3->set('members', $members);
    
        echo Template::instance()->render('header.htm');
        echo Template::instance()->render('marketplace/dashboard/search_bar.htm');
        echo Template::instance()->render('marketplace/basket/card_checkout_barang.htm');
        echo Template::instance()->render('footer.htm');

    }

    function payment($f3)
    {
        
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
