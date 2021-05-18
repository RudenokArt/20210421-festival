
<div class="export_block">
  <div>
    <button name="export_button" value="calc_table">
      <i class="fa fa-download" aria-hidden="true"></i>
      Экспорт в .csv
    </button>
  </div>
  <div class="export_link"></div>
</div>


  <table class="calc_table">
    <tr>
      <th><input type="text" name="calculation_filter"></th>
      <th><input type="text" name="calculation_filter"></th>
      <th><input type="text" name="calculation_filter"></th>
      <th><input type="text" name="calculation_filter"></th>
      <th><input type="text" name="calculation_filter"></th>
      <th><input type="text" name="calculation_filter"></th>
      <th><input type="text" name="calculation_filter"></th>
      <th><input type="text" name="calculation_filter"></th>
      <th><i class="fa fa-search" aria-hidden="true"></i></th>
    </tr>
    <tr>
      <th>№</th>
      <th>Участник</th>
      <th>Email</th>
      <th>Дата <br>первого<br>платежа</th>
      <th>Действующий <br> прайс от: </th>
      <th>Всего<br>начислено</th>
      <th>Всего <br> уплачено</th>
      <th>Остаток <br> задолженности</th>
      <th>Карточка <br> расчетов</th>
    </tr>
    <?php foreach (get_users_data() as $key => $value) {?>
      <tr class="user_calc_tr">
        <td><?php echo $value['id'] ?></td>
        <td><?php echo $value['fio'] ?></td>
        <td><?php echo $value['email'] ?></td>
        <td><?php echo userPaymentsGetData($value['id'])[0]['date']; ?></td>
        <td><?php echo userPriceSelect($value['id']) ?></td>
        <td class="amount_1">
          <?php echo userPriceTotal($value['id'],$value['discount']) ?>
        </td>
        <td class="amount_2">
          <?php echo userPaymentsAmount($value['id']); ?>
        </td>
        <td class="amount_3">
          <?php echo userBallance($value['id'],$value['discount']); ?>
        </td>
        <td class="admin_calculation-open">
          <button>
            <i class="fa fa-calculator" aria-hidden="true"></i>
          </button>
          <div class="admin_calculation-popup_wrapper">
            <div class="admin_calculation-popup">

              <div>
                <div><b>Номинации:</b></div>
                <div>
                  <?php foreach(userPriceAmount($value['id'])as $subkey=>$subvalue){?>
                    <?php echo $subvalue[0] ?>
                    <span>=</span>
                    <?php echo $subvalue[1] ?>
                    <br>
                  <?php } ?>
                </div>
                <div>
                  Размер скидки: - <?php echo $value['discount']; ?> %
                </div>
                <div>
                  Сумма скидки: - <?php 
                  echo userDiscount($value['id'],$value['discount']) 
                  ?>
                </div>
                <div>
                  <b>
                    Иого начислено: 
                    <?php echo userPriceTotal($value['id'],$value['discount']) ?> 
                  </b>
                </div>
              </div>
              <div>
                <div><b>Оплаты:</b></div>
                <div>
                  <?php foreach(userPaymentsGetData($value['id']) as 
                  $subkey=>$subvalue){?>
                   <?php echo $subvalue['date'] ?>
                   <span>=</span>
                   <?php echo $subvalue['amount'] ?>
                   <br>
                 <?php } ?>
               </div>
               <div>
                <b>Итого:<?php echo userPaymentsAmount($value['id']);?> </b>
              </div>
              <div>
                <hr>
                ОСТАТОК<br>ЗАДОЛЖЕННОСТИ: 
                <?php echo userBallance($value['id'],$value['discount']); ?>
              </div>
            </div>
            <div class="admin_calculation-close">
              <button>
                <i class="fa fa-times" aria-hidden="true"></i>
              </button>
            </div>

          </div>
        </div>
      </td>
    </tr>
  <?php  }  ?>
  <tr>
    <th>Х</th>
    <th>Х</th>
    <th>Х</th>
    <th>Х</th>
    <th>Итого:</th>
    <th class="amount_1-total"></th>
    <th class="amount_2-total"></th>
    <th class="amount_3-total"></th>
    <th>Х</th>
  </tr>
</table>

