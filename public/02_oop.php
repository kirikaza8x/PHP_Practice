<?php
// 1. BASIC CLASS STRUCTURE
class User {
    // Properties (Variables inside a class)
    public string $name;
    protected string $email;
    private string $password;

    // Constructor: Runs when you create a new object
    public function __construct(string $name, string $email, string $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password; // Never store plain text passwords in real apps!
    }

    // Method (Function inside a class)
    public function getInfo(): string {
        return "User: {$this->name} ({$this->email})";
    }

    // Private method: Can only be called from within the class
    private function hashPassword(): string {
        return md5($this->password); // Simple hash for demo
    }

    public function checkPassword(string $input): bool {
        return $this->hashPassword() === md5($input);
    }
}

// 2. INSTANTIATION
$user = new User("John Doe", "john@example.com", "secret123");
echo "<h3>1. Basic Class</h3>";
echo $user->getInfo() . "<br>";
// echo $user->email; // ERROR: Protected property cannot be accessed directly
// echo $user->password; // ERROR: Private property cannot be accessed directly

// 3. INHERITANCE (Extending Classes)
// This is how Laravel Controllers work (extends Controller)
class Admin extends User {
    public string $role = "Administrator";

    public function getRoleInfo(): string {
        // We can access protected properties from parent
        return "{$this->name} is an {$this->role} with email {$this->email}";
    }
}

$admin = new Admin("Jane Admin", "jane@admin.com", "adminpass");
echo "<h3>2. Inheritance</h3>";
echo $admin->getRoleInfo() . "<br>";

// 4. INTERFACES (Contracts)
// Laravel uses interfaces heavily for dependency injection
interface Loggable {
    public function logAction(string $action): void;
}

class AuditLogger implements Loggable {
    public function logAction(string $action): void {
        echo "Logging: $action at " . date('Y-m-d H:i:s') . "<br>";
    }
}

$logger = new AuditLogger();
$logger->logAction("User Login");

// 5. TRAITS (Code Reuse)
// PHP doesn't support multiple inheritance, so we use Traits
trait Timestamps {
    public string $createdAt;
    public string $updatedAt;

    public function updateTimestamps(): void {
        $now = date('Y-m-d H:i:s');
        $this->createdAt = $now;
        $this->updatedAt = $now;
    }
}

class Product {
    use Timestamps; // "Import" the trait
    
    public string $name;

    public function __construct(string $name) {
        $this->name = $name;
        $this->updateTimestamps();
    }
}

$product = new Product("Laptop");
echo "<h3>3. Traits</h3>";
echo "Product: {$product->name}, Created: {$product->createdAt}<br>";

// 6. STATIC METHODS & PROPERTIES
// Belong to the class, not the instance
class MathHelper {
    public static float $pi = 3.14159;

    public static function add(float $a, float $b): float {
        return $a + $b;
    }
}

// No need to create an object (new MathHelper())
echo "<h3>4. Static Methods</h3>";
echo "Pi: " . MathHelper::$pi . "<br>";
echo "5 + 10 = " . MathHelper::add(5, 10) . "<br>";

?>

