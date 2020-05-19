<?php

include_once 'database.php';

$sql = "SELECT id, email, password, reg_date FROM userdetails";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Email: " . $row["email"]. " - Password " . $row["password"]. " - Reg Date " . $row["reg_date"]."<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
