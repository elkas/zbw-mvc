<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
	<title>MVC mit Daemonite's Material UI</title>

	<!-- css -->
	<link href="/public/css/base.min.css" rel="stylesheet">
	<link href="/public/css/project.min.css" rel="stylesheet">
	
	<!-- favicon -->
	<!-- ... -->
</head>
<body class="page-brand">
	<header class="header header-transparent header-waterfall ui-header">
		<ul class="nav nav-list pull-left">
			<li>
				<a data-toggle="menu" href="#ui_menu">
					<span class="icon icon-lg">menu</span>
				</a>
			</li>
		</ul>
		<a class="header-logo margin-left-no" href="/ndex"></a>
		
		<?php if(@$_SESSION['usersid']) { ?>
		
		<ul class="nav nav-list pull-right">
			<li class="dropdown margin-right">
				<a class="dropdown-toggle padding-left-no padding-right-no" data-toggle="dropdown">
					<span class="access-hide"><?php echo $_SESSION['firstname'] .' ' . $_SESSION['lastname'] ?></span>
					<span class="avatar avatar-sm"><img alt="Avatar" src="/public/images/users/avatar.jpg"></span>
				</a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li>
						<a class="padding-right-lg waves-attach" href="/user"><span class="icon icon-lg margin-right">account_box</span>Profileinstellungen</a>
					</li>
					<li>
						<a class="padding-right-lg waves-attach" href="/user/logout"><span class="icon icon-lg margin-right">exit_to_app</span>Abmelden</a>
					</li>
				</ul>
			</li>
		</ul>
		<?php } ?>
	</header>