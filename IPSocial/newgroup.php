<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>IPSocial</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="js/responsive"></script>
<head>
</head>
<body>  
<!-- Nav Bar -->
<nav class="navbar navbar-expand-xl bg-light navbar-light"> 
<div class="container-fluid"> 
<!--Logo Aqui --> 
<div class="navbar-header"> 
	<a class="navbar-brand" href="index.php">
    <img src="images/logo/ipsocial.png" width="150" height="40" class="d-inline-block align-top" alt="">
  </a>
</div>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> 
<!--Menu --> 
<div class="collapse navbar-collapse" id="navbarSupportedContent"> 
<ul class="navbar-nav navbar-left"> 
	<li class="nav-item"><a class="nav-link" href="index.php"><img src="images/icons/home.svg" width="16" height="16"/> Pagina Inicial</a></li> 
	<li class="nav-item"><a class="nav-link" href="groups.php"><img src="images/icons/organization.svg" width="16" height="16"/> Grupos</a></li> 
<?php
	if (isset($_SESSION['active'])){
		echo '<li class="nav-item"><a class="nav-link" href="messages.php"><img src="images/icons/inbox.svg" width="16" height="16"/> Mensagens</a></li>';	     
	}
?> 	
</ul>
<ul class="navbar-nav mx-auto"> 
<?php
	if (isset($_SESSION['active'])){
		echo '<li class="nav-item"><a class="nav-link" href="post.php"><img src="images/icons/diff-added.svg" width="16" height="16"/> Publicação</a></li>';	     
	}
?> 
</ul>
<a class="navbar-nav mx-auto" style="width:35%">
	<form class="form-inline" action="search.php" method="post">
		<input class="form-control mr-sm-2" type="search" placeholder="Search" name="searchname">
		<button class="btn btn-outline-light my-2 my-sm-0" type="submit"><img src="images/icons/search.svg" width="16" height="16"/></button>
	</form>
</a>
<ul class="navbar-nav navbar-right">
<?php
	$Login=('<li class="nav-item" style="list-style-type: none;"><a class="nav-link" href="register.php"><img src="images/icons/person.svg" width="16" height="16"/> Registar</a></li>
	<li class="nav-item" style="list-style-type: none;padding-right:30px"><a class="nav-link" href="login.php"><img src="images/icons/sign-in.svg" width="16" height="16"/> Login</a></li>');
	
	
	if(isset($_SESSION['active'])){
		$firstname = $_SESSION['firstname'];
		$lastname = $_SESSION['lastname'];
		echo '<li class="nav-item" style="list-style-type: none;padding-right:30px"><a class="nav-link" href="profile.php"><img src="images/icons/person.svg" width="16" height="16"/>&nbsp;&nbsp;&nbsp;'.$firstname.' '.$lastname.'</a></li>';
	     
	}else if (!isset($_SESSION['active'])){
		echo $Login;
	}
?>
<?php
	if (isset($_SESSION['active'])){
		echo '<li class="nav-item"><a class="nav-link" href="notifications.php"><img src="images/icons/bell.svg" width="16" height="16"/></a></li>';
	}		  
?>
</ul>

<ul>
	<li class="nav-item dropdown" style="list-style-type:none;">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<img src="images/icons/three-bars.svg" width="25" height="25"/>
        </a>
        <div class="dropdown-menu dropdown-pull-right" aria-labelledby="navbarDropdown" style="float:right !important;right:0;left:auto;">
          <a class="dropdown-item text-left" href="config.php"><img src="images/icons/gear.svg" width="16" height="16"/> Configurações</a>
		  <a class="dropdown-item text-left" href="faq.php"><img src="images/icons/repo.svg" width="16" height="16"/> F.A.Q</a>
          <a class="dropdown-item text-left" href="terms.php"><img src="images/icons/repo.svg" width="16" height="16"/> Termos e condições</a>
          <a class="dropdown-item text-left" href="logout.php"><img src="images/icons/sign-out.svg" width="16" height="16"/> Sair</a>
        </div>
    </li>
</ul>
</div> 
</div> 
</nav>﻿

<div class="container" style="width:90%; padding-top: 5%">
	<div class="row">
		<div class="" style="width:90%; padding-top: 1%">
		<h3>Novo Grupo</h3>
		<hr>
		<form action="newgroupsubmit.php" method = "post" enctype="multipart/form-data">	
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input maxlength="100" type="text" class="form-control" id="groupname" name="groupname" required>
		</div>
		<div class="form-group">
			<label for="descrição">Descrição:</label>
			<textarea maxlength="500" style="resize: vertical;" class="form-control" id="description" name="description" rows="3" required></textarea>
		</div>
		<div class="form-group col-md-4">
			<label for="img">Selecionar Imagem:</label>
			<img src="" id="foto" style="display:none;width:350px;height:350px;border: 1px solid blue;border-style:dashed;">
			<div id="cont" class="container" style="border: 1px solid blue;width:350px;height:350px;border-style:dashed;">
				<input id="uploaded_file" name="uploaded_file" style="display:none" type="file" onchange="readURL(this);"/><a id="openuploaded_file" href="javascript:;"><br><br><br><br><br><br><center>Clica aqui para escolher a imagem</center></a>
			</div>
		</div>
		<hr>
		<button type="submit" name="submit" value="Send" class="btn btn-info btn-md">Criar</button>
		</form> 
		</div>
	</div>
</div>
</body>
</html>
<script>
$('#openuploaded_file').click(function(){ $('#uploaded_file').trigger('click'); });

function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

				document.getElementById("uploaded_file").style.display = "none";
				document.getElementById("openuploaded_file").style.display = "none";
				document.getElementById("cont").style.display = "none";
				document.getElementById("foto").style.display = "block"; 
				
                reader.onload = function (e) {
                    $('#foto')
                        .attr('src', e.target.result)
                        .width(350)
                        .height(350);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
