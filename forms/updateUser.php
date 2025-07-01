<?php
session_start();

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "catering");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil ID user
$user_id = $_SESSION['user_id']; 

// Ambil data dari form
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$hashedPassword = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;

// Cek jika upload file
$profileImage = $_FILES['profile_image'] ?? null;
$uploadFileName = $_SESSION['profile_image'] ?? null;

if ($profileImage && $profileImage['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../assets/img/testimonials/'; 
    
    // Create directory if it doesn't exist
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $ext = pathinfo($profileImage['name'], PATHINFO_EXTENSION);
    $uploadFileName = 'profile_' . $user_id . '_' . time() . '.' . $ext;
    $uploadPath = $uploadDir . $uploadFileName;

    // Validasi file gambar
    $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array(strtolower($ext), $allowedExts)) {
        $_SESSION['error'] = "Hanya file JPG, PNG, GIF yang diperbolehkan.";
        header("Location: ../user.php");
        exit();
    }

    if (move_uploaded_file($profileImage['tmp_name'], $uploadPath)) {
        // Delete old profile image if it exists and is not the default
        if (!empty($_SESSION['profile_image']) && $_SESSION['profile_image'] != 'default.jpg') {
            $oldImagePath = $uploadDir . $_SESSION['profile_image'];
            if (file_exists($oldImagePath)) {
                @unlink($oldImagePath);
            }
        }
    } else {
        $_SESSION['error'] = "Gagal mengupload gambar profil.";
        header("Location: ../user.php");
        exit();
    }
}

// Bangun query dinamis
$sql = "UPDATE users SET username=?";
$params = [$username];
$types = "s";

if ($hashedPassword) {
    $sql .= ", password=?";
    $types .= "s";
    $params[] = $hashedPassword;
}

if ($uploadFileName) {
    $sql .= ", profile_image=?";
    $types .= "s";
    $params[] = $uploadFileName;
}

$sql .= " WHERE id=?";
$types .= "i";
$params[] = $user_id;

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    $_SESSION['error'] = "Error preparing statement: " . $conn->error;
    header("Location: ../user.php");
    exit();
}

$stmt->bind_param($types, ...$params);

// Eksekusi
if ($stmt->execute()) {
    // Update session jika berhasil
    $_SESSION['username'] = $username;
    if ($uploadFileName) {
        $_SESSION['profile_image'] = $uploadFileName;
    }

    $_SESSION['success'] = "Profil berhasil diperbarui.";
} else {
    $_SESSION['error'] = "Gagal mengupdate profil: " . $stmt->error;
}

$stmt->close();
$conn->close();
header("Location: ../user.php");
exit();