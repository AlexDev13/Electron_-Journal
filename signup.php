
	<link rel="stylesheet" type="text/css" href="css/signup.css">

<?php 
	require 'db.php';

	$data = $_POST;

	function captcha_show(){
		$questions = array(
			1 => 'Столица России',
			2 => 'Столица США',
			3 => '2 + 3',
			4 => '15 + 14',
			5 => '45 - 10',
			6 => '33 - 3'
		);
		$num = mt_rand( 1, count($questions) );
		$_SESSION['captcha'] = $num;
		echo $questions[$num];
	}

	//если кликнули на button
	if ( isset($data['do_signup']) )
	{
    // проверка формы на пустоту полей
		$errors = array();
		if ( trim($data['login']) == '' )
		{
			$errors[] = 'Введите логин';
		}

		if ( trim($data['email']) == '' )
		{
			$errors[] = 'Введите Email';
		}

		if ( $data['password'] == '' )
		{
			$errors[] = 'Введите пароль';
		}

		if ( $data['password_2'] != $data['password'] )
		{
			$errors[] = 'Повторный пароль введен не верно!';
		}

		//проверка на существование одинакового логина
		if ( R::count('users', "login = ?", array($data['login'])) > 0)
		{
			$errors[] = 'Пользователь с таким логином уже существует!';
		}
    
    //проверка на существование одинакового email
		if ( R::count('users', "email = ?", array($data['email'])) > 0)
		{
			$errors[] = 'Пользователь с таким Email уже существует!';
		}

		//проверка капчи
		// $answers = array(
		// 	1 => 'москва',
		// 	2 => 'вашингтон',
		// 	3 => '5',
		// 	4 => '29',
		// 	5 => '35',
		// 	6 => '30'
		// );
		// if ( $_SESSION['captcha'] != array_search( mb_strtolower($_POST['captcha']), $answers ) )
		// {
		// 	$errors[] = 'Ответ на вопрос указан не верно!';
		// }


		if ( empty($errors) )
		{
			//ошибок нет, теперь регистрируем
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT); //пароль нельзя хранить в открытом виде, мы его шифруем при помощи функции password_hash для php > 5.6
			R::store($user);
			echo '<div style="color:green; margin-left:50%">Success! <a href="./login.php">Go to authorization!</a></div><hr>';
		}else
		{
			echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
		}

	}

?>


<form action="./signup.php" method="POST">
 <label style="margin-left:40%; margin-top:5%; font-size:35px;">Registration form</label> 
    
    <div class="group">      
      <input type="text" name="login" value="<?php echo @$data['login']; ?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Name</label>
    </div>
      
    <div class="group">      
      <input type="password" name="password" value="<?php echo @$data['password']; ?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Password</label>
	</div>
	<div class="group">      
      <input type="email" name="email" value="<?php echo @$data['email']; ?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Email</label>
	</div>
	<div class="group">      
      <input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Repeat password</label>
	</div>
	<!-- <div class="group">      
	
      <input type="text" name="captcha"  required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label><strong><?php captcha_show(); ?></strong> </label>
	</div> -->
	<!-- <a type="submit" name="do_login" href="">Great!</a> -->
	<button type="submit" name="do_signup">Go!</button>
    
  </form>
      
  




<!-- 
<form action="./signup.php" method="POST">
	<strong>Ваш логин</strong>
	<input type="text" name="login" value="<?php echo @$data['login']; ?>"><br/>

	<strong>Ваш Email</strong>
	<input type="email" name="email" value="<?php echo @$data['email']; ?>"><br/>

	<strong>Ваш пароль</strong>
	<input type="password" name="password" value="<?php echo @$data['password']; ?>"><br/>

	<strong>Повторите пароль</strong>
	<input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>"><br/>

	<strong><?php captcha_show(); ?></strong>
	<input type="text" name="captcha" ><br/>

	<button type="submit" name="do_signup">Регистрация</button>
</form> -->