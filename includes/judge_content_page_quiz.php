<?php spl_autoload_register(); ?>
<?php use \Php\Judge_page_mark_table as Mark_table;  ?>
<?php use \Php\Mark_criterions  as Mark_criterions; ?>
<?php Mark_table::mark_set(); ?>
<?php include_once 'php/Admin_timetable.php' ?>
<?php include_once 'php/users_get_data.php'; ?>
<?php include_once 'php/Admin_nomination_list.php' ?>
<?php $nomination_list = Admin_timetable::normalize_nomination_list(); ?>
<?php $nomination_id = $nomination_list[$_GET['date']][$_GET['hall']][$_GET['part']][$_GET['nomination']]['id']?>
<?php $participants_mark_list = Mark_table::participants_mark_list($nomination_id, $_SESSION['judge']); ?>

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



<div class="table_wrapper" id="mark_table">

  <?php if (isset($_GET['date']) and isset($_GET['hall']) and isset($_GET['part']) and isset($_GET['nomination']) ): ?>
  
  <div class="row">
    <div class="nomination_scroll_button">
      <a href="judge.php?date=<?php echo $_GET['date'];?>&hall=<?php echo $_GET['hall'];?>&part=<?php echo $_GET['part'];?>&nomination=<?php echo Mark_table::back_nomination();?>#tabs-2">
        <button>
          <i class="fa fa-chevron-left" aria-hidden="true"></i>
        </button>
      </a>
    </div>
    <div class="row">
      <div class="nomination_page_title">
        <?php echo $nomination_list[$_GET['date']][$_GET['hall']][$_GET['part']][$_GET['nomination']]['nomination'] ?>
      </div>
    </div>
    <div class="nomination_scroll_button">
      <a href="judge.php?date=<?php echo $_GET['date'];?>&hall=<?php echo $_GET['hall'];?>&part=<?php echo $_GET['part'];?>&nomination=<?php echo Mark_table::next_nomination();?>#tabs-2">
       <button>
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
      </button>
    </a>
  </div>
</div>


<table style="margin-top: 50px;">
  <tr>
    <th>№</th>
    <th>Participant</th>
    <?php foreach (Mark_criterions::$criterions as $key => $value): ?>
      <th style="writing-mode: vertical-rl; padding: 10px; width: 40px;">
        <?php echo $value; ?>

      </th>
    <?php endforeach ?>
    <th style="writing-mode: vertical-rl; padding: 10px; width: 40px;">
      TOTAL
    </th>
    <th></th>
  </tr>
  <?php $participant_counter = 0; ?>
  <?php foreach (Admin_nomination_list::get_list($nomination_id) as $key => $value): ?>
    <?php $participant_counter++ ?>
    <?php $participant =  Admin_nomination_list::get_participant($value['participant']); ?>
    <tr v-on:click="popupShow">
      <td>
        <?php echo $participant_counter; ?>
      </td>
      <td class="width_control">
        <?php echo $participant['fio']; ?>
      </td>
      <?php for ($i=1; $i < 6; $i++) : ?>
        <td class="criterion_mark">
          <?php echo $participants_mark_list[$participant['id']]['criterion_'.$i] ?>
        </td>
      <?php endfor; ?>
      <td><?php echo array_sum($participants_mark_list[$participant['id']]) ?></td>
      <td>
        <div class="wrapper_mark_popup">
          <div class="mark_popup">
            <div class="mark_popup_form">
              <button class="mark_popup_form_close" v-on:click="popupHide">
                <i class="fa fa-times" aria-hidden="true"></i>
              </button>
              <?php echo $participant['id']; ?><br>
              <?php echo $participant['fio']; ?><br><br>
              <form action="" method="post">
                <input 
                value="<?php echo $nomination_id;?>" 
                type="hidden" name="nomination">
                <input type="hidden" value="<?php echo $participant['id'];?>" name="participant">
                <input type="hidden" value="<?php echo $_SESSION['judge'];?>" name="judge">
                <?php for ($i=1; $i < 6; $i++) : ?>
                  <div>
                    <span style="writing-mode: vertical-rl; height: 150px;
                    margin:10px;text-align: right; margin:5px;">
                    <?php echo Mark_criterions::$criterions[$i-1] ?>
                  </span><br>
                  <input name="criterion_<?php echo $i;?>" class="mark_popup_input"
                  value="<?php echo $participants_mark_list[$participant['id']]['criterion_'.$i] ?>"
                  v-on:input="max_value_check" type="number" step="0.1" max="10">
                </div>
              <?php endfor; ?>
              <div>
                <span style="writing-mode: vertical-rl; height: 150px;
                line-height: 0;text-align: right; margin:5px;">
              </span><br>
              <button name="mark_set" value="true">
                <i class="fa fa-check" aria-hidden="true"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
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



