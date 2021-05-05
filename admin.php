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
  </ul>

  <div id="tabs-1"><?php include_once 'includes/admin_usertable.php' ?></div>

  <div id="tabs-2">
    <div class="test">
      Далеко-далеко за словесными, горами в стране гласных и согласных живут рыбные тексты. Переписали, запятой города имеет по всей жаренные родного реторический заманивший маленькая, подзаголовок залетают дорогу, вдали рукопись. Города, рыбными, имеет. Грустный, речью!
    </div>
  </div>

  <div id="tabs-3"><?php include_once 'includes/admin_metadata.php'?></div>

  <div id="tabs-4"><?php include_once 'includes/admin_price.php' ?></div>

  <div id="tabs-5">
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

    <div class="paymetn_table">
      <table>
        <tr>
          <th>Дата</th>
          <th>Участник</th>
          <th>Сумма</th>
        </tr>
        <?php foreach (paymentsGetData() as $key => $value) {?>
          <tr>
            <td>
              <?php echo $value['id'] ?><br>
              <?php echo $value['date'] ?>
              </td>
            <td><?php echo $value[0].' || '.$value[1] ?></td>
            <td><?php echo $value['amount'] ?></td>
          </tr>
        <?php  } ?>
      </table>

      
      
    </div>


    <div class="test"></div>

  </div>

</div>


<?php include_once 'includes/admin_price_popup.php' ?>

<script src="js/admin.js?<?php echo time(); ?>"></script>
<?php include_once 'footer.php'; ?>