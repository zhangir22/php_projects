<!DOCTYPE html>
<html>
<head>
    <title>test</title>
    <meta charset="utf-8" />
</head>
<body>
<?php
$name = "не определено";
$live = "не определен";
if(isset($_GET["name"])){

    $name = $_GET["name"];
}
if(isset($_GET["live"])){

    $live = $_GET["live"];
}



echo "Имя: $name <br> Место проживание: $live";
?>
<h3>Форма ввода данных</h3>
<form method="GET" action="api_test.php">
    <p name="namep"></p>
    <p name="livep"></p>
    <p>Имя: <input type="text" name="name" placeholder="<?php if(isset($_GET['button'])){ echo $name;}?>"/></p>
    <p>Место проживание: <input type="text" name="live" placeholder="<?php if(isset($_GET['button'])){echo $live;}?>"/></p>
    <input type="submit" value="Отправить">
    <input type="submit" name="button" value="Автозаполнение">
</form>
</body>
</html>
