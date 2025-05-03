<?php
// Connect to MySQL
$host = "localhost";
$user = "root"; // Change this as needed
$pass = "";     // Change this as needed
$dbname = "library";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert book data
if (isset($_POST['add'])) {
    $acc_no = $_POST['acc_no'];
    $title = $_POST['title'];
    $authors = $_POST['authors'];
    $edition = $_POST['edition'];
    $publisher = $_POST['publisher'];

    $sql = "INSERT INTO books (accession_number, title, authors, edition, publisher)
            VALUES ('$acc_no', '$title', '$authors', '$edition', '$publisher')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Book added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}

// Search for a book by title
$search_result = "";
if (isset($_POST['search'])) {
    $search_title = $_POST['search_title'];
    $sql = "SELECT * FROM books WHERE title LIKE '%$search_title%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $search_result = "<h2>Search Results:</h2><table border='1' cellpadding='10'>
            <tr>
                <th>Accession No</th>
                <th>Title</th>
                <th>Authors</th>
                <th>Edition</th>
                <th>Publisher</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            $search_result .= "<tr>
                <td>{$row['accession_number']}</td>
                <td>{$row['title']}</td>
                <td>{$row['authors']}</td>
                <td>{$row['edition']}</td>
                <td>{$row['publisher']}</td>
            </tr>";
        }
        $search_result .= "</table>";
    } else {
        $search_result = "<p style='color:orange;'>No books found with that title.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Book Management</title>
</head>
<body>
    <h1>Enter Book Information</h1>
    <form method="post">
        <label>Accession Number:</label><br>
        <input type="number" name="acc_no" required><br><br>

        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Authors:</label><br>
        <input type="text" name="authors" required><br><br>

        <label>Edition:</label><br>
        <input type="text" name="edition" required><br><br>

        <label>Publisher:</label><br>
        <input type="text" name="publisher" required><br><br>

        <input type="submit" name="add" value="Add Book">
    </form>

    <hr>

    <h1>Search Book by Title</h1>
    <form method="post">
        <input type="text" name="search_title" placeholder="Enter book title..." required>
        <input type="submit" name="search" value="Search">
    </form>

    <br>
    <?php echo $search_result; ?>
</body>
</html>
