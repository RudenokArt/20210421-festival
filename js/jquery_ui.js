  $( function() {
    $( "#tabs" ).tabs();
  } );

  $( function() {
    $( 'input[name="date"]' ).datepicker({dateFormat: "dd.mm.yy"});
  } );

  $('input[name="phone"]').mask("+7(999) 999-9999");
  $('input[name="date"]').mask("99.99.9999");

    $( function() {
    $( "#accordion" ).accordion({active:''});
  } );