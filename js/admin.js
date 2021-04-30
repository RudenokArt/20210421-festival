


// ========== LISTENERS ==========

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
$('.filter').change(function () {
  var tr=$('.user_tr');
  $(tr).css({'display':''});
  var filter=$('.filter');
  for (var i = 0; i < filter.length; i++) {
    var cellValue=filter[i].value.trim().toLowerCase();
    for (var k = 0; k < tr.length; k++) {
      var td=$(tr[k]).children();
      var userCell=td[i].innerHTML.toLowerCase().trim();
      if(!userCell.includes(cellValue,0) && cellValue!=''){
        tr[k].style.display='none';
      }
    }
  }
});
$('.export_block button').click(function () {
  var table=$('.user_table');
  var tr=$(table).children().children();
  var arr=[];
  for (var i = 1; i < tr.length; i++) {
    arr[i]=[];
    var td=$(tr[i]).children();
    for(var j=0; j<td.length; j++){
      arr[i].push(td[j].innerHTML.trim());
    }
  }
  var data=JSON.stringify(arr);
  $.post('php/export_csv.php',{data:data}, function(data){
    alert('Выгрузка данных завершена!');
    $('.export_block div')[1].innerHTML=
    '<a href="data/export.csv" download>Скачать .csv</a>';
  });
});