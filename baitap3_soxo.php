<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
</head>
<body>
	<?php # Script 3.4 - index.php
		$page_title = 'Welcome to this Site!';
		include ('includes/header.html');
		?>
	<?php
		if(isset($_POST["ve"])) $ve = $_POST["ve"]; else $ve = "";
		$kq = "";
		$kqxs = "";
		$kqve = array();
		$sodacbiet = null;
		//session_start();				
		if(!isset($_SESSION['flag']))
			$_SESSION['flag'] = 0;
		if(!isset($_SESSION['kqso']) || $_SESSION['flag'] == 0)
		{
			$_SESSION['kqso'] = range(1,55);
			shuffle($_SESSION['kqso']);
			$_SESSION['kqso'] = array_slice($_SESSION['kqso'], 0, 6);
		}
		if(!isset($_SESSION['sodacbiet']) || $_SESSION['flag'] == 0)
		{
			do
			{
				$_SESSION['sodacbiet'] = rand(1,55);
			}
			while(in_array($_SESSION['sodacbiet'],$_SESSION['kqso']));		
		}
			
		if(isset($_POST["taokq"]))
		{			
			$_SESSION['flag'] = 1;
			$sodacbiet = $_SESSION['sodacbiet'];
			$kq = implode("-",$_SESSION['kqso']);
		}
		
		if(isset($_POST["ktkq"]))
		{
			$kqve = explode("-",$ve);
			if (count($kqve) != 6)
				echo "<script>alert('Phải nhập đúng 6 cặp số')</script>";
			else
			if (count(array_unique($kqve)) != 6)
				echo "<script>alert('Phải nhập 6 cặp số không trùng nhau')</script>";
			else
			{
				$dem = 0;
				$kq = implode("-",$_SESSION['kqso']);
				$sodacbiet = $_SESSION['sodacbiet'];
				$_SESSION['flag'] = 0;
				foreach ($kqve as $k=>$value)
					if (in_array($value,$_SESSION['kqso']))
						$dem++;
				if ($dem == 6)
					$kqxs = "TRÚNG GIẢI JACKPOT 1";
				else
				if ($dem == 5)
				{
					$tam = 0;
					foreach ($kqve as $k=>$value)
						if (!in_array($value,$_SESSION['kqso']))
						{
							$tam = $value;
							break;
						}
					if ($tam == $_SESSION['sodacbiet'])
						$kqxs = "TRÚNG GIẢI JACKPOT 2";
					else
						$kqxs = "TRÚNG GIẢI NHẤT";
				}
				else
				if ($dem == 4)	
					$kqxs = "TRÚNG GIẢI HAI";
				else
				if ($dem == 3)	
					$kqxs = "TRÚNG GIẢI BA";	
				else
					$kqxs = "KHÔNG TRÚNG GIẢI. CHÚC MAY MẮN LẦN SAU.";	
					
			}
		}
	?>
	<form  method="POST">
	<table border="0" bgcolor="yellow">
		<tr>
			<td colspan="2" bgcolor="green" style="color:white;text-align:center;font-style:italic">KIỂM TRA XỔ SỐ VIETLOTT</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="taokq" value="Tạo kết quả xổ số"/></td>
		</tr>
		<tr>
			<td>Kết quả: </td>
			<td><input type="text" style="background-color:lightgray" disabled="disabled" name="kq" value="<?php echo $kq ?>"/></td>
		</tr>
		<tr>
			<td>Số đặc biệt: </td>
			<td><input type="text" style="background-color:lightgray" disabled="disabled" name="sodacbiet" value="<?php echo $sodacbiet ?>"/></td>
		</tr>
		<tr>
			<td>Nhập vào vé: </td>
			<td><input type="text" name="ve" value=""/></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="ktkq" value="Kiểm tra kết quả"/></td>
		</tr>
		<tr>
			<td colspan="2" bgcolor="lightblue" style="color:red;font-weight:bold;text-align:center"><?php echo $kqxs; ?></td>
		</tr>
		
		
		
		</table>
	</form>
	<?php
		include ('includes/footer.html');
		?>
	</div>
</body>
</html>