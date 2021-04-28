

// ========== LISTENERS ==========
$('#reg_button').click(function () {
  var arr=$('#reg_form input');
  if (formCheck(arr)) {
    if (arr[1].value.trim()==arr[2].value.trim()) {
      $.post('php/reg_user.php', $('#reg_form').serialize(), regRequest);
    }else{
      alert('Пароли не совпадают');
    }
  }
});
$('#log_button').click(function () {
  var arr=$('#log_form input');
  if (formCheck(arr)) {
   $.post('php/log_user.php', $('#log_form').serialize(), logRequest);
  }
});
$('.password_recovery').click(function () {
  var mail=prompt('Email указанный при регистрации:').trim();
  $.post('php/password_recover.php',{data:mail}, function(data){
    alert('Пароль отправлен на почту: '+data);
  });
});

// ========== FUNCTIONS ==========
function formCheck (arr) {
  var flag=true;
   for (var i = 0; i < arr.length; i++) {
    if(arr[i].value==''){
      arr[i].style.outline ='1px solid red';
      flag=false;
    }else{
      arr[i].style.outline ='1px solid transparent';
    }
  }
  return flag;
}
function regRequest (data) {
  if (data=='email') {
    alert('Пользователь с таким Email уже зарегистрирован!');
  }else{
    $.post('php/log_user.php', $('#reg_form').serialize(), logRequest);
  }
}
function logRequest (data) {
  if (data=='log_pas') {
    alert('Неверный логин или пароль!')
  }else{
    console.log('login');
    document.location.href='user.php';
  }
}