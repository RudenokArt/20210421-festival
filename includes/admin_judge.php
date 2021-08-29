<?php include_once 'php/Admin_judge.php' ?>
<div>
  <table id="judge_table">
    <tr>
      <th>id</th>
      <th>email</th>
      <th>name</th>
      <th>password</th>
      <th>edit</th>
      <th>delete</th>
    </tr>
    <?php foreach (Admin_judge::get_list() as $key => $value) : ?>
      <tr>
        <td><?php echo $value['id'];?></td>
        <td><?php echo $value['email'];?></td>
        <td><?php echo $value['name'];?></td>
        <td><?php echo $value['password'];?></td>
        <td>
          <div class="wrapper_edit_form">
            <div class="edit_form">
              <form action="" method="get">
                <input type="hidden" name="judge_update_id" value="<?php echo $value['id'] ?>">
                <input type="text" name="email" value="<?php echo $value['email'] ?>">
                <br><br>
                <input type="text" name="name" value="<?php echo $value['name'] ?>">
                <br><br>
                <input type="text" name="password" value="<?php echo $value['password'] ?>">
                <br><br>
              </form>
              <button v-on:click="editFormSubmit">
                <i class="fa fa-check" aria-hidden="true"></i>
              </button>
              <button v-on:click="hideJudgeEditPopup">
                <i class="fa fa-times" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <button  v-on:click="showJudgeEditPopup">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
          </button>
        </td>
        <td>
          <form action="" method="get">
            <input type="hidden" name="judge_delete" value="<?php echo $value['id'];?>">
            <button v-on:click.prevent="deleteMessage">
              <i class="fa fa-trash-o" aria-hidden="true"></i>
            </button>
          </form>
        </td>
      </tr>                         
    <?php endforeach; ?> 
  </table>
</div>