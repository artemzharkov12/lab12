<?php
$servername = "mysql";
$username = "testuser";


$password_file = '/run/secrets/mysql_user_password';
if (file_exists($password_file)) {
    $password = trim(file_get_contents($password_file)); // Используем trim 
} else {
    die("Error: Password file not found.");
}

$dbname = "testdb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->query("SELECT id, name, email FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>LEMP Stack</title>
</head>
<body>
    <h1>Welcome to the LEMP Stack</h1>
    <h2>User List</h2>
    <ul>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <p><?php echo htmlspecialchars($user['name']) . ' (' . htmlspecialchars($user['email']) . ')'; ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No users found</p>
        <?php endif; ?>
    </ul>
</body>
</html>
