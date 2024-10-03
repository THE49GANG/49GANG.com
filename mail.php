<?php
// Assuming you've already set up your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Insert email into database
    $sql = "INSERT INTO emails (email) VALUES ('$email')";

    if ($conn->query($sql) === TRUE) {
        // Check if output has already been sent
        if (headers_sent()) {
            echo "Error: Headers already sent.";
        } else {
            // Redirect to success page
            header("Location: /success.html");
            exit();
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Retrieve all recorded email addresses
$sql = "SELECT email FROM emails";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Recorded Email Addresses:</h2>";
    while($row = $result->fetch_assoc()) {
        echo $row["email"] . "<br>";
    }
} else {
    echo "No recorded email addresses.";
}

$conn->close();
?>