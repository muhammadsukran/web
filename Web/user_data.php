<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'koneksi.php';

// Fungsi untuk menambah user baru
function addUser($name, $email, $phone) {
    global $conn;

    $query = "INSERT INTO users (nama, email, nomor_hp) VALUES ('$name', '$email', '$phone')";
    return $conn->query($query);
}

// Fungsi untuk mengupdate data user
function updateUser($id, $name, $email, $phone) {
    global $conn;

    $query = "UPDATE users SET nama='$name', email='$email', nomor_hp='$phone' WHERE id=$id";
    return $conn->query($query);
}

// Fungsi untuk menghapus user
function deleteUser($userId) {
    global $conn;

    $query = "DELETE FROM users WHERE id = $userId";
    return $conn->query($query);
}

// Fungsi untuk mendapatkan data user
function getUserData($userId) {
    global $conn;

    $query = "SELECT id, nama, email, nomor_hp FROM users WHERE id = $userId";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

// Fungsi untuk mendapatkan daftar user
function getAllUsers() {
    global $conn;

    $query = "SELECT u.id, u.nama, u.email, u.nomor_hp, lh.login_time FROM users u
              LEFT JOIN login_history lh ON u.id = lh.user_id";
    $result = $conn->query($query);

    $users = array();
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }

    return $users;
}

// Handle operasi CRUD
if (isset($_POST['addUser'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $success = addUser($name, $email, $phone);
    echo json_encode(['success' => $success]);
} elseif (isset($_POST['updateUser'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $success = updateUser($id, $name, $email, $phone);
    echo json_encode(['success' => $success]);
} elseif (isset($_POST['deleteUser'])) {
    $userId = $_POST['userId'];

    $success = deleteUser($userId);
    echo json_encode(['success' => $success]);
} elseif (isset($_POST['getUserData'])) {
    $userId = $_POST['userId'];

    $userData = getUserData($userId);
    echo json_encode(['userData' => $userData]);
} elseif (isset($_POST['getAllUsers'])) {
    $users = getAllUsers();
    echo json_encode(['users' => $users]);
}
?>
