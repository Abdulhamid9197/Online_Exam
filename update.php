<?php
// Include database connection
include('db_connect.php');

// Check if edit form is submitted
if (isset($_POST['update_sugar'])) {
  $sugarId = mysqli_real_escape_string($conn, $_POST['sugar_id']);
  $sugarName = mysqli_real_escape_string($conn, $_POST['sugar_name']);
  $sugarType = mysqli_real_escape_string($conn, $_POST['sugar_type']);
  $healthImpact = mysqli_real_escape_string($conn, $_POST['health_impact']);

  // Update sugar information in the database
  $sql = "UPDATE sugar_data SET sugar_name='$sugarName', sugar_type='$sugarType', health_impact='$healthImpact' WHERE sugar_id=$sugarId";

  if (mysqli_query($conn, $sql)) {
    echo "<p style='color: green;'>Sugar information updated successfully!</p>";
  } else {
    echo "<p style='color: red;'>Error updating sugar: " . mysqli_error($conn) . "</p>";
  }
}

// Check if a sugar ID is provided in the URL (for pre-populating the edit form)
if (isset($_GET['id'])) {
  $sugarId = mysqli_real_escape_string($conn, $_GET['id']);

  // Fetch sugar information for the given ID
  $sql = "SELECT * FROM sugar_data WHERE sugar_id=$sugarId";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $sugarName = $row['sugar_name'];
    $sugarType = $row['sugar_type'];
    $healthImpact = $row['health_impact'];
  } else {
    echo "<p style='color: red;'>Error: Sugar not found!</p>";
  }
} else {
  // Redirect back if no sugar ID is provided
  header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Sugar Information</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Edit Sugar Information</h1>

  <form action="update.php?id=<?php echo $sugarId; ?>" method="post">
    <input type="hidden" name="sugar_id" value="<?php echo $sugarId; ?>"> <label for="sugar_name">Sugar Name:</label><br>
    <input type="text" id="sugar_name" name="sugar_name" value="<?php echo $sugarName; ?>" required><br><br>
    <label for="sugar_type">Sugar Type (e.g., white sugar, brown sugar):</label><br>
    <input type="text" id="sugar_type" name="sugar_type" value="<?php echo $sugarType; ?>" required><br><br>
    <label for="health_impact">Health Impact (brief description):</label><br>
    <textarea id="health_impact" name="health_impact" rows="4" cols="50" required><?php echo $healthImpact; ?></textarea><br><br>
    <button type="submit" name="update_sugar">Update Sugar</button>
  </form>

  <p><a href="index.html">Go Home</a></p>

</body>
</html>
