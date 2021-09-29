<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    $length = $width = $acreage = $lengthErr = $widthErr = "";
    $countErr = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["length"])) {
            if ($_POST["length"] <= 0) {
                $lengthErr = "Length must be more than 0";
                $countErr++;
            } else {
                (int)$length = $_POST["length"];
            }
        } else {
            $lengthErr = "length field is required";
            $countErr++;
        }
        if (!empty($_POST["width"])) {
            if ($_POST["width"] <= 0) {
                $widthErr = "Width must be more than 0";
                $countErr++;
            } else if ($_POST["width"] >= $_POST["length"] && !empty($_POST["length"])) {
                $widthErr = "Width must be less than length";
                $countErr++;
            } else {
                (int)$width = $_POST["width"];
            }
        } else {
            $widthErr = "width field is required";
            $countErr++;
        }
        if ($countErr == 0) {
            (int)$acreage = (int)$length * (int)$width;
        }
    }
    ?>
    <div class="content">
        <h2 class="title">Diện Tích Hình Chữ Nhật</h2>
        <form action="" method="post">
            <div class="form-group">
                <label>Chiều dài:</label>
                <input type="number" name="length" value="<?php echo $_POST["length"]; ?>">
                <span class="error-message"><?php echo $lengthErr ?></span>
            </div>
            <div class="form-group">
                <label>Chiều rộng:</label>
                <input type="number" name="width" value="<?php echo $_POST["width"]; ?>">
                <span class="error-message"><?php echo $widthErr ?></span>
            </div>
            <div class="form-group">
                <label>Diện tích:</label>
                <input class="readonly-input" type="number" name="acreage" value="<?php echo $acreage ?>" readonly>
            </div>
            <input type="submit" value="Tính">
        </form>
    </div>
</body>
</html>