
<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">

<?php 
	require 'db.php';

	$data = $_POST;
	if ( isset($data['do_login']) )
	{
		$user = R::findOne('users', 'login = ?', array($data['login']));
		if ( $user )
		{
			//логин существует
			if ( password_verify($data['password'], $user->password) )
			{
				//если пароль совпадает, то нужно авторизовать пользователя
				$_SESSION['logged_user'] = $user;
				echo '<div style="color:dreen;">Вы авторизованы!<br/> Можете перейти на <a href="./admin_page.php">главную</a> страницу.</div><hr>';
			}else
			{
				$errors[] = 'Неверно введен пароль!';
			}

		}else
		{
			$errors[] = 'Пользователь с таким логином не найден!';
		}
		
		if ( ! empty($errors) )
		{
			//выводим ошибки авторизации
			echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
		}

	}

?>

<div class="container">
  
  <h2>Enter your login and password<small>Inputs</small></h2>
  
  <form action="admin.php" method="POST">
    
    <div class="group">      
      <input type="text" name="login" value="<?php echo @$data['login']; ?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Full name:</label>
    </div>
      
    <div class="group">      
      <input type="password" name="password" value="<?php echo @$data['password']; ?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Email</label>
	</div>
	<!-- <a type="submit" name="do_login" href="">Great!</a> -->
	<button type="submit" name="do_login">Войти</button>
    
  </form>
  <ul class="login-more p-t-190">
						

						<li>
							<span class="txt1">
								Don’t have an account?
							</span>

							<a href="./signup.php" class="txt2">
								Sign up
							</a>
						</li>
					</ul>
  
  
</div>




<!-- 
<form action="login.php" method="POST">
	<strong>Логин</strong>
	<input type="text" name="login" value="<?php echo @$data['login']; ?>"><br/>

	<strong>Пароль</strong>
	<input type="password" name="password" value="<?php echo @$data['password']; ?>"><br/>

	<button type="submit" name="do_login">Войти</button>
</form> -->