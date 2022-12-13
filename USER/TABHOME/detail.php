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
                $view;
                $sql = 'SELECT motel.ID, motel.images, motel.title, user.Name, motel.created_at, motel.count_view, motel.address, motel.price, motel.description, motel.utilities, motel.phone, motel.approve FROM `motel` INNER JOIN `user` ON motel.user_id = user.ID INNER JOIN categories on motel.category_id = categories.ID INNER JOIN districts on motel.district_id = districts.ID WHERE motel.ID = ' . $id . '';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $tinhTrang;
                        $view = $row["count_view"] + 1;
                        if ($row["approve"] == 0) {
                            $tinhTrang = "Còn trống";
                        } else {
                            $tinhTrang = "Đã đầy";
                        }
                ?>
                        <div class="container">
                            <div class="card d-flex flex-row mt-4" style="width: 75vw">
                                <div style="width: 40vw">
                                    <img src="../Uploads/Motel/<?php echo $row["images"] ?>" style="width: 40vw; height: 30vw;" class="card-img-top" alt="Ảnh phòng trọ">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row["title"] ?></h5>
                                    <p class="card-text">Người đăng: <?php echo $row["Name"] ?></p>
                                    <p class="card-text">Ngày đăng: <?php echo $row["created_at"] ?></p>
                                    <p class="card-text">Lượt xem: <?php echo $row["count_view"] ?></p>

                                    <p class="card-text">Số điện thoại: <?php echo $row["phone"] ?></p>
                                    <p class="card-text">Địa chỉ: <?php echo $row["address"] ?></p>
                                    <p class="card-text">Giá: <?php echo $row["price"] ?></p>
                                    <p class="card-text">Tình trạng phòng: <?php echo $tinhTrang ?></p>
                                    <a href="" class="btn btn-primary">Thuê phòng</a>
                                </div>
                            </div>

                            <div class="card d-flex flex-row mt-4" style="width: 75vw">
                                <div style="width: 30vw">
                                    <div style="width: 30vw; height: 20vw;">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3780.1102348314307!2d105.69355565084297!3d18.659048669731167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139cddf0bf20f23%3A0x86154b56a284fa6d!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBWaW5o!5e0!3m2!1svi!2s!4v1667830600257!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mt-4 mb-4">
                                        <h5 class="card-title mt-3">Tiện nghi phòng: </h5>
                                        <p class="card-text"><?php echo $row["utilities"] ?></p>
                                        <h5 class="card-title mt-3">Mô tả chi tiết: </h5>
                                        <p class="card-text"><?php echo $row["description"] ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                <?php
                    }
                }
                $sqlAdd = 'UPDATE `motel` SET `count_view`= ' . $view . ' WHERE ID = ' . $id . '';
                $resultAdd = $conn->query($sqlAdd);
                ?>
            </div>
        </div>
        <!-- Tabs content -->
        <?php include("../Components/footer.php") ?>
    </div>
    <!-- Replace YOUR_API_KEY here by your key above -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
</body>

</html>
