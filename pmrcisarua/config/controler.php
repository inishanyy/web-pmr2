<?php

// Fungsi menampilkan data
function select($query)
{
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows; // Mengembalikan data, bukan resource
}
//fungsi menambahkan data angggota
function create_data_anggota($post)
{
    global $db;

    $nama   = strip_tags($post['nama']);
    $jk     = strip_tags($post['jk']);
    $kelas  = strip_tags($post['kelas']);
    $jurusan = strip_tags($post['jurusan']);
    $alamat = strip_tags($post['alamat']);
    $no_tlp = strip_tags($post['no_tlp']);

    // Query untuk menambahkan data anggota
    $query = "INSERT INTO data_anggota (nama, jk, kelas, jurusan, alamat, no_tlp)
              VALUES ('$nama', '$jk', '$kelas', '$jurusan', '$alamat', '$no_tlp')";
    
    mysqli_query($db, $query);
    
    return mysqli_affected_rows($db);
}
// fungsi update/ubah data anggota
function update_data_anggota($post)
{
    global $db;

    $id_anggota = strip_tags($post['id_anggota']);
    $nama       = strip_tags($post['nama']);
    $jk         = strip_tags($post['jk']);
    $kelas      = strip_tags($post['kelas']);
    $jurusan    = strip_tags($post['jurusan']);
    $alamat     = strip_tags($post['alamat']);
    $no_tlp     = strip_tags($post['no_tlp']);

    // Query untuk memperbarui data anggota
    $query = "UPDATE data_anggota SET nama = '$nama',jk = '$jk',kelas = '$kelas',jurusan = '$jurusan',alamat = '$alamat',no_tlp = '$no_tlp'
              WHERE id_anggota = '$id_anggota'";

    mysqli_query($db, $query);
    
    return mysqli_affected_rows($db);
}
// Fungsi untuk menghapus data anggota
function delete_data_anggota($id_anggota)
{
    global $db;

    // Query untuk menghapus data anggota
    $query = "DELETE FROM data_anggota WHERE id_anggota = '$id_anggota'";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
//fungsi menambahkan
function create_data_kepengurusan($post)
{
    global $db;

    $nama_anggota  = strip_tags($post['nama_anggota']);
    $jabatan       = strip_tags($post['jabatan']);
    $thn_memulai   = strip_tags($post['thn_memulai']);
    $thn_selesai   = strip_tags($post['thn_selesai']);

    // Query untuk menambahkan data kepengurusan
    $query = "INSERT INTO data_kepengurusan (nama_anggota, jabatan, thn_memulai, thn_selesai)
              VALUES ('$nama_anggota', '$jabatan', '$thn_memulai', '$thn_selesai')";
    
    mysqli_query($db, $query);
    
    return mysqli_affected_rows($db);
}
// fungsi meng update data kepengurusan
function update_data_kepengurusan($post)
{
    global $db;
    $id_kepengurusan = strip_tags($post['id_kepengurusan']);
    $nama_anggota  = strip_tags($post['nama_anggota']);
    $jabatan       = strip_tags($post['jabatan']);
    $thn_memulai   = strip_tags($post['thn_memulai']);
    $thn_selesai   = strip_tags($post['thn_selesai']);
    // Query untuk memperbarui data kepengurusan
    $query = "UPDATE data_kepengurusan SET nama_anggota = '$nama_anggota', jabatan = '$jabatan', thn_memulai = '$thn_memulai', thn_selesai = '$thn_selesai'
              WHERE id_kepengurusan = '$id_kepengurusan'";

    mysqli_query($db, $query);
    
    return mysqli_affected_rows($db);
}
// Fungsi untuk menghapus data anggota
function delete_data_kepengurusan($id_kepengurusan)
{
    global $db;

    // Query untuk menghapus data anggota
    $query = "DELETE FROM data_kepengurusan WHERE id_kepengurusan = '$id_kepengurusan'";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function create_data_kegiatan($post)
{
    global $db;

    $nama_kegiatan  = strip_tags($post['nama_kegiatan']);
    $tgl_kegiatan   = strip_tags($post['tgl_kegiatan']);
    $lokasi_kegiatan = strip_tags($post['lokasi_kegiatan']);

    // Query untuk menambahkan data kegiatan
    $query = "INSERT INTO data_kegiatan (nama_kegiatan, tgl_kegiatan, lokasi_kegiatan)
              VALUES ('$nama_kegiatan', '$tgl_kegiatan', '$lokasi_kegiatan')";
    
    mysqli_query($db, $query);
    
    return mysqli_affected_rows($db);
}
function update_data_kegiatan($post)
{
    global $db;
    $id_kegiatan      = strip_tags($post['id_kegiatan']);
    $nama_kegiatan    = strip_tags($post['nama_kegiatan']);
    $tgl_kegiatan     = strip_tags($post['tgl_kegiatan']);
    $lokasi_kegiatan  = strip_tags($post['lokasi_kegiatan']);
    
    // Query untuk memperbarui data kegiatan
    $query = "UPDATE data_kegiatan SET nama_kegiatan = '$nama_kegiatan', tgl_kegiatan = '$tgl_kegiatan', lokasi_kegiatan = '$lokasi_kegiatan'
              WHERE id_kegiatan = '$id_kegiatan'";

    mysqli_query($db, $query);
    
    return mysqli_affected_rows($db);
}
// Fungsi untuk menghapus data 
function delete_data_kegiatan($id_kegiatan)
{
    global $db;

    // Query untuk menghapus data kegiatan
    $query = "DELETE FROM data_kegiatan WHERE id_kegiatan = '$id_kegiatan'";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function create_data_kompetisi($post)
{
    global $db;

    $nama_lengkap       = strip_tags($post['nama_lengkap']);
    $nama_kompetisi     = strip_tags($post['nama_kompetisi']); 
    $lokasi_kompetisi   = strip_tags($post['lokasi_kompetisi']); 
    $tanggal_kompetisi  = strip_tags($post['tanggal_kompetisi']); 
    $kejuaraan          = strip_tags($post['kejuaraan']); // Pastikan 'kejuaraan' benar

    // Query untuk menambahkan data kompetisi ke tabel
    $query = "INSERT INTO data_kompetisi (nama_lengkap, nama_kompetisi, lokasi_kompetisi, tanggal_kompetisi, kejuaraan)
              VALUES ('$nama_lengkap', '$nama_kompetisi', '$lokasi_kompetisi', '$tanggal_kompetisi', '$kejuaraan')";

    // Eksekusi query
    mysqli_query($db, $query);

    // Return hasil eksekusi query
    return mysqli_affected_rows($db);
}

function update_data_kompetisi($post) {
    global $db;
    $id_kompetisi = htmlspecialchars($post['id_kompetisi']);
    $nama_lengkap = htmlspecialchars($post['nama_lengkap']);
    $nama_kompetisi = htmlspecialchars($post['nama_kompetisi']);
    $lokasi_kompetisi = htmlspecialchars($post['lokasi_kompetisi']);
    $tanggal_kompetisi = htmlspecialchars($post['tanggal_kompetisi']);
    $kejuaraan = htmlspecialchars($post['kejuaraan']);

    $query = "UPDATE data_kompetisi SET nama_lengkap = '$nama_lengkap',nama_kompetisi = '$nama_kompetisi',lokasi_kompetisi = '$lokasi_kompetisi',tanggal_kompetisi = '$tanggal_kompetisi',kejuaraan = '$kejuaraan'
              WHERE id_kompetisi = '$id_kompetisi'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Fungsi untuk menghapus data 
function delete_data_kompetisi($id_kompetisi)
{
    global $db;

    // Query untuk menghapus data kompetisi
    $query = "DELETE FROM data_kompetisi WHERE id_kompetisi = '$id_kompetisi'";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
// Fungsi tambah akun
function create_akun($post)
{
    global $db;

    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $password = strip_tags($post['password']);
    $level = strip_tags($post['level']);

    // Enkripsi password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Query tambah data
    $query = "INSERT INTO akun (nama, username, email, password, level) VALUES ('$nama', '$username', '$email', '$hashedPassword', '$level')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
//fungsi  ubah akun
function update_akun($post)
{
     global $db;
     
     $id_akun  = strip_tags($post['id_akun']);
     $nama    = strip_tags($post['nama']);
     $username   = strip_tags($post['username']);
     $email     = strip_tags($post['email']);
     $password = strip_tags($post['password']);
     $level   = strip_tags($post['level']);

     // query ubah data
     $query = " UPDATE akun SET nama= '$nama', username ='$username', email= '$email',password =
     '$password',level = '$level' WHERE id_akun = '$id_akun'";

     mysqli_query( $db,$query);

     return mysqli_affected_rows($db);
}
//fungsi menghapus akun
function delete_akun($id_akun)
{
     global $db;

     //query hapus data
     $query = "DELETE FROM akun WHERE id_akun = $id_akun";
     
     mysqli_query($db,$query);
     
     return mysqli_affected_rows($db);
}
