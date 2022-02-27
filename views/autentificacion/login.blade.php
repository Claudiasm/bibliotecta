<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body class="bg-light">

<div class="container h-100">
	<div class="row h-100 mt-5 justify-content-center align-items-center">
		<div class="col-md-5 mt-5 pt-2 pb-5 align-self-center border bg-light">
			<h1 class="mx-auto w-25" >Login</h1>

			@if (isset($errors) && count($errors) > 0)
				@foreach ($collection as $item)
					<div class="alert alert-danger">{{ $error_msg }}</div>
				@endforeach
				
			@endif
		
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="text" name="email" placeholder="Introducir Email" class="form-control">
				</div>
				<div class="form-group">
				<label for="email">Contraseña:</label>
					<input type="password" name="password" placeholder="Introducir contraseña" class="form-control">
				</div>

				<input type="submit" class="btn btn-primary" value="Iniciar">

				<a href="register.php" class="btn btn-primary">Registro</a>

			</form>

		</div>

	</div>

</div>

</body>

</html>