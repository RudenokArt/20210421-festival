  <form method="post" action="php/user_category_set_data.php" class="ajax_form">
    <div class="tab_content">
      <div class="tab_item">
        <div class="tab_item-title">
          <div>Мастер-классы:</div>
        </div>
        <div class="tab_item-content">
          <?php foreach (masterlList('master') as $key => $value) {?>
            <table>
              <tr>
                <td>
                  <label>
                    <input name="<?php echo $value['master'] ?>" 
                    <?php if(in_array($value['id'],getUserCategory())){
                      array_push($userCategoryArr[getUserData()['id']],
                      [$value['id'],'master']);?>
                      checked="checked"
                    <?php  } ?>
                    value="<?php echo $value['id'] ?>" type="checkbox">
                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                    <?php echo $value['master'] ?>
                  </label>
                </td>
              </tr>
            </table>
          <?php  } ?>
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_item-title">
          <div>Номинации под CD:</div>
        </div>
        <div class="tab_item-content">
          <?php foreach (masterlList('cd') as $key => $value) {?>
            <table>
              <tr>
                <td>
                  <label>
                    <input name="<?php echo $value['cd'] ?>" 
                    <?php if(in_array($value['id'],getUserCategory())){ 
                      array_push($userCategoryArr[getUserData()['id']],
                      [$value['id'],'cd']) ?>
                      checked="checked"
                    <?php  } ?>
                    value="<?php echo $value['id'] ?>" type="checkbox">
                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                    <?php echo $value['cd'] ?>
                  </label>
                </td>
              </tr>
            </table>
          <?php  } ?>
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_item-title">
          <div>Номинации под ОРКЕСТР:</div>
        </div>
        <div class="tab_item-content">
          <?php foreach (masterlList('orchestra') as $key => $value) { 
            array_push($userCategoryArr[getUserData()['id']],
            [$value['id'],'orchestra']) ?>
            <table>
              <tr>
                <td>
                  <label>
                    <input name="<?php echo $value['orchestra'] ?>" 
                    <?php if(in_array($value['id'],getUserCategory())){?>
                      checked="checked"
                    <?php  } ?>
                    value="<?php echo $value['id'] ?>" 
                    class="orchestraCheckbox" type="checkbox">
                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                    <?php echo $value['orchestra'] ?>
                  </label>
                </td>
              </tr>
            </table>
          <?php  } ?>
        </div>
      </div>
      <div class="tab_item">
        <div class="tab_item-title">
          <div>Питание:</div>
        </div>
        <div class="tab_item-content">
          <?php foreach (masterlList('food') as $key => $value) {?>
            <table>
              <tr>
                <td>
                  <label>
                    <input name="<?php echo $value['food'] ?>" 
                    <?php if(in_array($value['id'],getUserCategory())){ 
                      array_push($userCategoryArr[getUserData()['id']],
                      [$value['id'],'food']) ?>
                      checked="checked"
                    <?php  } ?>
                    value="<?php echo $value['id'] ?>" type="checkbox">
                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                    <?php echo $value['food'] ?>
                  </label>
                </td>
              </tr>
            </table>
          <?php  } ?>
        </div>
      </div>
    </div>
  </form>
  <div class="tab_item">
    <div class="tab_item-title"></div>
    <div class="tab_item-content">
      <button name="category_set_data">
        <i class="fa fa-floppy-o" aria-hidden="true"></i>
        Сохранить <br>список категорий
      </button>
    </div>
  </div>