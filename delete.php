<?php
// Include database connection
include('db_connect.php');

// Check if a sugar ID is provided in the URL
if (isset($_GET['id'])) {
  $sugarId = mysqli_real_escape_string($conn, $_GET['id']);

  // Prepare a confirmation message
  $confirmation_message = "Are you sure you want to delete sugar with ID " . $sugarId . "? This action cannot be undone.";

  // Check if a confirmation action is submitted (optional)
  if (isset($_POST['confirm_delete'])) {
    // Delete sugar from the database (if confirmed)
    $sql = "DELETE FROM sugar_data WHERE sugar_id=$sugarId";

    if (mysqli_query($conn, $sql)) {
      echo "<p style='color: green;'>Sugar information deleted successfully!</p>";
    } else {
      echo "<p style='color: red;'>Error deleting sugar: " . mysqli_error($conn) . "</p>";
    }
  } else {
    // Display confirmation form (optional)
?>
    <p><?php echo $confirmation_message; ?></p>
    <form action="delete.php?id=<?php echo $sugarId; ?>" method="post">
      <button type="submit" name="confirm_delete">Confirm Delete</button>
      <a href="index.html">Cancel</a>
    </form>
<?php
  }
} else {
  // Redirect back if no sugar ID is provided (prevents accidental deletions)
  header('Location: index.php');
}

?>