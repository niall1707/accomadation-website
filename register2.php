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
        <!-- Logo linking to home.html -->
        <a href="home.html"><img src="logo.jpeg" alt="SRM Logo" class="header-logo"></a>
        <h1>Our Team</h1>
        <nav class="main-nav">
            <ul class="nav-list">
                <li><a href="residents.php">Residents</a></li>
                <li><a href="rooms.php">Rooms</a></li>
                <li><a href="staff.php">Staff</a></li>
                <li><a href="payments.php">Payments</a></li>
                <li><a href="login.php"> Login</a></li>
            </ul>
        </nav>
    </header>

    <main class="registration-form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="residentID">Resident ID:</label>
            <input type="text" id="residentID" name="residentID" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required><br><br>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required><br><br>
            <label for="roomID">Room ID:</label>
            <input type="text" id="roomID" name="roomID" required><br><br>
            <label for="contactEmail">Contact Email:</label>
            <input type="email" id="contactEmail" name="contactEmail" required><br><br>
            <label for="contactPhone">Contact Phone:</label>
            <input type="text" id="contactPhone" name="contactPhone" required><br><br>
            <label for="startDate">Start Date:</label>
            <input type="date" id="startDate" name="startDate" required><br><br>
            <label for="endDate">End Date:</label>
            <input type="date" id="endDate" name="endDate" required><br><br>
            <button type="submit">Register</button>
        </form>
    </main>

    <footer class="site-footer">
        <p>&copy; 2024 Student Residence Management System</p>
    </footer>
</body>
</html>

<?php
// Database configuration
$host = 'localhost';
$dbname = 'accom';
$user = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO residents (ResidentID, Password, FirstName, LastName, RoomID, ContactEmail, ContactPhone, StartDate, EndDate) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $residentID);
    $stmt->bindParam(2, $password);
    $stmt->bindParam(3, $firstName);
    $stmt->bindParam(4, $lastName);
    $stmt->bindParam(5, $roomID);
    $stmt->bindParam(6, $contactEmail);
    $stmt->bindParam(7, $contactPhone);
    $stmt->bindParam(8, $startDate);
    $stmt->bindParam(9, $endDate);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $residentID = htmlspecialchars($_POST['residentID']);
        $password = $_POST['password'];
        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName = htmlspecialchars($_POST['lastName']);
        $roomID = htmlspecialchars($_POST['roomID']);
        $contactEmail = htmlspecialchars($_POST['contactEmail']);
        $contactPhone = htmlspecialchars($_POST['contactPhone']);
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $stmt->execute();
        echo "New record created successfully";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

</body>
</html>
