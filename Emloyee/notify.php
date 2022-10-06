<?php
    include('header.php')
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
                        <br>
                    </thead>
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Thời gian tạo</th>
                            <th scope="col">Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($_GET['id'])){
                            $id  = $_GET['id'];
                            $sql1 = "SELECT * FROM `tb_notify` WHERE Id =  $id";
                            $qr = mysqli_query($conn, $sql1);
                        }else {
                            $sql2 = "SELECT * FROM `tb_notify` ";
                            $qr = mysqli_query($conn, $sql2);
                        }
                        // $sql = "SELECT * FROM `tb_notify`";
                        // $qr = mysqli_query($conn, $sql);
                        while ($row  = mysqli_fetch_assoc($qr)) {
                        ?>
                            <tr>
                                <td><?= $row['Id'] ?></td>
                                <td><?= $row['NotifyName'] ?></td>
                                <td><?= $row['CreateTime'] ?></td>
                         
                                <th>
                                    <!-- Button trigger modal -->
                                    <button id="<?= $row['Id'] ?>" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Chi tiết
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">STT </th>
                                                                    <th  scope="col">Tiêu đề</th>
                                                                    <th scope="col">Nội dung</th>
                                                                    <th  scope="col">Thời gian tạo</th>
                                                                   
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

                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
        include('footer.php');
        ?>