<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SQL</title>
</head>

<body>
  <?php
  // Fetch All records from the medicalstaff table
  echo('<pre>');
  $stmt = $pdo->prepare("SELECT * FROM medicalstaff");
  if ($stmt->execute()) { print_r($stmt->fetchAll());}
  echo('</pre>');

  // Fetch specific id medicalstaff record
  echo('<pre>');
  $stmt = $pdo->prepare("SELECT * FROM medicalstaff WHERE StaffID = 3");
  if ($stmt->execute()) 
  { print_r($stmt->fetch());}
  echo('</pre>');

  // Insert new record in the medicalstaff table
  $query = "INSERT INTO medicalstaff (StaffID, FirstName , LastName , Position, Specialty, PhoneNumber, Email) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $pdo->prepare($query);
  $executeQuery = $stmt->execute([6, 'Grace', 'Moya', 'Nurse', 'Pediatric', '555-1234', 'gracemoya@example.com']);
  if ($executeQuery) {
    echo "Data inserted successfully!";
  } else {
    echo "Error inserting data!";
  }

  // // Delete record in the medicalstaff table
  $query = "DELETE FROM medicalstaff WHERE StaffID = 6";
  $stmt = $pdo->prepare($query);
  $executeQuery = $stmt->execute();
  if ($executeQuery) {
    echo "Data deleted successfully!";
  } else {
    echo "Error deleting data!";
  }

  // Update record in the medicalstaff table
  $query = "UPDATE medicalstaff SET FirstName = ?, LastName = ?, Position = ?, Specialty = ?, PhoneNumber = ?, Email = ? WHERE StaffID = ?";
  $stmt = $pdo->prepare($query);
  $executeQuery = $stmt->execute(['Arnele', 'Romano', 'Nurse', 'Surgeon', '555-4321', 'arneleromano@example.com', 3]);
  if ($executeQuery) {
    echo "Data updated successfully!";
  } else {
    echo "Error updating data!";
  }

  // SQL QUERY’S RESULT ON HTML TABLE
  $stmt = $pdo->prepare('SELECT * FROM medicalstaff');
if ($stmt->execute()) {
    $results = $stmt->fetchAll();
    echo "<table border='2'>";
    echo "<tr>";
    echo "<th>Staff ID</th>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Position</th>";
    echo "<th>Specialty</th>";
    echo "<th>Phone Number</th>";
    echo "<th>Email</th>";
    echo "</tr>"; // Close the header row
    foreach ($results as $row) {
        echo "<tr>";
        echo "<td>" . $row['StaffID'] . "</td>";
        echo "<td>" . $row['FirstName'] . "</td>";
        echo "<td>" . $row['LastName'] . "</td>";
        echo "<td>" . $row['Position'] . "</td>";
        echo "<td>" . $row['Specialty'] . "</td>";
        echo "<td>" . $row['PhoneNumber'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "</tr>";
    }
    echo "</table>"; // Close the table after the loop
} else {
    echo "Error fetching data!";
}


  ?>
</body>

</html>