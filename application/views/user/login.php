<form action="<?=base_url()?>in/login_process" method="post">

<div class="container " id="logincontainer" style="margin-top:30px; margin-bottom: 20px;  ">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="shadow-border p-3" style="box-shadow: 1px 2px 2px 2px rgba(0, 0, 0, 0.2);">
				<h4 class="text-center">User Login</h4>
				<br>
				<span>Enter Mobile / Email</span>
				<input type="text" name="email_mobile" class="form-control">
				<br>
				<br>
				<span>Enter Password</span>
				<input type="password" name="password" class="form-control">
				<br>
				<div class="text-center">
					<button class="btn btn-dark btn-sm">Login Now</button>
					<br><br>
					<div onclick="toggleForm()" style="font-weight:bold; color:grey;">New User, Create Account</div >
				</div>
			</div>
		</div>
	</div>
</div>
</form>

<form action="<?=base_url()?>in/register_user" method="post">
<div class="container" id="registercontainer" style="margin-top:30px; margin-bottom:20px; display:none;">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="shadow-border p-3" style="box-shadow: 1px 2px 2px 2px rgba(0, 0, 0, 0.2);">
				<h4 class="text-center">User Registration</h4>
				<br>
				<span>Enter Name</span>
				<input type="text" name="username" class="form-control">
				<br>
				<br>
				<span>Enter Mobile</span>
				<input type="text" name="usermobile" class="form-control">
				<br>
				<br>
				<span>Enter Email</span>
				<input type="text" name="useremail" class="form-control">
				<br>
				<br>
				<span>Enter Password</span>
				<input type="password" name="password" class="form-control">
				<br>
				<div class="text-center">
					<button class="btn btn-dark btn-sm">Register Now</button>
					<br><br>
					<div onclick="toggleForm()" style="font-weight:bold; color:grey;">Already User, Login Now</div >
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<script type="text/javascript">
	function toggleForm()
	{
		$('#logincontainer').toggle();
		$('#registercontainer').toggle();

	}
</script>