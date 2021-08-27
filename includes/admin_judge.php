
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
        <button>
          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        </button>
      </td>
      <td>
        <form action="" method="get">
          <input type="hidden" name="judge_delete" value="<?php echo $value['id'];?>">
          <button v-on:click.prevent="message">
            <i class="fa fa-trash-o" aria-hidden="true"></i>
          </button>
        </form>

        
      </td>
    </tr>                         
  <?php endforeach; ?> 
</table>
</div>
