<?php include_once 'header.php'; ?>
<link rel="stylesheet" href="css/judge.css?v=<?php echo time() ?>">
<?php include_once 'php/Judge_login.php' ?>
<?php include_once 'php/Judge_page.php' ?>
<?php if (isset($_SESSION['judge']) and $_SESSION['judge']!=''): ?>
  <?php include_once 'includes/judge_content_page.php'; ?>
  <?php else: ?>
    <?php include_once 'includes/judge_login_page.php' ?>
  <?php endif ?>
  <script src="js/judge.js?v=<?php echo time() ?>"></script>
  <?php include_once 'footer.php'; ?>
