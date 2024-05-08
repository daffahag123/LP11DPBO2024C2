<?php

// Kelas TabelPasien adalah turunan dari kelas DB
class TabelPasien extends DB
{
	// Metode untuk mendapatkan semua data pasien dari tabel
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	// Metode untuk mendapatkan data pasien berdasarkan ID
	function getPasienById($id) 
	{
		// Query mysql select data pasien berdasarkan id
		$query = "SELECT * FROM pasien WHERE id=$id";
		// Mengeksekusi query
		return $this->execute($query);
	}

	// Metode untuk menambahkan data pasien ke dalam tabel
	function addPasien($data) 
	{
		// Mendapatkan nilai-nilai data dari array $data
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tanggal_lahir'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		// Query mysql tambah data pasien 
		$query = "INSERT INTO pasien VALUES ('', '$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
		// Mengeksekusi query
		return $this->execute($query);
	}

	// Metode untuk memperbarui data pasien berdasarkan ID
	function updatePasien($id, $data) 
	{
		// Mendapatkan nilai-nilai data dari array $data
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tanggal_lahir'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		// Query mysql ubah data pasien berdasarkan id
		$query = "UPDATE pasien SET nik='$nik', nama='$nama', tempat='$tempat', tl='$tl', gender='$gender', 
		email='$email', telp='$telp' WHERE id=$id";
		// Mengeksekusi query
		return $this->execute($query);
	}

	// Metode untuk menghapus data pasien berdasarkan ID
	function deletePasien($id) 
	{
		// Query mysql hapus data pasien berdasarkan id
		$query = "DELETE FROM pasien WHERE id = '$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}
}

?>
