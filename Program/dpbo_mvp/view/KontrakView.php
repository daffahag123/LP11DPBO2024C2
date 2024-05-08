<?php

// Definisi interface KontrakView yang memiliki beberapa metode yang harus diimplementasikan oleh kelas yang mengimplementasikannya
interface KontrakView {
    // Metode untuk menampilkan data
    public function tampil();
    // Metode untuk menampilkan formulir penambahan data
    public function addForm();
    // Metode untuk menampilkan formulir pengeditan data berdasarkan ID
    public function editForm($id);
}

?>
