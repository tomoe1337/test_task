<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Комментарии</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

	<h3>Комментарии</h3>
	<table class="table table-striped table-bordered">

	<tr>
		<td>
			<b>Имя</b>
		</td>
		<td>
			<b>Комментарий</b>
		</td>
	</tr>


<?php while ($comment = mysqli_fetch_assoc($data)) {?>

	<tr>
	<td style="max-width:100px">

	<?= htmlspecialchars($comment['name'])?>

	</td>
	<td>

	<?= htmlspecialchars($comment['comment'])?>

	</td>

	</tr>
<?php }?>
	</table>

</body>
</html>
