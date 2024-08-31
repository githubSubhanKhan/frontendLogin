<?php
include("database.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>fakebook</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/styles.css">
</head>
<body>
	<!-- header -->

	<div class="row" id="fb-header">
		<div class="col-md-6 " id="fb-title">
			<i class="fa fa-facebook" aria-hidden="true"></i><span>akebook</span>
		</div>

		<div class="col-md-6" id="fb-signin">
			<div class="row" id="signin-form">

				<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" id="signinForm" validate>
				<div class="col-md-4">
				<label>usuario</label>
				<input name="username" type="text" required>
				</div>
				<div class="col-md-4">
					<label>contraseña</label>
					<input name="password" type="password" required>
					
				</div>

				<div class="col-md-2" style="margin-top: 30px;padding: 0;">
					<button type="submit" name="login">Entrar</button>
				</div>

				</form>

			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-md-10 col-centered hidden" id="loggedContainer">
			<h2 class="loggedText">Logueado papu :3</h2>
		</div>
		<div class="col-md-10 col-centered" id="registerContainer">
			
			<div class="row">
				<!-- strong and img -->
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-9 col-centered" id="fb-strong">
							<strong>Fakebook te ayuda a comunicarte y compartir con las personas que forman parte de tu vida.</strong>
						</div>

						<div class="col-md-8 col-centered">
							<img src="https://www.facebook.com/rsrc.php/v3/yx/r/pyNVUg5EM0j.png" alt="map">
						</div>
					</div>
				</div>

				<!-- signup form -->
				<div class="col-md-5">
					
					<!-- texts -->
					<div class="row">
						<div class="col-md-12">
							<h2>Registrarte</h2>
						</div>

						<div class="col-md-12">
							<h4>Es gratis y lo será siempre. - pero te espiaremos >:v</h4>
						</div>

						<div class="col-md-12 warning hidden">
							<span>
								El email/telefono ya se encuentra en uso
							</span>
						</div>	

						<div class="col-md-12 success hidden">
							<span>
								Registro exitoso
							</span>
						</div>							
					</div>

					<!-- form -->

					<form id="signupForm" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="nombre" title="Solo letras y espacios" pattern="[a-zA-Z\s]{2,}" required autocomplete="off">
									
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="lastName" class="form-control" placeholder="apellidos" title="solo letras y espacios" pattern="[a-zA-Z\s]{2,}" required autocomplete="off">
									
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" name="username" class="form-control" placeholder="correo electronico" required autocomplete="off"  title="El username debe ser un email">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="password" name="password" class="form-control" placeholder="contraseña" title="la contraseña debe tener almenos 8 carácteres" pattern=".{8,}" required>
								</div>
							</div>
						</div>

						<div class="row">
							
							<div class="col-md-12">
								<h4>Fecha de nacimiento</h4>
							</div>

							<div class="col-md-2">
								<div class="form-group">
									<select name="bDay" id="" class="form-control" required>
										<option value="" selected>Dia</option>
										<option value="1">01</option>
										<option value="2">02</option>
										<option value="3">03</option>
										<option value="4">04</option>
										<option value="5">05</option>
										<option value="6">06</option>
										<option value="7">07</option>
										<option value="8">08</option>
										<option value="9">09</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
										<option value="21">21</option>
										<option value="22">22</option>
										<option value="23">23</option>
										<option value="24">24</option>
										<option value="25">25</option>
										<option value="26">26</option>
										<option value="27">27</option>
										<option value="28">28</option>
										<option value="29">29</option>
										<option value="30">30</option>
										<option value="31">31</option>
									</select>
								</div>
							</div>

							<div class="col-md-2">
								<div class="form-group">
									<select name="bMonth" id="" class="form-control" required>
										<option value="" selected>Mes</option>
										<option value="01">Ene</option>
										<option value="02">Feb</option>
										<option value="03">Mar</option>
										<option value="04">Abr</option>
										<option value="05">May</option>
										<option value="06">Jun</option>
										<option value="07">Jul</option>
										<option value="08">Ago</option>
										<option value="09">Sep</option>
										<option value="10">Oct</option>
										<option value="11">Nov</option>
										<option value="12">Dic</option>

									</select>
								</div>
							</div>

							<div class="col-md-2">
								<div class="form-group">
									<select name="bYear" id="" class="form-control" required>
										<option value="" selected>Año</option>
										<option value="1990">1990</option>
										<option value="1991">1991</option>
										<option value="1992">1992</option>
										<option value="1993">1993</option>
										<option value="1994">1994</option>
										<option value="1995">1995</option>
										<option value="1996">1996</option>
										<option value="1997">1997</option>
										<option value="1998">1998</option>
										<option value="1999">1999</option>
										<option value="2000">2000</option>
										<option value="2001">2001</option>
										<option value="2002">2002</option>
										<option value="2003">2003</option>
										<option value="2004">2004</option>
										<option value="2005">2005</option>
										<option value="2006">2006</option>
										<option value="2007">2007</option>
										<option value="2008">2008</option>
										<option value="2009">2009</option>
										<option value="2010">2010</option>																																																
									</select>
								</div>
							</div>								
						</div>


						<div class="row">
							<div class="col-md-12">
								<input type="radio" value="male" name="gender" required title="Masculino"> Hombre
								<input type="radio" value="female" name="gender" required title="Femenino"> Mujer
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-10">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat expedita, ipsum, ab id, aut corrupti error saepe excepturi assumenda tempore facere odit esse eius dignissimos quasi ex dolorum deserunt itaque!</p>
							</div>
						</div>


						<div class="row">
							<div class="col-md-6">
								<button type="submit" name="signup" class="btn btn-success" id="fb-end">
									Terminar
								</button>
							</div>
						</div>

					</form>

				</div>
			</div>
		</div>
	</div>


	




	<!-- <script src="./js/core.js"></script> -->
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['signup'])) {
		$name=filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
		$lastname=filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_SPECIAL_CHARS);
		$username=filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
		$password=filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
		$hash=password_hash($password, PASSWORD_BCRYPT);
		$gender=$_POST["gender"];

		$insertsql="INSERT INTO fakebook (name, lastname, username, password, gender) VALUES ('$name', '$lastname', '$username', '$hash', '$gender')";

		try {
			$insertresult=mysqli_query($conn, $insertsql);
			echo "<script>
				alert('Signup successful! You can now log in with your credentials.');
        	</script>";
		}
		catch(mysqli_sql_exception) {
			echo"<script>('We're experiencing technical difficulties. Please try again later.')</script>";
		}
	}
	if(isset($_POST['login'])) {
		$username=filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
		$password=filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

		$searchsql="SELECT * FROM fakebook WHERE username='$username'";
		$searchresult=mysqli_query($conn, $searchsql);

		if(mysqli_num_rows($searchresult) > 0) {
			$row=mysqli_fetch_assoc($searchresult);

			if(password_verify($password, $row['password'])) {
				$loginusername=$row['username'];
				$_SESSION['username']=$loginusername;
				// header("Location: welcome.php");
				echo"<script>window.location.href = 'welcome.php';</script>";
			} else {
				echo"<script>alert('No matching records found. Please check your input and try again.')</script>";
			}
		} else {
			echo"<script>alert('No matching records found. Please check your input and try again.')</script>";
		}
	}
}
mysqli_close($conn);
?>