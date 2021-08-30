
<?php $dates_list = Admin_timetable::get_dates_list() ?>
<div class="row">
  <div class="container">
    <div class="title container">
      Даты проведения:
    </div>
    <div class="container">
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
                <i class="fa fa-floppy-o" aria-hidden="true"></i>
              </button>
            </td>
          </tr>
        </table>
      </form>
    </div>
    <div  class="container">
      <table>
        <?php foreach ($dates_list as $key => $value) : ?>
          <tr>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['date'] ?></td>
            <td>
              <form action="" method="get">
                <button name="festival_date_delete" value="<?php echo $value['id'] ?>">
                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
  
</div>
