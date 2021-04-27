<?php include_once 'header.php' ?>
<?php include_once 'php/user_profile-get_data.php'; ?>
<link rel="stylesheet" href="css/user.css?<?php echo time(); ?>">
<?php if (!$_SESSION['login']) {
  ?><script>document.location.href='index.php';</script><?
} ?>
<button name="exit_button" class="extit_button">
  <i class="fa fa-sign-out" aria-hidden="true"></i>
  Выход
</button>
<img src="img/main.jpg" alt="MiraMar" class="main_img">

<div class="test"></div>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">
      <i class="fa fa-user-o" aria-hidden="true"></i>
    </a></li>
    <li><a href="#tabs-2">
      <i class="fa fa-list" aria-hidden="true"></i>
    </a></li>
    <li><a href="#tabs-3">
      <i class="fa fa-music" aria-hidden="true"></i>
    </a></li>
  </ul>

  <div id="tabs-1">
    <form action="php/user_profile-set_data.php"
    enctype="multipart/form-data" method="post">
    <div class="tab_content">
      <div>
        <div class="tab_item">
          <div class="tab_item-title">
            <div>ФИО или название группы:</div>
          </div>
          <div class="tab_item-content">
            <input value="<?php echo getUserData()['fio'] ?>"
            type="text" name="fio">
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_item-title">
            <div>Дата рождения:</div>
          </div>
          <div class="tab_item-content">
            <input value="<?php echo getUserData()['date'] ?>"
            type="text" name="date">
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_item-title">
            <div>ФОТО:</div>
          </div>
          <div class="tab_item-content">
            <div class="tab_content">
              <div class="upload_wrapper">
                <div class="upload_icon">
                  <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                  <br>
                  <span>empty</span>
                </div>
                <input type="file" name="photo">
              </div>
              <div class="tab_image">
                <img src="user_upload/<?php echo getUserData()['photo']?>" 
                alt="photo">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="tab_item">
          <div class="tab_item-title">
            <div>Email:</div>
          </div>
          <div class="tab_item-content">
            <input value="<?php echo getUserData()['email'] ?>"
            type="text" name="email">
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_item-title">
            <div>Телефон:</div>
          </div>
          <div class="tab_item-content">
            <input value="<?php echo getUserData()['phone'] ?>"
            type="text" name="phone">
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_item-title">
            <div>Страна:</div>
          </div>
          <div class="tab_item-content">
            <input value="<?php echo getUserData()['country'] ?>"
            type="text" name="country">
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_item-title">
            <div>Город:</div>
          </div>
          <div class="tab_item-content">
            <input value="<?php echo getUserData()['city'] ?>"
            type="text" name="city">
          </div>
        </div>
      </div>
      <div>
        <div class="tab_item">
          <div class="tab_item-title">
            <div>Возрастная категория:</div>
          </div>
          <div class="tab_item-content">
            <input value="<?php echo getUserData()['age'] ?>"
            type="text" name="age">
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_item-title">
            <div>Уровень мастертсва:</div>
          </div>
          <div class="tab_item-content">
            <div class="select_wrapper">
              <select name="skill">
                <option  <?php 
                if (getUserData()['skill']=='Профессионалы') {
                  echo 'selected="selected"';
                } ?>   >
                Профессионалы
              </option>
              <option  <?php 
              if (getUserData()['skill']=='Любители начинающие') {
                echo 'selected="selected"';
              } ?>   >
              Любители начинающие
            </option>
            <option  <?php 
            if (getUserData()['skill']=='Любители продолжающие') {
              echo 'selected="selected"';
            } ?>   >
            Любители продолжающие
          </option>
        </select>
      </div>
    </div>
  </div>
  <div class="tab_item">
    <div class="tab_item-title">
      <div>Студия:</div>
    </div>
    <div class="tab_item-content">
      <input value="<?php echo getUserData()['studio'] ?>"
      type="text" name="studio">
    </div>
  </div>
  <div class="tab_item">
    <div class="tab_item-title">
      <div>Руководитель:</div>
    </div>
    <div class="tab_item-content">
      <input value="<?php echo getUserData()['manager'] ?>"
      type="text" name="manager">
    </div>
  </div>
</div>
<div>
  <div class="tab_item" style="display: none;">
    <div class="tab_item-content">
      <input type="text" value="<?php echo $_SESSION['id']; ?>" name="user_id">
    </div>
  </div>

  <div class="tab_item">
    <div class="tab_item-title">
      <div>ФОТО:</div>
    </div>
    <div class="tab_item-content">
      <div class="tab_content">
        <div class="upload_wrapper">
          <div class="upload_icon">
            <i class="fa fa-cloud-upload" aria-hidden="true"></i>
            <br>
            <span>empty</span>
          </div>
          <input type="file" name="certificate">
        </div>
        <div class="tab_image">
          <img src="user_upload/<?php echo getUserData()['certificate']?>" 
          alt="certificate">
        </div>
      </div>
    </div>
  </div>

  <div class="tab_item">
    <div class="tab_item-content">
      <button>
        <i class="fa fa-floppy-o" aria-hidden="true"></i>
        Сохранить <br>настройки профиля
      </button>
    </div>
  </div>
</div>
</div> 
</form>
</div>


<div id="tabs-2">2</div>
<div id="tabs-3">3</div>
</div>


<script src="js/user.js"></script>
<?php include_once 'footer.php' ?>