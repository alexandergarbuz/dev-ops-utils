<!DOCTYPE html>
<html>
<head>
<meta>
<title>Show Data</title>
</head>
<body>

<?php
$host = 'localhost';
$port = '3307'; // Change to your MySQL port if different
$dbname = 'Test_DB';
$username = 'root';
$password = 'pass';

// Connect to MySQL database
$conn = mysqli_connect($host, $username, $password, $dbname, $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to fetch users
$sql = "SELECT * FROM User";
$result = mysqli_query($conn, $sql);

// Display users in a table
if (mysqli_num_rows($result) > 0) {
    echo '<h2>User List</h2>';
    echo '<table>';
    echo '<tr><th>ID</th><th>Username</th><th>Email</th></tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['username']) . '</td>';
        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No users found.';
}

// Close connection
mysqli_close($conn);
?>

</body>
</html>
