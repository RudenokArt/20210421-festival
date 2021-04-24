

// ========= LISTENERS =========

$('button[name="reg_button"]').click(function(){
  var flag=true;
  var arr=$('.reg_form input');
  for (var i = 0; i < arr.length; i++) {
    if (arr[i].value=='') {
      arr[i].style.outline='1px solid red';
      $('.warning').html('');
      flag=false;
    } else if (arr[1].value.trim()!=arr[2].value.trim()) {
      $('.warning').html('Пароли не совпадают!');
      flag=false;
    }  else{
      arr[i].style.outline='none';
      $('.warning').html('');
    }
  }
  if (flag) {
    $.post('php/reg_participant.php', $('.reg_form').serialize(),login);
  }
});
$('button[name="login_button"]').click(function () {
  var arr = $('.login_form input');
  var flag=true;
  for (var i = 0; i < arr.length; i++) {
    if (arr[i].value=='') {
      arr[i].style.outline='1px solid red';
      $('.warning').html('');
      flag=false;
    }  else{
      arr[i].style.outline='none';
      $('.warning').html('');
    }
  }
  if (flag) {
    $.post('php/log_participant.php', $('.login_form').serialize(),login);
  }
});
// ========= FUNCTIONS =========

function login (data) {
  console.log(data);
  var arr=JSON.parse(data);
  $('.warning').html(arr[1]);
  if (arr[0]) {document.location.href='participant.php';}
  //
}
