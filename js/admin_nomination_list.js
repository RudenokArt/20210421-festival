new Vue ({
  el:'#admin_nomination_list_add_item',
  data:{
    popup_class:'admin_nomination_list_add_item_popup',
  },
  methods: {
    show_popup: function (e) {
      e.preventDefault();
      this.popup_class = 'admin_nomination_list_add_item_popup-active';
    },
    hide_popup: function (e) {
      e.preventDefault();
      this.popup_class = 'admin_nomination_list_add_item_popup';
    },
    search_items: function (e) {
      var search = e.target.value.trim();
      var arr = document.getElementsByClassName('admin_nomination_list_add_item_popup_form_list_item');
      for (var i = 0; i < arr.length; i++) {
        arr[i].style.display = 'block';
      }
      for (var i = 0; i < arr.length; i++) {
        if (!arr[i].innerText.toLowerCase().includes(search.toLowerCase())) {
          arr[i].style.display = 'none';
        }
      }
    },
    select_item: function (item_id) {
      document.getElementById('nomination_list_'+item_id).selected=true;
      this.popup_class = 'admin_nomination_list_add_item_popup';
    },
  }
});