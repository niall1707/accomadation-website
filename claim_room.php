<?php
$room_id = $_POST['room_id'] ?? null;
if ($room_id) {
    $host = 'localhost';
    $dbname = 'accom';
    $user = 'root';
    $password = '';
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Update room status
        $stmt = $conn->prepare("UPDATE rooms SET Vacant='no' WHERE RoomNumber = :room_id AND Vacant='yes'");
        $stmt->bindParam(':room_id', $room_id);
        $stmt->execute();

        // Check if any row was actually updated
        if ($stmt->rowCount() > 0) {
            echo "Room claimed successfully.";
        } else {
            echo "Room was not available or already occupied.";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
} else {
    echo "No room selected.";
}
