<?php include_once 'php/package_get_data.php' ?>
<?php include_once 'php/price_get_data.php' ?>
<?php include_once 'php/payments_get_data.php' ?>
<div class="tab_content">
  <div class="calculation_item">
    <span>ВАШИ НОМИНАЦИИ:</span><br><br>
  <?php foreach (userPriceAmount(getUserData()['id']) as $key => $value) {?>
    <?php echo $value[0] ?>
    <span>=</span>
    <?php echo $value[1] ?> руб.<br>
  <?php  } ?>
  <hr>
  <?php echo 'Размер скидки: - '.getUserData()['discount'] ?> %<br>
  <?php echo 'Сумма скидки: '.userDiscount(getUserData()['id'],
  getUserData()['discount']) ?> руб.<br>
  <?php echo 'Всего начислено: '.userPriceTotal(getUserData()['id'],
  getUserData()['discount']) ?> руб.
</div>
<div class="calculation_item">
  <span>ВАШИ ОПЛАТЫ:</span><br><br>
  <?php foreach (userPaymentsGetData(getUserData()['id']) as $key => $value) {?>
    <?php echo $value['date'] ?>
    <span>=</span>
    <?php echo $value['amount'] ?><br>
  <?php  } ?>
  <hr>
  <?php echo 'Всего оплачено: '.userPaymentsAmount(getUserData()['id']); ?><br>
  <?php echo 'ОСТАТОК ЗАДОЛЖЕННОСТИ: '.userBallance(getUserData()['id'],
  getUserData()['discount']) ?>
</div>
</div>

