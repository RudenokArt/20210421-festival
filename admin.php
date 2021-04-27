<?php include_once 'header.php'; ?>
<link rel="stylesheet" href="css/admin.css">
<?php include_once 'php/users_get_data.php' ?>
<?php include_once 'php/get_meta.php' ?>
<?php include_once 'php/category_get_data.php' ?>

<?php $profileMeta=array_keys(get_users_data()[0]); ?>
<?php $profileData=get_users_data(); ?>
 

<div class="test">
  <?php foreach (getCategoryData() as $key => $value) {?>
    <br><?php print_r($value) ?>
   <?php } ?>
</div>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Участники</a></li>
    <li><a href="#tabs-2">Судьи</a></li>
    <li><a href="#tabs-3">Метаданные</a></li>
  </ul>
  <div id="tabs-1">
    <table>
      <tr>
        <?php foreach ($profileMeta as $key => $value) {?>
          <th><?php echo $value ?></th>
        <?php } ?>
      </tr>
      <?php foreach ($profileData as $key => $value) {?>
       <tr>
         <?php foreach ($value as $subkey => $subvalue) {?>
          <td>
            <?php if ($subkey=='photo' || $subkey=='certificate') {?>
              <a href="user_upload/<?php echo $subvalue; ?>" download >
                <?php echo $subvalue; ?>
              </a>
            <?php } else{echo $subvalue;} ?>
          </td>
        <?php } ?>
      </tr>
    <?php }  ?>
  </table>
</div>
<div id="tabs-2">
 Далеко-далеко за словесными, горами в стране гласных и согласных живут рыбные тексты. Переписали, запятой города имеет по всей жаренные родного реторический заманивший маленькая, подзаголовок залетают дорогу, вдали рукопись. Города, рыбными, имеет. Грустный, речью!
</div>
<div id="tabs-3">
  <div class="new_meta">
   <form action="php/new_meta.php" id="add_meta" method="post">
    <div>Добавить:</div>
    <div class="select_wrapper">
      <select name="meta_type">
        <option value="master">Мастер-классы</option>
        <option value="cd">Номинации под CD</option>
        <option value="orchestra">Номинации под ОРКЕСТР</option>
        <option value="food">Питание</option>
      </select>
    </div>
    <div>
      <input type="text" name="meta_name">
    </div>
  </form>
  <div>
    <button name="add_meta">
      <i class="fa fa-check" aria-hidden="true"></i>
    </button>
  </div>
</div>

<div class="meta_list">
  <div>
    <table>
      <tr>
        <th colspan="4">
          Мастер-классы
        </th>
      </tr>
      <?php foreach (masterlList('master') as $key => $value) { ?>
        <tr>
          <td>
            <?php echo($value['id']) ?>
            <form action="php/remove_meta.php" method="post" class="remove_meta">
              <input type="text" value="<?php echo($value['id']) ?>"
              class="input_id" name="remove_meta" readonly >
            </form>
          </td>
          <td>
            <button name="remove_meta">
             <i class="fa fa-trash" aria-hidden="true"></i>
           </button>
         </td>
         <td>
          <form action="php/edit_meta.php" method="post" class="edit_meta">
            <input type="text" value="<?php echo($value['id']) ?>"
            class="input_id" name="meta_id" readonly >
            <input type="text" name="master_name"
            value="<?php echo($value['master']) ?>">
          </form>
        </td>
        <td>
          <button value="<?php echo($value['id']) ?>" name="edit_meta">
            <i class="fa fa-floppy-o" aria-hidden="true"></i>
          </button>
        </td>
      </tr>
    <?php }  ?>
  </table>
</div>

<div>
  <table>
    <tr>
      <th colspan="4">
        Номинации под cd
      </th>
    </tr>
    <?php foreach (masterlList('cd') as $key => $value) { ?>
      <tr>
       <tr>
        <td>
          <?php echo($value['id']) ?>
          <form action="php/remove_meta.php" method="post" class="remove_meta">
            <input type="text" value="<?php echo($value['id']) ?>"
            class="input_id" name="remove_meta" readonly >
          </form>
        </td>
        <td>
          <button name="remove_meta">
           <i class="fa fa-trash" aria-hidden="true"></i>
         </button>
       </td>
       <td>
        <form action="php/edit_meta.php" method="post" class="edit_meta">
          <input type="text" value="<?php echo($value['id']) ?>"
          class="input_id" name="meta_id" readonly >
          <input type="text" name="cd_name"
          value="<?php echo($value['cd']) ?>">
        </form>
      </td>
      <td>
        <button value="<?php echo($value['id']) ?>" name="edit_meta">
          <i class="fa fa-floppy-o" aria-hidden="true"></i>
        </button>
      </td>
    </tr>
  </tr>
<?php }  ?>
</table>
</div>

<div>
  <table>
    <tr>
      <th colspan="4">
        Номинации под оркестр
      </th>
    </tr>
     <?php foreach (masterlList('orchestra') as $key => $value) { ?>
      <tr>
      <td>
        <?php echo($value['id']) ?>
        <form action="php/remove_meta.php" method="post" class="remove_meta">
          <input type="text" value="<?php echo($value['id']) ?>"
          class="input_id" name="remove_meta" readonly >
        </form>
      </td>
      <td>
        <button name="remove_meta">
         <i class="fa fa-trash" aria-hidden="true"></i>
       </button>
     </td>
     <td>
      <form action="php/edit_meta.php" method="post" class="edit_meta">
        <input type="text" value="<?php echo($value['id']) ?>"
        class="input_id" name="meta_id" readonly >
        <input type="text" name="orchestra_name"
        value="<?php echo($value['orchestra']) ?>">
      </form>
    </td>
    <td>
      <button value="<?php echo($value['id']) ?>" name="edit_meta">
        <i class="fa fa-floppy-o" aria-hidden="true"></i>
      </button>
    </td>
  </tr>
<?php }  ?>
</table>
</div>
<div>
  <table>
    <tr>
      <th colspan="4">
        Питание
      </th>
    </tr>
     <?php foreach (masterlList('food') as $key => $value) { ?>
      <tr>
      <td>
        <?php echo($value['id']) ?>
        <form action="php/remove_meta.php" method="post" class="remove_meta">
          <input type="text" value="<?php echo($value['id']) ?>"
          class="input_id" name="remove_meta" readonly >
        </form>
      </td>
      <td>
        <button name="remove_meta">
         <i class="fa fa-trash" aria-hidden="true"></i>
       </button>
     </td>
     <td>
      <form action="php/edit_meta.php" method="post" class="edit_meta">
        <input type="text" value="<?php echo($value['id']) ?>"
        class="input_id" name="meta_id" readonly >
        <input type="text" name="food_name"
        value="<?php echo($value['food']) ?>">
      </form>
    </td>
    <td>
      <button value="<?php echo($value['id']) ?>" name="edit_meta">
        <i class="fa fa-floppy-o" aria-hidden="true"></i>
      </button>
    </td>
  </tr>
<?php }  ?>
</table>
</div>

</div>

</div>
</div>
<script src="js/admin.js"></script>
<?php include_once 'footer.php'; ?>