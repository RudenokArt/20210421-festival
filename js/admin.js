



$('button[name="add_meta"]').click(function () {
  var input=$('input[name="meta_name"]');
  if (input[0].value=='') {
    input[0].style.outline = '1px solid red';
  } else{
    input[0].style.outline = '1px solid transparent';
    $('#add_meta')[0].submit();
  }
});