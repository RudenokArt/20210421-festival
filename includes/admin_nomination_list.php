<?php include_once 'php/users_get_data.php'; ?>
<?php include_once 'php/Admin_nomination_list.php' ?>
<?php $users_list = get_users_data(); ?>
<?php $nominations_table = Admin_nomination_list::get_list(); ?>



<div class="container">
  <div class="row">
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
        <button name="nomination_list_add_item" value="true">
         <i class="fa fa-floppy-o" aria-hidden="true"></i>
       </button>
     </td>
   </tr>
 </table>
</form> 
</div>
</div>

<div class="container">
  <div class="row">
    <table>
      <?php foreach ($nominations_table as $key => $value): ?>
        <tr>
          <td><?php print_r($value) ?></td>
          <td>
            <?php 
            echo Admin_timetable::get_festival_date( 
              Admin_nomination_list::get_nomination($value['nomination']
            )['date'])['date']; 
            ?>
          </td>
          <td>
            <?php 
            echo Admin_timetable::get_festival_hall(
              Admin_nomination_list::get_nomination($value['nomination'])['hall']
            )['hall'];
            ?>
          </td>
          <td>
            <?php 
            echo Admin_timetable::get_festival_part(
              Admin_nomination_list::get_nomination($value['nomination'])['part']
            )['part'];
            ?>
          </td>
          <td><?php echo Admin_nomination_list::get_nomination($value['nomination'])['nomination'];?></td>
          <td> <?php echo $value['participant'] ?> </td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
</div>


