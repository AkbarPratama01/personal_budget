<?php
session_start();
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $nama_user = $_SESSION['name'];
} else {
  $user_id = '';
  $nama_user = '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "component/head.php"; ?>
  <title>Pengeluaran</title>


</head>


<body class="bg-light">
  <div id="db-wrapper">
    <!-- navbar vertical -->
    <?php include "component/navbar-vertical.php"; ?>
    <!-- Page content -->
    <div id="page-content">
      <?php include "component/header.php"; ?>
      <!-- Container fluid -->
      <div class="bg-primary pt-10 pb-21"></div>
      <div class="container-fluid mt-n22 px-6">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
              <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                  <h3 class="mb-0  text-white">Ringkasan Pengeluaran</h3>
                </div>
                <div>
                  <button href="#" class="btn btn-white"><i class="bi bi-plus-circle"></i> Tambah Pengeluaran</button>
                  <button href="#" class="btn btn-white"><i class="bi bi-plus-circle"></i> Tambah Kategori</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card ">
              <!-- card body -->
              <div class="card-body">
                <!-- heading -->
                <div class="d-flex justify-content-between align-items-center
                    mb-3">
                  <div>
                    <h4 class="mb-0">Total Pengeluaran</h4>
                  </div>
                  <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                    <i class="bi bi-wallet fs-4"></i>
                  </div>
                </div>
                <!-- project number -->
                <div>
                  <h1 class="fw-bold" id="total-pemasukkan">5.000.000</h1>
                  <p class="mb-0"><span class="text-dark me-2" id="total-transaksi-pemasukkan">2</span>Transaksi</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card ">
              <!-- card body -->
              <div class="card-body">
                <!-- heading -->
                <div class="d-flex justify-content-between align-items-center
                    mb-3">
                  <div>
                    <h4 class="mb-0">Pengeluaran Bulan ini</h4>
                  </div>
                  <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                    <i class="bi bi-wallet fs-4"></i>
                  </div>
                </div>
                <!-- project number -->
                <div>
                  <h1 class="fw-bold" id="total-pengeluaran">3.200.000</h1>
                  <p class="mb-0"><span class="text-dark me-2" id="total-transaksi-pengeluaran">28</span>Transaksi</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Pengeluaran</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    <div class="mb-3">
                      <select class="form-select" aria-label="Default select example">
                        <option selected>Pilih Periode</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="mb-3">
                      <button class="btn btn-primary" type="submit">Lihat Data</button>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table" id="table-pendapatan" width="100%">
                        <thead class="table-light">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Aktifitas</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>
                              <a href="#" class=""><i class="bi bi-pencil-square"></i></a>
                              <a href="#" class=""><i class="bi bi-trash"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>
                              <a href="#" class=""><i class="bi bi-pencil-square"></i></a>
                              <a href="#" class=""><i class="bi bi-trash"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>
                              <a href="#" class=""><i class="bi bi-pencil-square"></i></a>
                              <a href="#" class=""><i class="bi bi-trash"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- Scripts -->
    <?php include "component/js.php"; ?>



</body>

</html>