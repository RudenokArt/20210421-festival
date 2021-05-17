<?php include_once 'php/package_get_data.php' ?>
<?php include_once 'php/price_get_data.php' ?>
<?php include_once 'php/payments_get_data.php' ?>

<div class="tab_content">
  <div class="test">
  <?php foreach (userPriceAmount(getUserData()['id']) as $key => $value) {?>
    <?php print_r($value) ?> <br><br>
  <?php  } ?>
  <?php echo 'Размер скидки: '.getUserData()['discount'] ?><br>
  <?php echo 'Сумма скидки: '.userDiscount(getUserData()['id'],
  getUserData()['discount']) ?><br>
  <?php echo 'Всего начислено: '.userPriceTotal(getUserData()['id'],
  getUserData()['discount']) ?>
</div>
<div class="test">
  <?php foreach (userPaymentsGetData(getUserData()['id']) as $key => $value) {?>
    <?php print_r($value) ?> <br><br>
  <?php  } ?>
  <?php echo 'Всего оплачено: '.userPaymentsAmount(getUserData()['id']); ?><br>
  <?php echo 'Остаток задолженности: '.userBallance(getUserData()['id'],
  getUserData()['discount']) ?>
</div>
</div>

