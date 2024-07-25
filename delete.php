<?php
include "dbconnect.php";

$sql = "DELETE FROM new_productlines WHERE productLine=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_GET["idx"]);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("location: index.php");
} else {
    echo "Delete error";
    exit(0);
}
?>
<div>
    <a href="delete.php?idx=<?= $row['productLine'] ?>"
    onclick="return confirm('ยืนยันการลบข้อมูลของ <?= $row['productLine'] ?>?')"></a>
</div>