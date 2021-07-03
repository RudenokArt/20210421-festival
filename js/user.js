// ========== ACTIONS ==========
// checkboxChecked();
orchestraInput();
setAgeCategory();



// ========== LISTENERS ==========
$('button[name="exit_button"]').click(function () {
  $.post('php/exit_user.php',{data:'data'}, function(data){
    document.location.href='index.php';
  });
});

$('input[type="file"]').change(function () {
  $(this).siblings().children('span').html(this.value);
});

$('button[name="category_set_data"]').click(function () {
  var form=$('.ajax_form');
  $.post('php/user_category_set_data.php',$(form[0]).serialize(),function(){
    $.post('php/user_orchestra_set.php',$(form[1]).serialize(),function(data){
      alert(data);
    });
  });
});
$('.orchestraCheckbox').change(orchestraInput);
$('input[name="date"]').change(setAgeCategory);
$('input[name="discount"]').change(function(){
  if (this.value>100) {this.value=100;}
});

$('select[name="participant_category"]').change(function () {
  var select=$('select[name="package"]')[0];
  if (this.value=='group') {
    select.value='group';
    select.style.display='none';
  }else{
    select.style.display='block';
  }
});

// ========== FUNCTIONS ==========


function orchestraInput () {
  var checkbox=$('.orchestraCheckbox');
  var input=$('.orchestraInput');
  for (var i = 0; i < checkbox.length; i++) {
    if (checkbox[i].checked) {
      input[i].disabled=false;
    }else{
      input[i].disabled=true;
      //input[i].value='';
    }
  }
}
function setAgeCategory () {
  var str=$('input[name="date"]')[0].value;
  var arr=str.split('.');
  var bornDate=new Date();
  bornDate.setFullYear(arr[2],arr[1]-1,arr[0]);
  tooday=new Date().setFullYear(2021,9,1);
  var age=(tooday-bornDate.getTime())/31536000000;
  console.log(age);
  var category='Дети (7-10лет)';
  if (age>11) {category='Юниоры 1 (11-14 лет)';}
  if (age>15) {category='Юниоры 2 (15-19 лет)';}
  if (age>20) {category='Взрослые 1 (20-30 лет)';}
  if (age>31) {category='Взрослые 2 (31-40лет)';}
  if (age>41) {category='Взрослые 3 (41-50 лет)';}
  if (age>51) {category='Взрослые 4 (51 год и старше)';}
  $('input[name="age"]').prop('value',category);
}