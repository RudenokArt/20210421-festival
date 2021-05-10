<?php include_once 'header.php'; ?>
<link rel="stylesheet" href="css/admin.css?<?php echo time(); ?>">
<?php include_once 'php/users_get_data.php' ?>
<?php include_once 'php/get_meta.php' ?>
<?php include_once 'php/category_get_data.php' ?>
<?php include_once 'php/users_get_category.php' ?>
<?php include_once 'php/users_files_list.php' ?>
<?php include_once 'php/package_get_data.php' ?>
<?php include_once 'php/price_get_data.php' ?>
<?php include_once 'php/payments_get_data.php' ?>

<?php $profileMeta=array_keys(get_users_data()[0]); ?>
<?php $profileData=get_users_data(); ?>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Участники</a></li>
    <li><a href="#tabs-2">Судьи</a></li>
    <li><a href="#tabs-3">Метаданные</a></li>
    <li><a href="#tabs-4">Прайсы</a></li>
    <li><a href="#tabs-5">Оплаты</a></li>
    <li><a href="#tabs-6">Расчеты</a></li>
  </ul>
  <div id="tabs-1"><?php include_once 'includes/admin_usertable.php' ?></div>
  <div id="tabs-2">
    <div class="test">
      Далеко-далеко за словесными, горами в стране гласных и согласных живут рыбные тексты. Переписали, запятой города имеет по всей жаренные родного реторический заманивший маленькая, подзаголовок залетают дорогу, вдали рукопись. Города, рыбными, имеет. Грустный, речью!
    </div>
  </div>
  <div id="tabs-3"><?php include_once 'includes/admin_metadata.php'?></div>
  <div id="tabs-4"><?php include_once 'includes/admin_price.php' ?></div>
  <div id="tabs-5"><?php include_once 'includes/admin_payment.php' ?></div>
  <div id="tabs-6">
    <div class="test">
      <table>
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
          <?php $balance=
          userPriceGetData($value['id'])[0]-userPaymentsAmount($value['id']); ?>
          <tr>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['fio'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td><?php echo userPaymentsGetData($value['id'])[0]['date']; ?></td>
            <td><?php echo userPriceSelect($value['id']) ?></td>
            <td class="amount_1">
              <?php echo userPriceGetData($value['id'])[0] ?>
            </td>
            <td class="amount_2">
              <?php echo userPaymentsAmount($value['id']); ?>
            </td>
            <td class="amount_3"><?php echo $balance ?></td>
            <td class="admin_calculation-open">
              <button>
                <i class="fa fa-calculator" aria-hidden="true"></i>
              </button>

              <div class="admin_calculation-popup_wrapper">
                <div class="admin_calculation-popup">
                  <div>
                    <div><b>Номинации:</b></div>
                    <div>
                     <?php 
                     foreach (userPriceGetData($value['id'])[1] as $subkey=>$subvalue){?>
                      <?php echo $subvalue[0];?> = <?php echo $subvalue[1];?><br>
                    <?php }  ?>
                  </div>
                  <div>
                    <b>Итого: <?php echo userPriceGetData($value['id'])[0];?></b>
                  </div>
                </div>
                <div>
                  <div><b>Оплаты:</b></div>
                  <div>
                   <?php 
                   foreach (userPaymentsGetData($value['id']) as $subkey=>$subvalue){?>
                    <?php echo $subvalue['date'];?>=<?php echo $subvalue['amount'];?><br>
                  <?php }  ?>
                </div>
                <div>
                  <b>Итого:<?php echo userPaymentsAmount($value['id']);?> </b>
                </div>
                <div>
                  <hr>
                  ОСТАТОК<br>ЗАДОЛЖЕННОСТИ:<?php echo userPaymentsAmount($value['id']);?>
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

</div>

</div>
</div>
<?php include_once 'includes/admin_price_popup.php' ?>
<script src="js/admin.js?<?php echo time(); ?>"></script>
<?php include_once 'footer.php'; ?>