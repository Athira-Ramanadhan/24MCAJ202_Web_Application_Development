<?php
//  Database Connection
$servername = "localhost"; // Server name (default: localhost)
$username = "root";        // 
$password = "";            // 
$database = "food_db";     // Database name

// Create connection to MySQL
$conn = new mysqli($servername, $username, $password, $database);

//  To check if connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Stop execution if connection fails
}

//  Fetch Food Data from Database
$sql = "SELECT id, name, category, price FROM food_items"; // SQL query to select all food items
$result = $conn->query($sql); // Execute the query
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food Menu</title>
    <style>
        /* Basic styling for the page */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        h2 {
            color: #ff5733;
        }
        /* Table styling */
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #ff5733;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Food Menu</h2>

<?php
//  Check if there are results and display them
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Food Name</th><th>Category</th><th>Price (₹)</th></tr>";
    
    // Loop through the fetched data and display it in the table
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['category']}</td>";
        echo "<td>₹{$row['price']}</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    // If no data is found, display a message
    echo "<p>No food items found</p>";
}

// Close the database connection
$conn->close();
?>

</body>
</html>
