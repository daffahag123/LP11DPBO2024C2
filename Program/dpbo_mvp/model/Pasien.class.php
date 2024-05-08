<?php

// Definisi kelas Pasien
class Pasien
{
	// Atribut untuk menyimpan informasi pasien
	var $id = ''; 
	var $nik = '';
	var $nama = '';
	var $tempat = '';
	var $tl = '';
	var $gender = '';
	var $email = '';
	var $telp = '';

	// Konstruktor 
	function __construct($id = '', $nik = '', $nama = '', $tempat = '', $tl = '', $gender = '', $email = '', $telp = '')
	{
		// Mengatur nilai atribut berdasarkan parameter yang diterima
		$this->id = $id;
		$this->nik = $nik;
		$this->nama = $nama;
		$this->tempat = $tempat;
		$this->tl = $tl;
		$this->gender = $gender;
		$this->email = $email;
		$this->telp = $telp;
	}

	// Metode untuk mengatur nilai ID pasien
	function setId($id)
	{
		$this->id = $id;
	}
	// Metode untuk mengatur nilai NIK pasien
	function setNik($nik)
	{
		$this->nik = $nik;
	}
	// Metode untuk mengatur nilai nama pasien
	function setNama($nama)
	{
		$this->nama = $nama;
	}
	// Metode untuk mengatur nilai tempat lahir pasien
	function setTempat($tempat)
	{
		$this->tempat = $tempat;
	}
	// Metode untuk mengatur nilai tanggal lahir pasien
	function setTl($tl)
	{
		$this->tl = $tl;
	}
	// Metode untuk mengatur nilai gender pasien
	function setGender($gender)
	{
		$this->gender = $gender;
	}
	// Metode untuk mengatur nilai email pasien
	function setEmail($email)
	{
		$this->email = $email;
	}
	// Metode untuk mengatur nilai telepon pasien
	function setTelp($telp)
	{
		$this->telp = $telp;
	}

	// Metode untuk mengambil nilai ID pasien
	function getId()
	{
		return $this->id;
	}
	// Metode untuk mengambil nilai NIK pasien
	function getNik()
	{
		return $this->nik;
	}
	// Metode untuk mengambil nilai nama pasien
	function getNama()
	{
		return $this->nama;
	}
	// Metode untuk mengambil nilai tempat lahir pasien
	function getTempat()
	{
		return $this->tempat;
	}
	// Metode untuk mengambil nilai tanggal lahir pasien
	function getTl()
	{
		return $this->tl;
	}
	// Metode untuk mengambil nilai gender pasien
	function getGender()
	{
		return $this->gender;
	}
	// Metode untuk mengambil nilai email pasien
	function getEmail()
	{
		return $this->email;
	}
	// Metode untuk mengambil nilai telepon pasien
	function getTelp()
	{
		return $this->telp;
	}
}

?>
