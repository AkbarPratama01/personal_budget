// dashboard
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

// profile
function showProfile(id) {
  $.ajax({
      url:"../../app/controllers/ProfileController.php?func=getProfile&id="+id,
      type:"get",
      dataType:"json",
      success:function(result) {
          if (result.status == 'user ada') {
            var fullname = result.fullname; console.log(fullname);
            var email = result.email; console.log(email);

            var name_html = document.getElementById("fullname");
            var email_html = document.getElementById("email");
            var information_html = document.getElementById("information");
            var gender_html = document.getElementById("gender");
            var phone_html = document.getElementById("phone");

            name_html.innerHTML = fullname;
            email_html.innerHTML = email;
            information_html.innerHTML = '-';
            gender_html.innerHTML = '-';
            phone_html.innerHTML = '-';
          } else if (result.status == 'profile ada') {
            
          } else {

          }
      }
  });
}

// wallet
function addWallet(id) {
  //data wallet
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
    alert('Nama dompet atau nominal dompet masih kosong');
  } else {
    var name_wallet = document.querySelector('input[name="name_wallet"]').value;
    var value_wallet = document.querySelector('input[name="value_wallet"]').value;

    $.ajax({
      url:"../../app/controllers/WalletController.php?func=addWallet",
      type:"post",
      data:{
        id:id,
        name_wallet:name_wallet,
        value_wallet:value_wallet,
      },
      success:function(result){
        console.log(result);
      }
    });
  }
}