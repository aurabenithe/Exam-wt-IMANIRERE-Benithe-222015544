<?php
// Database connection
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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $service = $_POST['service'];

    // Prepare and bind statement
    $stmt = $conn->prepare("zzz");
    
    if (!$stmt) {
        die("Error in preparing statement: " . $conn->error);
    }

    $stmt->bind_param("issi", $id, $name, $age, $service);

    // Execute query
    if ($stmt->execute()) {
        echo "<script>
        alert( 'success to insert')
    window.open('insertcustomer.html','_self');
    </script>";
    } else {
        echo "<script>
        alert( 'wrong credentials,try again')
    window.open('insertcustomer.html','_self');
    </script>";
    }
   

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>