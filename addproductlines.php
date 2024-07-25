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
    if (isset($_POST["register"])) {
        include "dbconnect.php";

        $sql = "INSERT INTO new_productlines (productLine, textDescription, htmlDescription, image)
                        VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssss",
            $_POST["productline"],
            $_POST["description"],
            $_POST["html"],
            $_POST["image"]
        );
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            header("location: index.php");
        } else {
            echo $stmt->affected_rows;
            echo "Register error";
        }
        exit(0);
    }
    ?>
    <div class="container" style="margin-top: 10px">
        <div class="row">
            <div class="col-12">
                <h1>ระบบข้อมูล Product Lines</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="index.php">กลับหน้าแรก</a>
            </div>
        </div>
        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="col-12 centerrow">
                    <div class="card-body">
                        <h3 class="card-title">เพิ่มข้อมูล Product Line ใหม่</h3>
                        <form action="addproductlines.php" method="post">
                            <div class="container">
                                <div class="row" style="margin: 5px;">
                                    <div class="col-3">ชื่อ ProductLine
                                    </div>
                                    <div class="col-9">
                                        <input class="from-control" type="text" name="productline">
                                    </div>
                                </div>
                                <div class="row" style="margin: 5px;">
                                    <div class="col-3">คำอธิบาย
                                    </div>
                                    <div class="col-9">
                                        <input class="from-control" type="text" name="description">
                                    </div>
                                </div>
                                <div class="row" style="margin: 5px;">
                                    <div class="col-3">Link HTML
                                    </div>
                                    <div class="col-9">
                                        <input class="from-control" type="text" name="html">
                                    </div>
                                </div>
                                <div class="row" style="margin: 5px;">
                                    <div class="col-3">รูปภาพ (URL)
                                    </div>
                                    <div class="col-9">
                                        <input class="from-control" type="text" name="image">
                                    </div>
                                    <div class="row" style="margin: 5px;">
                                        <div class="col-9"></div>
                                        <div class="col-3" style="display: flex; justify-content: end;">
                                            <input class="btn btn-primary" type="submit" name="register"
                                                value="ลงทะเบียน">
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

<body>

</body>

</html>