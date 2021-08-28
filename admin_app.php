<?php include_once 'header.php'; ?>
<link rel="stylesheet" href="css/admin.css?v=<?php echo time() ?>">
<?php include_once 'php/Admin_judge.php' ?>


<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Судьи</a></li>
  </ul>
  <div id="tabs-1"><?php include_once 'includes/admin_judge.php' ?></div>
</div>

<script src="js/admin.js?v=<?php echo time() ?>"></script>
<?php include_once 'footer.php'; ?>