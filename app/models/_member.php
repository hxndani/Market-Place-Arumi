<?php

class _member extends DB\SQL\Mapper {
    public function __construct(DB\SQL $db) {
        parent::__construct($db, 'members');
    }
    public function getUsername($username){
        $this->load(array('username', $username));
        return $this->query;
    }
    
    public function getByUsername($username) {
        $this->load(array('username=?', $username));
        return $this->dry() ? null : $this->cast(); // Mengembalikan data sebagai array
    }


    public function updateProfile($session, $update_name, $update_phone, $update_gender, $update_email, $update_tanggal_lahir) {
        $_member = new _member($this->db);
        $_member->load(array('username=?', $session));

        // // $_member->username = $update_username;
        $_member->email = $update_email;
        $_member->name = $update_name;
        $_member->phone = $update_phone;
        // $_member->toko = $update_toko;
        // $_member->gambar = $nama_file_baru;
        $_member->gender = $update_gender;
        $_member->tanggal_lahir = $update_tanggal_lahir;
        $_member->update();
        
    }

    public function uploadGambar($f3, $session, $nama_file, $tmp_name, $error, $ukuran_file) {
        $_member = new _member($this->db);
        $_member->load(array('username=?', $session));
    
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $nama_file);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
    
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $f3->set('error', 'Please upload a valid file (JPG/JPEG/PNG)!');
            return false;
        } else if ($ukuran_file > 1000000) { // Ubah ukuran ke maksimal 1 MB
            $f3->set('error', 'Ukuran file terlalu besar!');
            return false;
        }
    
        // Buat nama file baru
        $nama_file_baru = uniqid() . '.' . $ekstensiGambar;
        move_uploaded_file($tmp_name, 'public/images/uploadedFile/' . $nama_file_baru);
    
        $_member->gambar = $nama_file_baru; // Simpan nama file baru ke database
        $_member->update();
    
        return $nama_file_baru; // Kembalikan nama file baru
    }
    
}
