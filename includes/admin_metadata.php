  <div class="new_meta">
   <form action="php/new_meta.php" id="add_meta" method="post">
    <div>Добавить:</div>
    <div class="select_wrapper">
      <select name="meta_type">
        <option value="master">Мастер-классы</option>
        <option value="cd">Номинации под CD</option>
        <option value="orchestra">Номинации под ОРКЕСТР</option>
        <option value="food">Питание</option>
      </select>
    </div>
    <div>
      <input type="text" name="meta_name">
    </div>
  </form>
  <div>
    <button name="add_meta">
      <i class="fa fa-check" aria-hidden="true"></i>
    </button>
  </div>
</div>

<div class="meta_list">
  <div>
    <table>
      <tr>
        <th colspan="4">
          Мастер-классы
        </th>
      </tr>
      <?php foreach (masterlList('master') as $key => $value) { ?>
        <tr>
          <td>
            <?php echo($value['id']) ?>
            <form action="php/remove_meta.php" method="post" class="remove_meta">
              <input type="text" value="<?php echo($value['id']) ?>"
              class="input_id" name="remove_meta" readonly >
            </form>
          </td>
          <td>
            <button name="remove_meta">
             <i class="fa fa-trash" aria-hidden="true"></i>
           </button>
         </td>
         <td>
          <form action="php/edit_meta.php" method="post" class="edit_meta">
            <input type="text" value="<?php echo($value['id']) ?>"
            class="input_id" name="meta_id" readonly >
            <input type="text" name="master_name"
            value="<?php echo($value['master']) ?>">
          </form>
        </td>
        <td>
          <button value="<?php echo($value['id']) ?>" name="edit_meta">
            <i class="fa fa-floppy-o" aria-hidden="true"></i>
          </button>
        </td>
      </tr>
    <?php }  ?>
  </table>
</div>

<div>
  <table>
    <tr>
      <th colspan="4">
        Номинации под cd
      </th>
    </tr>
    <?php foreach (masterlList('cd') as $key => $value) { ?>
      <tr>
       <tr>
        <td>
          <?php echo($value['id']) ?>
          <form action="php/remove_meta.php" method="post" class="remove_meta">
            <input type="text" value="<?php echo($value['id']) ?>"
            class="input_id" name="remove_meta" readonly >
          </form>
        </td>
        <td>
          <button name="remove_meta">
           <i class="fa fa-trash" aria-hidden="true"></i>
         </button>
       </td>
       <td>
        <form action="php/edit_meta.php" method="post" class="edit_meta">
          <input type="text" value="<?php echo($value['id']) ?>"
          class="input_id" name="meta_id" readonly >
          <input type="text" name="cd_name"
          value="<?php echo($value['cd']) ?>">
        </form>
      </td>
      <td>
        <button value="<?php echo($value['id']) ?>" name="edit_meta">
          <i class="fa fa-floppy-o" aria-hidden="true"></i>
        </button>
      </td>
    </tr>
  </tr>
<?php }  ?>
</table>
</div>

<div>
  <table>
    <tr>
      <th colspan="4">
        Номинации под оркестр
      </th>
    </tr>
    <?php foreach (masterlList('orchestra') as $key => $value) { ?>
      <tr>
        <td>
          <?php echo($value['id']) ?>
          <form action="php/remove_meta.php" method="post" class="remove_meta">
            <input type="text" value="<?php echo($value['id']) ?>"
            class="input_id" name="remove_meta" readonly >
          </form>
        </td>
        <td>
          <button name="remove_meta">
           <i class="fa fa-trash" aria-hidden="true"></i>
         </button>
       </td>
       <td>
        <form action="php/edit_meta.php" method="post" class="edit_meta">
          <input type="text" value="<?php echo($value['id']) ?>"
          class="input_id" name="meta_id" readonly >
          <input type="text" name="orchestra_name"
          value="<?php echo($value['orchestra']) ?>">
        </form>
      </td>
      <td>
        <button value="<?php echo($value['id']) ?>" name="edit_meta">
          <i class="fa fa-floppy-o" aria-hidden="true"></i>
        </button>
      </td>
    </tr>
  <?php }  ?>
</table>
</div>
<div>
  <table>
    <tr>
      <th colspan="4">
        Питание
      </th>
    </tr>
    <?php foreach (masterlList('food') as $key => $value) { ?>
      <tr>
        <td>
          <?php echo($value['id']) ?>
          <form action="php/remove_meta.php" method="post" class="remove_meta">
            <input type="text" value="<?php echo($value['id']) ?>"
            class="input_id" name="remove_meta" readonly >
          </form>
        </td>
        <td>
          <button name="remove_meta">
           <i class="fa fa-trash" aria-hidden="true"></i>
         </button>
       </td>
       <td>
        <form action="php/edit_meta.php" method="post" class="edit_meta">
          <input type="text" value="<?php echo($value['id']) ?>"
          class="input_id" name="meta_id" readonly >
          <input type="text" name="food_name"
          value="<?php echo($value['food']) ?>">
        </form>
      </td>
      <td>
        <button value="<?php echo($value['id']) ?>" name="edit_meta">
          <i class="fa fa-floppy-o" aria-hidden="true"></i>
        </button>
      </td>
    </tr>
  <?php }  ?>
</table>
</div>

</div>
