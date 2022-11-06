<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
    <title>Chi tiết phòng trọ</title>
</head>

<body>
    <div class="d-flex flex-column" style="min-height: 100vh;">
        <div class="mb-auto">

            <?php include("../Components/header.php") ?>

            <!-- Tabs content -->
            <div class="tab-content" id="ex1-content">
                <?php
                $id = $_GET["id"];
                $sql = 'SELECT motel.ID, motel.images, motel.title, user.Name, motel.created_at, motel.count_view, motel.address, motel.price, motel.description, motel.utilities, motel.phone FROM `motel` INNER JOIN `user` ON motel.user_id = user.ID INNER JOIN categories on motel.category_id = categories.ID INNER JOIN districts on motel.district_id = districts.ID WHERE motel.ID = '.$id.'';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="container">
                            <div class="card d-flex flex-row mt-4" style="width: 70vw;">
                                <img src="../Uploads/User/tranphong1/persion child.PNG" style="width: 40vw;" class="card-img-top" alt="Ảnh phòng trọ">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row["title"] ?></h5>
                                    <p class="card-text">Người đăng: <?php echo $row["Name"] ?></p>
                                    <p class="card-text">Ngày đăng: <?php echo $row["created_at"] ?></p>
                                    <p class="card-text">Lượt xem: <?php echo $row["count_view"] ?></p>
                                    <p class="card-text">Tiện nghi phòng: <?php echo $row["utilities"] ?></p>
                                    <p class="card-text">Mô tả chi tiết: <?php echo $row["description"] ?></p>
                                    <p class="card-text">Số điện thoại: <?php echo $row["phone"] ?></p>
                                    <p class="card-text">Địa chỉ: <?php echo $row["address"] ?></p>
                                    <p class="card-text">Giá: <?php echo $row["price"] ?></p>
                                    <a href="" class="btn btn-primary">Thuê phòng</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <!-- Tabs content -->
        <?php include("../Components/footer.php") ?>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
</body>

</html>