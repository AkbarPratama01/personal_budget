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