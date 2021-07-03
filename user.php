<?php include_once 'header.php' ?>
<?php include_once 'php/user_profile-get_data.php'; ?>
<?php include_once 'php/get_meta.php' ?>
<?php include_once 'php/user_category_get_data.php'; ?>
<?php include_once 'php/user_orchestra_get.php'; ?>
<link rel="stylesheet" href="css/user.css?<?php echo time() ?>">
<?php if (!$_SESSION['login']) {
  ?><script>document.location.href='index.php';</script><?
} ?>
<button name="exit_button" class="extit_button">
  <i class="fa fa-sign-out" aria-hidden="true"></i>
  Выход
</button>
<img src="img/main.jpg" alt="MiraMar" class="main_img">


<div id="tabs">
  <ul>
    <li><a href="#tabs-1">
      <i class="fa fa-user-o" aria-hidden="true"></i>
    </a></li>
    <li><a href="#tabs-2">
      <i class="fa fa-list" aria-hidden="true"></i>
    </a></li>
    <li><a href="#tabs-3">
      <i class="fa fa-music" aria-hidden="true"></i>
    </a></li>
    <li><a href="#tabs-4">
      <i class="fa fa-money" aria-hidden="true"></i>
    </a></li>
  </ul>

  <div id="tabs-1"><?php include_once'includes/user_profile.php' ?></div>
  <div id="tabs-2"><?php include_once 'includes/user_category.php' ?></div>
  <div id="tabs-3"><?php include_once 'includes/user_files.php' ?></div>
  <div id="tabs-4"><?php include_once 'includes/user_calculation.php' ?></div>


</div>

<div class="test"></div>


<script src="js/user.js?<?php echo time() ?>"></script>
<?php include_once 'footer.php' ?>
