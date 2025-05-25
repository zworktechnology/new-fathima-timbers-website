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
    $apiUrl = "https://app.wapionline.com/api/send?number=917402182523&type=text&message=$data&instance_id=67BC1E10DCA69&access_token=67bc1b2308242";

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
