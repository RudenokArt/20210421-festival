<?php spl_autoload_register(); ?>
<link rel="stylesheet" href="css/admin.css?v=<?php echo time();?>">
<link rel="stylesheet" href="css/admin_app.css?v=<?php echo time();?>">
<?php include_once 'php/Admin_judge.php' ?>
<?php include_once 'php/Admin_timetable.php' ?>
<?php include_once 'php/users_get_data.php'; ?>
<?php include_once 'php/Admin_nomination_list.php' ?>
<?php use \Php\Admin_results  as Admin_results; ?>
<?php use \Php\Mark_criterions  as Mark_criterions; ?>
<?php Admin_results::results_public_page_set(); ?>
<?php $results_public_page_status = Admin_results::results_public_page_get(); ?>


<?php if ($_GET['page'] == 'admin_app_results'): ?> <!-- Фильтр для админки -->

<div class="row">
  <div class="container">
    <table>
      <tr>
        <td>Публичная страница результатов:</td>
        <td>
          <form action="admin_app.php" method="get" id="results_public_page_form">
            <input type="hidden" name="page" value="admin_app_results">
            <div class="select_wrapper" style="width: 100px;">
              <select name="results_public_page" v-on:change="submitForm" style="width: 100px;">
                <option value="true">on</option>
                <option 
                <?php if ($results_public_page_status == "false"): ?>
                  selected="selected"
                <?php endif ?>
                value="false">off</option>
              </select>
            </div>
          </form>
        </td>
      </tr>
      <?php if (isset($_GET['results_public_page'])): ?>
       <tr>
        <td colspan="2">
          Доступ к публичной странице
          <?php if ($_GET['results_public_page']=='true'): ?>
            открыт
            <?php else: ?>
              заблокирован
            <?php endif ?>
          </td>
        </tr>
      <?php endif ?>
    </table>
  </div>
</div>

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

<?php endif ?>


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
          Сумма баллов в <br> разрезе номинаций
          <div style="display: flex; flex-wrap: nowrap; justify-content: flex-end;">
            <?php foreach (Mark_criterions::$criterions as $key => $value): ?>
              <div style="writing-mode: vertical-rl; width: 30px; text-align: right;">
                <span style="vertical-align: bottom;"><?php echo $value; ?></span>
              </div>
            <?php endforeach ?>
          </div>
        </th>
        <th>Общая <br> сумма <br> баллов</th>
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
                <div style="width: 30px;" class="winner">
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

<script src="js/admin_results.js?v=<?php echo time(); ?>"></script>


<pre>
  <?php var_dump(Admin_judge::get_judge(8)); ?>
</pre>
<hr>
<pre>
  <?php print_r(Admin_results::normalize_results()) ?>
</pre>