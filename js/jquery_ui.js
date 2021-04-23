  
// ========== TABS ==========
  $( function() {
    $("#tabs").tabs();
  } );

// ========== DATA PICKER ==========
  $( function() {
    $('input[name="Дата рождения"]').datepicker();
  } );

// ========== MASK INPUT ==========
  $('input[name="Телефон"]').mask('+7(999) 999-9999');
  $('input[name="Скидка"]').mask('99%');


// ========== CHECKBOX + RADIO ==========