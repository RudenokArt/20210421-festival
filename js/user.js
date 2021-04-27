




// ========== LISTENERS ==========
$('button[name="exit_button"]').click(function () {
  $.post('php/exit_user.php',{data:'data'}, function(data){
    console.log(data);
    document.location.href='index.php';
  });
});
$('input[type="file"]').change(function () {
  console.log(this.value);
  $(this).siblings().children('span').html(this.value);
})