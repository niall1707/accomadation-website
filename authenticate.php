<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }
        .welcome-message {
            background-color: #fff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 600px;
        }
        .welcome-message h1 {
            color: #333;
        }
        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 20px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php
    // Database configuration
    $host = 'localhost';
    $dbname = 'accom'; // Ensure this is your correct database
    $user = 'root';
    $password = ''; // Ensure this is the correct password for 'root'

    // Start session to store user data
    session_start();

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if data was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $residentID = $_POST['residentID'];
            $password = $_POST['password']; // Assumes passwords are stored in plaintext

            // Prepare and execute the query
            $stmt = $conn->prepare("SELECT * FROM residents WHERE ResidentID = :residentID AND Password = :password");
            $stmt->bindParam(':residentID', $residentID);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            // Check if a match was found
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                // Set session variables here if needed
                $_SESSION['user_name'] = $user['FirstName'];
                echo "<div class='welcome-message'><h1>Welcome, " . $user['FirstName'] . "!</h1></div>"; // Personalized welcome message
            } else {
                echo "<div class='welcome-message'><h1>Login failed. Please check your Resident ID and Password.</h1></div>";
            }
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
    <a href="home.html" class="button">Return to Home Page</a>a
</body>
</html>
