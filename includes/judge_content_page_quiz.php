<?php include_once 'php/Admin_timetable.php' ?>
<?php include_once 'php/users_get_data.php'; ?>
<?php include_once 'php/Admin_nomination_list.php' ?>
<?php $nomination_list = Admin_timetable::normalize_nomination_list(); ?>

<div class="container">
  <div class="navigation">
    <a href="judge.php#tabs-2">festival dates</a>
    <?php if (isset($_GET['date'])): ?>
      <a href="judge.php?date=<?php echo $_GET['date'];?>#tabs-2">
        <?php echo Admin_timetable::get_festival_date($_GET['date'])['date'] ?>
      </a>
    <?php endif ?>
  </div>
</div>


<?php if (isset($_GET['date'])): ?>
  <pre>
    <?php print_r($nomination_list[$_GET['date']]) ?>
  </pre>
  <?php else: ?>
    <div class="row">
     <div class="container">
      <ul class="quiz_step">
        <?php foreach ($nomination_list as $key => $value): ?>
          <li>
            <a href="judge.php?date=<?php echo $key;?>#tabs-2">
              <?php echo Admin_timetable::get_festival_date($key)['date'] ?>
            </a>
          </li>
        <?php endforeach ?>
      </ul>
    </div> 
  </div>  
<?php endif ?>





