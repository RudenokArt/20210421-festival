
// ========== ACTIONS ==========
calculationTotal('amount_1');
calculationTotal('amount_2');
calculationTotal('amount_3');


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
    console.log(data);
    alert('Выгрузка данных завершена!');
    $('.export_block div')[1].innerHTML=
    '<a href="data/export.csv" download>Скачать .csv</a>';
  });
});

$('button[name="price_save"]').click(function () {
  var date=$('#new_price_date').prop('value');
  if (date=='') {
    alert('Укажите дату прайса!');
  }  else{
   $('.preloader').css({'display':'flex'});
   $.post('php/price_check_have.php',{data:date}, function(data){
     var arr=JSON.parse(data);
     if (arr.length>0) {
       setTimeout(function () {
        $('.preloader').css({'display':'none'});
        alert('Прайс на указанную дату уже внесен в базу!');
      }, 1000);
     }else{ $('#save_price-form').submit();    }
   });
 }
});

$('button[name="price_popup-close"]').click(function () {
  $('.price_popup-wrapper').fadeOut();
});

$('button[name="add_pice"]').click(function () {
  $('.price_popup-wrapper').fadeIn();
  $('.price_popup-wrapper').css({'display':'flex'});
});

$('button[name="price_delete"]').click(function (e) {
  e.preventDefault();
  if (confirm('Прайс от '+this.value+' будет удален!')) {
    $(this).parent()[0].submit();
  }
});

$('button[name="price_edit"]').click(function () {
  var form=$(this).parent().parent().siblings('.price_edit-form');
  if (confirm('Цены будут обновлены!')) {form.submit();}
});

$('button[name="payment_add"]').click(function (e) {
  e.preventDefault();
  var date=$('#payment_add-form input[name="payment_date"]').prop('value');
  var amount=$('#payment_add-form input[name="payment_amount"]').prop('value');
  if (date==''||amount=='') {
    alert('Дата и сумма квитанции обязательны к заполнению!');
  }else{
    $('#payment_add-form')[0].submit();
  }
});

$('button[name="payment_delete"]').click(function () {
  if (confirm('Квитанция будет удалена!')) {
    $(this).siblings('form')[0].submit();
  }
});

$('button[name="payment_edit"]').click(function () {
  if (confirm('Данные будут изменены!')) {
    $(this).parent().siblings('form')[0].submit();
  }
});

$('input[name="payment_filter"]').change(function () {
  var filter=$('input[name="payment_filter"]');
  var tr=$('.paynent_tr');
  $(tr).css({'display':''});
  for (var i = 0; i < filter.length; i++) {
    for (var j = 0; j < tr.length; j++) {
      var input=$(tr[j]).children('td').children('input[type="text"]');
      var search=filter[i].value.trim().toLowerCase();
      if (!input[i].value.trim().toLowerCase().includes(search,0)&&search!='') {
        tr[j].style.display='none';
      }
    }
  }
});

$('.admin_calculation-close button').click(function(){
  $(this).parent().parent().parent().fadeOut();
});

$('.admin_calculation-open button').click(function () {
  $(this).siblings('.admin_calculation-popup_wrapper').fadeIn();
  $(this).siblings('.admin_calculation-popup_wrapper').css({'display':'flex'});
});

// ========== FUNCTIONS ==========

function calculationTotal (node){
  var arr=$('.'+node+'');
  var total=0;
  for (var i = 0; i < arr.length; i++) {
    total=total+Number(arr[i].innerHTML.trim());
  }
  $('.'+node+'-total').html(total);
}