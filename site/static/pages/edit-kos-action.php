<?php
require_once("./authPemilik.php");

//kos info
$idKos = $_POST['id-kos'];
$namaKos = $_POST['nama-kos'];
$tipeKos = $_POST['tipe-kos'];
$ukuranKos = $_POST['ukuran-kos'];
$kapasitasKos = $_POST['kapasitas-kos'];
$hargaKos = $_POST['harga-kos'];
$jalanKos = $_POST['jalan-kos'];
$kecamatanKos = $_POST['kecamatan-kos'];
$kotaKos = $_POST['kota-kos'];
$deskripsiKos = $_POST['deskripsi-kos'];
$idUser = $_POST['id-user'];

// is data empty
if (
    empty($namaKos) | empty($tipeKos) | empty($ukuranKos) | empty($kapasitasKos) | empty($hargaKos) | empty($jalanKos)
    | empty($kecamatanKos) | empty($kotaKos) | empty($kotaKos) | empty($deskripsiKos)
) {
    echo "<script>
    alert('Gagal Memperbaharui kosan, Pastikan semua data benar')
    window.location = '/kuliah/project/dashboard.php?p=edit-kos&id-kos=$idKos';
    </script>";
}

//not empty
else {
    $kos = new Kos();
    $kos->idKos = $idKos;
    $kos->namaKos = $namaKos;
    $kos->tipe = $tipeKos;
    $kos->ukuran = $ukuranKos;
    $kos->kapasitas = $kapasitasKos;
    $kos->harga = $hargaKos;
    $kos->namaJalan = $jalanKos;
    $kos->kecamatan = $kecamatanKos;
    $kos->kota = $kotaKos;
    $kos->detail = $deskripsiKos;
    $kos->idUser = $idUser;

    $hasil = $kos->editKosProfile();

    if ($hasil == "berhasil mengedit") {
        //admin
        if ($level == 0) {
            echo "<script>
            alert('Berhasil Memperbaharui Kosan');
            window.location = 'dashboard.php?p=admin';
            </script>";
        }
        //else
        else {
            echo "<script>
            alert('Berhasil Memperbaharui Kosan');
            window.location = 'dashboard.php?p=profile';
            </script>";
        }
    } else {
        echo "<script>
        alert('Gagal Memperbaharui kosan, Pastikan semua data benar')
        window.location = 'dashboard.php?p=edit-kos&id-kos=$idKos';
        </script>";
    }
}
