/*--------------------------------------Dashboard----------------------------------------*/
function showDashboard(id) {
  $.ajax({
    url:"../../app/controllers/DashboardController.php?func=getDashboard",
    type:"post",
    data:{
      id:id
    },
    dataType:"json",
    success:function(result) {
      console.log(result);
    }
  });
}

/*--------------------------------------Dompet----------------------------------------*/
//insert wallet
function saveWallet(id) {
  //data Login
  const data_wallet = [
    document.querySelector('input[name="name_wallet"]'),
    document.querySelector('input[name="value_wallet"]')
  ];

  let isInputEmpty = false;

  for (let i = 0; i < data_wallet.length; i++) {
    if (!data_wallet[i].value) {
      isInputEmpty = true;
      break;
    }
  }

  if (isInputEmpty) {
    alert('nama dompet atau nominal dompet masih kosong');
  } else {
    var name_wallet = document.getElementById("name-wallet").value;
    var value_wallet = document.getElementById("value-wallet").value;

    $.ajax({
      url: "../controllers/WalletController.php?func=saveWallet",
      type: "post",
      data: {
        name_wallet: name_wallet,
        value_wallet: value_wallet,
        id:id
      },
      success: function(result) {
        console.log(result);
        if (result == 'Yes') {
          alert('Dompet berhasil disimpan');
          location.reload();
        } else {
          alert("Dompet gagal disimpan");
          // Access the form element
          var form = document.getElementById('form-input-wallet');

          // Reset the form
          form.reset();
        }
      }
    })
  }
}
//get data wallet
function getWallet(id) {
  //list dompet
  $.ajax({
    url:"../controllers/WalletController.php?func=getWallet&id="+id,
    type:"get",
    success:function(result) {
      $('#wallet-select').html(result);
    }
  });

  //card wallet
  $.ajax({
    url:"../controllers/WalletController.php?func=getTotalWallet&id="+id,
    type:"get",
    dataType:"json",
    success:function(result) {
      function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR'
        }).format(number);
      }

      let saldo_wallet = formatRupiah(result.total_value);
      let transaksi_wallet = result.total_transaksi;

      $('#total-saldo-dompet').html(saldo_wallet);
      $('#total-transaksi-dompet').html(transaksi_wallet);
    }
  });

  //chart analisa transaksi
  const ctx = document.getElementById('myChartAnalisa');

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
}

/*--------------------------------------Incomes----------------------------------------*/
function list_category(id) {
  $.ajax({
    url:"../controllers/IncomeController.php?func=listCategory&id="+ id,
    type:"get",
    success:function(result){
      $('#name-income').html(result);
    }
  });
}

function list_wallet(id) {
  //list dompet
  $.ajax({
    url:"../controllers/WalletController.php?func=getWallet&id="+id,
    type:"get",
    success:function(result) {
      $('#wallet-select').html(result);
    }
  });
}

function list_month(id) {
  //list month
  $.ajax({
    url:"../controllers/IncomeController.php?func=listMonthIncome&id="+ id,
    type:"get",
    success:function(result){
      $('#select-month').html(result);
    }
  });
}

function show_income(id) {
  var table = $('#table-income').DataTable({
    ajax: {
      url: '../controllers/IncomeController.php?func=incomeTransaction&id='+id,
      type: 'POST',
      data: function (d) {
          // Send selected category to the server
          d.month = $('#select-month').val();
      }
    },
    columns: [
      { data: 'No' },
      { data: 'Category' },
      { data: 'Info' },
      { data: 'Date' },
      { data: 'Nominal' },
      { data: 'Aksi' }
  ]
  });

  // Update the DataTable on select input change
  $('#select-month').on('change', function () {
      table.ajax.reload();
  });
}

function saveIncomesCategoties(id) {
  var name_category = document.getElementById("name-category").value;
  if (name_category == '' || name_category == null) {
    alert('nama kategory masih kosong, harap isi terlebih dahulu');
  } else {
    $.ajax({
      url:"../controllers/IncomeController.php?func=saveIncomeCategory",
      type:"post",
      data:{
        id:id,
        name_category:name_category
      },
      success:function(result){
        if (result == 'Yes') {
          alert('Kategori berhasil disimpan');
          location.reload();
        } else {
          alert("Kategori gagal disimpan");
          // Access the form element
          var form = document.getElementById('form-input-category');

          // Reset the form
          form.reset();
        }
      }
    });
  }
}

function saveIncome(id) {
  //data Login
  const data_income = [
    document.querySelector('input[name="date_income"]'),
    document.querySelector('select[name="name_income"]'),
    document.querySelector('select[name="wallet_select"]'),
    document.querySelector('input[name="value_income"]'),
    document.querySelector('input[name="info_income"]')
  ];

  let isInputEmpty = false;

  for (let i = 0; i < data_income.length; i++) {
    if (!data_income[i].value) {
      isInputEmpty = true;
      break;
    }
  }

  if (isInputEmpty) {
    alert('data inputan masih kosong, harap lengkapi terlebih dahulu');
  } else {
    var date_income = document.getElementById("date-income").value;
    var name_income = document.getElementById("name-income").value;
    var wallet_select = document.getElementById("wallet-select").value;
    var value_income = document.getElementById("value-income").value;
    var info_income = document.getElementById("info-income").value;

    $.ajax({
      url: "../controllers/IncomeController.php?func=saveIncome",
      type: "post",
      data: {
        date_income:date_income,
        name_income:name_income,
        wallet_select:wallet_select,
        value_income:value_income,
        info_income:info_income,
        id:id
      },
      success: function(result) {
        console.log(result);
        if (result == 'Yes') {
          alert('Transaksi berhasil disimpan');
          location.reload();
        } else {
          alert("Transaksi gagal disimpan");
          // Access the form element
          var form = document.getElementById('form-input-income');

          // Reset the form
          form.reset();
        }
      }
    })
  }
}