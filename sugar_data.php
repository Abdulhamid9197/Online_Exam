
<?php
// Include database connection
include('db_connect.php');
$Numbers = array("One","Two","Three"); 
foreach ($Numbers as $value) { 
    echo $value . "<br>"; 
}

// Check if form is submitted for adding a new sugar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $sugarName = mysqli_real_escape_string($conn, $_POST['sugar_name']);
  $sugarType = mysqli_real_escape_string($conn, $_POST['sugar_type']);
  $healthImpact = mysqli_real_escape_string($conn, $_POST['health_impact']);

  // Insert new sugar into the database
  $sql = "INSERT INTO sugar_data (sugar_name, sugar_type, health_impact)
          VALUES ('$sugarName', '$sugarType', '$healthImpact')";

  if (mysqli_query($conn, $sql)) {
    echo "<p style='color: green;'>Sugar added successfully!</p>";
  } else {
    echo "<p style='color: red;'>Error adding sugar: " . mysqli_error($conn) . "</p>";
  }
}

// Read Operation (Fetch Sugar Data)
// Replace with filtering or sorting based on user needs (optional)
$sql = "SELECT * FROM sugar_data";
$result = mysqli_query($conn, $sql);

// Process and display the fetched data (HTML table with actions)
if (mysqli_num_rows($result) > 0) {
  echo "<table>";
  echo "<tr><th>Sugar ID</th><th>Sugar Name</th><th>Sugar Type</th><th>Health Impact</th><th>Actions</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["sugar_id"] . "</td>";
    echo "<td>" . $row["sugar_name"] . "</td>";
    echo "<td>" . $row["sugar_type"] . "</td>";
    echo "<td>" . $row["health_impact"] . "</td>";
    echo "<td><a href='update.php?id=" . $row["sugar_id"] . "'>Edit</a> | <a href='delete.php?id=" . $row["sugar_id"] . "'>Delete</a></td>"; // Links for edit and delete functionalities (separate files)
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "No sugar data found.";
}

// Close connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugar Information</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <p><a href="index.html">Go Home</a></p>
    <script src="script.js"></script>
</body>
</html>