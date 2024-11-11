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

    public function uploadGambar($f3, $session, $nama_file, $tmp_name, $error, $ukuran_file) {
        $this->load(array('username=?', $session));
    
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $nama_file);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
    
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $f3->set('error', 'Please upload a valid file (JPG/JPEG/PNG)!');
            return false;
        } else if ($ukuran_file > 1000000) {
            $f3->set('error', 'Ukuran file terlalu besar!');
            return false;
        }
    
        $nama_file_baru = uniqid() . '.' . $ekstensiGambar;
        $uploadSuccess = move_uploaded_file($tmp_name, 'public/images/uploadedFile/' . $nama_file_baru);
    
        if (!$uploadSuccess) {
            error_log("Failed to move uploaded file to destination.");
            return false;
        }
    
        $this->gambar = $nama_file_baru;
        $this->update();
        error_log("File uploaded successfully with new name: " . $nama_file_baru);
        return $nama_file_baru;
    }
    
    public function updateProfile($session, $update_name, $update_phone, $update_gender, $update_email, $update_tanggal_lahir) {
        $this->load(array('username=?', $session));
        $this->email = $update_email;
        $this->name = $update_name;
        $this->phone = $update_phone;
        $this->gender = $update_gender;
        $this->tanggal_lahir = $update_tanggal_lahir;
        $this->update();

        return $this->update();
    } 
}
