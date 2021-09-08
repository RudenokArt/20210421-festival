  $( function() {
    $( "#tabs" ).tabs();
  } );

  $( function() {
    $( 'input[name="date"]' ).datepicker({
      dateFormat: "dd.mm.yy",
      changeYear: true,
    });
  } );

  $( function() {
    $( 'input[name="price_date"]' ).datepicker({dateFormat: "yy-mm-dd"});
  } );

  $( function() {
    $( 'input[name="payment_date"]' ).datepicker({dateFormat: "yy-mm-dd"});
  } );

  $( function() {
    $('input[name="festival_add_new_date"]' ).datepicker({dateFormat: "yy-mm-dd"});
    $('input[name="festival_date_edit"]' ).datepicker({dateFormat: "yy-mm-dd"});
  } );

  $('input[name="phone"]').mask("+7(999) 999-9999");
  $('input[name="date"]').mask("99.99.9999");
  $('input[name="discount"]').mask("9?99");
  $('.price_popup input').mask("9?99999999");
  $('input[name="price_date"]').mask("9999-99-99");
  $('input[name="payment_date"]').mask("9999-99-99");
  $('input[name="payment_amount"]').mask("9?99999999");

  $( function() {
    $( "#accordion" ).accordion({active:''});
  } );
  
  $( function() {
    $( "#accordion" ).accordion();
  } );