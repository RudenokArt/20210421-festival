<?php include_once 'header.php' ?>
<?php include_once 'php/get_metadata.php' ?>
<?php if(!$user['login']){?>
  <script>document.location.href='index.php'</script>
<? } ?>
<?php include_once 'php/db_connect.php';
$sql='SELECT * FROM `festival_participant` WHERE `id`='.$user['id'];
$userArr = mysqli_fetch_array($mysqli->query($sql));
?>
<div class="content">
  <div id="tabs">
    <ul>
      <li><a href="#tabs-1">
        <i class="fa fa-user-o" aria-hidden="true"></i>
      </a></li>
      <li><a href="#tabs-2">
        <i class="fa fa-list-ul" aria-hidden="true"></i>
      </a></li>
      <li><a href="#tabs-3">
        <i class="fa fa-music" aria-hidden="true"></i>
      </a></li>
      <li><a href="#tabs-4">
       <i class="fa fa-envelope-o" aria-hidden="true"></i>
     </a></li>
   </ul>
   <div id="tabs-1" class="tabs">
    <div class="tab_container">
      <div>
        <div class="tab_item">
          <div class="tab_content">
            <button name="button_exit">
              <i class="fa fa-sign-out" aria-hidden="true"></i>
              Выход
            </button>
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_title">
            ФОТО:
          </div>
          <div class="tab_content">
            <div class="file_upload">
              <i class="fa fa-cloud-upload" aria-hidden="true"></i>
              <span>empty</span>
              <input type="file" name="photo">
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="tab_item">
          <div class="tab_title">
            ФИО или название группы:
          </div>
          <div class="tab_content">
            <input type="text" name="ФИО" 
            value="<?php echo $userArr['ФИО'] ?>">
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_title">
            Дата рождения(мм/дд/гггг):
          </div>
          <div class="tab_content">
            <input type="text" name="Дата рождения"
            value="<?php echo $userArr['Дата рождения'] ?>">
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_title">
            Возрастная категория:
          </div>
          <div class="tab_content">
            <input type="text" name="Возрастная категория"
            value="<?php echo $userArr['Возрастная категория'] ?>" disabled="disabled">
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_title">
            Уровень мастерства:
          </div>
          <div class="tab_content">
            <div class="select_wrapper">
              <?php $age=$userArr['Уровень мастерства'] ?>
              <select name="Уровень мастерства">
               <option
               <?php echo ($age=='Профессионалы')?'selected="selected"':''; ?> 
               value="Профессионалы" >
                Профессионалы
               </option>
               <option
               <?php echo ($age=='Любители - начинающие')?'selected="selected"':''; ?>  
               value="Любители - начинающие">
                Любители - начинающие
               </option>
               <option 
               <?php echo ($age=='Любители - продолжающие')?'selected="selected"':''; ?>
               value="Любители - продолжающие">
                Любители - продолжающие
               </option>
             </select>
           </div>
         </div>
       </div>
     </div>
     <div>
       <div class="tab_item">
        <div class="tab_title">
          Email:
        </div>
        <div class="tab_content">
          <input type="text" name="email"
          value="<?php echo $userArr['email'] ?>">
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_title">
          Телефон:
        </div>
        <div class="tab_content">
          <input type="text" name="Телефон" 
          value="<?php echo $userArr['Телефон'] ?>">
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_title">
          Страна:
        </div>
        <div class="tab_content">
          <input type="text" name="Страна"
          value="<?php echo $userArr['Страна'] ?>">
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_title">
          Город:
        </div>
        <div class="tab_content">
          <input type="text" name="Город" 
          value="<?php echo $userArr['Город'] ?>" >
        </div>
      </div>
    </div>
    <div>
     <div class="tab_item">
      <div class="tab_title">
        Студия:
      </div>
      <div class="tab_content">
        <input type="text" name="Студия" 
        value="<?php echo $userArr['Студия'] ?>">
      </div>
    </div>
    <div class="tab_item">
      <div class="tab_title">
        Руководитель:
      </div>
      <div class="tab_content">
        <input type="text" name="Руководитель"
        value="<?php echo $userArr['Руководитель'] ?>">
      </div>
    </div>
    <div class="tab_item">
      <div class="tab_content">
        <input type="text" name="id" disabled="disabled" 
        value="<?php echo $userArr['id'] ?>">
      </div>
    </div>
  </div>
</div>    
</div>
<div id="tabs-2"  class="tabs">
  <div class="tab_container">
    <div>
      <div class="tab_item">
        <div class="tab_title">
          Сертификат:
        </div>
        <div class="tab_content">
          <div class="select_wrapper">
            <?php $cert=$userArr['Сертификат'] ?>
            <select name="Сертификат">
              <option <?php echo ($cert=='Нет')?'selected="selected"':''; ?> 
              value="Нет">
                Нет
              </option>
              <option <?php echo ($cert=='Да')?'selected="selected"':''; ?>
              value="Да">
                Да
              </option>
            </select>
          </div>
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_title">
          Размер скидки:
        </div>
        <div class="tab_content">
          <input type="text" name="Скидка"
          value="<?php echo $userArr['Скидка'] ?>">
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_title">
          Пакет:
        </div>
        <div class="tab_content">
          <div class="select_wrapper">
            <?php $pack=$userArr['Пакет'] ?>
            <select name="Пакет">
              <?php foreach ($packageArr as $key => $value) {?>
                <option <?php echo ($pack==$value)?'selected="selected"':''; ?> >
                  <?php echo $value; ?>
                </option>
              <?php }  ?>
            </select>
          </div>
        </div>
      </div> 
    </div>
    <div class="tab_item">
      <div class="tab_title">
        Мастер-классы:
      </div>
      <div class="tab_content">
        <?php foreach ($masterArr as $key => $value) { ?>
          <label class="checkbox_label">
            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
            <input type="checkbox" name="master_class"
            <?php echo ($userArr[$value])?'checked=checked':''; ?> 
            value="<?php echo $value ?>">
            <?php echo $value ?>
          </label>
        <?php } ?>
      </div>
    </div>
    <div class="tab_item">
      <div class="tab_title">
        Номинации под CD:
      </div>
      <div class="tab_content">
        <?php foreach ($cdArr as $key => $value) {?>
          <label class="checkbox_label">
            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
            <input type="checkbox" name="nomination_cd"
            <?php echo ($userArr[$value])?'checked=checked':''; ?> 
            value="<?php echo $value; ?>"> 
            <div><?php echo $value; ?></div>
          </label>
        <?php }  ?>
      </div>
    </div> 
    <div class="tab_item">
      <div class="tab_title">
        Номинации под оркестр:
      </div>
      <div class="tab_content">
        <?php foreach ($orchestraArr as $key => $value) {?>
          <label class="checkbox_label">
            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
            <input type="checkbox" name="nomination_orchestra"
            <?php echo ($userArr[$value])?'checked=checked':''; ?> 
            value="<?php echo $value; ?>">
            <div><?php echo $value; ?></div>
          </label>
        <?php }  ?>
      </div>
    </div> 
    <div class="tab_item">
      <div class="tab_title">
        Питание:
      </div>
      <div class="tab_content">
        <?php foreach ($foodArr as $key => $value) {?>
          <label class="checkbox_label">
            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
            <input type="checkbox" name="food" 
            <?php echo ($userArr[$value])?'checked=checked':''; ?>
            value="<?php echo $value; ?>"> 
            <div><?php echo $value; ?></div>
          </label>
        <?php }  ?>
      </div>
    </div> 
  </div>
</div>
<div id="tabs-3"  class="tabs">
  <div class="tab_container">
    <div>
      <div class="tab_item">
        <div class="tab_title">
          Выход под CD:
        </div>
        <div class="tab_content">
          <div class="select_wrapper">
            <?php $point=$userArr['С точки (вход)'] ?>
            <select name="С точки (вход)">
              <option 
              <?php echo ($point=='С точки')?'selected="selected"':''; ?>
              value="С точки">
                С точки
              </option>
              <option 
              <?php echo ($point=='Вход')?'selected="selected"':''; ?>
              value="Вход">
                Выход
              </option>
            </select>
          </div>
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_title">
          Коментарий:
        </div>
        <div class="tab_content">
          <textarea value="<?php echo $userArr['Коментарий'] ?>" 
            name="Коментарий"></textarea>
        </div>
      </div>
    </div>
    <div class="orchestra_input-box">
      <?php foreach ($orchestraArr as $key => $value) { ?>
        <div class="tab_item">
          <div class="tab_title">
            Трек для <?php echo $value ?>
          </div>
          <div class="tab_content">
            <input value="<?php echo $userArr[$value] ?>"
             type="text" name="<?php echo $value ?>">
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <div class="tab_container">
    <?php foreach ($cdArr as $key => $value) { ?>
      <div class="tab_item">
        <div class="tab_title">
          Трек для <?php echo $value ?>
        </div>
        <div class="tab_content">
          <div class="file_upload">
            <i class="fa fa-cloud-upload" aria-hidden="true"></i>
            <span>empty</span>
            <input type="file" name="<?php echo $value ?>">
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<div id="tabs-4"  class="tabs">
  <div class="tab_item">
    <div class="tab_content">
      <button name="save_data">
        <i class="fa fa-floppy-o" aria-hidden="true"></i>
        Сохранить и отправить данные администратору
      </button>
    </div>
  </div>
  
</div>
</div>
</div>


<script src="js/participant.js?<?php echo time() ?>"></script>
<?php include_once 'footer.php' ?>