<?php include_once 'header.php' ?>
<?php include_once 'php/get_metadata.php' ?>
<img src="img/main.jpg" class="main_img" alt=" ">
  <div class="content">
    <div id="tabs">
      <ul>
        <li><a href="#tabs-1">
          <i class="fa fa-user-o" aria-hidden="true"></i>
        </a></li>
        <li><a href="#tabs-2">
          <i class="fa fa-money" aria-hidden="true"></i>
        </a></li>
        <li><a href="#tabs-3">
          <i class="fa fa-music" aria-hidden="true"></i>
        </a></li>
        <li><a href="#tabs-4">
         <i class="fa fa-envelope-o" aria-hidden="true"></i>
       </a></li>
     </ul>
     <div id="tabs-1">
      <div class="tab_container">
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
        <div>
          <div class="tab_item">
            <div class="tab_title">
              ФИО или название группы:
            </div>
            <div class="tab_content">
              <input type="text" name="ФИО">
            </div>
          </div>
          <div class="tab_item">
            <div class="tab_title">
              Дата рождения(мм/дд/гггг):
            </div>
            <div class="tab_content">
              <input type="text" name="Дата рождения">
            </div>
          </div>
          <div class="tab_item">
            <div class="tab_title">
              Возрастная категория:
            </div>
            <div class="tab_content">
              <input type="text" name="Возрастная категория"
              value="Юниоры" disabled="disabled">
            </div>
          </div>
          <div class="tab_item">
            <div class="tab_title">
              Уровень мастерства:
            </div>
            <div class="tab_content">
              <div class="select_wrapper">
                <select name="Уровень мастерства">
                 <option value="Профессионалы">Профессионалы</option>
                 <option value="Любители - начинающие">Любители - начинающие</option>
                 <option value="Любители - продолжающие">Любители - продолжающие</option>
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
            <input type="text" name="email">
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_title">
            Телефон:
          </div>
          <div class="tab_content">
            <input type="text" name="Телефон">
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_title">
            Страна:
          </div>
          <div class="tab_content">
            <input type="text" name="Страна">
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_title">
            Город:
          </div>
          <div class="tab_content">
            <input type="text" name="Город">
          </div>
        </div>
      </div>
      <div>
       <div class="tab_item">
        <div class="tab_title">
          Студия:
        </div>
        <div class="tab_content">
          <input type="text" name="Студия">
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_title">
          Руководитель:
        </div>
        <div class="tab_content">
          <input type="text" name="Руководитель">
        </div>
      </div>
    </div>
  </div>    
</div>
<div id="tabs-2">
  <div class="tab_container">
    <div>
      <div class="tab_item">
        <div class="tab_title">
          Сертификат:
        </div>
        <div class="tab_content">
          <div class="select_wrapper">
            <select name="Сертификат">
              <option value="Нет">Нет</option>
              <option value="Да">Да</option>
            </select>
          </div>
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_title">
          Размер скидки:
        </div>
        <div class="tab_content">
          <input type="text" name="Скидка">
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_title">
          Пакет:
        </div>
        <div class="tab_content">
          <div class="select_wrapper">
            <select name="Пакет">
              <?php foreach ($packageArr as $key => $value) {?>
                <option><?php echo $value; ?></option>
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
            <input type="checkbox" name="food" value="<?php echo $value; ?>"> 
            <div><?php echo $value; ?></div>
          </label>
        <?php }  ?>
      </div>
    </div> 
  </div>
</div>
<div id="tabs-3">
  <div class="tab_container">
    <div>
      <div class="tab_item">
        <div class="tab_title">
          Выход под CD:
        </div>
        <div class="tab_content">
          <div class="select_wrapper">
            <select name="С точки (вход)">
              <option value="С точки">С точки</option>
              <option value="Вход">Выход</option>
            </select>
          </div>
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_title">
          Коментарий:
        </div>
        <div class="tab_content">
          <textarea name="comment"></textarea>
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
            <input type="text" name="<?php echo $value ?>">
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
<div id="tabs-4">
  <button name="save_data">
    <i class="fa fa-floppy-o" aria-hidden="true"></i>
    Сохранить и отправить данные администратору
  </button>
</div>
</div>
</div>






<?php include_once 'footer.php' ?>