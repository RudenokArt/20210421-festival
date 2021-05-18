<div class="payment_add-block">
  <form action="php/payment_add.php" method="post" id="payment_add-form">
    <table>
      <tr>
        <th colspan="4">
          Добавить квитанцию
        </th>
      </tr>
      <tr>
        <td>Дата:</td>
        <td>Участник</td>
        <td colspan="2">Сумма</td>
      </tr>
      <tr>
        <td>
          <input type="text" name="payment_date">
        </td>
        <td>
          <div class="select_wrapper">
            <select name="user_id">
              <?php foreach ($profileData as $key => $value) {?>
                <option value="<?php echo $value['id'] ?>">
                  <?php echo $value['fio'] ?>
                  ||
                  <?php echo $value['email'] ?>
                </option>
              <?php } ?>
            </select>
          </div>  
        </td>
        <td>
          <input type="text" name="payment_amount">
        </td>
        <td>
          <button name="payment_add">
            <i class="fa fa-check" aria-hidden="true"></i>
          </button>
        </td>
      </tr>
    </table>
  </form>
</div>

<div class="export_block">
  <div>
    <button name="export_button" value="paymetn_table">
      <i class="fa fa-download" aria-hidden="true"></i>
      Экспорт в .csv
    </button>
  </div>
  <div class="export_link"></div>
</div>

<div>
  <table class="paymetn_table">
    <tr>
      <td>
        <input type="text" name="payment_filter">
      </td>
      <td style="display: none;"></td>
      <td>
        <input type="text" name="payment_filter">
      </td>
      <td>
        <input type="text" name="payment_filter">
      </td>
      <td>
        <input type="text" name="payment_filter">
      </td>
      <td colspan="2">
        <i class="fa fa-search" aria-hidden="true"></i>
      </td>
      <td style="display: none;"></td>
    </tr>
    <tr>
      <th>id</th>
      <th style="display: none"></th>
      <th>Дата</th>
      <th>Участник</th>
      <th>Сумма</th>
      <th>ред.</th>
      <th>удал.</th>
      <th style="display: none"></th>
    </tr>
    <?php foreach (paymentsGetData() as $key => $value) {?>
      <tr class="paynent_tr">
        <form action="php/payment_edit.php" method="post" >
          <td>
            <input value="<?php echo $value['id'] ?>" style="width: 100px;"
            name="payment_id" type="text" readonly="readonly">
          </td>
          <td style="display: none;">
            <input type="text">
          </td>
          <td>
            <input value="<?php echo $value['date'] ?>" 
            type="text" name="payment_date">
          </td>
          <td>
            <input value="<?php echo $value[0].' || '.$value[1] ?>" 
            type="text" disabled >
          </td>
          <td>
            <input value="<?php echo $value['amount'] ?>" 
            type="text" name="payment_amount">
          </td>
          <td style="display: none;">
            <input type="text">
          </td> 
        </form>
        <td>
          <button name="payment_edit" title="Сохранить">
            <i class="fa fa-floppy-o" aria-hidden="true"></i>
          </button>
        </td>
        <td>
          <form action="php/payment_delete.php"  method="post">
            <input value="<?php echo $value['id'] ?>"
            name="payment_id" type="hidden" >
          </form>
          <button name="payment_delete" title="Удалить">
            <i class="fa fa-trash" aria-hidden="true"></i>
          </button>
        </td>
      </tr>
    <?php  } ?>
  </table>
</div>