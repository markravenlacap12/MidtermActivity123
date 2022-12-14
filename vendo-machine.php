

<?php $arrDrinks = array('Coke' => 15,'Sprite'=>20,'Royal'=>20,'Pepsi'=>15,'Mountain Dew' =>20); ?>
<?php $arrSize = array('Regular' => 0, 'Up-Size'=>5, 'Jumbo'=>10); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vendo-Machine</title>
</head>
<body>
	<form method="post">
		<h1>Vendo Machine</h1>
		<fieldset style="width: 550px">
			<legend>Products:</legend>

		<?php foreach ($arrDrinks as $key => $value)
				echo '<input type="checkbox" name="chkDrinks[]" id="chk'.$key.'" value="'.$key.'">
                <label for="chk'.$key.'">'. $key.' - ₱'.$value.'</label><br>';
		?>
		</fieldset>
		<fieldset style="width: 550px">
			<legend>Options:</legend>
			<label for="slctSize">Size</label>
			<select name="slctSize" id="slctSize">

				<?php foreach ($arrSize as $key => $value)
					echo '<option value="'.$key.'">'. $key .' (add ₱'.$value .')</option>';
				?>
			</select>
			<label for="numQuantity">Quantity</label>
			<input type="number" name="numQuantity" id="numQuantity" min="0" value="0">
			<button type="submit" name="btncheckout">Check Out</button>
		</fieldset>
	</form>
	<?php 
		
		if (isset($_POST['btncheckout'])) {
			echo '<hr>';

			if (isset($_POST['chkDrinks']) && isset($_POST['numQuantity']) > 0) { 

				$quantity = $_POST['numQuantity'];
				$size = $_POST['slctSize'];
				$items = $_POST['chkDrinks'];
				$totalItems = count($items) * $quantity;
				$totalAmount = 0;
				?>
				<h3>Purchase Summary:</h3>
				<ul>
					<?php 
						foreach ($items as $itemname) {
							$drinksAmount = ($arrDrinks[$itemname] + $arrSize[$size]) * $quantity;
  							$totalAmount += $drinksAmount;
                            
  							if ($quantity > 1) {
  								echo '<li>'.$quantity.' pieces of '.$size. $itemname.' amounting to ₱'.$drinksAmount .'.</li>';
  							}else{
  								echo '<li>'.$quantity.' piece of '.$size.' '.$itemname.' amounting to ₱'.$drinksAmount .'.</li>';
  							}

						}
						
					 ?>
				</ul>
				<?php  
					echo 'Total Purchased Items: '.$totalItems.'<br>';
					echo 'Total Purchased Amount: '.$totalAmount;
				?>
		<?php }else{
					echo "No Selected Product ,Please Try Again";		
		}
		}
		?>
 
</body>	
</html>