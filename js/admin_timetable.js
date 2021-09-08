
new Vue ({
  el:'#admin_timetable_page',
  methods: {
    hidePopup: function (e) {
      e.target.parentNode.parentNode.className = 'edit_popup_invisible';
    },
    showPopup: function (e) {
      var arr = e.target.parentNode.childNodes;
      for (var i = 0; i < arr.length; i++) {
        if (arr[i].className =='edit_popup_invisible') {
          arr[i].className = 'edit_popup_visible';
        }
      }
    },
    submitDeleteForm: function (e) {
      e.preventDefault();
      if (confirm("УДАЛИТЬ?")) {
        e.target.parentNode.submit();
      }
    },
    submitEditForm: function (e) {
      var arr = e.target.parentNode.childNodes;
      for (var i = 0; i < arr.length; i++) {
        if (arr[i].tagName == 'FORM') {
          arr[i].submit();
        }
      }
    }
  }
});