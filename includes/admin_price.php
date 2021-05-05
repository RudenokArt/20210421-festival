<div class="add_pice">
     <button name="add_pice">
       <i class="fa fa-plus" aria-hidden="true"></i>
       Добавить прайс
     </button>
   </div>

   <div id="accordion">

    <?php foreach (priceGetData() as $key => $value) { ?>
     <h3>Прайс от: <?php echo $key ?></h3>


     <div> 

      <div class="price_item">
        <div>
         <form action="php/price_delete.php" method="post">
          <input value="<?php print_r($key) ?>"
          type="hidden" name="price_delete">
          <button value="<?php print_r($key) ?>"
            title="Удалить прайс" name="price_delete">
            <i class="fa fa-trash" aria-hidden="true"></i>
          </button>
        </form> 
      </div>
      <div>
        <button name="price_edit" title="Сохранить изменения">
          <i class="fa fa-floppy-o" aria-hidden="true"></i>
        </button>
      </div>
    </div>

    <form action="php/price_edit.php" class="price_edit-form" method="post">
      <input type="hidden" value="<?php echo $key ?>" name="price_date">

      <div class="price_item">

        <div>
          <table>
            <tr><th colspan="2">Мастер-классы</th></tr>
            <?php foreach ($value as $subkey => $subvalue) {?>
              <?php if ($subvalue[1]=='master') { ?>
                <tr>
                  <td><?php echo $subvalue[2] ?></td>
                  <td>
                    <input type="text" value="<?php echo $subvalue[3] ?>"
                    name="<?php echo $subvalue[2] ?>">
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
                    <input type="text" value="<?php echo $subvalue[3] ?>"
                    name="<?php echo $subvalue[2] ?>">
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
                    <input type="text" value="<?php echo $subvalue[3] ?>"
                    name="<?php echo $subvalue[2] ?>">
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
                    <input type="text" value="<?php echo $subvalue[3] ?>"
                    name="<?php echo $subvalue[2] ?>">
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
                    <input type="text" value="<?php echo $subvalue[3] ?>"
                    name="<?php echo $subvalue[2] ?>">
                  </td>
                </tr>
              <?php } ?>
            <?php  } ?>
          </table>
        </div> 
      </div>
    </form>

  </div>
<?php  }  ?>
</div>
