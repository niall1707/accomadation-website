<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="site-header">
        <a href="home.html"><img src="logo.jpeg" alt="SRM Logo" class="header-logo"></a>
        <h1>Current Residents</h1>
        <nav class="main-nav">
            <ul class="nav-list">
                <li><a href="residents.php">Residents</a></li>
                <li><a href="rooms.php">Rooms</a></li>
                <li><a href="staff.php">Staff</a></li>
                <li><a href="payments.php">Payments</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
</header>

<main class="registration-form">
    <?php
    // Database configuration
    $host = 'localhost';
    $dbname = 'accom';
    $user = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Selecting data from the database excluding password field
        $stmt = $conn->prepare("SELECT ResidentID, FirstName, LastName, RoomID, ContactEmail, ContactPhone, StartDate, EndDate FROM residents");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Printing out the data
        if (count($result) > 0) {
            echo "<div class='resident-grid'>";
            foreach ($result as $row) {
                echo "<div class='resident'>";
                foreach ($row as $key => $value) {
                    echo "<p><strong>$key:</strong> $value</p>";
                }
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "No residents found";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
</main>

<footer class="site-footer">
    <p>&copy; 2024 Student Residence Management System</p>
</footer>
</body>
</html>
