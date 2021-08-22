<?php include_once 'header.php'; ?>
<link rel="stylesheet" href="css/judge.css?<?php echo time() ?>">
<script src="https://unpkg.com/vue"></script>
<?php include_once 'php/judge_functions.php' ?>
<?php if ($_SESSION['judge']): ?>
  <?php include_once 'includes/judge_content_page.php' ?>
  <?php else: ?>
    <?php include_once 'includes/judge_login_page.php' ?>
    <script src="js/judge_login_page.js"></script>
  <?php endif ?>
  <?php include_once 'footer.php'; ?>

  <?php if ($_SESSION['refresh']) {
    $_SESSION['refresh'] = false;
    echo '<meta http-equiv="refresh" content="0; url=judge.php" />';
  } ?>

  <div class="test">
    <?php var_dump($_SESSION['judge']) ?>
    <br>
    <?php var_dump($_SESSION['user_id']) ?>
  </div>

