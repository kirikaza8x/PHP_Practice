<?php
require __DIR__ . '/../vendor/autoload.php';

echo "<h3>🗄️ Database Connection (PostgreSQL)</h3>";

// Use the credentials from docker-compose.yml
$host = 'db'; // The name of the service in docker-compose.yml
$db   = 'practice_db';
$user = 'practice_user';
$pass = 'secret_password';
$port = '5432';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<p class='success'>✅ Successfully connected to PostgreSQL!</p>";

    // Check version
    $stmt = $pdo->query('SELECT version()');
    $version = $stmt->fetchColumn();
    echo "<p><strong>Version:</strong> $version</p>";

} catch (PDOException $e) {
    echo "<p style='color: red'><strong>❌ Connection Failed:</strong> " . $e->getMessage() . "</p>";
}
?>