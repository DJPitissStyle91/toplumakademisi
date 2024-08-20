<?php
// Database connection settings
$host = 'localhost'; // or your PostgreSQL server address
$db = 'newsletter';
$user = 'postgres'; // replace with your PostgreSQL username
$pass = ''; // replace with your PostgreSQL password

// Create a new connection to the PostgreSQL database
$conn = pg_connect("host=$host dbname=$db user=$user password=$pass");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Check if the form is submitted
if (true) {
    // Retrieve and sanitize form data
    $first = pg_escape_string($_POST['first']);
    $last = pg_escape_string($_POST['last']);
    $email = pg_escape_string($_POST['email']);

    // Prepare the SQL statement
    $sql = "INSERT INTO subscribers (first, last, email) VALUES ('$first', '$last', '$email')";

    // Execute the query
    $result = pg_query($conn, $sql);

    if ($result) {
        echo "Sign-up successful!";
    } else {
        echo "Error: " . pg_last_error($conn);
    }

    // Close the connection
    pg_close($conn);

    header('Location: /home/index.html');
}
?>
