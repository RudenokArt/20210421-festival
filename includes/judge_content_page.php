
<div id="tabs" class="tabs">
  <ul>
    <li><a href="#tabs-1">
      <i class="fa fa-user-o" aria-hidden="true"></i>
    </a></li>
  </ul>
  <div id="tabs-1" class="tab">
    <div class="tag_item">
        Your name:
      <form action="judge.php" method="get">
        <input type="text" name="judge_name"
         value="<?php echo $judge_data['name'] ?>">
         <button name="judge_update" value="true">
           <i class="fa fa-floppy-o" aria-hidden="true"></i>
         </button>
      </form>
    </div>
    <div class="tag_item">
      Your email / login: 
      <?php echo $judge_data['email'] ?>
    </div>
    <div class="tag_item">
      <form action="judge.php" method="get">
        <button name="judge_logout" value="true">
          <i class="fa fa-sign-out" aria-hidden="true"></i>
          Log out
        </button>
      </form>
    </div>
  </div>
</div>

<?php include_once 'footer.php'; ?>