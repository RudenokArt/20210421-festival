// ========= ACTIONS =========
checkboxLabel();



// ========= LISTENERS =========
$('input[type="checkbox"]').change(checkboxLabel);
$('input[type="file"]').change(function () {
  $(this).siblings('span').html(this.files[0].name);
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
