<?php
// 1. VARIABLES & SCALAR TYPES
// PHP variables always start with $
$name = "John";       // String
$age = 25;            // Integer
$price = 99.99;       // Float
$isActive = true;     // Boolean (true/false, not True/False)

// 2. STRING INTERPOLATION (Important!)
// Double quotes parse variables; single quotes do NOT.
echo "Hello $name";       // Output: Hello John
echo 'Hello $name';       // Output: Hello $name (Literal string)

// Complex variables in strings need curly braces
$user = ['name' => 'Jane'];
echo "User: {$user['name']}"; 

// 3. CONCATENATION
// PHP uses . (dot) not + for strings
$fullName = $name . " Doe"; 

// 4. NULL COALESCING OPERATOR (Very common in Laravel)
// If $middleName is null/undefined, use 'N/A'
$middleName = null;
$displayName = $middleName ?? 'N/A'; 

// 5. STRICT COMPARISON
// == checks value only (loose)
// === checks value AND type (strict) - ALWAYS USE THIS
var_dump(1 == "1");   // bool(true)  <- Dangerous!
var_dump(1 === "1");  // bool(false) <- Safe!

// 6. ARRAYS (Indexed & Associative)
$colors = ["Red", "Green", "Blue"]; // Indexed
$user = [
    "id" => 1,
    "name" => "John",
    "roles" => ["admin", "editor"]
]; // Associative (Key-Value pairs)

// Accessing arrays
echo $colors[0];      // Red
echo $user["name"];   // John

// 7. CONTROL STRUCTURES
// Alternative syntax for templates (Blade uses this underneath!)
if ($age > 18):
    echo "Adult";
else:
    echo "Minor";
endif;

// Foreach is your best friend in PHP
foreach ($colors as $color) {
    echo "$color <br>";
}

// With keys
foreach ($user as $key => $value) {
    if (is_array($value)) {
        echo "$key: " . implode(", ", $value) . "<br>";
    } else {
        echo "$key: $value <br>";
    }
}
?>