
<?php $dates_list = Admin_timetable::get_dates_list(); ?>
<?php $halls_list = Admin_timetable::get_halls_list(); ?>
<?php $parts_list = Admin_timetable::get_parts_list(); ?>


<div class="row">
  <div class="container">
    <div class="title container">
      Даты проведения:
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
    <div class="container">
      <form action="" method="get">
        <table>
          <tr><th>Новая дата:</th><th>Добавить</th></tr>
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
  </div>

  <div class="container">
    <div class="container title">
      Заллы:
    </div>
    <div class="container">
      <table>
        <?php foreach ($halls_list as $key => $value): ?>
          <tr>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['hall'] ?></td>
            <td>
              <form action="" method="get">
                <button value="<?php echo $value['id'] ?>" name="festival_hall_delete">
                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach ?>
      </table>
    </div>
    <div class="container">
      <form action="" method="get">
        <table>
          <tr><th>Новый залл</th><th>Добавить:</th></tr>
          <tr>
            <td>
              <input type="text" name="festival_add_new_hall">
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
  </div>

  <div class="container">
    <div class="container title">
      Отделения:
    </div>
    <div class="container">
      <table>
        <?php foreach ($parts_list as $key => $value): ?>
          <tr>
            <td>
              <?php echo $value['id']; ?>
            </td>
            <td>
              <?php echo $value['part'] ?>
            </td>
            <td>
              <form action="" method="get">
                <button name="festival_part_delete"  value="<?php echo $value['id'] ?>" >
                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach ?>
      </table>
    </div>
    <div class="container">
      <form action="" method="get">
        <table>
          <tr>
            <th>Новое отделение</th>
            <th>Добавить</th>
          </tr>
          <tr>
            <td>
              <input type="text" name="festival_add_new_part">
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
  </div>
</div>

<div class="row">
  <div class="container">
    <div class="title container">
      Номинации
    </div>
    <div class="container">
      <form action="" method="get">
        <table>
          <tr>
            <th>Дата проведения</th>
            <th>Залл</th>
            <th>Отделение</th>
            <th>Номинация</th>
            <th>Добавить</th>
          </tr>
          <tr>
            <td>
             <div class="select_wrapper">
              <select name="date">
                <?php foreach ($dates_list as $key => $value): ?>
                  <option value="<?php echo $value['id']; ?>"><?php echo $value['date'] ?></option>
                <?php endforeach ?>
              </select>
            </div>    
          </td>
          <td>
           <div class="select_wrapper">
            <select name="hall">
              <?php foreach ($halls_list as $key => $value): ?>
                <option value="<?php echo $value['id']; ?>"><?php echo $value['hall'] ?></option>
              <?php endforeach ?>
            </select>
          </div>    
        </td>
        <td>
         <div class="select_wrapper">
          <select name="part">
            <?php foreach ($parts_list as $key => $value): ?>
              <option value="<?php echo $value['id']; ?>"><?php echo $value['part'] ?></option>
            <?php endforeach ?>
          </select>
        </div>    
      </td>
      <td>
       <input type="text" name="fistival_nomination_add">
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
</div>
</div>



<?php foreach ($nomination_list as $date_key => $date_value): ?>
  <div class="tr_like">
    <div class="td_like" style="width: 120px">
      <?php echo Admin_timetable::get_festival_date($date_key)['date'] ?>
    </div>
    <div class="">
      <?php foreach ($date_value as $hall_key => $hall_value): ?>
        <div class="tr_like" >
          <div class="td_like" style="width: 200px">
            <?php echo Admin_timetable::get_festival_hall($hall_key)['hall']; ?>
          </div>
          <div class="">
            <?php foreach ($hall_value as $part_key => $part_value): ?>
              <div class="tr_like">
                <div class="td_like" style="width: 200px">
                  <?php echo Admin_timetable::get_festival_part($part_key)['part'];  ?>
                </div>
                <div class="td_like">
                  <?php foreach ($part_value as $nomination_key => $nomination_value): ?>
                    <div class="tr_like" style="justify-content: flex-end;">
                      <table>
                        <tr>
                          <td style="border:none">
                            <?php echo $nomination_value['nomination'] ?>
                          </td>
                          <td style="border:none">
                           <form action="" method="get">
                            <button value="<?php echo $nomination_value['id'] ?>" name="festival_nomination_delete">
                              <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                          </form> 
                        </td>
                      </tr>
                    </table>
                  </div>
                <?php endforeach ?>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>
<?php endforeach ?>



