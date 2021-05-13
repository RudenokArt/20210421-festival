checkboxChecked();

$('input[type="checkbox"]').change(checkboxChecked);


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