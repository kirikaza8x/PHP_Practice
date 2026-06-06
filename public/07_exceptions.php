<?php
require __DIR__ . '/../vendor/autoload.php';

echo "<h3>⚠️ Error Handling & Exceptions</h3>";

// 1. Basic Try/Catch
// We "try" to do something risky. If it fails, we "catch" the error instead of crashing.
try {
    $number = 10;
    $divisor = 0;
    
    if ($divisor === 0) {
        // Manually throw an exception
        throw new Exception("Cannot divide by zero!");
    }
    
    echo $number / $divisor;
} catch (Exception $e) {
    echo "<p style='color: red'><strong>Error:</strong> " . $e->getMessage() . "</p>";
}

// 2. Custom Exceptions
// In Laravel, you often create custom exceptions for specific business logic errors.
class InsufficientFundsException extends Exception {
    public function __construct(float $balance, float $amount) {
        $message = "Balance ($$balance) is insufficient for withdrawal of $$amount.";
        parent::__construct($message);
    }
}

function withdrawMoney(float $balance, float $amount): float {
    if ($amount > $balance) {
        throw new InsufficientFundsException($balance, $amount);
    }
    return $balance - $amount;
}

try {
    $currentBalance = 100.00;
    $withdrawalAmount = 150.00;
    $newBalance = withdrawMoney($currentBalance, $withdrawalAmount);
    echo "New Balance: $$newBalance";
} catch (InsufficientFundsException $e) {
    echo "<p style='color: orange'><strong>Business Logic Error:</strong> " . $e->getMessage() . "</p>";
} catch (Exception $e) {
    // Catch-all for any other unexpected errors
    echo "<p style='color: red'>Unexpected Error: " . $e->getMessage() . "</p>";
}

// 3. Finally Block
// This code runs NO MATTER WHAT (success or failure). Great for closing DB connections.
try {
    echo "<p>Attempting to connect to a fake service...</p>";
    // throw new Exception("Connection failed"); // Uncomment to test failure
    echo "<p class='success'>Connected!</p>";
} catch (Exception $e) {
    echo "<p>Caught: " . $e->getMessage() . "</p>";
} finally {
    echo "<p><em>Cleaning up resources... (Finally block executed)</em></p>";
}
?>
