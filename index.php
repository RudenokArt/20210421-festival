<?php include_once 'header.php' ?>
<?php if($user['login']){
  ?><script>document.location.href='participant.php'</script><?
} ?>

<div class="popup_wrapper">
  <div class="popup">
    <div id="tabs">
      <ul>
        <li><a href="#tabs-1">Авторизация</a></li>
        <li><a href="#tabs-2">Регистрация</a></li>
      </ul>
      <div id="tabs-1" class="tabs">
        <form class="login_form">
          <div class="tab_item">
            <div class="tab_title">
              Email:
            </div>
            <div class="tab_content">
              <input type="text" name="email">
            </div>
          </div>
          <div class="tab_item">
            <div class="tab_title">
              Пароль:
            </div>
            <div class="tab_content">
              <input type="password" name="password">
            </div>
          </div>
        </form>
        <div class="tab_item">
          <div class="tab_content">
            <button name="login_button">
              Вход
            </button>
          </div>
        </div>
        <div class="warning"></div>
      </div>
      <div id="tabs-2" class="tabs">
        <form class="reg_form">
          <div class="tab_item">
            <div class="tab_title">
              Email:
            </div>
            <div class="tab_content">
              <input type="text" name="email">
            </div>
          </div>
          <div class="tab_item">
            <div class="tab_title">
              Пароль:
            </div>
            <div class="tab_content">
              <input type="password" name="password">
            </div>
          </div>
          <div class="tab_item">
            <div class="tab_title">
              Подтверждение пароля:
            </div>
            <div class="tab_content">
              <input type="password" name="confirm_password">
            </div>
          </div>
        </form>
        <div class="tab_item">
          <div class="tab_content">
            <button name="reg_button">
              Регистрация
            </button>
          </div>
        </div>
        <div class="warning"></div>
      </div>
    </div>
  </div>
</div>
<script src="js/index.js?<?php echo time() ?>"></script>
<?php include_once 'footer.php' ?>