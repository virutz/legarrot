<!DOCTYPE html>

<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>LE GARROT | Mutuelle Assistance</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
<link href="css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="shortcut icon" href="pictures/icone.ico" type="image/x-icon" media="all" />
<link rel="icon" href="pictures/icone.ico" type="image/x-icon"/>

</head>

<body class="white-bg">
<div class="loginColumns animated fadeInDown">

	<div class="row">
		<div class="col-md-6">
			<div align="center">
				<img src="pictures/mag.jpg" name="logo" width="300" height="300"  title="MAG" />
			</div>

		</div>

		<div class="col-md-6">
			<div class="ibox-content">

				<form class="m-t" method="" action="{{ route('dashboard') }}">

					<div class="form-group">
						<span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
						<input type="email" name="login" placeholder=" Identifiant ..." class="form-username form-control"
						minlength="3" required="required" title="Entrer une adresse courriel" >
					</div>

					<div class="form-group">
						<span class="input-group-addon"><i class="fa fa-unlock"></i></span>
						<input type="password" name="mdp" placeholder=" Mot de passe ..." class="form-password form-control"
						minlength="3" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required="required" title="Doit contenir au moins une majuscule et un caractère alphanumérique" >
					</div>

					<div class="form-group">
						<label>
						<input name="accord" type="checkbox"value="1" required="required"/>
						<small><font><b>&nbsp;Je m'engage au respect de la confidentialité.</b></font></small>
						</label>
					</div> 

					<div class="modal-footer">
					<button type="submit" class="btn btn-warning block full-width m-b"name="connexion" value="Connexion">Connexion&nbsp;<i class="ace-icon fa fa-sign-in"></i></button>
					</div> 

				</form>

			</div>
		</div>

	</div>

	<hr/>

	<div class="row">
		<div class="col-md-12" align="center">
			<img src="pictures/logobed.jpg" name="logo" width="20" height="20" />
            BEDCHEKOT | Copyright&copy; 2023
			
		</div>
	</div>

	<hr/>

</div>

<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<script src="js/plugins/chosen/chosen.jquery.js"></script>

</body>
</html>