<div class="select_wrapper" style="width: 500px;">
  <select style="width: 500px;" name="nomination_id">
   <?php foreach ($nomination_list as $date_key => $date_value): ?>
    <?php foreach ($date_value as $hall_key => $hall_value): ?> 
      <?php foreach ($hall_value as $part_key => $part_value): ?>
        <?php foreach ($part_value as $nomination_key => $nomination_value): ?>
          <option 
          <?php if (isset($_GET['nomination_filter']) and 
          $_GET['nomination_id'] == $nomination_value['id']): ?>
            selected="selected"
          <?php endif ?>
          value="<?php echo $nomination_value['id'] ?>">
            <?php echo $nomination_value['nomination'] ?> (  
            <?php echo Admin_timetable::get_festival_date($date_key)['date'];?> ~
            <?php echo Admin_timetable::get_festival_hall($hall_key)['hall'];?> ~
            <?php echo Admin_timetable::get_festival_part($part_key)['part'];?> )
          </option>
        <?php endforeach ?>
      <?php endforeach ?>
    <?php endforeach ?>
  <?php endforeach ?> 
</select>
</div>