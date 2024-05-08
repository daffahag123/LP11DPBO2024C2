<?php

// Mengimpor file KontrakPresenter.php yang berisi definisi interface KontrakPresenter
include("KontrakPresenter.php");

// Definisi kelas ProsesPasien yang mengimplementasikan interface KontrakPresenter
class ProsesPasien implements KontrakPresenter
{
    // Properti untuk menyimpan objek TabelPasien dan array data pasien
    private $tabelpasien;
    private $data = [];

    // Konstruktor untuk inisialisasi objek TabelPasien dan array data pasien
    function __construct()
    {
        try {
            // Parameter koneksi database
            $db_host = "localhost"; // Nama host
            $db_user = "root"; 		// Username database
            $db_password = ""; 		// Password database
            $db_name = "mvp_php"; 	// Nama database

            // Inisialisasi objek TabelPasien dengan parameter koneksi database
            $this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name);
            
            // Inisialisasi array kosong untuk menyimpan data pasien
            $this->data = array(); 
        } catch (Exception $e) {
            // Tangani jika terjadi kesalahan selama inisialisasi
            echo "Error: " . $e->getMessage();
        }
    }

    // Metode untuk memproses data semua pasien dari database
    function prosesDataPasien()
    {
        try {
            // Buka koneksi database
            $this->tabelpasien->open();

            // Ambil data semua pasien dari database
            $this->tabelpasien->getPasien();

            // Iterasi setiap baris data hasil query dan simpan ke dalam objek Pasien
            while ($row = $this->tabelpasien->getResult()) {
                $pasien = new Pasien();
                $pasien->setId($row['id']);
                $pasien->setNik($row['nik']);
                $pasien->setNama($row['nama']);
                $pasien->setTempat($row['tempat']);
                $pasien->setTl($row['tl']);
                $pasien->setGender($row['gender']);
                $pasien->setEmail($row['email']);
                $pasien->setTelp($row['telp']);

                // Tambahkan objek Pasien ke dalam array data
                $this->data[] = $row;
            }

            // Tutup koneksi database
            $this->tabelpasien->close();
        } catch (Exception $e) {
            // Tangani jika terjadi kesalahan selama pemrosesan data
            echo "Error: " . $e->getMessage();
        }
    }

    // Metode untuk memproses data pasien berdasarkan ID dari database
    function prosesDataPasienById($id)
    {
        try {
            // Buka koneksi database
            $this->tabelpasien->open();

            // Ambil data pasien dari database berdasarkan ID
            $this->tabelpasien->getPasienById($id);

            // Ambil hasil query dan simpan ke dalam objek Pasien
            $row = $this->tabelpasien->getResult();
            $pasien = new Pasien();
            $pasien->setId($row['id']);
            $pasien->setNik($row['nik']);
            $pasien->setNama($row['nama']);
            $pasien->setTempat($row['tempat']);
            $pasien->setTl($row['tl']);
            $pasien->setGender($row['gender']);
            $pasien->setEmail($row['email']);
            $pasien->setTelp($row['telp']);

            // Tutup koneksi database
            $this->tabelpasien->close();

            // Mengembalikan objek Pasien
            return $pasien;
        } catch (Exception $e) {
            // Tangani jika terjadi kesalahan selama pemrosesan data
            echo "Error: " . $e->getMessage();
        }
    }
    
    // Implementasi metode dari interface KontrakPresenter untuk mendapatkan ID pasien
    function getId($i)
    {
        return $this->data[$i]['id'];
    }

    // Implementasi metode dari interface KontrakPresenter untuk mendapatkan NIK pasien
    function getNik($i)
    {
        return $this->data[$i]['nik'];
    }

    // Implementasi metode dari interface KontrakPresenter untuk mendapatkan nama pasien
    function getNama($i)
    {
        return $this->data[$i]['nama'];
    }

    // Implementasi metode dari interface KontrakPresenter untuk mendapatkan tempat lahir pasien
    function getTempat($i)
    {
        return $this->data[$i]['tempat'];
    }

    // Implementasi metode dari interface KontrakPresenter untuk mendapatkan tanggal lahir pasien
    function getTl($i)
    {
        return $this->data[$i]['tl'];
    }

    // Implementasi metode dari interface KontrakPresenter untuk mendapatkan jenis kelamin pasien
    function getGender($i)
    {
        return $this->data[$i]['gender'];
    }

    // Implementasi metode dari interface KontrakPresenter untuk mendapatkan email pasien
    function getEmail($i)
    {
        return $this->data[$i]['email'];
    }

    // Implementasi metode dari interface KontrakPresenter untuk mendapatkan nomor telepon pasien
    function getTelp($i)
    {
        return $this->data[$i]['telp'];
    }

    // Implementasi metode dari interface KontrakPresenter untuk mendapatkan jumlah data pasien
    function getSize()
    {
        return sizeof($this->data);
    }

    // Metode untuk menambahkan data pasien baru ke dalam database
    function add($data) {
        // Buka koneksi database
        $this->tabelpasien->open();

        // Tambahkan data pasien ke dalam database
        if ($this->tabelpasien->addPasien($data) > 0) {
            // Jika berhasil, tampilkan pesan sukses
            echo "<script>
            alert('Data berhasil ditambah!');
            document.location.href = 'index.php';
            </script>";
        } else {
            // Jika gagal, tampilkan pesan gagal
            echo "<script>
            alert('Data gagal ditambah!');
            document.location.href = 'index.php';
            </script>";
        }  

        // Tutup koneksi database
        $this->tabelpasien->close();
    }

    // Metode untuk memperbarui data pasien yang ada di database
    function update($id, $data) {
        // Buka koneksi database
        $this->tabelpasien->open();

        // Perbarui data pasien di dalam database
        if ($this->tabelpasien->updatePasien($id, $data) > 0) {
            // Jika berhasil, tampilkan pesan sukses
            echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'index.php';
            </script>";
        } else {
            // Jika gagal, tampilkan pesan gagal
            echo "<script>
            alert('Data gagal diubah!');
            document.location.href = 'index.php';
            </script>";
        }

        // Tutup koneksi database
        $this->tabelpasien->close(); 
    }

    // Metode untuk menghapus data pasien dari database
    function delete($id) {
        // Buka koneksi database
        $this->tabelpasien->open();

        // Hapus data pasien dari database
        if ($this->tabelpasien->deletePasien($id) > 0) {
            // Jika berhasil, tampilkan pesan sukses
            echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'index.php';
            </script>";
        } else {
            // Jika gagal, tampilkan pesan gagal
            echo "<script>
            alert('Data gagal dihapus!');
            document.location.href = 'index.php';
            </script>";
        }

        // Tutup koneksi database
        $this->tabelpasien->close();
    }
}
