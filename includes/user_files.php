    <div class="tab_content">
      <div>
       <form action="php/user_file_upload.php" 
       enctype="multipart/form-data" method="post"> 
       <div class="tab_item">
        <div class="tab_item-title">
          <div>КОМПОЗИЦИЯ ПОД CD:</div>
        </div>
      </div> 
      <div class="tab_item">
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
        <input value="<?php echo getUserData()['id'].'!!'.getUserData()['fio']
        .'!!'.getUserData()['age'].'!!'.getUserData()['skill']  ?>"
        type="text" name="user" style="display: none;" >
      </div>
      <div class="tab_item">
        <div class="tab_item-title">
          <div>С точки / выход:</div>
        </div>
        <div class="tab_item-content">
          <div class="select_wrapper">
            <select name="track_type">
              <option value="point">С точки</option>
              <option value="output">Выход</option>
            </select>
          </div>
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_item-title"></div>
        <div class="tab_item-content">
          <button>
            <i class="fa fa-upload" aria-hidden="true"></i>
            Отправить <br> файл на сервер
          </button>
        </div>
      </div>
    </form>
  </div>

  <div>
    <div class="tab_item">
      <div class="tab_item-title">
        <div>Загруженные композиции:</div>
      </div>
      <div class="tab_item-list">
        <?php include_once 'php/users_files_list.php' ?>
        <?php foreach (userFilesList(getUserData()['id']) as $keyFile => $valueFile) {?>
          <a href="user_upload/<?php echo $valueFile ?>" download >
            <?php echo $valueFile ?>
          </a>
          <br><br>
        <?php } ?>
      </div>
    </div>


  </div>

  <div>
    <form action="php/user_orchestra_set.php" method="post" class="ajax_form">
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
            value="<?php echo getUserOrchestra($value['id'])[0]['orchestra'] ?>"
            class="orchestraInput" >
          </div>
        </div>
      <?php  } ?>
    </form>
    <div class="tab_item">
      <div class="tab_item-title"></div>
      <div class="tab_item-content">
        <button name="category_set_data">
          <i class="fa fa-floppy-o" aria-hidden="true"></i>
          Сохранить <br> список композиций
        </button>
      </div>
    </div>
  </div>

</div>