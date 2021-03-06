<?php
require_once('../../../private/initialize.php');
?>
<?php $page_title = 'Staff: New Territory'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$id = u($_GET['id']);
// No loop, only one result
$errors = array();
$territory = array(
    'name' => '',
    'state_id' => $id,
    'position' => ''
);
$state_id = $territory['state_id'];

if(is_post_request()) {

    if(isset($_POST['name'])) { $territory['name'] = h($_POST['name']);};
    if(isset($_POST['position'])) { $territory['position'] = h($_POST['position']);};

    $result = insert_territory($territory);
    if($result === true) {
      $new_id = db_insert_id($db);
      redirect_to('show.php?id=' . u($new_id));
    } else {
      $errors = $result;
    }

}

?>

<div id="main-content">
    <a href="../states/show.php?id=<?php echo u($territory['state_id']);?>">Back to State Details</a><br />

  <h1>New Territory</h1>
<?php echo display_errors($errors); ?>
  <!-- TODO add form -->
  <form action="new.php?id=<?php echo u($id); ?>" method="post">
      Name: <br>
      <input type="text" name="name" value="<?php echo h($territory['name']); ?>" /> <br>
      Position: <br>
      <input type="text" name="position" value="<?php echo h($territory['position']); ?>" /> <br>
      <input type="submit" name="submit" value="Create" />



  </form>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
