<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>
<?php
require_once 'db.php'; // подключаем скрипт
 
if(isset($_POST['login']) && isset($_POST['email'])){
 
    // подключаемся к серверу
    $link = mysqli_connect("localhost","root","","db")  
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $login = htmlentities(mysqli_real_escape_string($link, $_POST['login']));
    $email = htmlentities(mysqli_real_escape_string($link, $_POST['email']));
     
    // создание строки запроса
    $query ="INSERT INTO users VALUES('$login','$email')";
     
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
    // закрываем подключение
    mysqli_close($link);
}
?>
<h2>Добавить новую модель</h2>
<form  method="POST" style="margin-left:40%">
    
    <div class="group">      
      <input type="text" name="login" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Full name:</label>
    </div>
      
    <div class="group">      
      <input type="email" name="email"  required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Email</label>
	</div>
	<!-- <a type="submit" name="do_login" href="">Great!</a> -->
	<button type="submit">Добавить</button>
    
  </form>
</body>
</html>