<div class="container">
  <table>
    <?php foreach ($nomination_list as $date_key => $date_value): ?>
      <tr>
        <td colspan="5"> 
          <?php echo Admin_timetable::get_festival_date($date_key)['date'] ?>
        </td>
      </tr>
      <?php foreach ($date_value as $hall_key => $hall_value): ?>
       <tr>
        <td></td>
        <td colspan="4">
         <?php echo Admin_timetable::get_festival_hall($hall_key)['hall']; ?>
       </td>
     </tr>
     <?php foreach ($hall_value as $part_key => $part_value): ?>
      <tr>
        <td></td>
        <td></td>
        <td colspan="3">
          <?php echo Admin_timetable::get_festival_part($part_key)['part'];  ?>
        </td>
      </tr>
      <?php foreach ($part_value as $nomination_key => $nomination_value): ?>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td>
            <?php echo $nomination_value['nomination']; ?>
          </td>
          <td>
            <?php foreach (Admin_nomination_list::get_list($nomination_value['id']) as $key => $value): ?>
              <?php echo Admin_nomination_list::get_participant($value['participant'])['fio'];?> <br>
            <?php endforeach ?>
          </td>
        </tr>
      <?php endforeach ?>
    <?php endforeach ?>
  <?php endforeach ?>
<?php endforeach ?>
</table>
</div>

