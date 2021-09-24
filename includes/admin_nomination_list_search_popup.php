<div class="admin_nomination_list_add_item_popup"
v-bind:class="popup_class"
id="admin_nomination_list_add_item_popup">
<div class="admin_nomination_list_add_item_popup_form" 
id="admin_nomination_list_add_item_popup_form">
<button class="admin_nomination_list_search_popup_close" v-on:click="hide_popup">
  <i class="fa fa-times" aria-hidden="true"></i>
</button>
<div class="admin_nomination_list_add_item_popup_form_search" >
  <table>
    <tr>
      <td>
        <input v-on:input="search_items" type="text" placeholder="id или ФИО">
      </td>
    </tr>
  </table>
</div>
<div class="admin_nomination_list_add_item_popup_form_list">
  <?php foreach ($users_list as $key => $value): ?>
    <div v-on:click="select_item(<?php echo $value['id']; ?>)"
    class="admin_nomination_list_add_item_popup_form_list_item">
      <?php echo $value['id']; ?> <?php echo $value['fio']; ?>
    </div>     
  <?php endforeach ?>
</div>
</div>
</div>