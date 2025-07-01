<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["mobile"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];


    // Format the WhatsApp message template
    $data = urlencode("Hi M/s New Fathima Timbers - Admin\n\nNew contact has submitted with the following information:\n\nName: $name\nEmail: $email\nPhone Number: $phone\nSubject : $subject\nMessage : $message\n\nGood luck!");

    // API URL
    $apiUrl = "https://mtechlivedemo.com/api/send?number=919677503332&type=text&message=$data&instance_id=6846B62860B93&access_token=6846b47c20fee";

    // Send request
    $response = file_get_contents($apiUrl);

    if ($response) {
        header("Location: redirect.php");
        exit();
    } else {
        echo json_encode(["success" => false, "message" => "Failed to send message"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
}
