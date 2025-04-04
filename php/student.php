<!DOCTYPE html>
<html>
<head>
    <title>Student Names Array</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }
        textarea {
            width: 400px;
            height: 200px;
        }
        pre {
            background-color: #f2f2f2;
            padding: 10px;
        }
    </style>
</head>
<body>

<h2>Enter Student Names (one per line)</h2>
<form method="post">
    <textarea name="students" placeholder="Enter the student names"></textarea><br><br>
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input and split it by newline
    $input = trim($_POST["students"]);
    $studentArray = array_filter(array_map('trim', explode("\n", $input)));

    echo "<h3>Original Array:</h3><pre>";
    print_r($studentArray);
    echo "</pre>";

    // Sort Ascending
    $asc = $studentArray;
    asort($asc);
    echo "<h3>Sorted Ascending (asort):</h3><pre>";
    print_r($asc);
    echo "</pre>";

    // Sort Descending
    $desc = $studentArray;
    arsort($desc);
    echo "<h3>Sorted Descending (arsort):</h3><pre>";
    print_r($desc);
    echo "</pre>";
}
?>

</body>
</html>
