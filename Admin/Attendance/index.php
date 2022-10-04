<?php
include('../../ConnectDatabase/connect.php');
include('../../header.php');
?>

<div class="title" style="padding-top: 30px;padding-left: 30px;padding-right: 30px;">
    <h1>
        Quản lý chấm công của nhân viên
    </h1>
    <hr>
    <br>
</div>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div style="border:1px solid #ccc" class="bg-white rounded h-100 p-4">
                <h3 class="mb-4">Bảng chấm công</h3>
                <div class="table-responsive" style="height: 400px;">
                    <table class="table" id="exportTable">
                        <thead>
                            <div style="display: flex;">
                                <select type="EmployeeCode" name="EmployeeCode" id="EmployeeCode">
                                    <option value="">Tên nhân viên</option>
                                    <?php 
                                        $sql1 = "SELECT * FROM tb_employee";
                                        $res1 = mysqli_query($conn, $sql1);

                                        while ($row1 = mysqli_fetch_assoc($res1)) {
                                            $empCode = $row1['EmployeeCode'];
                                            $empName = $row1['EmployeeName'];

                                            ?>
                                    <option value="<?php echo $empCode;?>"><?php echo $empName;?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <!-- <input type="EmployeeCode" name="EmployeeCode" class="form-control" placeholder="Mã nhân viên" aria-label="Mã nhân viên" aria-describedby="basic-addon2" style="width: 20%; height:40px;"> -->
                                <button class="btn btn-secondary" style="margin-left: 10px;" name="search"
                                    type="search">Tìm kiếm</button>
                                <button type="button" style="margin-left: 10px;" class="btn btn-secondary"
                                    data-bs-toggle="modal" data-bs-target="#myModal">
                                    Xóa dữ liệu
                                </button>

                                <button class="btn btn-secondary" id="exportExcel" style="margin-left: 10px;"
                                    onclick="exportTableToExcel('exportTable', 'Bảng chấm công của nhân viên')">Xuất
                                    Excel</button>

                            </div>

                        </thead>
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Mã nhân viên</th>
                                <th scope="col">Tên nhân viên</th>
                                <th scope="col">Ngày chấm</th>
                                <th scope="col">Bắt đầu làm</th>
                                <th scope="col">Kết thúc làm</th>
                                <th scope="col">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['search'])) {
                                    $code = $_POST['EmployeeCode'];
                                    if($code == "") {
                                        $sql  = "SELECT * FROM tb_attendance WHERE AttendanceStatus = 1";
                                    } else {
                                        $sql = "SELECT * FROM tb_attendance WHERE AttendanceStatus = 1 AND (EmployeeCode = '$code')";
                                    }
                            } else {
                                $sql  = "SELECT * FROM tb_attendance WHERE AttendanceStatus = 1";
                            }

                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                            $id = 0;
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    ++$id;
                                    $EmployeeCode = $row['EmployeeCode'];
                                    $EmployeeName = $row['EmployeeName'];
                                    $AttendanceDate = $row['AttendanceDate'];
                                    $AttendanceStart = $row['AttendanceStart'];
                                    $AttendanceEnd = $row['AttendanceEnd'];
                                    $AttendanceStatus = $row['AttendanceStatus'];
                            ?>
                            <tr>
                                <th scope="row"><?php echo $id; ?></th>
                                <td><?php echo $EmployeeCode; ?></td>
                                <td><?php echo $EmployeeName; ?></td>
                                <td><?php echo $AttendanceDate; ?></td>
                                <td><?php echo $AttendanceStart; ?></td>
                                <td><?php echo $AttendanceEnd; ?></td>
                                <td><?php
                                            if ($AttendanceStatus == 1) {
                                                echo 'Hiệu lực';
                                            } else {
                                                echo 'Không hiệu lực';
                                            }
                                            ?></td>
                            </tr>
                            <?php
                                }
                            } else {
                                ?>
                        </tbody>
                    </table>
                    <p style="width: 100%; text-align: center;">Không tồn tại dữ liệu</p>
                    <?php
                            }
                ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
<form action="resetData.php" method="post">
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Xóa dữ liệu</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Xác nhận xóa dữ liệu chấm công?
                </div>


                <div class="modal-footer">
                    <button type="resetData" name="resetData" class="btn btn-danger">Xóa</button>
                </div>



            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
function exportTableToExcel(tableID, filename = '') {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename ? filename + '.xls' : 'excel_data.xls';

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if (navigator.msSaveOrOpenBlob) {
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob(blob, filename);
    } else {
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}
</script>

<?php
include('../../footer.php');
?>