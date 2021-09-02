// ========== JUDGE LIST ==========

var judge_delete = new Vue({
  el:'#judge_table',
  methods: {
    deleteMessage: function (e) {
      if (confirm('Удалить?')) {
        e.target.parentNode.submit();
      }
    },
    hideJudgeEditPopup: function (e) {
      e.target.parentNode.parentNode.className = 'wrapper_edit_form';
    },
    showJudgeEditPopup: function (e) {
      e.target.parentNode.childNodes[0].className = 'wrapper_edit_form-active';
    },
    editFormSubmit: function (e) {
      e.target.parentNode.childNodes[0].submit();
    }
  }
});