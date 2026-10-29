
<?php
$host = "mi-linux.wlv.ac.uk";
$username = "2440245";
$password = "Rabinbst123*";
$database = "db2440245";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed");
}

$sql = "SELECT Game_name, Genre, Price, Date_of_release FROM games";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Game List</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 30px;
}
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    border: 1px solid black;
    padding: 10px;
    text-align: left;
}
th {
    background-color: lightgrey;
}
</style>
</head>
<body>

<h1>Game List</h1>

<table>
<tr>
    <th>Game Name</th>
    <th>Genre</th>
    <th>Price</th>
    <th>Date of Release</th>
</tr>

<?php
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['Game_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Genre']) . "</td>";
        echo "<td>£" . number_format((float)$row['Price'], 2) . "</td>";
        echo "<td>" . date("d/m/Y", strtotime($row['Date_of_release'])) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No games found</td></tr>";
}
$conn->close();
?>

</table>
</body>
</html>
