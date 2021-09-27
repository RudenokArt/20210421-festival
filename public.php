<?php include_once 'header.php'; ?>
<?php spl_autoload_register(); ?>
<link rel="stylesheet" href="css/admin.css?v=<?php echo time();?>">
<link rel="stylesheet" href="css/admin_app.css?v=<?php echo time();?>">
<style>
  .select_wrapper,
  select, option {
    max-width: 90vw !important;
  }
</style>
<?php include_once 'php/Admin_judge.php' ?>
<?php include_once 'php/Admin_timetable.php' ?>
<?php include_once 'php/users_get_data.php'; ?>
<?php include_once 'php/Admin_nomination_list.php' ?>
<?php $nomination_list = Admin_timetable::normalize_nomination_list(); ?>
<?php if (Php\Admin_results::results_public_page_get()=='true'): ?>
  <img src="img/main.jpg" alt="MiraMar" class="main_img">
  <div class="row">
    <div class="container">
      <form action="public.php" method="get">
        <table>
          <tr>
            <td>
              <?php include_once 'includes/admin_nomination_list_filter.php' ?>
            </td>
            <td>
              <input type="hidden" name="nomination_filter" value="true">
              <button name="admin_results" value="true">
                <i class="fa fa-filter" aria-hidden="true"></i>
              </button>
            </td>
            <td>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>  
  <?php include_once 'includes/admin_app_results.php' ?>
  <?php else: ?>
    <div class="row">
      <div class="container">
        <h2>Доступ заблокирован.</h2>
        <h3>Обратитесь к администратору.</h3>
      </div>
    </div>

  <?php endif ?>


  

  <script src="js/admin.js?v=<?php echo time() ?>"></script>
  <?php include_once 'footer.php'; ?>
