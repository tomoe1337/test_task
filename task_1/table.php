<table border = "1" style = "border:1px solid;border-collapse: collapse;">
	<tr>
		<td></td>
		<td>Математика</td>
		<td>ОБЖ</td>
		<td>Физика</td>

	</tr>

<?php
	foreach ($sorted_data as $key => $value ) {
?>
	<tr>
		<td>
			<?=$key;?>
		</td>

		<td>
			<?=$value['Математика'] ?? "";?>
		</td>

		<td>
			<?=$value['ОБЖ'] ?? "";?>
		</td>

		<td>
			<?=$value['Физика'] ?? "";?>
		</td>
	</tr>

<?php
}