// ========== ACTIONS ==========
checkboxChecked();



// ========== LISTENERS ==========
$('button[name="exit_button"]').click(function () {
  $.post('php/exit_user.php',{data:'data'}, function(data){
    document.location.href='index.php';
  });
});
$('input[type="file"]').change(function () {
  $(this).siblings().children('span').html(this.value);
});
$('input[type="checkbox"]').change(checkboxChecked);



// ========== FUNCTIONS ==========

function checkboxChecked () {
  var arr=$('input[type="checkbox"]');
  for (var i = 0; i < arr.length; i++) {
    if (arr[i].checked) {
      $(arr[i]).siblings('i').css({'background':'skyblue'});
    }else{
      $(arr[i]).siblings('i').css({'background':'transparent'});
    }
  }
}