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
            <div>ФОТО В ОБРАЗЕ:</div>
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
                <img src="user_upload/<?php echo getUserData()['photo'].'?'.time()?>" 
                alt="photo">
              </div>
            </div>
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_item-title">
            <div>Категория участника:<br>(Участник / Группа)</div>
          </div>
          <div class="tab_item-content">
            <div class="select_wrapper">
              <select name="participant_category">
                <option value="participant">Участник</option>
                <option <?php if (getUserData()['package']=='group') {?>
                  selected="seleced"
                <?php } ?>
                value="group">Группа</option>
              </select>
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
            type="text" name="age" readonly >
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_item-title">
            <div>Уровень мастерства:</div>
          </div>
          <div class="tab_item-content">
            <div class="select_wrapper">
              <select name="skill">
                <option  <?php if (getUserData()['skill']=='Профессионалы') {
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
  <div class="tab_item">
    <div class="tab_item-title">
      <div>Комментарий:</div>
    </div>
    <div class="tab_item-content">
      <textarea name="coment"><?php echo getUserData()['coment'] ?></textarea>
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
  <?php include_once 'php/package_get_data.php' ?>
  <div class="tab_item">
    <div class="tab_item-title">
      <div>Выбор пакета:</div>
    </div>
    <div class="tab_item-content">
      <?php $userCategoryArr=[]; $userCategoryArr[getUserData()['id']]=[] ?>
      <div class="select_wrapper">
        <select name="package">
          <?php foreach ($packageArr as $key => $value) { ?>
            <option  <?php 
            if (getUserData()['package']==$value) {
              echo 'selected="selected"';
              array_push($userCategoryArr[getUserData()['id']],
                [$value,'package']);
              } ?>   >
              <?php echo $value; ?>
            </option>
            <option class="group" value="group" style="display:none;"></option>
          <?php } ?>
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
          <img src="user_upload/<?php echo getUserData()['certificate'].'?'.time()?>" 
          alt="certificate">
        </div>
      </div>
    </div>
  </div>
  <div class="tab_item">
    <div class="tab_item-title"></div>
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