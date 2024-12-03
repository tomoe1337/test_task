<?php
require_once('connect.php');

$sql_categories= "DELETE FROM categories
WHERE id IN (SELECT id FROM products WHERE NOT EXISTS (
	SELECT 1 FROM products WHERE products.category_id = categories.id
));";


$sql_products = "DELETE FROM products
WHERE id IN (SELECT id FROM availabilities WHERE NOT EXISTS (
    SELECT 1 FROM availabilities WHERE availabilities.product_id = products.id
));";


$sql_stocks = "DELETE FROM stocks
WHERE id IN (SELECT id FROM availabilities WHERE NOT EXISTS (
    SELECT 1 FROM availabilities WHERE availabilities.stock_id = stocks.id
));";



if (mysqli_query($connect,$sql_categories)) echo 'Нарушения в таблице "categories" устранены <br>';


if (mysqli_query($connect,$sql_products)) echo 'Нарушения в таблице "products" устранены <br>';


if (mysqli_query($connect,$sql_stocks)) echo 'Нарушения в таблице "stocks" устранены <br>';
