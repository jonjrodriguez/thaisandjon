(function($) {
  
  $(document).foundation('forms');
  
  $("#rsvp_form").parsley({
    errorClass: 'error',
    errors: {
      classHandler: function (elem, isRadioOrCheckbox) {
        if(isRadioOrCheckbox) {
          return elem.parent().parent();
        }
      },
      errorsWrapper: "<div></div>",
      errorElem: "<p></p>"
    }
  });

})(jQuery);