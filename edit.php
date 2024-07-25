<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>
<?php
include "dbconnect.php";
if (isset($_GET["idx"])) {
    $sql = "SELECT productLine, textDescription, htmlDescription, image FROM new_productlines WHERE productLine=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_GET["idx"]);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows != 1) {
        echo "Edit error";
        exit(0);
    }
    $row = $result->fetch_assoc();
}
elseif (isset($_POST["edit"])) {
    $sql = "UPDATE new_productlines SET textDescription=?, htmlDescription=?, image=? WHERE productLine=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $_POST["description"], $_POST["html"], $_POST["image"], $_POST["productline"]);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        header("location:index.php");
    } else {
        echo "Edit error";
        exit(0);
    }
}
?>

<div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-12 ">
                <h1>ระบบข้อมูล Product Lines</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 ">
                <a href="index.php">กลับหน้าแรก</a>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-12 centerrow">
                <div class="card" style="width: 600px">
                    <div class="card-body">
                        <h3 class="card-title">แก้ไขข้อมูล Product Line</h3>
                        <form action="edit.php" method="post">
                            <input class="form-control" type="hidden" name="productline1" value="<?= $row["productLine"] ?>">
                            <div class="container">
                                <div class="row" style="margin: 5px;">
                                    <div class="col-3">ชื่อ Product Line</div>
                                    <div class="col-9">
                                        <input class="form-control" type="text" name="productline" value="<?= $row["productLine"] ?>">
                                    </div>
                                </div>
                                <div class="row" style="margin: 5px;">
                                    <div class="col-3">คำอธิบาย</div>
                                    <div class="col-9">
                                        <input class="form-control" type="text" name="description" value="<?= $row["textDescription"] ?>">
                                    </div>
                                </div>
                                <div class="row" style="margin: 5px;">
                                    <div class="col-3">Link HTML</div>
                                    <div class="col-9">
                                        <textarea class="form-control" type="text" name="html" rows="5"><?= $row["htmlDescription"] ?></textarea>
                                    </div>
                                </div>
                                <div class="row" style="margin: 5px;">
                                    <div class="col-3">รูปภาพ (URL)</div>
                                    <div class="col-9">
                                        <textarea class="form-control" type="text" name="image" rows="5"><?= $row["image"] ?></textarea>
                                    </div>
                                </div>
                                <div class="row" style="margin: 5px;">
                                    <div class="col-9"></div>
                                    <div class="col-3" style="display: flex; justify-content: end;">
                                        <input class="btn btn-primary" type="submit" name="edit" value="บันทึกการแก้ไข">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>