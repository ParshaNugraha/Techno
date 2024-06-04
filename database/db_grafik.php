<?php 
session_start();

define('SITEURL','http://localhost/Techno/');
define('LOCALHOST','127.0.0.1');
define('DB_USERNAME',"root");
define('DB_PASSWORD','');
define('DB_NAME','grafik');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die (mysqli_error($conn));
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));

if(isset($_POST['tambahproduk'])){
    $nama = $_POST['namaProduk'];
    $harga = $_POST['hargaProduk'];
    $stok_awal = $_POST['stokAwal'];
    $stok_akhir = $stok_awal; // agar stok_akhir isinya sama dengan stok_awal

    $insert = mysqli_query($conn, "INSERT INTO produk (Nama, harga, stok_awal, stok_akhir) VALUES ('$nama', '$harga', '$stok_awal', '$stok_akhir')");

    if($insert){
        header('location:produk.php');
    }else{
        echo '<script>alert("Gagal menambah produk baru"); window.location.href="produk.php";</script>';
    }
}

if(isset($_POST['editproduk'])){
    $idProduk = $_POST['idProduk'];
    $namaProduk = $_POST['namaProduk'];
    $hargaProduk = $_POST['hargaProduk'];
    $stokAkhir = $_POST['stokAkhir'];
    $terjual = $_POST['terjual'];
    
    // Dapatkan stok awal dari database
    $query = "SELECT stok_awal FROM produk WHERE id='$idProduk'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $stokAwal = $row['stok_awal'];

    // Validasi stok akhir
    if ($stokAkhir <= $stokAwal) {
        $stok_awal_baru = $stokAwal;
        $stok_akhir_baru = $stokAkhir - $terjual;
        $terjual_baru = $terjual + ($stokAwal - $stok_akhir_baru);
        $update = mysqli_query($conn, "UPDATE produk SET Nama='$namaProduk', harga='$hargaProduk', stok_awal='$stok_awal_baru', stok_akhir='$stok_akhir_baru', terjual='$terjual_baru' WHERE id='$idProduk'");
        if($update){
            echo '<script>alert("Produk berhasil diperbarui."); window.location.href="produk.php";</script>';
        } else {
            echo '<script>alert("Gagal memperbarui produk"); window.location.href="produk.php";</script>';
        }
    } else {
        echo '<script>alert("Stok akhir tidak boleh lebih besar dari stok awal."); window.location.href="produk.php";</script>';
    }
}

if(isset($_POST['hapusproduk'])){
    $id = $_POST['idProduk'];

    $delete = mysqli_query($conn, "DELETE FROM produk WHERE id='$id'");
}
?>
