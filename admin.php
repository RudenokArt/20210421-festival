<?php include_once 'header.php'; ?>
<link rel="stylesheet" href="css/admin.css?v=<?php echo time();?>">
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
    <li><a href="#tabs-7">Пакеты</a></li>
    <li><a href="#tabs-8">Файлы</a></li>
    <li><a href="#tabs-9">Удаление</a></li>
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
   <a href="admin_app.php?page=admin_app_calculation">
    <button>
      Расчеты переехали сюда
    </button>
  </a>
  <?php // include_once 'includes/admin_calculation.php'; ?>
</div>
<div id="tabs-7"><?php include_once 'includes/admin_package.php' ?></div>
<div id="tabs-8"><?php include_once 'includes/admin_files.php' ?></div>
<div id="tabs-9"><?php include_once 'includes/admin_remove.php' ?></div>
</div>
<?php include_once 'includes/admin_price_popup.php' ?>
<script src="js/admin.js?v=1"></script>
<?php include_once 'footer.php'; ?>