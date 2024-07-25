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
        $sql = "SELECT productLine, textDescriptipn, htmlDescriptipn, image 
    FROM new_productlines WHERE productLines = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_GET["idx"]);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows != 1) {
            echo "edit error";
            exit(0);
        }
        $row = $result->fetch_assoc();
    }
    ?>
</body>

<body>
    <?php
    include "dbconnect.php";
    if (isset($_GET["idx"])) {
        $sql = "SELECT productLine, textDescription, htmlDescription, image 
    FROM new_productlines WHERE productLine = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_GET["idx"]);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows != 1) {
            echo "Edit error";
            exit(0);
        }
        $row = $result->fetch_assoc();
        $row["productLine"];
        $row["textDescription"];
        $row["htmlDescription"];
        $row["image"];
    }
    ?>
</body>

<body>
    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-12">
                <h1>ระบบข้อมูล Product Lines</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="margin-top: 20px;
            display: flex; justify-content: center;">
                <a href="index.php">กลับหน้าเเรก</a>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-12 centerrow">
                <div class="card" style="width: 600px;">
                    <div class="card-body">
                        <h3 class="card-title">ข้อมุล product Lines </h3>

                        <div class="container">
                            <div class="row">
                                <div class="col-4" style=" display: flex; justify-content: center;">
                                    <img src="<?= $row['image'] ?>" alt="รูปภาพ" width="200px">
                                </div>
                                <div class="col-8">
                                    <div class="row" style="margin: 5px;">
                                        <div class="col-4">ชื่อ ProductLine</div>
                                        <div class="col-8">
                                            <?= $row['productLine'] ?>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 5px;">
                                        <div class="col-4">คำอธิบาย</div>
                                        <div class="col-8">
                                            <?= $row['textDescription'] ?>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 5px;">
                                        <div class="col-4">Link HTML</div>
                                        <div class="col-8">
                                            <?= $row['htmlDescription'] ?> //
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12"style="margin-top: 20px;display: flex; justify-content: center;">
                                            <a href="index.php">กลับหน้าเเรก</a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>