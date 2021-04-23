<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/admin.css">
  <title>Document</title>
</head>
<body>
  <?php  include_once 'php/get_participant_data.php';?>
  <?php include_once 'php/get_metadata.php' ?>
  <table>
    <tr>
      <?php foreach ($th as $key => $value) { ?>
        <th><?php echo $value; ?></th>
      <?php } ?>
    </tr>
    <tr>
      <?php foreach ($th as $key => $value) { ?>
        <th><input type="text"></th>
      <?php } ?>
    </tr>
    <?php foreach ($tr as $tr_key => $tr_value) { ?>
      <tr>
        <?php for ($i=0; $i < count($th); $i++) { ?>
          <td><?php echo $tr_value[$th[$i]] ?></td>
        <?php } ?>
      </tr>
    <?php } ?>
  </table>



  <?php 

  // foreach ($foodArr as $key => $value) {
  //   $sql='ALTER TABLE `festival_participant` ADD `'.$value.'` VARCHAR (250)';
  //   echo $sql; 
  //   $mysqli->query($sql);
  // }



  ?>


</body>
</html>