<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Laundry Management System</title>
 	

<?php include('./header.php'); ?>
<?php include('./db_connect.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
		
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:#59b6ec61;
		display: flex;
		align-items: center;
		
	}
	#login-right .card{
		margin: auto
		
	}
	.logo {
    margin: auto;
    font-size: 8rem;

    padding: .5em 0.7em;
    border-radius: 50% 50%;
    color: #000000b3;
}
.btn-block{
	border-radius: 25px;
	background-color: #59b6ec61;
	color:gray;
	border-color:#59b6ec61;

}
.btn-block:hover{
	background-color: #59b6ec61;
	color:gray;
}
.col-md-8{
	border-radius:25px;
	height:500px;
	border-color: #00ffff;
}
.text{
	margin-top:140px;
	font-size: 20px;
}
.form-control{
	border-radius: 25px;
	height:50px
}
.picture{
	height:10px;
	width:100px;
	margin-left:120px;
}
</style>

<body>


  <main id="main" class=" bg-dark">
  		<div id="login-left">
  			<div class="logo">
  				<!-- <div class="laundry-logo"></div> -->
				  <img src="assets/img/LaundryTechLogo.png" alt="">
  			</div>
  		</div>
  		<div id="login-right">
  			<div class="card col-md-8">
				  	<div class="picture">
				   <img src="assets/img/LaundryTechLogo.png" alt="" width="200px" height="180px">
				   </div>
				   <br><br>
				  <div class="text">
				  &nbsp &nbsp a new innovation of laundry
				  </div>
  				<div class="card-body">
  					<form id="login-form" >
  						<div class="form-group">
  							<!-- <label for="username" class="control-label">Username</label> -->
  							<input type="text" id="username" name="username" class="form-control" placeholder="Username">
  						</div>
						  <br>
  						<div class="form-group">
  							<!-- <label for="password" class="control-label">Password</label> -->
  							<input type="password" id="password" name="password" class="form-control" placeholder="Password">
  						</div>
						  <br>
  						<center><button class="btn btn-primary btn-lg btn-block">Login</button></center>
  					</form>
  				</div>
  			</div>
  		</div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else if(resp == 2){
					location.href ='voting.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>