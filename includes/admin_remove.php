<div class="test">
  <?php foreach ($profileData as $key => $value) { ?>
    <?php print_r($value) ?><br><br>
  <?php } ?>
</div>
<table>
  <?php foreach ($profileData as $key => $value) { ?>
    <tr>
      <td>
        <?php echo $value['id'] ?>
      </td>
      <td>
        <?php echo $value['fio'] ?>
      </td>
      <td>
        <?php echo $value['email'] ?>
      </td>
      <td>
        <?php echo $value['phone'] ?>
      </td>
      <td>
        <form action="php/users_get_data.php" method="post">
          <input type="hidden" name="delete_user_id"
          value="<?php echo $value['id'] ?>">
          <input type="hidden" name="photo"
          value="<?php echo $value['photo'] ?>">
          <input type="hidden" name="certificate"
          value="<?php echo $value['certificate'] ?>">
        </form>
        <button name="delete_user">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
      </td>
    </tr>    
  <?php } ?>
</table>