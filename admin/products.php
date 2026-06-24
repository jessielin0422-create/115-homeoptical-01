<?php
include "../db.php";

if(!empty($_POST)){

$sql="
INSERT INTO contact_lens
(
product_name,
series_name,
replacement_cycle,
material,
target_user,
description,
image
)
VALUES
(
'{$_POST['product_name']}',
'{$_POST['series_name']}',
'{$_POST['replacement_cycle']}',
'{$_POST['material']}',
'{$_POST['target_user']}',
'{$_POST['description']}',
'{$_POST['image']}'
)
";

$pdo->exec($sql);

header("location:index.php");
}
?>

<form method="post">

產品名稱
<input type="text" name="product_name">

系列
<input type="text" name="series_name">

週期
<input type="text" name="replacement_cycle">

材質
<input type="text" name="material">

適用族群
<input type="text" name="target_user">

圖片
<input type="text" name="image">

介紹
<textarea name="description"></textarea>

<button>新增</button>

</form>