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


<body class="bg-light"
  onload="list_category('<?= $user_id; ?>'); list_wallet('<?= $user_id; ?>'); list_month('<?= $user_id; ?>'); show_income('<?= $user_id; ?>');">
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
                  <h3 class="mb-0  text-white">Ringkasan Pendapatan</h3>
                </div>
                <div>
                  <button href="#" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#newIncome"><i
                      class="bi bi-plus-circle"></i> Tambah Pendapatan</button>
                  <button href="#" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#newCategory"><i
                      class="bi bi-plus-circle"></i> Tambah Kategori</button>
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
                    <h4 class="mb-0">Total Pendapatan</h4>
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
                    <h4 class="mb-0">Pendapatan Bulan ini</h4>
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
                <h3 class="card-title">Daftar Pendapatan</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="mb-3">
                      <select class="form-select" name="select_month" id="select-month"
                        aria-label="Default select example"></select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="mb-3 text-center">
                      <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i> Lihat Data</button>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="mb-3 text-center">
                      <button class="btn btn-primary" type="submit"><i class="bi bi-archive"></i> List
                        Kategori</button>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table" id="table-income" width="100%">
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
                        <tbody></tbody>
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

    <!-- Modal -->
    <div class="modal" id="newCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="newCategoryLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Kategori Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="form-input-category">
              <div class="mb-3">
                <label for="name-category" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" name="name_category" id="name-category"
                  placeholder="Masukkan Nama Wallet" required>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="button" class="btn btn-primary" id="btn-save-wallet"
              onclick="saveIncomesCategoties('<?= $user_id; ?>')">Simpan</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="newIncome" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="newIncomeLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Transaksi Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="form-input-income">
              <div class="mb-3">
                <label for="date-income" class="form-label">Tanggal</label>
                <input type="date" name="date_income" id="date-income" class="form-control"
                  placeholder="Masukkan tanggal transaksi" required>
              </div>
              <div class="mb-3">
                <label for="name-income" class="form-label">Nama Kategori</label>
                <select name="name_income" id="name-income" class="form-control" required></select>
              </div>
              <div class="mb-3">
                <label for="wallet-select" class="form-label">Dompet</label>
                <select name="wallet_select" id="wallet-select" class="form-control" required></select>
              </div>
              <div class="mb-3">
                <label for="value-income" class="form-label">Nominal</label>
                <input type="number" name="value_income" id="value-income" class="form-control"
                  placeholder="Masukkan nominal transaksi" required>
              </div>
              <div class="mb-3">
                <label for="info-income" class="form-label">Keterangan</label>
                <input type="text" name="info_income" id="info-income" class="form-control"
                  placeholder="Masukkan keterangan transaksi" required>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="button" class="btn btn-primary" id="btn-save-income"
              onclick="saveIncome('<?= $user_id; ?>')">Simpan</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <?php include "component/js.php"; ?>



</body>

</html>