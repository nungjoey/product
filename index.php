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
    if (isset($_GET["keyword"])) {
        $keyword = "%" . $_GET["keyword"] . "%";
        $sql = "select * from new_productlines where productLine like ? or textDescription like ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $keyword, $keyword);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $sql = "select * from new_productlines";
        $result = $conn->query($sql);
    }
    ?>
    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <h1>ระบบจัดการข้อมูล Product Lines</h1>
        </div>
    </div>
    <div class="container">

        <body class="row">
            <div class="col-4">
                <a herf="addproductlines.php">เพิ่ม Product Lines</a>
            </div>
            <div class="col-4">
                <from action="">
                    <div class="input-group mb3">
                        <input type="text" name="keyword" class="form-control" placeholder="ค้นหาจากชื่อ คำอธิบาย">
                        <button class="btn btn-primary" type="submit" id="button-addon2">ค้นหา</button>
                    </div>
                </from>
            </div>
            <div class="col-4">
            </div>
            <div class="container">
                <div class="card bg-primary" style="margin: 5px;">
                </div>

                <div class="card bg-primary" style="margin: 5px;">
                    <div class="row">
                        <div class="col-1 centerrow" style="color: white">
                            ลำดับที่
                        </div>
                        <div class="col-2 centerrow" style="color: white">
                            รูปภาพ
                        </div>
                        <div class="col-3 centerrow" style="color: white">
                            ชื่อ productLine
                        </div>
                        <div class="col-4 centerrow" style="color: white">
                            คำอธิบาย
                        </div>
                        <div class="col-2 centerrow" style="color: white">
                            จัดการข้อมูล
                        </div>
                        <?php
                        $idx = 1;
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="card r" style="margin: 5px;">
                            <div class="row" style="margin-bottom: 5px; cursor: pointer; justify-content: flex-end;"> 
                                    <div class="col-2 centerrow" style="cursor: default;" 
                                    onclick="location.href='show.php?idx=<?= $row['productLine']?>';">
                                     <a href="edit.php?idx=<?= $row['productLine'] ?>"
                                      onclick="return confirm('ยืนยันการแก้ไขข้อมูลของ <?= $row['productLine'] ?>?')">
                                            <img src="images/pngtree-examination-icon-index-png-image_10800699.png" width="48px">
                                        </a> &nbsp;&nbsp;&nbsp;
                                        <a href="delete.php?idx=<?= $row['productLine'] ?>"
                                           onclick="return confirm('ยืนยันการลบข้อมูลของ <?= $row['productLine'] ?>?')">
                                            <img src="images/pngtree-cancel-red-circle-web-glossy-icon-validation-photo-png-image_13620203.png"
                                                width="48px"></a>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 5px; margin-bottom: 5px;  cursor: pointer;">
                                    <div class="col-1 centerrow"
                                        onclick="location.href='show.php?idx=<?= $row['productLine'] ?>';">
                                        <?= $idx++ ?>
                                    </div>
                                    <div class="col-2 centerrow" 
                                    onclick="location.href='show.php?idx=<?= $row['productLine']?>';">
                                    <img src="<?= $row["image"] ?>" width="150px" alt="รูป">
                                </div>
                                <div class="col-4 centerrow" style="display: flex; align-items: center;"
                                 onclick="location.href='show.php?idx=<?= $row['productLine']?>';">
                                 <?= $row["productLine"] ?>
                                </div>
                                <div class="col-3 centerrow"
                                        onclick="location.href='show.php?idx=<?= $row['productLine'] ?>';">
                                        <?= $row["textDescription"] ?>
                                </div>

                                </div>
                                
                                
                                

                            </div>
                            <?php
                        }
                        ?>
                    </div>
        </body>
    </div>
    </div>
    </div>
    </div>
    </div>
</body>

</html>