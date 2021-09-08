
<?php $dates_list = Admin_timetable::get_dates_list(); ?>
<?php $halls_list = Admin_timetable::get_halls_list(); ?>
<?php $parts_list = Admin_timetable::get_parts_list(); ?>

<div id="admin_timetable_page">
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
                <button v-on:click="showPopup">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </button>
                <div class="edit_popup_invisible">
                  <div class="edit_popup_form">
                    Изменить дату: <br><br>
                    <form action="php/Admin_timetable.php" method="post">
                      <input name="festival_date_id" value="<?php echo $value['id'] ?>" type="hidden" >
                      <input value="<?php echo $value['date'] ?>" readonly="readonly" 
                      type="text" name="festival_date_edit">
                    </form>
                    <br>
                    <button v-on:click="submitEditForm">
                      <i class="fa fa-check" aria-hidden="true"></i>
                    </button>
                    <button v-on:click="hidePopup" >
                      <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                  </div>
                </div>
              </td>
              <td>
                <form action="php/Admin_timetable.php" method="get">
                  <input value="<?php echo $value['id'] ?>" type="hidden" name="festival_date_delete">
                  <button v-on:click="submitDeleteForm">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                  </button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
      <div class="container">
        <form action="php/Admin_timetable.php" method="get">
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
                <button v-on:click="showPopup">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </button>
                <div class="edit_popup_invisible">
                  <div class="edit_popup_form">
                    Редактировать залл: <br><br>
                    <form action="php/Admin_timetable.php" method="post">
                      <input name="festival_hall_id" value="<?php echo $value['id'] ?>" type="hidden" >
                      <input value="<?php echo $value['hall'] ?>" type="text" name="festival_hall_edit">
                    </form>
                    <br>
                    <button v-on:click="submitEditForm">
                      <i class="fa fa-check" aria-hidden="true"></i>
                    </button>
                    <button v-on:click="hidePopup" >
                      <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                  </div>
                </div>
              </td>

              <td>
                <form action="php/Admin_timetable.php" method="get">
                  <input value="<?php echo $value['id'] ?>" type="hidden" name="festival_hall_delete">
                  <button v-on:click="submitDeleteForm">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                  </button>
                </form>
              </td>
            </tr>
          <?php endforeach ?>
        </table>
      </div>
      <div class="container">
        <form action="php/Admin_timetable.php" method="get">
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
                <button v-on:click="showPopup">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </button>
                <div class="edit_popup_invisible">
                  <div class="edit_popup_form">
                    Редактировать отделение: <br><br>
                    <form action="php/Admin_timetable.php" method="post">
                      <input name="festival_part_id" value="<?php echo $value['id'] ?>" type="hidden" >
                      <input value="<?php echo $value['part'] ?>" type="text" name="festival_part_edit">
                    </form>
                    <br>
                    <button v-on:click="submitEditForm">
                      <i class="fa fa-check" aria-hidden="true"></i>
                    </button>
                    <button v-on:click="hidePopup" >
                      <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                  </div>
                </div>
              </td>

              <td>
                <form action="php/Admin_timetable.php" method="get">
                  <input value="<?php echo $value['id'] ?>" type="hidden" name="festival_part_delete">
                  <button v-on:click="submitDeleteForm">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                  </button>
                </form>
              </td>
            </tr>
          <?php endforeach ?>
        </table>
      </div>
      <div class="container">
        <form action="php/Admin_timetable.php" method="get">
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
        <form action="php/Admin_timetable.php" method="get">
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
                            <button v-on:click="showPopup">
                              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                            <div class="edit_popup_invisible">
                              <div class="edit_popup_form">
                                Редактировать номинацию: <br><br>
                                <form action="php/Admin_timetable.php" method="post">
                                  <input value="<?php echo $nomination_value['id'] ?>" 
                                  name="festival_nomination_id" type="hidden" >
                                  <input value="<?php echo $nomination_value['nomination'] ?>" 
                                  type="text" name="festival_nomination_edit">
                                </form>
                                <br>
                                <button v-on:click="submitEditForm">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </button>
                                <button v-on:click="hidePopup" >
                                  <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                              </div>
                            </div>
                          </td>

                          <td style="border:none">
                           <form action="php/Admin_timetable.php" method="get">
                            <input value="<?php echo $nomination_value['id'] ?>" type="hidden" name="festival_nomination_delete">
                            <button v-on:click="submitDeleteForm">
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

</div>

<script src="js/admin_timetable.js?v=<?php echo time(); ?>"></script>