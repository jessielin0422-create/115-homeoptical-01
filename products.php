<?php
include "db.php";

$rows=$pdo->query("
SELECT *
FROM contact_lens
ORDER BY id DESC
")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

<?php
foreach($rows as $row){
?>

<div class="card">

<img src="images/<?=$row['image'];?>">

<h3><?=$row['product_name'];?></h3>

<p><?=$row['series_name'];?></p>

<a href="product.php?id=<?=$row['id'];?>">
查看詳細
</a>

</div>

<?php
}
?>

</div>

</body>
</html>