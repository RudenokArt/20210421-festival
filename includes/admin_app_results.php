<?php include_once 'header.php'; ?>
<?php spl_autoload_register(); ?>
<link rel="stylesheet" href="css/admin.css?v=<?php echo time();?>">
<link rel="stylesheet" href="css/admin_app.css?v=<?php echo time();?>">
<?php include_once 'php/Admin_judge.php' ?>
<?php include_once 'php/Admin_timetable.php' ?>
<?php include_once 'php/users_get_data.php'; ?>
<?php include_once 'php/Admin_nomination_list.php' ?>
<?php use \Php\Admin_results  as Admin_results; ?>
<?php use \Php\Mark_criterions  as Mark_criterions; ?>

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
    <?php $arr_results_table = Admin_results::normalize_results()[$_GET['nomination_id']]; ?>
    <?php if (isset($_GET['admin_results']) and !empty($arr_results_table)): ?>
    <?php Admin_results::average_mark($arr_results_table);?>
    <?php $arr_max_average_mark = Admin_results::max_average_mark($arr_results_table); ?>
    <table>
      <tr>
        <th>id</th>
        <th>Участник</th>
        <th>
          Судьи / баллы
          <div style="display: flex; flex-wrap: nowrap; justify-content: flex-end;">
            <?php foreach (Mark_criterions::$criterions as $key => $value): ?>
              <div style="writing-mode: vertical-rl; width: 30px; text-align: right;">
                <span style="vertical-align: bottom;"><?php echo $value; ?></span>
              </div>
            <?php endforeach ?>
          </div>
        </th>
        <th>
          Cредний балл в <br> разрезе номинаций
          <div style="display: flex; flex-wrap: nowrap; justify-content: flex-end;">
            <?php foreach (Mark_criterions::$criterions as $key => $value): ?>
              <div style="writing-mode: vertical-rl; width: 30px; text-align: right;">
                <span style="vertical-align: bottom;"><?php echo $value; ?></span>
              </div>
            <?php endforeach ?>
          </div>
        </th>
        <th>Общий <br> средний <br> балл</th>
      </tr>
      <?php foreach ($arr_results_table as $participant_key => $participant_value): ?>
        <?php $participant = Admin_nomination_list::get_participant($participant_key);?>
        <tr>
          <td><?php echo $participant['id']; ?></td>
          <td><?php echo $participant['fio'];?></td>
          <td>
            <?php foreach ($participant_value as $judge_key => $judge_value): ?>
              <?php if ($judge_key != 'average_mark' && $judge_key != 'average_criterion_mark'): ?>
                <div class="row" style="justify-content: space-between;">
                  <div style="padding-right: 1em;">
                    <?php echo Admin_judge::get_judge($judge_key)['name']; ?> 
                  </div>
                  <div class="row">
                    <?php foreach ($judge_value as $criterion_key => $critetion_value): ?>
                      <div style="width: 30px; text-align: center;">
                      <?php echo $critetion_value; ?>
                    </div>
                  <?php endforeach ?>
                </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>
        </td>
        <td>
          <div class="row">
            <?php foreach ($participant_value['average_criterion_mark'] as $key => $value): ?>
              <div 
              <?php if ($arr_max_average_mark[$key.'_max'] == $value): ?>
               style="width: 30px; background:lightskyblue; border:1px solid white;"
               <?php else: ?>
                 style="width: 30px;"
               <?php endif ?>
               class="winner">
               <?php echo $value; ?> 
             </div>
           <?php endforeach ?>
         </div>
       </td>
       <td 
       <?php if ($arr_max_average_mark['max1'] == $participant_value['average_mark']): ?>
        style="background: gold;"
      <?php endif ?>
      <?php if ($arr_max_average_mark['max2'] == $participant_value['average_mark']): ?>
        style="background: silver;"
      <?php endif ?>
      <?php if ($arr_max_average_mark['max3'] == $participant_value['average_mark']): ?>
        style="background:burlywood ;"
      <?php endif ?>
      class="winner">
      <?php echo $participant_value['average_mark']; ?>
    </td>
  </tr>
<?php endforeach ?>
</table>
<?php endif ?>
</div>
</div>





<script src="js/admin.js?v=<?php echo time() ?>"></script>
<?php include_once 'footer.php'; ?>