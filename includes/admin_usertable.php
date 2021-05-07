    <div class="export_block">
      <div>
        <button>
          <i class="fa fa-download" aria-hidden="true"></i>
          Экспорт в .csv
        </button>
      </div>
      <div></div>
    </div>
    <table class="user_table">

      <tr>
        <?php foreach ($profileMeta as $key => $value) {?>
          <th><input type="text" class="filter" ></th>
        <?php } ?>
        <?php foreach (masterlList('master') as $key => $value) {?>
          <th><input type="text" class="filter" ></th>
        <?php } ?>
        <?php foreach (masterlList('cd') as $key => $value) {?>
          <th><input type="text" class="filter" ></th>
        <?php } ?>
        <?php foreach (masterlList('orchestra') as $key => $value) {?>
          <th><input type="text" class="filter" ></th>
        <?php } ?>
        <?php foreach (masterlList('food') as $key => $value) {?>
          <th><input type="text" class="filter" ></th>
        <?php } ?>
        <th><input type="text" class="filter" ></th>
      </tr>

      <tr>
        <?php foreach ($profileMeta as $key => $value) {?>
          <th><?php echo $value ?></th>
        <?php } ?>
        <?php foreach (masterlList('master') as $key => $value) {?>
          <th><?php echo($value['master']) ?></th>
        <?php } ?>
        <?php foreach (masterlList('cd') as $key => $value) {?>
          <th><?php echo($value['cd']) ?></th>
        <?php } ?>
        <?php foreach (masterlList('orchestra') as $key => $value) {?>
          <th><?php echo($value['orchestra']) ?></th>
        <?php } ?>
        <?php foreach (masterlList('food') as $key => $value) {?>
          <th><?php echo($value['food']) ?></th>
        <?php } ?>
        <th>files</th>
      </tr>
      <?php $userCategoryArr=[]; ?>
      <?php foreach ($profileData as $key => $value) {?>
        <?php array_push($userCategoryArr,$value['id']) ?>
        <?php $userCategoryArr[$value['id']]=[] ?>
        <?php array_push($userCategoryArr[$value['id']], $value['package']); ?>
       <tr class="user_tr">
         <?php foreach ($value as $subkey => $subvalue) {?>
          <td>
            <?php if ($subkey=='photo' || $subkey=='certificate') {?>
              <a href="user_upload/<?php echo $subvalue; ?>" download >
                <?php echo $subvalue; ?>
              </a>
            <?php } else{echo $subvalue;} ?>
          </td>
        <?php } ?>
        <?php foreach (masterlList('master') as $keyList => $valueList)  {?>
          <td>
            <?php if (sizeof(getUsersCategory($value['id'],$valueList['id']))>0) {
              array_push($userCategoryArr[$value['id']], $valueList['master']);
              echo true;
            } ?>
          </td>
        <?php  }  ?>
        <?php foreach (masterlList('cd') as $keyList => $valueList) {?>
          <td>
            <?php if (sizeof(getUsersCategory($value['id'],$valueList['id']))>0) {
              array_push($userCategoryArr[$value['id']], $valueList['cd']);
              echo true;
            } ?>
          </td>
        <?php  }  ?>
        <?php foreach (masterlList('orchestra') as $keyList => $valueList) {?>
          <td>
            <?php if (sizeof(getUsersCategory($value['id'],$valueList['id']))>0) {
              array_push($userCategoryArr[$value['id']], $valueList['orchestra']);
              echo true;
            } ?>
            <?php 
            if (isset(getUsersCategory($value['id'],$valueList['id'])[0]['orchestra'])){
              echo getUsersCategory($value['id'],$valueList['id'])[0]['orchestra'];}
              ?>
            </td>
          <?php  }  ?>
          <?php foreach (masterlList('food') as $keyList => $valueList) {?>
            <td>
              <?php if (sizeof(getUsersCategory($value['id'],$valueList['id']))>0) {
                array_push($userCategoryArr[$value['id']], $valueList['food']);
                echo true;
              } ?>
            </td>
          <?php  }  ?>
          <td>
            <?php foreach (userFilesList($value['id']) as $keyFile => $valueFile) {?>
              <a href="user_upload/<?php echo $valueFile ?>" download >
                <?php echo $valueFile ?>
              </a>
              <br><br>
            <?php } ?>
          </td>
        </tr>
      <?php } ?>

    </table>