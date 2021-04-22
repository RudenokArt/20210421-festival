<?php include_once 'header.php' ?>
<?php 
$divisionArr=[ 'Ориентал Классика CD',  'Беледи/Шааби CD',
'Египетский Фольклор CD','Неегипетский Фольклор CD',
'Ориентал Классика ОРКЕСТР','Беледи/импровизация + Табла соло ОРКЕСТР',
'Беледи/Шааби ОРКЕСТР','Показательное выступление ОРКЕСТР',
'Название композиции  под оркестр',];
$packageArr=['maxi','midi','mini','junior','study',];
$foodArr=[
  'пятница обед 1','пятница обед 2','суббота обед 1','суббота обед 2',
  'воскресенье обед 1','воскресенье обед 2',];
  ?>


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
          <i class="fa fa-cloud-upload" aria-hidden="true"></i>
        </a></li>
        <li><a href="#tabs-4">
         <i class="fa fa-envelope-o" aria-hidden="true"></i>
       </a></li>
     </ul>
     <div id="tabs-1">
      <div class="tab_container">
        <div class="tab_item">
          <div class="tab_title">
            ФИО или название группы:
          </div>
          <div class="tab_content">
            <input type="text">
          </div>
        </div>
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
            Дата рождения:
          </div>
          <div class="tab_content">
            <input type="text" name="date">
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_title">
            Возрастная категория:
          </div>
          <div class="tab_content">
            <input type="text" name="age" value="Юниоры" disabled="disabled">
          </div>
        </div>
        <div class="tab_item">
          <div class="tab_title">
            Уровень мастерства:
          </div>
          <div class="tab_content">
            <div class="select_wrapper">
              <select name="scill">
               <option value="skil_1">Профессионалы</option>
               <option value="skil_2">Любители - начинающие</option>
               <option value="skil_3">Любители - продолжающие</option>
             </select>
           </div>
         </div>
       </div>
       <div class="tab_item">
        <div class="tab_title">
          Телефон:
        </div>
        <div class="tab_content">
          <input type="text" name="phone">
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_title">
          Страна:
        </div>
        <div class="tab_content">
          <input type="text" name="country">
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_title">
          Город:
        </div>
        <div class="tab_content">
          <input type="text" name="city">
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_title">
          Студия:
        </div>
        <div class="tab_content">
          <input type="text" name="studio">
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_title">
          Руководитель:
        </div>
        <div class="tab_content">
          <input type="text" name="manager">
        </div>
      </div>
    </div>    
  </div>

  <div id="tabs-2">
    <div class="tab_container">
     <div class="tab_item">
      <div class="tab_title">
        Отделение:
      </div>
      <div class="tab_content">
        <?php foreach ($divisionArr as $key => $value) {?>
          <label class="checkbox_label">
            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
            <input type="checkbox"> 
            <div><?php echo $value; ?></div>
          </label>
        <?php }  ?>
      </div>
    </div> 
    <div class="tab_item">
      <div class="tab_title">
        Мастер-классы:
      </div>
      <div class="tab_content">
        <?php for ($i=0; $i < 9; $i++) { ?>
         <label class="checkbox_label">
          <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
          <input type="checkbox"> 
          Мастер-класс <?php echo $i ?>
        </label>
      <?php } ?>
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
          <input type="checkbox"> 
          <div><?php echo $value; ?></div>
        </label>
      <?php }  ?>
    </div>
  </div> 
  <div>
    <div class="tab_item">
      <div class="tab_title">
        Сертификат:
      </div>
      <div class="tab_content">
        <div class="select_wrapper">
          <select name="discount">
            <option value="false">Нет</option>
            <option value="true">Да</option>
          </select>
        </div>
      </div>
    </div>
    <div class="tab_item">
      <div class="tab_title">
        Размер скидки:
      </div>
      <div class="tab_content">
        <input type="text" name="discount_value">
      </div>
    </div>
    <div class="tab_item">
      <div class="tab_title">
        Пакет:
      </div>
      <div class="tab_content">
        <div class="select_wrapper">
          <select name="package">
            <?php foreach ($packageArr as $key => $value) {?>
              <option>
                <?php echo $value; ?>
              </option>
            <?php }  ?>
          </select>
        </div>
      </div>
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
            <select name="cd_output">
              <option value="false">С точки</option>
              <option value="true">Выход</option>
            </select>
          </div>
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_title">
          Коментарий:
        </div>
        <div class="tab_content">
          <textarea></textarea>
        </div>
      </div>
    </div>
    <div>
      <div class="tab_item">
        <div class="tab_title">
          ФОТО:
        </div>
        <div class="tab_content">
          <div class="file_upload">
            <i class="fa fa-cloud-upload" aria-hidden="true"></i>
            <span>empty</span>
            <input type="file">
          </div>
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_title">
          ТРЕК:
        </div>
        <div class="tab_content">
          <div class="file_upload">
            <i class="fa fa-cloud-upload" aria-hidden="true"></i>
            <span>empty</span>
            <input type="file">
          </div>
        </div>
      </div>
    </div>
  </div>
  

</div>
<div id="tabs-4">
  <button>
    <i class="fa fa-floppy-o" aria-hidden="true"></i>
    Сохранить и отправить данные администратору
  </button>
</div>
</div>

</div>






<?php include_once 'footer.php' ?>