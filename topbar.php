<style>
	.logo {
    margin: auto;
}
</style>

<nav class="navbar navbar-dark bg-dark fixed-top " style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div class="logo">
  				<!-- <div class="laundry-logo"></div> -->
          <img src="assets/img/LaundryTechLogo.png" alt="" width="40px" height="40px">
  			</div>
  		</div>
      <div class="col-md-4 float-left text-white ">
      &nbsp &nbsp &nbsp &nbsp &nbsp<img src="assets/img/BoomBoomWashLogo.png" alt="" width="40px" height="40px"><large><b>Boom Boom Laundry Shop</b></large>
      </div>
	  	<div class="col-md-2 float-right text-white">
	  		<a href="ajax.php?action=logout" class="text-white" ><?php echo "Hi, I'm " .$_SESSION['login_name'] ?> <i class="fas fa-sign-out-alt"></i></a>
	    </div>
    </div>
  </div>
  
</nav>