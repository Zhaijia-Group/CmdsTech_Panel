<?php
//register.php
session_start();
require 'mysqli_db.php'; // 引入数据库连接文件

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
    return preg_match('/^[\w\x{4e00}-\x{9fa5}]{3,20}$/u', $username); // 3到20位字符
}

function isValidPassword($password) {
    return preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/', $password); // 至少8位，包含字母和数字，且长度不超过20位
}

function isValidCode($code) {
    return preg_match('/^[\w-]{11}$/', $code);
}

// 注册逻辑
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $code = trim($_POST['code'] ?? '');

    // 收集错误信息
    $errors = [];

    // 验证输入
    if (!isValidUsername($username)) {
        $errors[] = "用户名无效";
    }

    if (!isValidPassword($password)) {
        $errors[] = "密码无效，必须包含字母和数字，长度为8到20位";
    }

    if (!isValidCode($code)) {
        $errors[] = "邀请码无效";
    }

    // 如果有错误，返回错误信息
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>" . htmlspecialchars($error) . "</p>";
        }
    } else {
        try {
            // 连接数据库
            $conn = connectDatabase();

            // 检查邀请码
            $stmt = $conn->prepare("SELECT isUsed FROM codes WHERE code = ?");
            $stmt->bind_param("s", $code);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                echo "<p style='color: red;'>邀请码无效</p>";
            } else {
                $row = $result->fetch_assoc();
                if ($row['isUsed'] == 1) {
                    echo "<p style='color: red;'>邀请码已使用</p>";
                } else {
                    // 加密密码
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $uuid = generateUUID();

                    // 插入用户数据
                    $stmt = $conn->prepare("INSERT INTO users (username, password, uuid, code) VALUES (?, ?, ?, ?)");
                    if ($stmt === false) {
                        throw new Exception("准备语句失败: " . $conn->error);
                    }
                    $stmt->bind_param("ssss", $username, $hashedPassword, $uuid, $code);

                    if ($stmt->execute()) {
                        // 更新邀请码为已使用
                        $stmt->close(); // 关闭之前的用户插入语句
                        $stmt = $conn->prepare("UPDATE codes SET isUsed = 1 WHERE code = ?");
                        $stmt->bind_param("s", $code);
                        $stmt->execute();

                        echo "<p style='color: green;'>注册成功！</p>";
                    } else {
                        echo "<p style='color: red;'>注册失败: " . htmlspecialchars($stmt->error) . "</p>";
                    }

                    $stmt->close();
                }
            }
            $conn->close();
        } catch (Exception $e) {
            echo "<p style='color: red;'>数据库错误: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
}
?>
