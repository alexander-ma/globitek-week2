<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$id = $_GET['id'];
$territories_result = find_territory_by_id($id);
// No loop, only one result
$territory = db_fetch_assoc($territories_result);
$state_id = $territory['state_id'];
$old_territory = $territory['name'];
$errors = array();
if(is_post_request()) {

    if(isset($_POST['name'])) { $territory['name'] = h($_POST['name']);};
    if(isset($_POST['position'])) { $territory['position'] = h($_POST['position']);};

    $result = update_territory($territory);
    if($result === true) {
      redirect_to('show.php?id=' . u($territory['id']));
    } else {
      $errors = $result;
    }

}
?>
<?php $page_title = 'Staff: Edit Territory ' . h($territory['name']); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="../states/show.php?id=<?php echo u($state_id);?> ">Back to State Details</a><br />

  <h1>Edit Territory: <?php echo u($old_territory); ?></h1>
  <?php echo display_errors($errors); ?>

  <!-- TODO add form -->
  <form action="edit.php?id=<?php echo u($territory['id']); ?>" method="post">
      Name: <br>
      <input type="text" name="name" value="<?php echo h($territory['name']) ?>" /> <br>
      Position: <br>
      <input type="text" name="position" value="<?php echo h($territory['position']) ?>" /> <br> <br>
      <input type="submit" name="update" value="Update" /> <br><br>
      <a href="show.php?id=<?php echo u($territory['id']); ?>">Cancel</a>


  </form>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
