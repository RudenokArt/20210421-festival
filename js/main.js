// ========= ACTIONS =========
checkboxLabel();



// ========= LISTENERS =========
$('input[type="checkbox"]').change(checkboxLabel);
$('input[type="file"]').change(function () {
  $(this).siblings('span').html(this.files[0].name);
});
$('button[name="save_data"]').click(getFormData);

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
function getFormData () {
  var data={};
  var input=$('input[type="text"]');
  for (var i = 0; i < input.length; i++) {
    data[input[i].name.trim()]=input[i].value.trim();
  }
  var checkbox=$('input[type="checkbox"]');
  for (i = 0; i < checkbox.length; i++) {
    if (data[checkbox[i].value.trim()]=='') {
      data[checkbox[i].value.trim()]=checkbox[i].checked;
    }
  }
  var select=$('select');
  for (i = 0; i < select.length; i++) {
    data[select[i].name.trim()]=select[i].value;
  }
  var str=JSON.stringify(data);
  $.post('php/set_participant_data.php',{data:str}, function(data){console.log(data);});
}