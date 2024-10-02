<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $date = htmlspecialchars(trim($_POST['date']));
    $time = htmlspecialchars(trim($_POST['time']));
    
    // Validate data (you can add more validation as needed)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Save data to a file (for example, log.txt)
    $data = "Name: $name, Email: $email, Date: $date, Time: $time\n";
    file_put_contents('bookings.txt', $data, FILE_APPEND);

    // Redirect back to the booking page with a success message
    header("Location: index.html?booking=success");
    exit;
} else {
    die("Invalid request");
}
?>
