<?php

// Definisi kelas DB
class DB
{
	// Atribut untuk menyimpan informasi koneksi database
	var $db_host;
	var $db_user;
	var $db_password;
	var $db_name ;
	var $db_link;
	var $result;

	// Konstruktor
	function __construct($db_host = '', $db_user = '', $db_password = '', $db_name = '')
	{
		// Mengatur nilai atribut berdasarkan parameter yang diterima
		$this->db_host = $db_host;
		$this->db_user = $db_user;
		$this->db_password = $db_password;
		$this->db_name = $db_name;
	}

	// Metode untuk membuka koneksi database
	function open()
	{
		// Membuka koneksi menggunakan mysqli_connect
		$this->db_link = mysqli_connect($this->db_host, $this->db_user, $this->db_password, $this->db_name);
	}

	// Metode untuk mengeksekusi query database
	function execute($query = "")
	{
		// Mengeksekusi query menggunakan mysqli_query
		$this->result = mysqli_query($this->db_link, $query);

		// Mengembalikan hasil eksekusi query
		return $this->result;
	}

	// Metode untuk mengambil hasil eksekusi query
	function getResult()
	{
		// Mengambil baris hasil eksekusi query sebagai array assosiatif
		return mysqli_fetch_array($this->result);
	}

	// Metode untuk menutup koneksi database
	function close()
	{
		// Menutup koneksi menggunakan mysqli_close
		mysqli_close($this->db_link);
	}
}

?>
