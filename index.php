<?php

$f3 = require('lib/base.php');
$f3->config('config/config.ini');
$f3->set('CACHE', 'memcache=localhost');

$f3->route('GET /', 'Guest->index');
$f3->route('GET /login', 'Guest->login');
// $f3->route('GET /logout', 'Access->logout');
// $f3->route('GET /login', 'Access->challenge');
$f3->route('POST /challenge', 'Access->challenge');
// $f3->route('GET /daftar','Guest->daftar');
// $f3->route('GET /daftar', 'Registrar->daftar');
// $f3->route('POST /save', 'Registrar->save');
// $f3->route('POST /registrar', 'Access->registrar');

$f3->route('GET /datadiri', 'Guest->datadiri');
$f3->route('POST /datadiri','Access->registrar');
$f3->route('GET /index', 'Guest->index');
$f3->route('GET /cart', 'Guest->cart');
$f3->route('POST /addProduct/@id', 'Guest->addProduct');

$f3->route('GET /checkout', 'Guest->checkout');
$f3->route('GET /category', 'Guest->category');
$f3->route('GET /merk', 'Guest->merk');
$f3->route('GET /remove/@id', 'Guest->remove');

// profil //
$f3->route('GET /profil', 'Guest->profil');
$f3->route('POST /profil', 'Guest->profil');
$f3->route('POST /updateProfil', 'Guest->updateProfil');
$f3->route('GET /bank', 'Guest->bank');
$f3->route('GET /alamat', 'Guest->alamat');
$f3->route('GET /pengiriman', 'Guest->pengiriman');
$f3->route('GET /detail_pengiriman', 'Guest->detail_pengiriman');
$f3->route('GET /voucher', 'Guest->voucher');
$f3->route('GET /pengaturan_notifikasi', 'Guest->pengaturan_notifikasi');

// ACCESSS
$f3->route('GET|POST /reg', 'Access->registrar');
$f3->route('GET|POST /challenge/@action', 'Access->challenge');

// MEMBER
$f3->route('GET /member', 'Member->index');
$f3->route('GET /semua_barang', 'Guest->semua_barang');
// $f3->route('GET /semua_barang/showProduct', 'ProductDisplay->showCardProducts');
// $f3->route('GET /api/showproducts', 'ProductDisplay->showCardProducts');

// ADMIN
$f3->route('GET /admin', 'Admin->index');
$f3->route('GET|POST /admin/challenge/@action', 'Admin->challenge');
$f3->route('GET /dashboard', 'Admin->dashboard');

$f3->route('GET /admin/product/@ref', 'Admin->product');
$f3->route('GET /admin/products', 'Admin->products');
$f3->route('POST /admin/product', 'Products->add');

$f3->route('GET /admin/sale/@ref', 'Admin->sale');
$f3->route('GET /admin/sales', 'Admin->sales');
$f3->route('POST /admin/sale', 'Sales->add');

$f3->route('GET /admin/member/@ref', 'Admin->member');
$f3->route('GET /admin/members', 'Admin->members');

$f3->route('GET /logout', 'Access->logout');



$f3->route('GET /detail/@id', 'Guest->detail');
$f3->route('GET /api/allproducts', 'ProductDisplay->showAllProducts');
$f3->route('GET /show_detail/@id', 'ProductDisplay->showDetailProducts');
$f3->route('POST /update-quantity', 'Guest->updateQuantity');


$f3->run();
