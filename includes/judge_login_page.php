<link rel="stylesheet" href="css/index.css?<?php echo time() ?>">
<img src="img/main.jpg" alt="MiraMar" class="main_img">
<div class="popup_wrapper">
  <div class="popup">
    <div id="tabs">
      <ul>
        <li><a href="#tabs-1"><div>Log in</div></a></li>
        <li><a href="#tabs-2"><div>Sign in</div></a></li>
      </ul>
      <div id="tabs-1">
        <div class="warning">
          <?php echo user_login()[1] ?>
        </div>
        <form action="judge.php#tabs-1" method="post" id="login_form">
          <input type="hidden" name="user_login" value="true">
          <div>Email:</div>
          <div>
            <input type="text" name="email" v-model.trim="email">
          </div>
          <div>
            Password:
          </div>
          <div>
           <input type="text" name="password" v-model.trim="password">
         </div>
         <div>
          <button v-on:click.prevent="check_form">
            <i class="fa fa-sign-in" aria-hidden="true"></i>
            Log in
          </button>
        </div>
      </form>
    </div>
    <div id="tabs-2">
      <div class="warning">
          <?php print_r(user_signin()[1]) ?>
        </div>
     <form action="judge.php#tabs-2" method="post" id="signin_form">
      <input type="hidden" name="user_signin">
      <div>Email:</div>
      <div>
       <input type="text" name="email" v-model.trim="email" >
     </div>
     <div>
      Password:
    </div>
    <div>
     <input type="text" name="password" v-model.trim="password">
   </div>
   <div>
    Confirm password:
  </div>
  <div>
   <input type="text" name="password" v-model.trim="confirm_password">
 </div>
 <div>
   <button id="reg_button" v-on:click.prevent="check_form">
    <i class="fa fa-check" aria-hidden="true"></i>
    Sigin in
  </button>
</div>
</form>
</div>
</div>
</div>
</div>