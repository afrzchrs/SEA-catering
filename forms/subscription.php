<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $plan = $_POST['plan'] ?? '';
    $mealTypes = $_POST['Meal_Type'] ?? [];
    $days = $_POST['delivery_days'] ?? [];
    $address = $_POST['address'] ?? '';
    $note = $_POST['note'] ?? '';
    $payment = $_POST['payment'] ?? '';
    $userId = $_SESSION['user_id'] ?? null;

    // Harga berdasarkan plan
    $planPrices = [
        'Diet' => 30000,
        'Protein' => 40000,
        'Royal' => 60000,
    ];
    $planPrice = $planPrices[$plan] ?? 0;

    $mealCount = count($mealTypes);
    $dayCount = count($days);
    $totalPrice = $planPrice * $mealCount * $dayCount * 4.3;

    $mealTypeStr = implode(", ", $mealTypes);
    $dayStr = implode(", ", $days);

    // Koneksi database
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "catering";

    $conn = new mysqli($host, $user, $password, $database);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    echo "<p>Koneksi berhasil ke database '$database'</p>";

    $sql = "INSERT INTO data_subscription (name, no_telp, plan, meal_type, delivery_days, address, note, payment_method, total_harga)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare gagal: " . $conn->error);
    }

    $bind = $stmt->bind_param("sssssssss", $name, $phone, $plan, $mealTypeStr, $dayStr, $address, $note, $payment, $totalPrice);
    if (!$bind) {
        die(" Bind param gagal: " . $stmt->error);
    }

    if ($stmt->execute()) {
        header("Location: ../index.php?status=success");
        exit();
    } else {
        header("Location: ../index.php?status=error");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    echo " Method not allowed.";
}
?>
