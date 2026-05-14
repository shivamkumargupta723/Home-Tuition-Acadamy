<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $name = htmlspecialchars(trim($_POST['name']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $query = isset($_POST['query']) ? htmlspecialchars(trim($_POST['query'])) : '';

    // Validation
    $errors = [];
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (empty($phone) || !preg_match('/^\d{10}$/', $phone)) {
        $errors[] = "Phone is required and must be a 10-digit valid number.";
    }

    if (!empty($errors)) {
        echo "<p class='error'>" . implode("<br>", $errors) . "</p>";
        exit;
    }

    // Prepare email
    $to = "your-email@example.com";
    $subject = "New Enquiry: Private Tutor Form Submission";
    $body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                h1 { color: #333; }
                p { line-height: 1.5; }
                .call-link { color: blue; text-decoration: none; font-weight: bold; }
                .call-link:hover { text-decoration: underline; }
            </style>
        </head>
        <body>
            <h1>New Query from $name</h1>
            <p><strong>Contact Number:</strong> <a href='tel:$phone' class='call-link'>$phone</a></p>
            <p><strong>Message:</strong> $query</p>
        </body>
        </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@example.com" . "\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<p class='success'>Thank you for your submission. We will contact you shortly!</p>";
    } else {
        echo "<p class='error'>Sorry, there was an error sending your message. Please try again later.</p>";
    }
}
?>
