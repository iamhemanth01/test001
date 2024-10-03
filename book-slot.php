<?php
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);

    // Simple validation (You can enhance this as needed)
    if (empty($name) || empty($email) || empty($date) || empty($time)) {
        echo "All fields are required.";
        exit;
    }

    // Save the booking (You can change this part to save in a database or send an email)
    $filename = 'bookings.txt'; // Store bookings in a text file
    $bookingDetails = "Name: $name, Email: $email, Date: $date, Time: $time\n";

    // Write booking details to the file
    file_put_contents($filename, $bookingDetails, FILE_APPEND | LOCK_EX);

    // Display a success message
    echo "Booking successful! Details:<br>";
    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Date: $date<br>";
    echo "Time: $time<br>";
} else {
    echo "Invalid request.";
}
?>
