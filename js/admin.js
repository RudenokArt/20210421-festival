



$('button[name="add_meta"]').click(function () {
  var input=$('input[name="meta_name"]');
  if (input[0].value=='') {
    input[0].style.outline = '1px solid red';
  } else{
    input[0].style.outline = '1px solid transparent';
    $('#add_meta')[0].submit();
  }
});

$('button[name="remove_meta"]').click(function (e) {
  e.preventDefault();
  if (confirm('Категория будет удалена!')) {
    var form=
    $(this).parent().siblings().children('.remove_meta')[0];
    form.submit();
  }
});
$('button[name="edit_meta"]').click(function (e) {
  e.preventDefault();
  if (confirm('Категория будет изменена!')) {
    var form=$(this).parent().siblings().children('.edit_meta')[0];
    form.submit();
  }
});