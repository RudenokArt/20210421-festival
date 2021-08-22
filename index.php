<?php include_once 'header.php'; ?>
<link rel="stylesheet" href="css/index.css?<?php echo time() ?>">
<?php if ($_SESSION['login']) {
  ?><script>document.location.href='user.php';</script><?php
} ?>

<img src="img/main.jpg" alt="MiraMar" class="main_img">
<div class="popup_wrapper">
  <div class="popup">
    <div id="tabs">
      <ul>
        <li><a href="#tabs-1"><div>Вход</div></a></li>
        <li><a href="#tabs-2"><div>Регистрация</div></a></li>
      </ul>
      <div id="tabs-1">
        <form action="" id="log_form">
          <div>Email:</div>
          <div>
           <input type="text" name="email">
         </div>
         <div>
          Пароль:
        </div>
        <div>
         <input type="text" name="password">
       </div>
     </form>
     <div>
      <button id="log_button">
        <i class="fa fa-sign-in" aria-hidden="true"></i>
        Вход
      </button>
    </div>
    <div class="password_recovery">
      Забыли пароль?
    </div>
  </div>
  <div id="tabs-2">
   <form action="" id="reg_form">
    <div>Email:</div>
    <div>
     <input type="text" name="email">
   </div>
   <div>
    Пароль:
  </div>
  <div>
   <input type="text" name="password">
 </div>
 <div>
  Подтверждение пароля:
</div>
<div>
 <input type="text" name="password">
</div>
</form>
<div>
 <button id="reg_button">
  <i class="fa fa-check" aria-hidden="true"></i>
  Регистрация
</button>
</div>
</div>
</div>
</div>
</div>

<script src="js/index.js?<?php echo time() ?>"></script>
<?php include_once 'footer.php'; ?>

