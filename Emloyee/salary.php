<?php

    include('header.php');  
  
?>
<div class="title" style="padding-top: 30px;padding-left: 30px;padding-right: 30px;">
    <h1>
        Bảng lương
    </h1>
    <hr>
    <br>
</div>
<div class="container text-left pt-4 px-4">
    <div style="border:1px solid #ccc" class="bg-light rounded h-150 p-4">
        <?php
        $sql  = "SELECT * FROM tb_salary WHERE SalaryStatus = 1 AND EmployeeCode = '$employeecode1'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $EmployeeCode = $row['EmployeeCode'];
        $EmployeeName = $row['EmployeeName'];
        $SalaryCoefficients = $row['SalaryCoefficients'];
        $SalaryDay = $row['SalaryDay'];
        $SalaryOT = $row['SalaryOT'];
        $SalarySum = $row['SalarySum'];
        $SalaryStatus = $row['SalaryStatus'];

        if ($SalaryDay >= 22) {
            $bonus = 500000;
        } else {
            $bonus = 0;
        }
        $Sum = $SalarySum + $bonus;
        ?>
        <div class="row">
            <div class="col">
                <p class="h6">Mã nhân viên:</p>
                <div class="p-2 border rounded bg-white" style="width: 80%;"><?php echo $EmployeeCode; ?></div>
            </div>
            <div class="col">
                <p class="h6">Tên nhân viên:</p>
                <div class="p-2 border rounded bg-white" style="width: 80%;"><?php echo $EmployeeName; ?></div>
            </div>
            <div class="col">
                <p class="h6">Hệ số lương:</p>
                <div class="p-2 border rounded bg-white" style="width: 80%;"><?=number_format($SalaryCoefficients, 0, '.', '.')?> VND</div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <p class="h6">Số ngày đi làm:</p>
                <div class="p-2 border rounded bg-white" style="width: 80%;"><?php echo $SalaryDay; ?></div>
            </div>
            <div class="col">
                <p class="h6">Số giờ làm thêm:</p>
                <div class="p-2 border rounded bg-white" style="width: 80%;"><?php echo $SalaryOT; ?></div>
            </div>
            <div class="col">
                <p class="h6">Thưởng:</p>
                <div class="p-2 border rounded bg-white" style="width: 80%;"><?=number_format($bonus, 0, '.', '.')?> VND</div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <p class="h6">Lương cơ bản:</p>
                <div class="p-2 border rounded bg-white" style="width: 80%;"><?=number_format($SalarySum, 0, '.', '.')?> VND</div>
            </div>
            <div class="col">
                <p class="h6">Tổng lương:</p>
                <div class="p-2 border rounded bg-white" style="width: 80%;"><?=number_format($Sum, 0, '.', '.')?> VND</div>
            </div>
            <div class="col">
            </div>
        </div>
    </div>

</div>
<?php
include('footer.php');
?>