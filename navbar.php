
<style>
	.collapse a{
		text-indent:10px;
	}
	nav#sidebar{
		/*background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>) !important*/
	}
</style>

<nav id="sidebar" class='mx-lt-5 bg-danger' >
		
		<div class="sidebar-list">

				<a href="index.php?page=donors" class="nav-item nav-donors"><span class='icon-field'><i class="fa fa-user-friends text-danger"></i></span>Donor Details</a>
			
				<a href="index.php?page=donations" class="nav-item nav-donations"><span class='icon-field'><i class="fa fa-heartbeat text-danger"></i></span> List Of Donations</a>
				<a href="index.php?page=requests" class="nav-item nav-requests"><span class='icon-field'><i class="fa fa-th-list text-danger"></i></span> Donation Requests</a>
				<a href="index.php?page=handedovers" class="nav-item nav-handedovers"><span class='icon-field'><i class="fa fa-toolbox text-danger"></i></span> Handed Over</a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users text-danger"></i></span> Users</a>
				<!-- <a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cogs text-danger"></i></span> System Settings</a> -->
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
