<!DOCTYPE html>
<html>
<body>
	<?php # Script 3.4 - index.php
		$page_title = 'Welcome to this Site!';
		include ('includes/header.html');
		?>
	<?php
		if(isset($_POST["m"])) $m = $_POST["m"]; else $m = null;
		if(isset($_POST["n"])) $n = $_POST["n"]; else $n = null;
		$mx = "";
		function TaoMT ($mt,$h,$c)
		{
			$a = array();
			for ($i = 0; $i < $h; $i++)
				for ($j = 0; $j < $c; $j++)
					$mt[$i][$j] = rand(-100,100);
			$a = $mt;
			return $a;			
		}
		function XuatMT ($mt,$h,$c)
		{
			$matrix = "<table style='text-align:center;' bgcolor='lightgreen'>";
			for ($i = 0; $i < $h; $i++)
			{
				$matrix = $matrix . "<tr>";
				for ($j = 0; $j < $c; $j++)
					$matrix = $matrix . "<td style='border:2px solid red;'>" . $mt[$i][$j] . "</td>";
				$matrix = $matrix . "</tr>";
			}
			$matrix = $matrix . "</table>";
			return $matrix;
		}
		$MT = array();
		if (isset($_POST["xuly"]))
		{
			if(!is_numeric($m) || $m < 2)
				echo "<script>alert('Phải nhập vào m >= 2')</script>";		
			else
			if(!is_numeric($n) || $n > 10 || $n <= 0)
				echo "<script>alert('Phải nhập vào n là số nguyên dương và <= 10')</script>";		
			else
			{
				$MT = TaoMT($MT,$m,$n);
				$mx = XuatMT($MT,$m,$n);
			}				
		}
		
		
	?>
	<form action="" method="POST">
	<table border="0" bgcolor="lightgray">
		<tr>
			<td colspan="2" bgcolor="green" style="color:white;text-align:center;font-style:italic">TẠO MA TRẬN NGẪU NHIÊN</td>
		</tr>
		<tr>
			<td>Nhập số hàng: </td>
			<td><input type="text" name="m" value="<?php echo $m;?>"/></td>
		</tr>
		<tr>
			<td>Nhập số cột: </td>
			<td><input type="text" name="n" value="<?php echo $n;?>"/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Tạo ma trận" name="xuly"/></td>
		</tr>
		<tr bgcolor="lightblue">
			<td>Ma trận vừa được tạo:</td>
			<td><?php if (isset($_POST["xuly"])) echo $mx; ?></td>
		</tr>
		
		
		
		</table>
	</form>
	<?php
		include ('includes/footer.html');
		?>
	</div>
</body>
</html>