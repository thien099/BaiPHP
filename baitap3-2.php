<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả</title>
    <link rel="stylesheet" href="style-6.css">
</head>
<body>
    <?php 
        $firstNumber = $_POST["firstNumber"];
        $secondNumber = $_POST["secondNumber"];
        $operation = $_POST["operation"];
        $result = "";
        $countErr = 0;
        if (isset($_POST["submit"])) {
            if ($_POST["firstNumber"] != "") {
                if (!is_numeric($_POST["firstNumber"])) {
                    $firstNumberErr = "Số thứ nhất phải là kiểu số";
                    $countErr++;
                }
            } else {
                $firstNumberErr = "Số thứ nhất không được rỗng";
                $countErr++;
            }
            if ($_POST["secondNumber"] != "") {
                if (!is_numeric($_POST["secondNumber"])) {
                    $secondNumberErr = "Số thứ 2 phải là kiểu số";
                    $countErr++;
                } else {
                    if ((double)$_POST["secondNumber"] == 0 && $_POST["operation"] == "Chia") {
                        $secondNumberErr = "Không thể thực hiện chia cho 0";
                        $countErr++;
                    }
                }
            } else {
                $secondNumberErr = "Số thứ 2 không được rỗng";
                $countErr++;
            }
            if ($countErr == 0) {
                switch ($_POST["operation"]) {
                    case "Cộng":
                        $result = $_POST["firstNumber"] + $_POST["secondNumber"];
                        break;
                    case "Trừ":
                        $result = $_POST["firstNumber"] - $_POST["secondNumber"];
                        break;
                    case "Nhân":
                        $result = $_POST["firstNumber"] * $_POST["secondNumber"];
                        break;
                    case "Chia":
                        $result = $_POST["firstNumber"] / $_POST["secondNumber"];
                        break;
                }
            } else {
                header("Location: baitap6-1.php?firstNumber=$firstNumber&firstNumberErr=$firstNumberErr&secondNumber=$secondNumber&secondNumberErr=$secondNumberErr&operation=$operation");
            }
        }
    ?>
    <div class="content">
        <h2 class="title">PHÉP TÍNH TRÊN HAI SỐ</h2>
        <form action="">
            <div class="form-group">
                <label style="color: darkred;">Chọn phép tính:</label>
                <span style="color: red"><?php echo $_POST["operation"]; ?></span>
            </div>
            <div class="form-group">
                <label>Số thứ nhất: </label>
                <input type="text" name="firstNumber" value="<?php echo $firstNumber; ?>">
            </div>
            <div class="form-group">
                <label>Số thứ hai: </label>
                <input type="text" name="secondNumber" value="<?php echo $secondNumber; ?>">
            </div>
            <div class="form-group">
                <label>Kết quả: </label>
                <input type="text" name="result" value="<?php echo $result; ?>">
            </div>
            <a href="javascript:window.history.back(-1);">Quay lại trang trước</a>
        </form>
    </div>
</body>
</html>