  $( function() {
    $( "#tabs" ).tabs();
  } );
  $( function() {
    $( 'input[name="date"]' ).datepicker({dateFormat: "dd.mm.yy"});
  } );
  $( function() {
    $( 'input[name="price_date"]' ).datepicker({dateFormat: "dd.mm.yy"});
  } );

  $('input[name="phone"]').mask("+7(999) 999-9999");
  $('input[name="date"]').mask("99.99.9999");
  $('input[name="discount"]').mask("99");
  $('.price_popup input').mask("9?99999999");
  $('input[name="price_date"]').mask("99.99.9999");

  $( function() {
    $( "#accordion" ).accordion({active:''});
  } );
  
  $( function() {
    $( "#accordion" ).accordion();
  } );