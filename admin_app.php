<?php include_once 'header.php'; ?>
<link rel="stylesheet" href="css/admin.css?v=<?php echo time();?>">
<link rel="stylesheet" href="css/admin_app.css?v=<?php echo time();?>">
<?php include_once 'php/Admin_judge.php' ?>
<?php include_once 'php/Admin_timetable.php' ?>

<div class="menu">
  <a <?php if ($_GET['page']==''): ?>
  class="active"
<?php endif ?> 
href="?" >
Судьи
</a>
<a <?php if ($_GET['page']=='admin_timetable'): ?>
class="active"
<?php endif ?> 
href="?page=admin_timetable">
Расписание
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