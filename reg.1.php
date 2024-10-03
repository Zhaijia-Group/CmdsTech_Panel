<?php
session_start();

function generateUUID() {
    return sprintf('%s-%s-%s-%s-%s',
        bin2hex(random_bytes(4)),
        bin2hex(random_bytes(2)),
        bin2hex(random_bytes(2)),
        bin2hex(random_bytes(2)),
        bin2hex(random_bytes(6))
    );
}


function isValidUsername($username) {
    return preg_match('/^[\w\x{4e00}-\x{9fa5}]+$/u', $username); 
}

function isValidPassword($password) {
    return strlen($password) >= 6 && strlen($password) <= 20;
}

function sendVerificationEmail($email, $code) {
    $subject = "";
    $message = "$code";
    $headers = "From: no-reply@example.com";

    return mail($email, $subject, $message, $headers);
}

// ע���߼�
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';

    if (!isValidUsername($username)) {
        die("");
    }

    if (!isValidPassword($password)) {
        die("");
    }

    if (!preg_match('/^[a-zA-Z0-9._%+-]+@qq\.com$/', $email)) {
        die("");
    }

    // ������֤��
    $verificationCode = rand(100000, 999999);
    $_SESSION['verification_code'] = $verificationCode;

    // ������֤���ʼ�
    if (!sendVerificationEmail($email, $verificationCode)) {
        die("");
    }

    // ȷ����֤��
    if ($_POST['verification_code'] ?? '' !== $_SESSION['verification_code']) {
        die("");
    }

    // ��������
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // ����UUID
    $uuid = generateUUID();

    // �������ݿ�
    $conn = new mysqli("127.0.0.1", "cmds", "cmds", "cmds");

    // �������
    if ($conn->connect_error) {
        die("" . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO user (username, password, uuid, verification_code) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $hashedPassword, $uuid, $verificationCode);

    if ($stmt->execute()) {
        echo "";
    } else {
        echo " " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>