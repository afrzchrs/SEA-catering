<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['customer_name'] ?? '';
    $message = $_POST['review'] ?? '';
    $rating = $_POST['rating'] ?? '';

    if (!$name || !$message || !$rating) {
        header("Location: ../index.php?testimonial=error");
        exit();
    }

    // Koneksi ke database
    $host = "localhost";
    $user = "root";
    $password = ""; 
    $database = "catering";

    $conn = new mysqli($host, $user, $password, $database);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql = "INSERT INTO testimonies (name, message, rating) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare gagal: " . $conn->error);
    }

    $stmt->bind_param("ssi", $name, $message, $rating); 
    if ($stmt->execute()) {
        header("Location: ../index.php?testimonial=success");
        exit();
    } else {
        header("Location: ../index.php?testimonial=error");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Method not allowed";
}
