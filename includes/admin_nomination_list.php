<?php include_once 'php/users_get_data.php'; ?>
<?php include_once 'php/Admin_nomination_list.php' ?>
<?php $users_list = get_users_data(); ?>

<div class="container">
  <div class="row">
   <form method="post" action="php/Admin_nomination_list.php">
    <table>
      <tr>
        <th>Номинация</th>
        <th>Участник</th>
        <th>Добавить</th>
      </tr>
      <tr>
        <td>
          <?php include 'includes/admin_nomination_list_filter.php'; ?>
        </td>
        <td>
          <div class="select_wrapper">
            <select name="user_id">
              <?php foreach ($users_list as $key => $value): ?>
                <option value="<?php echo $value['id'] ?>">
                  <?php echo $value['fio']; ?>
                </option>     
              <?php endforeach ?>
            </select>
          </div>
        </td>
        <td>
          <input value="true" name="nomination_filter" type="hidden" >
          <button name="nomination_list_add_item" value="true">
           <i class="fa fa-floppy-o" aria-hidden="true"></i>
         </button>
       </td>
     </tr>
   </table>
 </form> 
</div>
</div>

<div class="container">
  <div class="row">
    <table>
      <form action="" method="get">
        <tr>
          <td colspan="2">
            <b>Список участников в номинации:</b><br>
            <?php include 'includes/admin_nomination_list_filter.php'; ?>
          </td>
          <td>
            <input type="hidden" name="page" value="admin_nomination_list">
            <button name="nomination_filter" value="true">
              <i class="fa fa-search-plus" aria-hidden="true"></i>
            </button>
          </td>
        </tr>
      </form>
      <?php if (isset($_GET['nomination_filter'])): ?>
        <?php $nominations_table = 
        Admin_nomination_list::get_list($_GET['nomination_id']); ?>
        <?php foreach ($nominations_table as $key => $value): ?>
          <tr>
            <td>
              <?php echo Admin_nomination_list::get_nomination(
                $value['nomination']
              )['nomination'];?>
              //<?php echo $value['nomination']; ?>
            </td>
            <td> 
              <?php echo Admin_nomination_list::get_participant(
                $value['participant']
              )['fio']; ?>
            </td>
            <td>
              <form method="post" action="php/Admin_nomination_list.php">
                <input  value="<?php echo $_GET['nomination_id'] ?>" 
                type="hidden" name="nomination_id">
                <input value="<?php echo $_GET['nomination_filter'] ?>" 
                name="nomination_filter" type="hidden" >
                <button value="<?php echo $value['id'] ?>"
                  name="nomination_list_delete_item" >
                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach ?>
      <?php endif ?>
    </table>
  </div>
</div>


