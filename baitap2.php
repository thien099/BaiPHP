<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 3</title>
    <link rel="stylesheet" href="bai3.css">
</head>
<body>
    <?php 
    $oldIndex = $newIndex = $unitPrice = $totalMoney = $fullNameErr = $oldIndexErr = $newIndexErr = $unitPriceErr = "";
    $countErr = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fullName"])) {
            $fullNameErr = "FullName field is required";
            $countErr++;
        }
        if (!empty($_POST["oldIndex"])) {
            if ($_POST["oldIndex"] <= 0) {
                $oldIndexErr = "Old index must be more than 0";
                $countErr++;
            } else {
                (int)$oldIndex = $_POST["oldIndex"];
            }
        } else {
            $oldIndexErr = "Old index field is required";
            $countErr++;
        }
        if (!empty($_POST["newIndex"])) {
            if ($_POST["newIndex"] <= 0) {
                $newIndexErr = "New index must be more than 0";
                $countErr++;
            } else if ($_POST["newIndex"] <= $_POST["oldIndex"] && !empty($_POST["oldIndex"])) {
                $newIndexErr = "New index must be more than old index";
                $countErr++;
            } else {
                (int)$newIndex = $_POST["newIndex"];
            }
        } else {
            $newIndexErr = "New index field is required";
            $countErr++;
        }
        if (!empty($_POST["unitPrice"])) {
            if ($_POST["unitPrice"] <= 0) {
                $unitPriceErr = "Unit price must be more than 0";
                $countErr++;
            } else {
                (int)$unitPrice = $_POST["unitPrice"];
            }
        } else {
            $unitPriceErr = "Unit price field is required";
            $countErr++;
        }
        if ($countErr == 0) {
            (int)$totalMoney = ((int)$newIndex - (int)$oldIndex) * (int)$unitPrice;
        }
    }
    ?> 
    <div class="content">
        <h2 class="title">Thanh Toán Tiền Điện</h2>
        <form action="" method="post">
            <div class="form-group">
                <label>Tên chủ hộ:</label>
                <input type="text" name="fullName" value="<?php if (!empty($_POST["fullName"])) echo $_POST["fullName"] ?>">
                <span class="error-message"><?php echo $fullNameErr ?></span>
            </div>
            <div class="form-group">
                <label>Chỉ số cũ:</label>
                <input type="number" name="oldIndex" value="<?php echo $_POST["oldIndex"]; ?>">
                (Kw)
                <span class="error-message"><?php echo $oldIndexErr ?></span>
            </div>
            <div class="form-group">
                <label>Chỉ số mới:</label>
                <input type="number" name="newIndex" value="<?php echo $_POST["newIndex"]; ?>">
                (Kw)
                <span class="error-message"><?php echo $newIndexErr ?></span>
            </div>
            <div class="form-group">
                <label>Đơn giá:</label>
                <input type="number" name="unitPrice" value="<?php if(isset($_POST["unitPrice"])) echo $_POST["unitPrice"]; else echo 2000; ?>">
                (VND)
                <span class="error-message"><?php echo $unitPriceErr ?></span>
            </div>
            <div class="form-group">
                <label>Số tiền thanh toán:</label>
                <input class="readonly-input" type="number" name="totalMoney" value="<?php echo $totalMoney ?>" readonly>
                (VND)
            </div>
            <input type="submit" value="Tính">
        </form>
    </div>
</body>
</html>