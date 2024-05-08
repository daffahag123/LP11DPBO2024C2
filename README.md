# LP11DPBO2024C2

Saya Daffa Fakhry Anshori dengan NIM 2200337 mengerjakan soal LP 11 dalam Praktikum mata kuliah Desain dan Pemrograman Berbasis Objek, untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamin.

# Desain Program
Program ini dibangun menggunakan konsep MVP (Model, View, Presenter) dalam paradigma pemrograman berorientasi objek (OOP) dengan bahasa PHP. Program ini memiliki fitur untuk menampilkan data pasien, menghapus data pasien yang diinginkan, serta menyediakan form untuk menambah dan mengedit data pasien. Berikut penjelasan struktur program:
1. Model
   - DB.class.php: Digunakan untuk mengelola koneksi ke basis data MySQL. Ini mencakup pembukaan koneksi, eksekusi query, pengambilan hasil query, dan penutupan koneksi.
   - Pasien.class.php: Digunakan sebagai representasi objek data pasien. File ini memiliki atribut-atribut seperti NIK, nama, tempat lahir, tanggal lahir, jenis kelamin, email, dan nomor telepon. Selain itu, file ini juga menyediakan metode untuk mengatur dan mengambil nilai-nilai atribut pasien.
   - TabelPasien.class.php: Digunakan untuk operasi-operasi yang berkaitan dengan tabel data pasien dalam basis data. Ini termasuk mendapatkan semua data pasien, mendapatkan data pasien berdasarkan ID, menambahkan data pasien baru, memperbarui data pasien, dan menghapus data pasien.
   - Template.class.php: Digunakan untuk mengelola template HTML. File ini memiliki fungsi untuk membaca isi template dari file, mengganti placeholder dengan nilai yang sesuai, menuliskan tampilan yang sudah diproses ke layar, dan mengembalikan isi template yang sudah diproses.
     
2. View
   - KontrakView.php: Digunakan sebagai kontrak untuk metode-metode yang harus diimplementasikan oleh kelas view. Ini mencakup tugas-tugas seperti menampilkan data, menampilkan formulir penambahan data, dan menampilkan formulir pengeditan data.
   - TampilPasien.php: Digunakan untuk menampilkan data pasien, menampilkan formulir penambahan data, dan menampilkan formulir pengeditan data. Selain itu, file ini juga berinteraksi dengan presenter (ProsesPasien) untuk melakukan operasi CRUD terhadap data pasien.
     
3. Presenter
   - KontrakPresenter.php: Digunakan sebagai kontrak untuk metode-metode yang harus diimplementasikan oleh kelas presenter. Ini mencakup tugas-tugas seperti proses pengolahan data pasien secara keseluruhan, berdasarkan ID, dan juga untuk mendapatkan informasi tertentu tentang pasien seperti ID, NIK, nama, tempat lahir, dan sebagainya.
   - ProsesPasien.php: Digunakan untuk logika bisnis dan pengelolaan data. Ini memproses permintaan dari view (TampilPasien) dan berinteraksi dengan model (kelas TabelPasien) untuk melakukan operasi CRUD terhadap data pasien.
     
4. Template
   - skin.html: Digunakan untuk menampilkan daftar pasien.
   - skinform.html: Digunakan untuk menampilkan form pengisian data pasien / pengeditan data pasien
     
5. Pengaturan Routing dan Aksi
   - index.php: File utama yang bertanggung jawab sebagai titik masuk utama dalam aplikasi. Digunakan untuk mengatur alur logika dan menampilkan tampilan berdasarkan permintaan pengguna. File ini mengimpor kelas dan file yang diperlukan, seperti model dan view, untuk memproses dan menampilkan data pasien. Selain itu, index.php juga menangani permintaan GET dan POST untuk tindakan seperti menampilkan data, menambahkan data baru, mengedit data, dan menghapus data.

# Alur Program
Tampil Data
- Pengguna dapat melihat daftar data pasien pada halaman utama aplikasi.
- Data pasien ditampilkan dalam bentuk tabel HTML.
- Informasi yang ditampilkan mencakup NIK, nama, tempat lahir, tanggal lahir, jenis kelamin, email, dan nomor telepon.
  
Tambah Data
- Pengguna dapat menekan tombol "Tambah Data" pada halaman utama.
- Pengguna akan diarahkan ke halaman formulir untuk mengisi informasi seperti NIK, nama, tempat lahir, tanggal lahir, jenis kelamin, email, dan nomor telepon.
- Setelah mengisi formulir dan mengirimkannya, data baru akan disimpan dalam database.

Ubah Data
- Pengguna dapat melakukan klik tombol "Edit" pada halaman utama.
- Pengguna akan diarahkan ke halaman formulir yang sudah diisi dengan informasi data yang ingin diubah.
- Setelah melakukan pengeditan, data akan terupdate di dalam database sesuai dengan perubahan yang telah dilakukan oleh pengguna.

Hapus Data
- Pengguna dapat mengklik tombol "Hapus" pada halaman utama.
- Setelah mengklik tombol hapus, pengguna akan diminta untuk konfirmasi apakah mereka yakin ingin menghapus data tersebut.
- Jika pengguna mengonfirmasi, data akan dihapus dari database.

# Dokumentasi Program
Halaman Home/Daftar Pasien
![image](https://github.com/daffahag123/LP11DPBO2024C2/assets/135239333/0d2e48fa-ca9b-4b36-b7b0-0093d21b65d6)

Halaman Tambah Pasien
![image](https://github.com/daffahag123/LP11DPBO2024C2/assets/135239333/9556b28c-a06e-4af0-a1fe-5057ccb6c45f)

Halaman Ubah Pasien
![image](https://github.com/daffahag123/LP11DPBO2024C2/assets/135239333/0ac88c0e-d68f-4855-8c18-03906be85b9c)


