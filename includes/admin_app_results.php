<?php include_once 'header.php'; ?>
<?php spl_autoload_register(); ?>
<link rel="stylesheet" href="css/admin.css?v=<?php echo time();?>">
<link rel="stylesheet" href="css/admin_app.css?v=<?php echo time();?>">
<?php include_once 'php/Admin_judge.php' ?>
<?php include_once 'php/Admin_timetable.php' ?>
<?php include_once 'php/users_get_data.php'; ?>
<?php include_once 'php/Admin_nomination_list.php' ?>
<?php $nomination_list = Admin_timetable::normalize_nomination_list(); ?>
<?php use \Php\Admin_results  as Admin_results; ?>
<?php $arr_results_table = Admin_results::normalize_results(); ?>

<div class="row">
  <div class="container">
    <form action="admin_app.php" method="get">
      <table>
        <tr>
          <td>
            <?php include_once 'admin_nomination_list_filter.php' ?>
          </td>
          <td>
            <input type="hidden" name="nomination_filter" value="true">
            <input type="hidden" name="page" value="admin_app_results">
            <button name="admin_results" value="true">
              <i class="fa fa-filter" aria-hidden="true"></i>
            </button>
          </td>
          <td>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div> 

<div class="row">
  <div class="container">
    <table>
      <tr>
        <th>id</th>
        <th>participant</th>
        <th>judge / marks</th>
        <th>average mark</th>
      </tr>
      <?php foreach ($arr_results_table[$_GET['nomination_id']] as $participant_key => $participant_value): ?>
        <?php $participant = Admin_nomination_list::get_participant($participant_key);?>
        <tr>
          <td><?php echo $participant['id']; ?></td>
          <td><?php echo $participant['fio'];?></td>
          <td>
            <?php foreach ($participant_value as $judge_key => $judge_value): ?>
              <div class="row" style="justify-content: space-between;">
                <div style="padding-right: 1em;">
                  <?php echo Admin_judge::get_judge($judge_key)['name']; ?> 
                </div>
                <div class="row">
                  <?php foreach ($judge_value as $criterion_key => $critetion_value): ?>
                     <div style="width: 30px;"><?php echo $critetion_value; ?></div>
                  <?php endforeach ?>
                </div>
              </div>
            <?php endforeach ?>
          </td>
          <td>
            <div class="row">
              <?php foreach (Admin_results::average_mark($participant_value) as $key => $value): ?>
                <div style="width: 30px;"><?php echo $value; ?></div>
              <?php endforeach ?>
            </div>
          </td>
        </tr>
      <?php endforeach ?>
    </table>

  </div>
</div>



<?php if (isset($_GET['admin_results'])): ?>
  <pre>
    <?php print_r(Admin_results::normalize_results()); ?>
  </pre>
<?php endif ?>




<script src="js/admin.js?v=<?php echo time() ?>"></script>
<?php include_once 'footer.php'; ?>