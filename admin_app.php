<?php include_once 'header.php'; ?>


<link rel="stylesheet" href="css/admin.css?v=<?php echo time();?>">
<link rel="stylesheet" href="css/admin_app.css?v=<?php echo time();?>">
<?php include_once 'php/Admin_judge.php' ?>
<?php include_once 'php/Admin_timetable.php' ?>
<?php include_once 'php/users_get_data.php'; ?>
<?php include_once 'php/Admin_nomination_list.php' ?>
<?php $nomination_list = Admin_timetable::normalize_nomination_list(); ?>

<?php
if (isset($_GET['page'])) {
  $current_menu_page = $_GET['page'];
} else {$current_menu_page = '';}
?>
<div class="menu">
  <a 
  <?php if ($current_menu_page=='' ): ?> class="active"  <?php endif ?> href="?" >
  Судьи
</a>
<a <?php if ($current_menu_page=='admin_timetable'): ?> class="active" <?php endif ?> href="?page=admin_timetable">
  Расписание
</a>
<a <?php if ($current_menu_page=='admin_nomination_list'): ?> 
class="active" <?php endif ?> href="?page=admin_nomination_list">
Списки участников
</a>
<a <?php if ($current_menu_page=='admin_nomination_list_full'): ?> 
class="active" <?php endif ?> href="?page=admin_nomination_list_full">
Полное расписание
</a>
<a <?php if ($current_menu_page=='admin_app_calculation'): ?> class="active" <?php endif ?> href="?page=admin_app_calculation">
  Расчеты
</a>
</div>

<div class="container">
  <?php if (isset($_GET['page'])): ?>
    <?php include_once 'includes/'.$_GET['page'].'.php' ?>
    <?php else: ?>
      <?php include_once 'includes/admin_judge.php' ?>
    <?php endif ?>
  </div>

  <script src="js/admin.js?v=<?php echo time() ?>"></script>
  <?php include_once 'footer.php'; ?>

  