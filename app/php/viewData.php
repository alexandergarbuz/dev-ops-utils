<!DOCTYPE html>
<html>
<head>
<meta>
<title>Show MySQL Data</title>
</head>
<body>
<h1>Displaying users from MySQL database:</h1>
<?php

$host = getenv('MYSQL_HOST');
$port = getenv('MYSQL_PORT');
$dbname = getenv('MYSQL_DATABASE');
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');

try {
    // Set DSN (Data Source Name)
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM User";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($users) > 0) {
        echo '<h2>User List</h2>';
        echo '<table>';
        echo '<tr><th>ID</th><th>Username</th><th>Email</th></tr>';
        foreach ($users as $user) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($user['id']) . '</td>';
            echo '<td>' . htmlspecialchars($user['username']) . '</td>';
            echo '<td>' . htmlspecialchars($user['email']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No users found.';
    }

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>


</body>
</html>
