<div class="test">
  <table>
    <tr>
      <th>id</th>
      <th>email</th>
      <th>name</th>
      <th>password</th>
      <th>edit</th>
      <th>delete</th>
    </tr>
    <?php foreach (General_class::get_table_data('festival_judge') as $key => $value) : ?>
      <tr>
        <td><?php echo $value['id'];?></td>
        <td><?php echo $value['email'];?></td>
        <td><?php echo $value['name'];?></td>
        <td><?php echo $value['password'];?></td>
        <td></td>
        <td></td>
      </tr>                         
    <?php endforeach; ?> 
  </table>
</div>