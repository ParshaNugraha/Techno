<?php
    include 'database/db_grafik.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">E-COBOY</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="mr-2">Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Analisis Grafik</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pendapatan</span></a>
            </li>

            <!-- Nav Item - Product -->
            <li class="nav-item">
                <a class="nav-link" href="produk.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Produk</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="toggleDarkMode">
                                <i class="fas fa-fw fa-moon"></i>
                                <span>Dark Mode</span>
                            </a>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mr-2">Produk</h1>
                        <a class="btn btn-primary" data-toggle="modal" data-target="#TambahProduk">Tambah</a>
                    </div>

                    <!-- Content Row -->

                    <div class="card1 shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tabel</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>                                          
                                            <th>Stok Awal</th>
                                            <th>Stok Akhir</th>
                                            <th>Produk Yang Terjual</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php
$query = "SELECT * FROM produk";
$result = mysqli_query($conn, $query);
$i = 1;
while($p = mysqli_fetch_array($result)){
    $namaproduk = $p['Nama'];
    $harga = $p['harga'];
    $stokawal = $p['stok_awal'];
    $stokakhir = $p['stok_akhir'];
    $idproduk = $p['id'];
    $terjual = $p['terjual']
?>
    <tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $namaproduk; ?></td>
    <td>Rp <?php echo number_format($harga, 0, ',', '.'); ?></td>
    <td><?php echo $stokawal; ?></td>
    <td><?php echo $stokakhir; ?></td>
    <td><?php echo $terjual; ?></td>
    <td>Rp <?php echo number_format($harga * $terjual, 0, ',', '.'); ?></td>
    <td>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#EditProduk<?php echo $idproduk; ?>">Edit</a>
        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#HapusProduk<?php echo $idproduk; ?>">Hapus</a>
    </td>
</tr>


    <!-- Edit Modal -->
    <div class="modal fade" id="EditProduk<?php echo $idproduk; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="produk.php" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idProduk" value="<?php echo $idproduk; ?>">
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="namaProduk" class="form-control" value="<?php echo $namaproduk; ?>">
                        </div>
                        <div class="form-group">
                            <label>Harga Produk</label>
                            <input type="number" name="hargaProduk" class="form-control" value="<?php echo $harga; ?>">
                        </div>
                        <div class="form-group">
                            <label>Stok Awal</label>
                            <input type="number" name="stokAwal" class="form-control" value="<?php echo $stokawal; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Stok Akhir</label>
                            <input type="number" name="stokAkhir" class="form-control" value="<?php echo $stokakhir; ?>"disabled>
                        </div>
                        <div class="form-group">
                            <label>Produk Yang Terjual</label>
                            <input type="number" name="terjual" class="form-control" value="<?php echo $terjual; ?>">
                        </div>                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="editproduk" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="HapusProduk<?php echo $idproduk; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="produk.php" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus produk ini?</p>
                        <input type="hidden" name="idProduk" value="<?php echo $idproduk; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="hapusproduk" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
}
?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Coboy 2024</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

 <!-- Modal -->
                <!-- Tambah Produk -->
    <div class="modal fade" id="TambahProduk" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3>Tambah Data Produk</h3>
        </div>
        <div class="modal-body">
          <form method="post">
              <div class="form-group">
                  <label for="namaProduk">Nama Produk:</label>
                  <input type="text" class="form-control" id="namaProduk" name="namaProduk" required>
              </div>
              <div class="form-group">
                  <label for="hargaProduk">Harga Produk:</label>
                  <input type="number" class="form-control" id="hargaProduk" name="hargaProduk" required>
              </div>
              <div class="form-group">
                  <label for="stokAwal">Stok Awal:</label>
                  <input type="number" class="form-control" id="stokAwal" name="stokAwal" required>
              </div>
              <button type="submit" class="btn btn-primary" name="tambahproduk">Tambah</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Edit Produk -->
  <div class="modal fade" id="EditProduk" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->


      <div class="modal-content">
        <div class="modal-header">
          <h3>Edit Data</h3>
        </div>
        <div class="modal-body">
          <form method="post">
              <div class="form-group">
                  <label for="namaProduk">Nama Produk:</label>
                  <input type="text" class="form-control" id="namaProduk" name="namaProduk" required>
              </div>
              <div class="form-group">
                  <label for="hargaProduk">Harga Produk:</label>
                  <input type="number" class="form-control" id="hargaProduk" name="hargaProduk" required>
              </div>
              <div class="form-group">
                  <label for="stokAwal">Stok Awal:</label>
                  <input type="number" class="form-control" id="stokAwal" name="stokAwal" required disabled>
              </div>
              <div class="form-group">
                  <label for="stokAkhir">Stok Akhir:</label>
                  <input type="number" class="form-control" id="stokAkhir" name="stokAkhir" required>
              </div>
              <input type="hidden" name="idProduk">
              <button type="submit" class="btn btn-primary" name="editproduk">Edit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Hapus Produk -->
  <div class="modal fade" id="HapusProduk<?= $idproduk; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3>Hapus Data</h3>
        </div>
        <form method="post">
          <div class="modal-body">
            <h5>Yakin untuk menghapus produk <?= $namaproduk; ?>?</h5>
            <input type="hidden" name="idProduk" value="<?= $idproduk; ?>">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="hapusproduk">Hapus</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
          </div>
        </form>
      </div>
      
    </div>
  </div>
  <!-- End Modal -->
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>
        <script src="js/index.js"></script>

</body>

</html>
