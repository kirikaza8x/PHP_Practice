<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Learning Environment</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            max-width: 900px; 
            margin: 40px auto; 
            padding: 20px;
            background-color: #e8e8e8;
            color: #333;
        }
        h1 { 
            color: #2c3e50; 
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
        }
        h2 { color: #2980b9; }
        .card { 
            background: white; 
            padding: 20px; 
            border-radius: 8px;
            margin: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        code { 
            background: #f4f4f4; 
            padding: 2px 6px; 
            border-radius: 3px;
            font-family: 'Courier New', monospace;
        }
        .success { color: #27ae60; font-weight: bold; }
        ul { line-height: 1.8; }
    </style>
</head>
<body>
    <h1>🎓 PHP Syntax Learning Environment</h1>
    
    <div class="card">
        <h2>✅ Server Information</h2>
        <p><strong>PHP Version:</strong> <?php echo phpversion(); ?></p>
        <p><strong>Server Time:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
        <p><strong>Server Software:</strong> <?php echo $_SERVER['SERVER_SOFTWARE']; ?></p>
        <p class="success">✓ PHP is working correctly!</p>
    </div>

    <div class="card">
        <h2>📝 Your First PHP Code</h2>
        <?php
        // Variables
        $greeting = "Hello from PHP!";
        $x = 10;
        $y = 20;
        
        echo "<p><strong>Greeting:</strong> $greeting</p>";
        echo "<p><strong>Calculation:</strong> $x + $y = " . ($x + $y) . "</p>";
        
        // Array example
        $languages = ["PHP", "JavaScript", "Python"];
        echo "<p><strong>Languages:</strong> " . implode(", ", $languages) . "</p>";
        ?>
    </div>

    <div class="card">
        <h2>📚 How to Use This Environment</h2>
        <ul>
            <li>Create new files in the <code>public/</code> folder</li>
            <li>Access them at <code>http://localhost:8080/filename.php</code></li>
            <li>Changes are instant - no need to restart Docker</li>
            <li>Start with simple PHP syntax exercises</li>
        </ul>
    </div>

    <div class="card">
        <h2>🚀 Quick Start Commands</h2>
        <ul>
            <li><code>docker-compose up -d</code> - Start the server</li>
            <li><code>docker-compose down</code> - Stop the server</li>
            <li><code>docker-compose logs -f</code> - View logs</li>
        </ul>
    </div>
</body>
</html>
