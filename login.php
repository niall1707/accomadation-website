<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <a href="home.html"><img src="logo.jpeg" alt="SRM Logo" class="header-logo"></a>
        <h1>Student Residence Management login</h1>
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

    <main class="login-container">
        <form class="login-form" action="authenticate.php" method="post">
            <div class="form-group">
                <label for="residentID">Resident ID:</label>
                <input type="text" id="residentID" name="residentID" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-action-group">
                <button type="submit" class="login-button">Login</button>
                <button type="button" onclick="location.href='register2.php'" class="register-button">Register</button>
            </div>
        </form>
    </main>

    <footer class="site-footer">
        <p>&copy; 2024 Student Residence Management System</p>
    </footer>
</body>
</html>
