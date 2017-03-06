<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$id = $_GET['id'];
$users_result = find_user_by_id($_GET['id']);
// No loop, only one result
$user = db_fetch_assoc($users_result);
?>
<?php $page_title = 'Staff: Delete User ' . $user['first_name'] . " " . $user['last_name']; ?>
<div id="main-content">
  <a href="<?php echo h("index.php");?>" >Back to Users List</a><br />
  <h1>Are you sure you want to permanently delete the user: <?php echo $user['first_name'] . " " . $user['last_name']; ?>?</h1>
  <br>
  <input type="submit" name="delete" value="Delete User"  />

  </div>
  <?php include(SHARED_PATH . '/footer.php'); ?>
