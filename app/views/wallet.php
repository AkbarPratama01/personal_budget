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
  <title>Pendapatan</title>


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
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Pilih Dompet</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div>
                  <button href="#" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                      class="bi bi-plus-circle"></i> Tambah Dompet</button>
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
                    <h4 class="mb-0" id="text-dompet">Seluruh Dompet</h4>
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
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-3">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Analisa</h3>
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
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-3">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Transaksi terbesar</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
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
                                  <div class="col-md-12">
                                    <h6>13 Jul 2023</h6>
                                  </div>
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
                                  <div class="col-md-12">
                                    <h6>13 Jul 2023</h6>
                                  </div>
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
                                  <div class="col-md-12">
                                    <h6>13 Jul 2023</h6>
                                  </div>
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Histori Transaksi</h3>
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
    </div>


    <!-- Modal -->
    <div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Dompet Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama Dompet</label>
              <input type="text" class="form-control" name="name_wallet" id="name-wallet"
                placeholder="Masukkan Nama Wallet" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nominal</label>
              <input type="text" class="form-control" name="value_wallet" id="value-wallet"
                placeholder="Masukkan Nominal Wallet" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="button" class="btn btn-primary" id="btn-save-wallet">Simpan</button>
          </div>
        </div>
      </div>
    </div>



    <!-- Scripts -->
    <?php include "component/js.php"; ?>

    <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'pie',
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