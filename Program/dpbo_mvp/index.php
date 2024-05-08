<?php

// Mengimpor kelas dan file yang diperlukan
include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");

// Membuat objek TampilPasien untuk menampilkan data pasien
$tp = new TampilPasien();

// Logika untuk menentukan tindakan berdasarkan parameter GET yang diterima
if(isset($_GET['add'])) {
    // Jika parameter GET 'add' terdefinisi, tampilkan formulir tambah data
    $data = $tp->addForm();
} else if(isset($_GET['edit'])) {
    // Jika parameter GET 'edit' terdefinisi, tampilkan formulir edit data dengan ID yang diberikan
    $id = $_GET['id'];
    $data = $tp->editForm($id);
} else if(isset($_GET['delete'])) {
    // Jika parameter GET 'delete' terdefinisi, hapus data dengan ID yang diberikan
    $id = $_GET['id'];
    $data = $tp->deleteDataPasien($id);
} else {
    // Jika tidak ada parameter GET yang terdefinisi, tampilkan data pasien
    $data = $tp->tampil();
}

// Logika untuk menangani permintaan POST
if(isset($_POST['submit'])) {
    // Jika ada parameter GET 'id' yang terdefinisi, maka lakukan proses edit data
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        // Update data pasien dengan ID yang diberikan menggunakan data POST yang dikirimkan
        $data = $tp->updateDataPasien($id, $_POST); 
    // Jika tidak ada parameter GET 'id', maka lakukan proses penambahan data baru
    } else {
        // Tambahkan data baru pasien menggunakan data POST yang dikirimkan
        $data = $tp->addDataPasien($_POST); 
    }
} 
