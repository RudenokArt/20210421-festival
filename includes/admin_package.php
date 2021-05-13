
<form action="php/package_get_data.php" method="post">
  <table>
    <tr>
      <td>Обязательный мастер-класс:</td>
      <td>
        <div class="select_wrapper">
          <select name="main_master">
            <?php foreach (masterlList('master') as $key => $value) {?>
              <option
              <?php echo($value['id']==getMainMaster()?'selected':'')?>
              value="<?php echo $value['id'] ?>" >
              <?php echo $value['master']  ?>
            </option>
          <?php  } ?>
        </select>
      </div>
    </td>
    <td>
      <button>
        <i class="fa fa-floppy-o" aria-hidden="true"></i>
      </button>
    </td>
  </tr>
  <tr>
    <td colspan="3">
     <fieldset>
      <legend>Номинации под оркестр не включаемые в пакет: </legend>
      <?php foreach (masterlList('orchestra') as $key => $value) {?>
        <label>
          <input value="<?php echo $value['id'] ?>" 
          <?php if (in_array($value['id'], getOverPocket())) {?>
            checked="checked"
           <?php } ?>
          name="<?php echo $value['id'] ?>"type="checkbox">
          <i class="fa fa-circle-o" aria-hidden="true"></i>
          <?php echo $value['orchestra']; ?>
        </label>
        <br><br>   
      <?php } ?>
    </fieldset>
  </td>
</tr>
</table>
</form>



<div class="test">
  
</div>

