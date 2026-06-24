<?php

include "db.php";

$id=$_GET['id'];

$row=$pdo->query("
SELECT *
FROM contact_lens
WHERE id='$id'
")->fetch();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="detail">

<img src="images/<?=$row['image'];?>">

<h1><?=$row['product_name'];?></h1>

<h3><?=$row['series_name'];?></h3>

<p>
配戴週期：
<?=$row['replacement_cycle'];?>
</p>

<p>
材質：
<?=$row['material'];?>
</p>

<p>
適用族群：
<?=$row['target_user'];?>
</p>

<p>
<?=$row['description'];?>
</p>

</div>

</body>
</html>

<?php
include "db.php";

$id=$_GET['id'];

$row=$pdo->query("select * from contact_lens where id='$id'")
         ->fetch();

?>

<h1><?=$row['product_name'];?></h1>

<img src="images/<?=$row['image'];?>">

<ul>
    <li>配戴週期：<?=$row['replacement_cycle'];?></li>
    <li>材質：<?=$row['material'];?></li>
    <li>適用族群：<?=$row['target_user'];?></li>
    <li><?=$row['feature_1'];?></li>
    <li><?=$row['feature_2'];?></li>
    <li><?=$row['feature_3'];?></li>
</ul>

<p><?=$row['description'];?></p>