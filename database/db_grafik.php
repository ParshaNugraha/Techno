<?php 
    session_start();

    define('SITEURL','http://localhost/Techno/');
    define('LOCALHOST','127.0.0.1');
    define('DB_USERNAME',"root");
    define('DB_PASSWORD','');
    define('DB_NAME','grafik');

       $conn= mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die (mysqli_error());
       $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());

       if(isset($_POST['tambahproduk'])){
        $nama = $_POST['namaProduk'];
        $harga = $_POST['hargaProduk'];
        $stok_awal = $_POST['stokAwal'];
    
        $insert = mysqli_query($conn,"INSERT INTO produk (Nama, harga, stok_awal) VALUES ('$nama', '$harga', '$stok_awal')");
    
        if($insert){
            header('location:produk.php');
        }else{
            echo '
            <script>alert("Gagal menambah produk baru");
            window.location.href="produk.php"
            </script>
            ';
        }
    }

if(isset($_POST['editproduk'])){
    $id = $_POST['idProduk'];
    $nama = $_POST['namaProduk'];
    $harga = $_POST['hargaProduk'];
    $stok_awal = $_POST['stokAwal'];
    $stok_akhir = $_POST['stokAkhir'];

    // Menghitung total harga berdasarkan stok awal
    $total_awal = $stok_awal * $harga;

    // Menghitung selisih stok dan total harga berdasarkan stok akhir
    $selisih_stok = $stok_awal - $stok_akhir;
    $total_akhir = $selisih_stok * $harga;

    $update = mysqli_query($conn, "UPDATE produk SET Nama='$nama', harga='$harga', stok_awal='$stok_awal', stok_akhir='$stok_akhir', Jumlah='$total_akhir' WHERE id='$id'");

    if($update){
        echo '
        <script>alert("Produk berhasil diperbarui. Total harga awal: Rp '.$total_awal.' - Total harga akhir: Rp '.$total_akhir.'");
        window.location.href="produk.php"
        </script>
        ';
    }else{
        echo '
        <script>alert("Gagal memperbarui produk");
        window.location.href="produk.php"
        </script>
        ';
    }
}

if(isset($_POST['hapusproduk'])){
    $id = $_POST['idProduk'];

    $delete = mysqli_query($conn, "DELETE FROM produk WHERE id='$id'");

    if($delete){
        echo '
        <script>alert("Produk berhasil dihapus");
        window.location.href="produk.php"
        </script>
        ';
    }else{
        echo '
        <script>alert("Gagal menghapus produk");
        window.location.href="produk.php"
        </script>
        ';
    }
}

?>