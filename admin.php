<?php include_once 'header.php'; ?>
<link rel="stylesheet" href="css/admin.css?<?php echo time(); ?>">
<?php include_once 'php/users_get_data.php' ?>
<?php include_once 'php/get_meta.php' ?>
<?php include_once 'php/category_get_data.php' ?>
<?php include_once 'php/users_get_category.php' ?>
<?php include_once 'php/users_files_list.php' ?>
<?php include_once 'php/package_get_data.php' ?>
<?php include_once 'php/price_get_data.php' ?>

<?php $profileMeta=array_keys(get_users_data()[0]); ?>
<?php $profileData=get_users_data(); ?>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Участники</a></li>
    <li><a href="#tabs-2">Судьи</a></li>
    <li><a href="#tabs-3">Метаданные</a></li>
    <li><a href="#tabs-4">Прайсы</a></li>
  </ul>

  <div id="tabs-1"><?php include_once 'includes/admin_usertable.php' ?></div>

  <div id="tabs-2">
    <div class="test">
      Далеко-далеко за словесными, горами в стране гласных и согласных живут рыбные тексты. Переписали, запятой города имеет по всей жаренные родного реторический заманивший маленькая, подзаголовок залетают дорогу, вдали рукопись. Города, рыбными, имеет. Грустный, речью!
    </div>
  </div>

  <div id="tabs-3"><?php include_once 'includes/admin_metadata.php'?></div>

  <div id="tabs-4">

    <div class="add_pice">
     <button name="add_pice">
       <i class="fa fa-plus" aria-hidden="true"></i>
       Добавить прайс
     </button>
   </div>

   <div id="accordion">
    <?php foreach (priceGetData() as $key => $value) { ?>
     <h3>
      Прайс от: <?php echo $key ?>
    </h3>
    <div>
      <div class="price_item">
        <div>
         <form action="">
          <button title="Сохранить прайс">
            <i class="fa fa-floppy-o" aria-hidden="true"></i>
          </button>
        </form> 
      </div>
      <div>
       <form action="php/price_delete.php" method="post">
        <input type="hidden" name="price_delete"
        value="<?php print_r($key) ?>">
        <button title="Удалить прайс" name="price_delete"
        value="<?php print_r($key) ?>">
        <i class="fa fa-trash" aria-hidden="true"></i>
      </button>
    </form> 
  </div>
</div>
<div class="price_item">

  <div>
    <table>
      <tr><th colspan="2">Мастер-классы</th></tr>
      <?php foreach ($value as $subkey => $subvalue) {?>
        <?php if ($subvalue[1]=='master') { ?>
          <tr>
            <td><?php echo $subvalue[2] ?></td>
            <td>
              <input type="text" value="<?php echo $subvalue[3] ?>">
            </td>
          </tr>
        <?php } ?>
      <?php  } ?>
    </table>
  </div>

  <div>
    <table>
      <tr><th colspan="2">Номинации под cd</th></tr>
      <?php foreach ($value as $subkey => $subvalue) {?>
        <?php if ($subvalue[1]=='cd') { ?>
          <tr>
            <td><?php echo $subvalue[2] ?></td>
            <td>
              <input type="text" value="<?php echo $subvalue[3] ?>">
            </td>
          </tr>
        <?php } ?>
      <?php  } ?>
    </table>
  </div>

  <div>
    <table>
      <tr><th colspan="2">Номинации под оркестр</th></tr>
      <?php foreach ($value as $subkey => $subvalue) {?>
        <?php if ($subvalue[1]=='orchestra') { ?>
          <tr>
            <td><?php echo $subvalue[2] ?></td>
            <td>
              <input type="text" value="<?php echo $subvalue[3] ?>">
            </td>
          </tr>
        <?php } ?>
      <?php  } ?>
    </table>
  </div>

  <div>
    <table>
      <tr><th colspan="2">Питание</th></tr>
      <?php foreach ($value as $subkey => $subvalue) {?>
        <?php if ($subvalue[1]=='food') { ?>
          <tr>
            <td><?php echo $subvalue[2] ?></td>
            <td>
              <input type="text" value="<?php echo $subvalue[3] ?>">
            </td>
          </tr>
        <?php } ?>
      <?php  } ?>
    </table>
  </div>

  <div>
    <table>
      <tr><th colspan="2">Пакеты</th></tr>
      <?php foreach ($value as $subkey => $subvalue) {?>
        <?php if ($subvalue[1]=='package') { ?>
          <tr>
            <td><?php echo $subvalue[2] ?></td>
            <td>
              <input type="text" value="<?php echo $subvalue[3] ?>">
            </td>
          </tr>
        <?php } ?>
      <?php  } ?>
    </table>
  </div>

</div>
</div>
<?php  }  ?>
</div>


</div>
</div>


<div class="price_popup-wrapper">
 <div class="price_popup">
  <div>
    <button name="price_popup-close">
      <i class="fa fa-times" aria-hidden="true"></i>
    </button>
  </div>
  <form action="php/price_add.php" method="post" id="save_price-form">
    <div>
      <b>Дата:</b>
      <input type="text" name="price_date">
    </div>
    <div class="price_list">
      <div>
        <table>
          <tr>
            <th colspan="2">Мастер-классы:</th>
          </tr>
          <?php foreach (masterlList('master') as $key => $value) { ?>
            <tr>
              <td><?php echo $value['master']; ?></td>
              <td>
                <input type="text" name="<?php echo 'master||'.$value['master'] ?>">
              </td>
            </tr>
          <?php  } ?>
        </table>
      </div>
      <div>
        <table>
          <tr>
            <th colspan="2">Номинации под CD:</th>
          </tr>
          <?php foreach (masterlList('cd') as $key => $value) { ?>
            <tr>
              <td><?php echo $value['cd']; ?></td>
              <td>
                <input type="text" name="<?php echo 'cd||'.$value['cd'] ?>">
              </td>
            </tr>
          <?php  } ?>
        </table>
      </div>
      <div>
        <table>
          <tr>
            <th colspan="2">Номинации под оркестр:</th>
          </tr>
          <?php foreach (masterlList('orchestra') as $key => $value) { ?>
            <tr>
              <td><?php echo $value['orchestra']; ?></td>
              <td>
                <input type="text" 
                name="<?php echo 'orchestra||'.$value['orchestra']  ?>">
              </td>
            </tr>
          <?php  } ?>
        </table>
      </div>
      <div>
        <table>
          <tr>
            <th colspan="2">Питание:</th>
          </tr>
          <?php foreach (masterlList('food') as $key => $value) { ?>
            <tr>
              <td><?php echo $value['food']; ?></td>
              <td>
                <input type="text" name="<?php echo 'food||'.$value['food'] ?>">
              </td>
            </tr>
          <?php  } ?>
        </table>
      </div>
      <div>
        <table>
          <tr>
            <th colspan="2">Пакеты:</th>
          </tr>
          <?php foreach ($packageArr as $key => $value) { ?>
            <tr>
              <td><?php echo $value; ?></td>
              <td>
                <input type="text" name="<?php echo 'package||'.$value ?>">
              </td>
            </tr>
          <?php  } ?>
        </table>
      </div>
    </div>
  </form>

  <div>
    <button name="price_save">
      <i class="fa fa-floppy-o" aria-hidden="true"></i>
      Сохранить прайс
    </button>
  </div>

</div>

<div class="preloader">
  <div>
    <i class="fa fa-cog" aria-hidden="true"></i>
  </div>
</div>
</div>

<script src="js/admin.js?<?php echo time(); ?>"></script>
<?php include_once 'footer.php'; ?>