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
      <input type="text" name="price_date" id="new_price_date">
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