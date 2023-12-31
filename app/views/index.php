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
  <title>Homepage</title>


</head>


<body class="bg-light" onload="showDashboard('<?= $user_id; ?>')">
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
                  <h3 class="mb-0  text-white">Ringkasan Keuangan</h3>
                </div>
                <div>
                  <button href="#" class="btn btn-white"><i class="bi bi-plus-circle"></i> Tambah Transaksi</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card ">
              <!-- card body -->
              <div class="card-body">
                <!-- heading -->
                <div class="d-flex justify-content-between align-items-center
                    mb-3">
                  <div>
                    <h4 class="mb-0">Dompet</h4>
                  </div>
                  <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                    <i class="bi bi-wallet-fill"></i>
                  </div>
                </div>
                <!-- project number -->
                <div>
                  <h1 class="fw-bold" id="total-pemasukkan">2</h1>
                  <p class="mb-0"><span class="text-dark me-2" id="total-transaksi-pemasukkan">30</span>Transaksi</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card ">
              <!-- card body -->
              <div class="card-body">
                <!-- heading -->
                <div class="d-flex justify-content-between align-items-center
                    mb-3">
                  <div>
                    <h4 class="mb-0">Pemasukkan</h4>
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
          <div class="col-xl-4 col-lg-4 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card ">
              <!-- card body -->
              <div class="card-body">
                <!-- heading -->
                <div class="d-flex justify-content-between align-items-center
                    mb-3">
                  <div>
                    <h4 class="mb-0">Pengeluaran</h4>
                  </div>
                  <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                    <i class="bi bi-wallet2"></i>
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
          <div class="col-xl-8 col-lg-8 col-md-8 col-12 mt-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Analisa Keuangan</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div>
                      <canvas id="myChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-12 mt-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Teransaksi terakhir</h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="px-3">
                          <div class="row">
                            <div class="col-md-12">
                              <h6>13 Jul 2023</h6>
                            </div>
                            <div class="col-md-7 col-6">
                              <h4 class="fs-4">Bayar Kuliah</h4>
                            </div>
                            <div class="col-md-5 col-6">
                              <h4 class="fs-4 text-end">1.500.000</h4>
                            </div>
                            <div class="col-md-12">
                              <span class="fs-5 text-danger">Pengeluaran</span>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="px-3">
                          <div class="row">
                            <div class="col-md-7 col-6">
                              <h4 class="fs-4">Arisan</h4>
                            </div>
                            <div class="col-md-5 col-6">
                              <h4 class="fs-4 text-end">4.500.000</h4>
                            </div>
                            <div class="col-md-12">
                              <span class="fs-5 text-success">Pemasukkan</span>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="px-3">
                          <div class="row">
                            <div class="col-md-7 col-6">
                              <h4 class="fs-4">Makan Siang</h4>
                            </div>
                            <div class="col-md-5 col-6">
                              <h4 class="fs-4 text-end">32.000</h4>
                            </div>
                            <div class="col-md-12">
                              <span class="fs-5 text-danger">Pengeluaran</span>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="px-3">
                          <div class="row">
                            <div class="col-md-7 col-6">
                              <h4 class="fs-4">Bensin Motor</h4>
                            </div>
                            <div class="col-md-5 col-6">
                              <h4 class="fs-4 text-end">25.000</h4>
                            </div>
                            <div class="col-md-12">
                              <span class="fs-5 text-danger">Pengeluaran</span>
                            </div>
                          </div>
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



  <!-- Scripts -->
  <?php include "component/js.php"; ?>

  <script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  </script>


</body>

</html>