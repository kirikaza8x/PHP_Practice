<?php
// Load the Composer autoloader
require __DIR__ . '/../vendor/autoload.php';

use App\Models\User;
use App\Database\Connections;

echo "<h3>✅ Composer Autoloading Test</h3>";

$user = new User();
echo $user->getInfo() . "<br>";

$conn = new Connections();
echo $conn->connect();
?>