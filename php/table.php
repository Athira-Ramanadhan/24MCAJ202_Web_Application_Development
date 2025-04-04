<!DOCTYPE html>
<html>
<head>
    <title>Indian Cricket Players</title>
    <style>
        /* Table styling */
        table {
            border-collapse: collapse; 
            width: 50%; 
            margin: 20px auto; 
        }

        /* Table header and cell styling */
        th, td {
            border: 1px solid #333; 
            padding: 10px; 
            text-align: center; 
        }

        /* Styling for table header */
        th {
            background-color: #007bff; 
            color: white; 
        }

        /* Styling for table data (players' names) */
        td {
            background-color: pink; 
        }

        /* Basic body styling */
        body {
            font-family: Arial, sans-serif; 
            padding: 20px; 
        }
    </style>
</head>
<body>

<h2>List of Indian Cricket Players</h2>

<?php
// Array of Indian cricket players
$players = array("Virat Kohli", "Rohit Sharma", "MS Dhoni", "Jasprit Bumrah", "Hardik Pandya");

// Display players in an HTML table
echo "<table>";
echo "<tr><th>Sl. No.</th><th>Player Name</th></tr>"; // Table header

// Loop through the array and display each player
foreach ($players as $index => $player) {
    echo "<tr>"; // 
    echo "<td>" . ($index + 1) . "</td>"; 
    echo "<td>$player</td>";
    echo "</tr>"; 
}

echo "</table>"; // Close table
?>

</body>
</html>
