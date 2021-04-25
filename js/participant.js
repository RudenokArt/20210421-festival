// ========= GLOBALS =========
var radioArr=[];



// ========= ACTIONS =========
checkboxLabel();
getRadioPoint();



// ========= LISTENERS =========
$('input[type="checkbox"],input[type="radio"]').change(checkboxLabel);
$('input[type="file"]').change(function () {
  $(this).siblings('span').html(this.files[0].name);
  fileUpload(this.name,this);
});
$('button[name="save_data"]').click(confirmation);
$('button[name="button_exit"]').click(function () {
  $.post('php/exit_user.php',{data:'data'}, function(){
    document.location.href='index.php';
  });
});
$('input[type="radio"').change(radioPoint);

// ========= FUNCTIONS =========
function checkboxLabel () {
  var arr=$('input[type="checkbox"],input[type="radio"]');
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
  $.post('php/set_participant_data.php',{data:str}, function(data){
    console.log(data);
    alert('Данные отправлены на сервер.')
  });
}
function fileUpload (text,image) {
  var formData = new FormData();
  formData.append(image.name,image.files[0]);
  var request = new XMLHttpRequest();
  request.open('POST','php/file_upload.php');
  request.send(formData);
  request.onreadystatechange=function (){
    if (request.readyState==4 && request.status==200){
      console.log(request.responseText);
    } 
  }; 
}
function radioPoint(){
  ressetRadioPoint();
  var radio=$('input[type="radio"');
  for (var i = 0; i < radio.length; i++) {
    if (radio[i].checked) {
      var input=$(radio[i]).parent().parent();
      input=$(input).siblings('.tab_content').children().children('input');
      input[0].name=input[0].name+'!!'+radio[i].value;
      console.log(input[0].name)
    }
  }
}
function getRadioPoint (){
  var radio=$('input[type="radio"]');
  var input=$(radio).parent().parent().siblings('.tab_content');
  input=$(input).children().children('input');
  for (var i = 0; i < input.length; i++) {
    radioArr[i]=input[i].name;
  }
}
function ressetRadioPoint(){
  var radio=$('input[type="radio"]');
  var input=$(radio).parent().parent().siblings('.tab_content');
  input=$(input).children().children('input');
  for (var i = 0; i < input.length; i++) {
    input[i].name=radioArr[i];
  }
}