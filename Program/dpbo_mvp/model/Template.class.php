<?php

class Template{
	var $filename = ''; // Handle file
	var $content = ''; 	// Handle isi file

	function __construct($filename = ''){
		// Konstruktor
		$this->filename = $filename;

		// Membaca file tampilan
		$this->content = implode('', @file($filename));
	}

	function clear(){
		// Membersihkan kode yang seharusnya diganti
        // Mengganti tulisan DATA_... dengan string kosong jika ada yang lupa diganti
        // Jika tidak ingin menggunakan pola DATA_..., bisa diganti di bagian pola ekspresi reguler
		$this->content = preg_replace("/DATA_[A-Z|_|0-9]+/", "", $this->content);

	}

	function write() {
        // Menuliskan isi file ke layar
        // Menghapus DATA_ yang belum diganti
        $this->clear();
        // Menampilkan tampilan yang sudah diganti ke layar
        print $this->content;
    }

    function getContent() {
        // Mengambil isi file yang sudah diproses
        // Menghapus DATA_.. yang belum diganti
        $this->clear();
        // Mengembalikan isi template
        return $this->content;
    }

	function replace($old = '', $new = '') {
        // Mengganti kode dalam file (DATA_...)
        // Memproses nilai yang akan menggantikan
        if (is_int($new)) {
            // Jika penggantinya bilangan bulat (diubah ke format teks)
            $value = sprintf("%d", $new);
        } elseif (is_float($new)) {
            // Jika penggantinya bilangan riil (diubah ke format teks)
            $value = sprintf("%f", $new);
        } elseif (is_array($new)) {
            // Jika penggantinya adalah array/tabel (diubah ke format teks)
            $value = '';
            // Memproses setiap elemen array/tabel
            foreach ($new as $item) {
                $value .= $item . '';
            }
        } else {
            // Jika tipe selain yang di atas, langsung diisikan untuk menggantikan
            $value = $new;
        }

		// Menggantikan suatu teks dengan teks baru (misal DATA_... diganti dengan <table> </table>)
		$this->content = preg_replace("/$old/",  $value, $this->content);

	}
}
