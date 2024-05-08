<?php

// Mengimpor file KontrakView.php yang berisi definisi interface KontrakView
include("KontrakView.php");
// Mengimpor kelas ProsesPasien.php yang berisi implementasi KontrakPresenter
include("presenter/ProsesPasien.php");

// Definisi kelas TampilPasien yang mengimplementasikan interface KontrakView
class TampilPasien implements KontrakView
{
    private $prosespasien; 	// Presenter yang dapat berinteraksi langsung dengan view
    private $tpl; 			// Template untuk menampilkan data

    // Konstruktor untuk inisialisasi objek ProsesPasien
    function __construct()
    {
        $this->prosespasien = new ProsesPasien();
    }

    // Metode untuk menampilkan data pasien
    function tampil()
    {
        // Memproses data pasien dari presenter
        $this->prosespasien->prosesDataPasien();
        $data = null;

        // Membuat baris tabel untuk setiap pasien
        for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
            $no = $i + 1;
            $data .= "<tr>
            <td>" . $no . "</td>
            <td>" . $this->prosespasien->getNik($i) . "</td>
            <td>" . $this->prosespasien->getNama($i) . "</td>
            <td>" . $this->prosespasien->getTempat($i) . "</td>
            <td>" . $this->prosespasien->getTl($i) . "</td>
            <td>" . $this->prosespasien->getGender($i) . "</td>
            <td>" . $this->prosespasien->getEmail($i) . "</td>
            <td>" . $this->prosespasien->getTelp($i) . "</td>
            <td>
                <a href='index.php?edit&id=" . $this->prosespasien->getId($i) . "' class='btn btn-sm btn-success' >Edit</a>
                <a href='index.php?delete&id=" . $this->prosespasien->getId($i) . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")' >Hapus</a>
            </td>
            </tr>";
        }

        // Menyiapkan template skin.html untuk menampilkan data
        $this->tpl = new Template("templates/skin.html");

        // Mengganti placeholder DATA_TABEL dengan data yang sudah diproses
        $this->tpl->replace("DATA_TABEL", $data);

        // Menampilkan template ke layar
        $this->tpl->write();
    }

    // Metode untuk menampilkan formulir penambahan data pasien
    function addForm()
    {
        $title = 'Tambah';

        // Membuat formulir penambahan data pasien
        $dataForm = null;
        $dataForm .= "<form action='index.php' method='post'>
        <div class='form-group row'>
          <label for='nik' class='col-sm-3 col-form-label'>NIK:</label>
          <div class='col-sm-9'>
            <input type='text' class='form-control' id='nik' name='nik' required>
          </div>
        </div>
        <div class='form-group row'>
          <label for='nama' class='col-sm-3 col-form-label'>Nama:</label>
          <div class='col-sm-9'>
            <input type='text' class='form-control' id='nama' name='nama' required>
          </div>
        </div>
        <div class='form-group row'>
          <label for='tempat' class='col-sm-3 col-form-label'>Tempat Lahir:</label>
          <div class='col-sm-9'>
            <input type='text' class='form-control' id='tempat' name='tempat' required>
          </div>
        </div>
        <div class='form-group row'>
          <label for='tanggal_lahir' class='col-sm-3 col-form-label'>Tanggal Lahir:</label>
          <div class='col-sm-9'>
            <input type='date' class='form-control' id='tanggal_lahir' name='tanggal_lahir' required>
          </div>
        </div>
        <div class='form-group row'>
          <label for='gender' class='col-sm-3 col-form-label'>Gender:</label>
          <div class='col-sm-9'>
            <select class='form-control' id='gender' name='gender' required>
              <option value='Laki-laki'>Laki-laki</option>
              <option value='Perempuan'>Perempuan</option>
            </select>
          </div>
        </div>
        <div class='form-group row'>
          <label for='email' class='col-sm-3 col-form-label'>Email:</label>
          <div class='col-sm-9'>
            <input type='email' class='form-control' id='email' name='email' required>
          </div>
        </div>
        <div class='form-group row'>
          <label for='telp' class='col-sm-3 col-form-label'>Telepon:</label>
          <div class='col-sm-9'>
            <input type='tel' class='form-control' id='telp' name='telp' required>
          </div>
        </div>
        <div class='form-group row'>
          <div class='col-sm-12'>
            <button type='submit' class='btn btn-success btn-block' name='submit'>Submit</button>
          </div>
        </div>
        <div class='form-group row'>
            <div class='col-sm-12'>
                <a class='btn btn-secondary btn-block' type='submit' name='cancel' href='index.php'>Cancel</a><br>
            </div>
        </div>
      	</form>";

        // Menyiapkan template skinform.html untuk menampilkan formulir
        $this->tpl = new Template("templates/skinform.html");

        // Mengganti placeholder DATA_FORM dengan formulir yang sudah dibuat
        $this->tpl->replace("DATA_FORM", $dataForm);
        $this->tpl->replace("DATA_TITLE", $title);

        // Menampilkan template formulir ke layar
        $this->tpl->write();
    }

    // Metode untuk menampilkan formulir pengeditan data pasien
    function editForm($id)
    {
        $title = 'Ubah';
        $pasien = $this->prosespasien->prosesDataPasienById($id);

        $manSelected = ($pasien->getGender() == "Laki-laki") ? 'selected' : '';
		$womenSelected = ($pasien->getGender() == "Perempuan") ? 'selected' : '';

        // Membuat formulir pengeditan data pasien
        $dataForm = null;
		$dataForm .= "<form action='index.php?id=" . $pasien->getId() . "' method='post' enctype='multipart/form-data'>
        <div class='form-group row'>
          <label for='nik' class='col-sm-3 col-form-label'>NIK:</label>
          <div class='col-sm-9'>
            <input type='text' class='form-control' id='nik' name='nik' value='" . $pasien->getNik() . "' required>
          </div>
        </div>
        <div class='form-group row'>
          <label for='nama' class='col-sm-3 col-form-label'>Nama:</label>
          <div class='col-sm-9'>
            <input type='text' class='form-control' id='nama' name='nama' value='" . $pasien->getNama() . "' required>
          </div>
        </div>
        <div class='form-group row'>
          <label for='tempat' class='col-sm-3 col-form-label'>Tempat Lahir:</label>
          <div class='col-sm-9'>
            <input type='text' class='form-control' id='tempat' name='tempat' value='" . $pasien->getTempat() . "' required>
          </div>
        </div>
        <div class='form-group row'>
          <label for='tanggal_lahir' class='col-sm-3 col-form-label'>Tanggal Lahir:</label>
          <div class='col-sm-9'>
            <input type='date' class='form-control' id='tanggal_lahir' name='tanggal_lahir' value='" . $pasien->getTl() . "' required>
          </div>
        </div>
        <div class='form-group row'>
          <label for='gender' class='col-sm-3 col-form-label'>Gender:</label>
          <div class='col-sm-9'>
            <select class='form-control' id='gender' name='gender' required>
				<option value='Laki-laki' ". $manSelected .">Laki-laki</option>
				<option value='Perempuan' ". $womenSelected .">Perempuan</option>
            </select>
          </div>
        </div>
        <div class='form-group row'>
          <label for='email' class='col-sm-3 col-form-label'>Email:</label>
          <div class='col-sm-9'>
            <input type='email' class='form-control' id='email' name='email' value='" . $pasien->getEmail() . "' required>
          </div>
        </div>
        <div class='form-group row'>
          <label for='telp' class='col-sm-3 col-form-label'>Telepon:</label>
          <div class='col-sm-9'>
            <input type='tel' class='form-control' id='telp' name='telp' value='" . $pasien->getTelp() . "' required>
          </div>
        </div>
        <div class='form-group row'>
          <div class='col-sm-12'>
            <button type='submit' class='btn btn-success btn-block' name='submit'>Submit</button>
          </div>
        </div>
        <div class='form-group row'>
            <div class='col-sm-12'>
                <a class='btn btn-secondary btn-block' type='submit' name='cancel' href='index.php'>Cancel</a><br>
            </div>
        </div>
      	</form>";

        // Menyiapkan template skinform.html untuk menampilkan formulir
        $this->tpl = new Template("templates/skinform.html");

        // Mengganti placeholder DATA_FORM dengan formulir yang sudah dibuat
        $this->tpl->replace("DATA_FORM", $dataForm);
        $this->tpl->replace("DATA_TITLE", $title);

        // Menampilkan template formulir ke layar
        $this->tpl->write();
    }

    // Metode untuk menambah data pasien
    function addDataPasien($data)
    {
        $this->prosespasien->add($data);
    }

    // Metode untuk memperbarui data pasien
    function updateDataPasien($id, $data)
    {
        $this->prosespasien->update($id, $data);
    }

    // Metode untuk menghapus data pasien
    function deleteDataPasien($id)
    {
        $this->prosespasien->delete($id);
    }
}
