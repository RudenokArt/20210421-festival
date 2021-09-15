<?php include_once 'php/Admin_timetable.php' ?>
<?php include_once 'php/users_get_data.php'; ?>
<?php include_once 'php/Admin_nomination_list.php' ?>
<?php $nomination_list = Admin_timetable::normalize_nomination_list(); ?>

  
  <div class="navigation">
    <a href="judge.php#tabs-2" class="navigation_item">Festival MiraMar</a>
    <?php if (isset($_GET['date'])): ?>
      <a href="judge.php?date=<?php echo $_GET['date'];?>#tabs-2" class="navigation_item">
        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        <?php echo Admin_timetable::get_festival_date($_GET['date'])['date'] ?>
      </a>
    <?php endif ?>
    <?php if (isset($_GET['hall'])): ?>
      <a href="judge.php?date=<?php echo $_GET['date'];?>&hall=<?php echo $_GET['hall'];?>#tabs-2" class="navigation_item">
        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        <?php echo Admin_timetable::get_festival_hall($_GET['hall'])['hall'] ?>
      </a>
    <?php endif ?>
    <?php if (isset($_GET['part'])): ?>
      <a href="judge.php?date=<?php echo $_GET['date'];?>&hall=<?php echo $_GET['hall'];?>&part=<?php echo $_GET['part'];?>#tabs-2" class="navigation_item">
        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        <?php echo Admin_timetable::get_festival_part($_GET['part'])['part'] ?>
      </a>
    <?php endif ?>
    <?php if (isset($_GET['nomination'])): ?>
      <span class="navigation_item nomination_title">
       <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
       <?php echo $nomination_list[$_GET['date']][$_GET['hall']][$_GET['part']][$_GET['nomination']]['nomination'] ;?>
     </span>
   <?php endif ?>
 </div>


<div class="table_wrapper">
<?php if (isset($_GET['date']) and isset($_GET['hall']) and isset($_GET['part']) and isset($_GET['nomination']) ): ?>
<?php $nomination_id = $nomination_list[$_GET['date']][$_GET['hall']][$_GET['part']][$_GET['nomination']]['id']; ?>

<button>
  <i class="fa fa-floppy-o" aria-hidden="true"></i>
  SAVE
</button>

<table>
  <tr>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php foreach (Admin_nomination_list::get_list($nomination_id) as $key => $value): ?>
    <?php $participant =  Admin_nomination_list::get_participant($value['participant']); ?>
    <tr>
      <td>
        <?php echo $participant['id']; ?>
      </td>
      <td class="width_control">
        <?php echo $participant['fio']; ?>
      </td>
      <td style="padding: 0">
        <input type="text" class="mark_input">
      </td>
      <td style="padding: 0">
        <input type="text"  class="mark_input">
      </td>
      <td style="padding: 0">
        <input type="text"  class="mark_input">
      </td>
      <td style="padding: 0">
        <input type="text"  class="mark_input">
      </td>
      <td style="padding: 0">
        <input type="text"  class="mark_input">
      </td>
    </tr>
  <?php endforeach ?>
</table>


<?php elseif (isset($_GET['date']) and isset($_GET['hall']) and isset($_GET['part']) ): ?>
<div class="row">
  <div class="container">
    <ul class="quiz_step">
      <?php foreach ($nomination_list[$_GET['date']][$_GET['hall']][$_GET['part']] as $key => $value): ?>
        <li>
          <a href="judge.php?date=<?php echo $_GET['date'];?>&hall=<?php echo $_GET['hall'];?>&part=<?php echo $_GET['part']?>&nomination=<?php echo $key;?>#tabs-2">
            <?php echo $value['nomination']; ?>
          </a>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
</div>

<?php elseif (isset($_GET['date']) and isset($_GET['hall'])): ?>
<div class="row">
  <div class="container">
    <ul class="quiz_step">
      <?php foreach ($nomination_list[$_GET['date']][$_GET['hall']] as $key => $value): ?>
        <li>
          <a href="judge.php?date=<?php echo $_GET['date'];?>&hall=<?php echo $_GET['hall'];?>&part=<?php echo $key;?>#tabs-2">
            <?php echo Admin_timetable::get_festival_part($key)['part']; ?>
          </a>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
</div>

<?php elseif (isset($_GET['date'])): ?>
  <div class="row">
    <div class="container">
      <ul class="quiz_step">
        <?php foreach ($nomination_list[$_GET['date']] as $key => $value): ?>
          <li>
            <a href="judge.php?date=<?php echo $_GET['date'];?>&hall=<?php echo $key;?>#tabs-2">
              <?php echo Admin_timetable::get_festival_hall($key)['hall']; ?>
            </a>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
  </div>

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

</div>



<pre>
  
<?php print_r($_SESSION); ?>
</pre>