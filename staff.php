<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff </title>
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

</body>


    <main>
        <h1>Staff List</h1>
        <table class="data-table">
            <tr class="data-heading">
                <th>Name</th>
                <th>Position</th>
                <th>Email</th>
                <th>Profile</th>
            </tr>
            <?php
            $staffMembers = [
                ["name" => "Niall Heeney", "position" => "Manager", "email" => "niall1707@gmail.com", "profile" => "ceo.jpeg"],
                ["name" => "Jane Smith", "position" => "Assistant Manager", "email" => "janesmith@gmail.com", "profile" => "jane.jpeg"],
                ["name" => "Alice Johnson", "position" => "Receptionist", "email" => "alicej@outlook.com", "profile" => "donna.jpeg"],
                ["name" => "Ronan Cleary", "position" => "Assistant", "email" => "frountdesk@gmail.com", "profile" => "ronan.jpeg"],
                ["name" => "Mark Sutton", "position" => "Assistant", "email" => "frountdesk@gmail.com", "profile" => "mark.jpeg"],
                ["name" => "Adam Johnson", "position" => "Security", "email" => "security2@outlook.com", "profile" => "adam.jpeg"],
                ["name" => "kyle Smity", "position" => "Security", "email" => "security2@outlook.com", "profile" => "kyle.jpeg"],
                ["name" => "Declan Judge", "position" => "Security", "email" => "security2@outlook.com", "profile" => "declan.jpeg"],

            ];

            foreach ($staffMembers as $staff) {
                echo "<tr class='data-row'>";
                echo "<td>" . $staff['name'] . "</td>";
                echo "<td>" . $staff['position'] . "</td>";
                echo "<td>" . $staff['email'] . "</td>";
                echo "<td><img src='" . $staff['profile'] . "' alt='Profile Picture' class='profile-image'></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </main>

    <footer class="site-footer">
        <p>&copy; 2024 Student Residence Management System</p>
    </footer>
</body>
</html>
