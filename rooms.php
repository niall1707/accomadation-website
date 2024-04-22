<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <a href="home.html"><img src="logo.jpeg" alt="SRM Logo" class="header-logo"></a>
        <h1>Student Rooms</h1>
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

    <main>
        <h2>Rooms List</h2>
        <form action="claim_room.php" method="post">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Room Number</th>
                        <th>Area</th>
                        <th>Beds</th>
                        <th>Balcony</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Database configuration
                    $host = 'localhost';
                    $dbname = 'accom';
                    $user = 'root';
                    $password = '';

                    try {
                        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Fetch data from the rooms table
                        $stmt = $conn->query("SELECT * FROM rooms");
                        $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($rooms as $room) {
                            $rowStyle = $room['Vacant'] === 'no' ? 'style="color: red;"' : '';
                            echo "<tr $rowStyle>";
                            echo '<td><input type="radio" name="room_id" value="' . $room['RoomNumber'] . '" /></td>';
                            echo "<td>" . $room['RoomNumber'] . "</td>";
                            echo "<td>" . $room['Area'] . "</td>";
                            echo "<td>" . $room['Beds'] . "</td>";
                            echo "<td>" . $room['Balconey'] . "</td>";
                            echo "<td>" . ($room['Vacant'] === 'no' ? 'Occupied' : 'Vacant') . "</td>";
                            echo "</tr>";
                        }
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }

                    $conn = null;
                    ?>
                </tbody>
            </table>
            <button type="submit">Claim Room</button>
        </form>
    </main>

    <footer class="site-footer">
        <p>&copy; 2024 Student Residence Management System</p>
    </footer>
</body>
</html>

<!-- UPDATE Rooms
SET Vacant = 'Yes'; -->
