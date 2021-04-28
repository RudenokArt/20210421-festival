<?php include_once 'header.php' ?>
<?php include_once 'php/user_profile-get_data.php'; ?>
<?php include_once 'php/get_meta.php' ?>
<?php include_once 'php/user_category_get_data.php'; ?>
<?php include_once 'php/user_orchestra_get.php'; ?>
<link rel="stylesheet" href="css/user.css?<?php echo time(); ?>">
<?php if (!$_SESSION['login']) {
  ?><script>document.location.href='index.php';</script><?
} ?>
<button name="exit_button" class="extit_button">
  <i class="fa fa-sign-out" aria-hidden="true"></i>
  Выход
</button>
<img src="img/main.jpg" alt="MiraMar" class="main_img">

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
            type="text" name="email" readonly>
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
  <div class="tab_item">
    <div class="tab_item-title">
      <div>Скидка %:</div>
    </div>
    <div class="tab_item-content">
      <input value="<?php echo getUserData()['discount'] ?>"
      type="text" name="discount">
    </div>
  </div>
  <div class="tab_item">
    <div class="tab_item-title">
      <div>Выбор пакета:</div>
    </div>
    <div class="tab_item-content">
      <div class="select_wrapper">
        <select name="package">
          <option  <?php 
          if (getUserData()['package']=='maxi') {
            echo 'selected="selected"';
          } ?>   >
          maxi
        </option>
        <option  <?php 
        if (getUserData()['package']=='midi') {
          echo 'selected="selected"';
        } ?>   >
        midi
      </option>
      <option  <?php 
      if (getUserData()['package']=='mini') {
        echo 'selected="selected"';
      } ?>   >
      mini
    </option>
    <option  <?php 
      if (getUserData()['package']=='junior') {
        echo 'selected="selected"';
      } ?>   >
      junior
    </option>
    <option  <?php 
      if (getUserData()['package']=='study') {
        echo 'selected="selected"';
      } ?>   >
      study
    </option>
  </select>
</div>
</div>
</div>
<div class="tab_item" style="display: none;">
  <div class="tab_item-content">
    <input type="text" value="<?php echo $_SESSION['id']; ?>" name="user_id">
  </div>
</div>
<div class="tab_item">
  <div class="tab_item-title">
    <div>Сертификат:</div>
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

<div id="tabs-2">
  <form method="post" action="php/user_category_set_data.php">
    <div class="tab_content">
      <div class="tab_item">
        <div class="tab_item-title">
          <div>Мастер-классы:</div>
        </div>
        <div class="tab_item-content">
          <?php foreach (masterlList('master') as $key => $value) {?>
            <table>
              <tr>
                <td>
                  <label>
                    <input name="<?php echo $value['master'] ?>" 
                    <?php if(in_array($value['id'],getUserCategory())){?>
                      checked="checked"
                    <?php  } ?>
                    value="<?php echo $value['id'] ?>" type="checkbox">
                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                    <?php echo $value['master'] ?>
                  </label>
                </td>
              </tr>
            </table>
          <?php  } ?>
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_item-title">
          <div>Номинации под CD:</div>
        </div>
        <div class="tab_item-content">
          <?php foreach (masterlList('cd') as $key => $value) {?>
            <table>
              <tr>
                <td>
                  <label>
                    <input name="<?php echo $value['cd'] ?>" 
                    <?php if(in_array($value['id'],getUserCategory())){?>
                      checked="checked"
                    <?php  } ?>
                    value="<?php echo $value['id'] ?>" type="checkbox">
                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                    <?php echo $value['cd'] ?>
                  </label>
                </td>
              </tr>
            </table>
          <?php  } ?>
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_item-title">
          <div>Номинации под ОРКЕСТР:</div>
        </div>
        <div class="tab_item-content">
          <?php foreach (masterlList('orchestra') as $key => $value) {?>
            <table>
              <tr>
                <td>
                  <label>
                    <input name="<?php echo $value['orchestra'] ?>" 
                    <?php if(in_array($value['id'],getUserCategory())){?>
                      checked="checked"
                    <?php  } ?>
                    value="<?php echo $value['id'] ?>" type="checkbox">
                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                    <?php echo $value['orchestra'] ?>
                  </label>
                </td>
              </tr>
            </table>
          <?php  } ?>
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_item-title">
          <div>Питание:</div>
        </div>
        <div class="tab_item-content">
          <?php foreach (masterlList('food') as $key => $value) {?>
            <table>
              <tr>
                <td>
                  <label>
                    <input name="<?php echo $value['food'] ?>" 
                    <?php if(in_array($value['id'],getUserCategory())){?>
                      checked="checked"
                    <?php  } ?>
                    value="<?php echo $value['id'] ?>" type="checkbox">
                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                    <?php echo $value['food'] ?>
                  </label>
                </td>
              </tr>
            </table>
          <?php  } ?>
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_item-content">
          <button>
            <i class="fa fa-floppy-o" aria-hidden="true"></i>
            Сохранить <br>список категорий
          </button>
        </div>
      </div>
    </div>
  </form>
</div>

<div id="tabs-3">
  <form action="php/user_file_upload.php" 
  enctype="multipart/form-data" method="post">
  <div class="tab_content">
    <div class="tab_item">
      <div class="tab_item-title">
        <div>КОМПОЗИЦИЯ ПОД CD:</div>
      </div>
      <div class="tab_item-content">
        <div class="tab_content">
          <div class="upload_wrapper">
            <div class="upload_icon">
              <i class="fa fa-cloud-upload" aria-hidden="true"></i>
              <br>
              <span>empty</span>
            </div>
            <input type="file" name="track">
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="tab_item">
        <div class="tab_item-title">
          <div>Номинация:</div>
        </div>
        <div class="tab_item-content">
          <div class="select_wrapper">
            <select name="track_name">
              <?php
              foreach (masterlList('cd') as $key => $value) {?>
                <option value="<?php print_r($value['cd']) ?>">
                  <?php print_r($value['cd']) ?>
                </option>
              <?php  } ?>
            </select>
          </div>
        </div>
        <input type="text" name="user" style="display: none;"
        value="<?php echo getUserData()['id'].'!!'.getUserData()['fio'] ?>">
      </div>
      <div class="tab_item">
        <div class="tab_item-title">
          <div>С точки / вход:</div>
        </div>
        <div class="tab_item-content">
          <div class="select_wrapper">
            <select name="track_type">
              <option value="point">С точки</option>
              <option value="output">Вход</option>
            </select>
          </div>
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_item-content">
          <button>
            <i class="fa fa-upload" aria-hidden="true"></i>
            Отправить <br> файл на сервер
          </button>
        </div>
      </div>
    </div>
  </div>
</form>
<hr>
<form action="php/user_orchestra_set.php" method="post">

  <div class="tab_content">
    <?php  foreach (masterlList('orchestra') as $key => $value) {?>
      <div class="tab_item">
        <div class="tab_item-title">
          <div>
            Композиция для 
            <?php echo $value['orchestra'] ?>
          </div>
        </div>
        <div class="tab_item-content">
          <input type="text"name="<?php echo $value['id'] ?>"
          value="<?php echo getUserOrchestra($value['id'])[0]['orchestra'] ?>">
        </div>
      </div>
    <?php  } ?>
    <div class="tab_item">
      <div class="tab_item-content">
        <button>
          <i class="fa fa-floppy-o" aria-hidden="true"></i>
          Сохранить <br> список композиций
        </button>
      </div>
    </div>
  </div>
</form>


</div>

</div>


<div class="test">
  <?php foreach (getUserOrchestra(41) as $key => $value) {?>
    <br> <?php //print_r($value) ?>
  <?php  } ?>
</div>

<script src="js/user.js"></script>
<?php include_once 'footer.php' ?>
