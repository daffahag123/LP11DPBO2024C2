<?php

// Interface KontrakPresenter digunakan untuk menetapkan kontrak metode 
// yang harus diimplementasikan oleh kelas presenter.
interface KontrakPresenter {
    // Metode untuk memproses data pasien secara keseluruhan.
    public function prosesDataPasien();
    // Metode untuk memproses data pasien berdasarkan ID.
    public function prosesDataPasienById($id);
    // Metode untuk mendapatkan ID pasien.
    public function getId($i);
    // Metode untuk mendapatkan NIK pasien.
    public function getNik($i);
    // Metode untuk mendapatkan nama pasien.
    public function getNama($i);
    // Metode untuk mendapatkan tempat lahir pasien.
    public function getTempat($i);
    // Metode untuk mendapatkan tanggal lahir pasien.
    public function getTl($i);
    // Metode untuk mendapatkan jenis kelamin pasien.
    public function getGender($i);
    // Metode untuk mendapatkan email pasien.
    public function getEmail($i);
    // Metode untuk mendapatkan nomor telepon pasien.
    public function getTelp($i);
    // Metode untuk mendapatkan jumlah total data pasien.
    public function getSize();
}

?>
