<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carg";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if Product_Id is set
if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
//product (id,barcode,category_id, name,cost,quantity,total_cost,created_at
  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $conn->prepare("SELECT * FROM customer WHERE id=?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $a = $row['id'];
    $b = $row['name'];
    $c = $row['age'];
    $d = $row['services'];
   
  } else {
    echo "user not found.";
  }
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Update your customer table</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <!-- Update products form -->
    <h2><u>Update Form in customers</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="name">name:</label>
    <input type="text" name="name" id="username" value="<?php echo isset($b) ? $b : ''; ?>">
    <br><br>

    <label for="age">age:</label>
    <input type="number" name="age" id="age" value="<?php echo isset($c) ? $c : ''; ?>">
    <br><br>
    <label for="services">services:</label>
    <input type="text" name="services" id="services" value="<?php echo isset($d) ? $d : ''; ?>">
    <br><br>


    

    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($stmt->execute()) {
      echo "Record updated successfully.<br><br>echo 
           <a href='insertcustomer.php'>OK</a>";
  } else {
      echo "Error updating data: " . $stmt->error;
  }
}
if (isset($_POST['update'])) {
  // Retrieve updated values from form
  $id = $_POST['id'];
  $name = $_POST['name'];
  $age = $_POST['age'];
  $services = $_POST['services'];
  

  // Update the trainee in the database (prepared statement again for security)
  $stmt = $conn->prepare("UPDATE `customer` SET `id` = '?', `name` = '?', `age` = '?', `services` = '?' WHERE `login`.`id` = '?';");
    $stmt->bind_param("s",$id, $name, $age, $services);
  $stmt->execute();

  // Redirect to product.php
  header('Location: insertcustomer.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($conn);
?>
