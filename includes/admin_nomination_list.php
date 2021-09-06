<?php include_once 'php/users_get_data.php'; ?>
<?php include_once 'php/Admin_nomination_list.php' ?>
<?php $users_list = get_users_data(); ?>

<form method="post" action="php/Admin_nomination_list.php">
  <table>
    <tr>
      <th>Номинация</th>
      <th>Участник</th>
      <th>Добавить</th>
    </tr>
    <tr>
      <td>
        <div class="select_wrapper" style="width: 500px;">
          <select style="width: 500px;" name="nomination_id">
           <?php foreach ($nomination_list as $date_key => $date_value): ?>
            <?php foreach ($date_value as $hall_key => $hall_value): ?> 
              <?php foreach ($hall_value as $part_key => $part_value): ?>
                <?php foreach ($part_value as $nomination_key => $nomination_value): ?>
                  <option value="<?php echo $nomination_value['id'] ?>">
                    <?php echo Admin_timetable::get_festival_date($date_key)['date'];?> ||
                    <?php echo Admin_timetable::get_festival_hall($hall_key)['hall'];?> ||
                    <?php echo Admin_timetable::get_festival_part($part_key)['part'];?> ||
                    <?php echo $nomination_value['nomination'] ?>
                  </option>
                <?php endforeach ?>
              <?php endforeach ?>
            <?php endforeach ?>
          <?php endforeach ?> 
        </select>
      </div>
    </td>
    <td>
      <div class="select_wrapper">
        <select name="user_id">
          <?php foreach ($users_list as $key => $value): ?>
            <option value="<?php echo $value['id'] ?>">
              <?php echo $value['fio']; ?>
            </option>     
          <?php endforeach ?>
        </select>
      </div>
    </td>
    <td>
      <button name="admin_nomination_list_add" value="true">
       <i class="fa fa-floppy-o" aria-hidden="true"></i>
     </button>
   </td>
 </tr>
</table>
</form>

