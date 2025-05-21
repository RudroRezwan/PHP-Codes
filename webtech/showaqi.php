<?php
// Check if form was submitted
$selectedCities = [];
$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['countries']) || count($_POST['countries']) !== 10) {
        $error = 'Please select exactly 10 cities.';
    } else {
        $selectedCities = $_POST['countries'];
    }
}

if ($error) {
    echo "<h2 style='text-align:center; color:red; margin-top:50px;'>$error</h2>";
    echo "<div style='text-align:center; margin-top:20px;'><a href='request.php' style='text-decoration:none; color:#007bff;'>Go back and try again</a></div>";
    exit;
}

// DB credentials
$servername = "localhost";
$username = "root";
$password = ""; // default in XAMPP
$dbname = "aqi";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare placeholders for IN clause
$placeholders = rtrim(str_repeat('?,', count($selectedCities)), ',');

// Prepare SQL statement
$sql = "SELECT city,country, aqi FROM info WHERE city IN ($placeholders)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

// Bind parameters
$types = str_repeat('s', count($selectedCities));
$stmt->bind_param($types, ...$selectedCities);

// Execute and fetch results
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Air Quality Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 500px;
            margin: auto;
            border: 2px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);

        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
        background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Selected Cities and Their AQI</h2>
    <table>
        <tr><th>City</th><th>Country</th><th>Air Quality Index (AQI)</th></tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['city']); ?></td>
                <td><?php echo htmlspecialchars($row['country']); ?></td>
                <td><?php echo htmlspecialchars($row['aqi']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<div style="text-align: center; margin-top: 20px;">
    <a href="request.php" style="
    display: inline-block;
    margin-top: 20px;
    text-decoration: none;
    background-color: #28a745;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    font-weight: bold;
">Select Again</a>
</div>
</div>
</body>
</html>
<?php
// Close everything
$stmt->close();
$conn->close();
?>
