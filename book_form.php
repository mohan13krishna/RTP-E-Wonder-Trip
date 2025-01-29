<?php
$connection = mysqli_connect('localhost', 'root', '', 'book_db');

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];
    $transportation = $_POST['transportation'];

    $request = "INSERT INTO book_form (name, email, phone, address, location, guests, arrivals, leaving, transportation) VALUES ('$name', '$email', '$phone', '$address', '$location', '$guests', '$arrivals', '$leaving', '$transportation')";

    if (mysqli_query($connection, $request)) {
        echo "Booking details sent successfully! Thank you for choosing us. Our agent will contact you within one hour. thanks for booking a trip in our website";
        header("refresh:4;url=index.php");
    } else {
        echo 'Something went wrong in booking. Please try again.';
        header("refresh:4;url=book.php");
    }
} else {
    echo 'Something went wrong. Please try again.';
    header("refresh:4;url=book.php");
}
?>
