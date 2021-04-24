// ========= ACTIONS =========
checkboxLabel();



// ========= LISTENERS =========
$('input[type="checkbox"]').change(checkboxLabel);
$('input[type="file"]').change(function () {
  $(this).siblings('span').html(this.files[0].name);
});
$('button[name="save_data"]').click(confirmation);
$('button[name="button_exit"]').click(function () {
  $.post('php/exit_user.php',{data:'data'}, function(){
    document.location.href='index.php';
  });
});



// ========= FUNCTIONS =========
function checkboxLabel () {
  var arr=$('input[type="checkbox"]');
  for (var i = 0; i < arr.length; i++) {
    if (arr[i].checked) {
      $(arr[i]).parent('label').attr('class','checkbox_label-active');
    }else{
      $(arr[i]).parent('label').attr('class','checkbox_label');
    }
  }
}
function confirmation () {
 var ask=confirm('Данные будут полностью обновлены!');
 if (ask) {getFormData();}
}
function getFormData () {
  var data={};
  var input=$('input[type="text"]');
  var checkbox=$('input[type="checkbox"]');
  for (i = 0; i < checkbox.length; i++) {
    data[checkbox[i].value.trim()]=checkbox[i].checked;
  }
  for (var i = 0; i < input.length; i++) {
    data[input[i].name.trim()]=input[i].value.trim();
  }
  var select=$('select');
  for (i = 0; i < select.length; i++) {
    data[select[i].name.trim()]=select[i].value;
  }
  var textarea=$('textarea');
  for (i = 0; i < textarea.length; i++) {
    data[textarea[i].name.trim()]=textarea[i].value.trim();
  }
  var str=JSON.stringify(data);
  $.post('php/set_participant_data.php',{data:str}, function(data){console.log(data);});
}