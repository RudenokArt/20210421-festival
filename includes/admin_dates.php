<?php include_once 'php/Admin_timetable.php' ?>
<?php $dates_list = Admin_timetable::get_dates_list() ?>
<div class="tab_item">
  <form action="" method="get">
    <table>
      <tr>
        <th>Новая дата:</th>
        <th>Добавить</th>
      </tr>
      <tr>
        <td>
          <input type="text" readonly="readonly" name="festival_add_new_date">
        </td>
        <td>
          <button>
            <i class="fa fa-plus" aria-hidden="true"></i>
          </button>
        </td>
      </tr>
    </table>
  </form>
</div>
<div  class="tab_item">
  <table>
    <?php foreach ($dates_list as $key => $value) : ?>
      <tr>
        <td><?php echo $value['id'] ?></td>
        <td><?php echo $value['date'] ?></td>
        <td>
          <button>
            <i class="fa fa-times" aria-hidden="true"></i>
          </button>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
