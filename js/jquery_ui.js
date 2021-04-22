  
// ========== TABS ==========
  $( function() {
    $("#tabs").tabs();
  } );

// ========== DATA PICKER ==========
  $( function() {
    $('input[name="date"]').datepicker();
  } );

// ========== MASK INPUT ==========
  $('input[name="phone"]').mask('+7(999) 999-9999');
  $('input[name="discount_value"]').mask('99%');


// ========== CHECKBOX + RADIO ==========