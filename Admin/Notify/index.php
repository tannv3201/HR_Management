<?php

include('../../header.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js">
<div class="title" style="padding-top: 30px;padding-left: 30px;padding-right: 30px;">
    <h1>
        Quản lý thông báo
    </h1>
    <hr>
    <br>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div style="border:1px solid #ccc" class="bg-white rounded h-100 p-4">
            <h3 class="mb-4">Bảng thông báo</h3>
            <div class="table-responsive" style="height: 400px;">
                <table class="table">
                    <thead>
                        <div style="display: flex;">
                            <button type="button" class="btn btn-secondary" style="margin-left: 10px;"><a href="add.php"
                                    style="color: white;">Thêm thông báo</a></button>
                        </div>
                        <br>
                    </thead>
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Thời gian tạo</th>
                            <th class="text-center" scope="col">Trạng thái</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `tb_notify`";
                        $qr = mysqli_query($conn, $sql);
                        while ($row  = mysqli_fetch_assoc($qr)) {
                        ?>
                        <tr>
                            <td><?= $row['Id'] ?></td>
                            <td><?= $row['NotifyName'] ?></td>
                            <td><?= $row['CreateTime'] ?></td>
                            <td id=<?=  $row['Id'] ?> style="cursor:pointer" class="status text-center"
                                name_status="<?=$row['NotifyStatus']?>">
                                <?php if ($row['NotifyStatus'] == 1) {
                                       ?>
                                <i class="fa-solid fa-lock-open"></i>
                                <?php
                                    } else {
                                       ?>
                                <i class="fa-solid fa-lock"></i>
                                <?php
                                    }
                                    ?>
                            </td>
                            <th scope="col"><a href="update.php?id=<?= $row['Id'] ?>"><button type="button"
                                        class="btn btn-secondary">Sửa</button></a></th>
                            <th>
                                <!-- Button trigger modal -->
                                <button id="<?= $row['Id'] ?>" type="button" class="btn btn-secondary"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Chi tiết
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">STT </th>
                                                                <th style="width:10%" scope="col">Tiêu đề</th>
                                                                <th scope="col">Nội dung</th>
                                                                <th style="width:12%" scope="col">Thời gian tạo</th>
                                                                <th style="width:10%" scope="col">Trạng thái</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sql1 = "SELECT * FROM `tb_notify` where Id = " . $row['Id'];
                                                            $qr1 = mysqli_query($conn, $sql1);
                                                            $row1  = mysqli_fetch_assoc($qr1);
                                                            ?>
                                                            <tr>
                                                                <td><?= $row1['Id'] ?></td>
                                                                <td><?= $row1['NotifyName'] ?></td>
                                                                <td style="text-align:justify">
                                                                    <?= $row1['NotifyContent'] ?></td>
                                                                <td><?= $row1['CreateTime'] ?></td>
                                                                <td><?php if ($row1['NotifyStatus'] == 1) {
                                                                        echo "Active";
                                                                    } else {
                                                                        echo "Disable";
                                                                    }
                                                                    ?></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


        <?php
        include('../../footer.php');
        ?>

        <script>
        $('.fa-solid').click(function() {
            status = $(this).parent().attr('name_status')
            id = $(this).parent().attr('id')
            $.ajax({
                method: "POST",
                url: "lock.php",
                data: {
                    status: status,
                    id: id
                },
                // success: function(dt) {

                // }
            })

            if (status == 1) {
                $(this).parent().attr('name_status', "2")
                $(this).addClass("fa-lock")
                $(this).removeClass("fa-lock-open")
            } else {
                $(this).parent().attr('name_status', "1")
                $(this).removeClass("fa-lock")
                $(this).addClass("fa-lock-open")
            }

        })
        </script>