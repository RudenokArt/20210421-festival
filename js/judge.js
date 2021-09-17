var login_form = new Vue ({
  el:'#login_form',
  data:{
    email:'',
    password:'',
  },
  methods:{
    check_form: function () {
      if (this.email == '') {
        alert('Enter the email!');
      } else if (this.password == '') {
        alert('Enter the password!'); 
      } else {
        document.getElementById('login_form').submit();
      }
    },
  }
});

var signin_form = new Vue({
  el:'#signin_form',
  data: {
    email: '',
    password: '',
    confirm_password: '',
  },
  methods:{
    check_form: function(){
      if (!this.email_validate()) {
        alert('Enter a valid email!');

      } else if (!this.password_validate()) {
        alert('The password must contain from 6 to 20'+
          'characters, numbers, lowercase and uppercase letters!');
      }
      else if (this.password != this.confirm_password) {
        alert('The password confirmation does not match!');
      }
      else {
        document.getElementById('signin_form').submit();
      }
    },
    email_validate: function () {
      var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
      if(reg.test(this.email) == false) {
        return false;
      }else {return true;}
    },
    password_validate: function(){
      var reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
      if(reg.test(this.password) == false) {
        return false; 
      } 
      return true;
    }
  }
});


new Vue ({
  el:'#mark_table',
  methods:{
    popupHide: function (e) {
      e.target.parentNode.parentNode.parentNode.style.display = 'none';
    },
    popupShow: function (e) {
      var arr = e.target.parentNode.childNodes;
      arr[arr.length-1].childNodes[0].style.display = 'block';
    }
  }

})