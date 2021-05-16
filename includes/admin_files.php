 
<div class="files">
  <div>
    <table>
      <tr>
        <th colspan="2">
          ТРЕКИ ПОЛЬЗОВАТЕЛЕЙ
        </th>
      </tr>
      <?php foreach ($profileData as $key => $value) { ?>
        <tr>
          <th colspan="2">
            <?php echo $value['id'] ?>
            <?php echo $value['fio'] ?>
          </th>
        </tr>
        <?php foreach (userFilesList($value['id']) as $subkey => $subvalue) { ?>
          <tr>
            <td>
              <a href="user_upload/<?php echo $subvalue; ?>" download="download">
                <?php echo $subvalue; ?>
              </a>
            </td>
            <td>
              <form action="php/users_files_list.php" method="post">
                <input  value="<?php echo $subvalue ?>" name="track_delete" type="hidden">
              </form>
              <button name="track_delete">
                <i class="fa fa-trash" aria-hidden="true"></i>
              </button>
            </td>
          </tr>
        <?php } ?>
      <?php } ?>
    </table>
  </div>
  <div>
    <table>
      <tr>
        <th colspan="4">
          ФОТО ПОЛЬЗОВАТЕЛЕЙ
        </th>
      </tr>
      <tr>
        <td>id</td><td>ФИО</td><td>file</td><td>Удалить</td>
      </tr>
      <?php foreach ($profileData as $key => $value) { ?>
        <tr>
          <td><?php echo $value['id'] ?></td>
          <td><?php echo $value['fio'] ?></td>
          <td><?php echo $value['photo'] ?></td>
          <td>
            <form action="php/users_files_list.php" method="post">
              <input  value="<?php echo $value['id'] ?>" 
              name="user_id" type="hidden">
              <input  value="<?php echo $value['photo'] ?>" 
              name="photo_delete" type="hidden">
            </form>
            <button name="photo_delete">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
          </td>
        </th>
      </tr>
    <?php } ?>
  </table>
</div>
<div>
  <table>
    <tr>
      <th colspan="4">
        СЕРТИФИКАТЫ ПОЛЬЗОВАТЕЛЕЙ
      </th>
    </tr>
    <td>id</td><td>ФИО</td><td>file</td><td>Удалить</td>
    <?php foreach ($profileData as $key => $value) { ?>
      <tr>
        <td><?php echo $value['id'] ?></td>
        <td><?php echo $value['fio'] ?></td>
        <td><?php echo $value['certificate'] ?></td>
        <td>
          <form action="php/users_files_list.php" method="post">
            <input  value="<?php echo $value['id'] ?>" 
            name="user_id" type="hidden">
            <input  value="<?php echo $value['certificate'] ?>" 
            name="certificate_delete" type="hidden">
          </form>
          <button name="certificate_delete">
            <i class="fa fa-trash" aria-hidden="true"></i>
          </button>
        </td>
      </th>
    </tr>
  <?php } ?>
</table>
</div>
</div>
