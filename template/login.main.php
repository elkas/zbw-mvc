	<main class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-lg-push-4 col-sm-6 col-sm-push-3">

					<!-- login nicht ok --> 

					<?php if($data['status'] == 'false') { ?>
					<section class="content-inner">
						<div class="card">
							<div class="card-main">
								<div class="card-header">
									<div class="card-inner">
										<h1 class="card-heading">Anmeldung</h1>
									</div>
								</div>
								<div class="card-inner">
									<p class="text-center">
										<span class="avatar avatar-inline avatar-lg">
											<img alt="Login" src="./public/images/users/avatar-001.jpg">
										</span>
									</p>
									<form class="form" action="?controller=login" method="POST">
										<div class="form-group form-group-label">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<label class="floating-label" for="ui_login_username">Benutzer</label>
													<input class="form-control" id="ui_login_username" name="ui_login_username" type="text">
												</div>
											</div>
										</div>
										<div class="form-group form-group-label">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<label class="floating-label" for="ui_login_password">Kennwort</label>
													<input class="form-control" id="ui_login_password" name="ui_login_password" type="password">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<button class="btn btn-block btn-brand waves-attach waves-light" type="submit">Anmelden</button>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<div class="checkbox checkbox-adv">
														<label for="ui_login_remember">
															<input class="access-hide" id="ui_login_remember" name="ui_login_remember" type="checkbox">Angemeldet bleiben
															<span class="checkbox-circle"></span><span class="checkbox-circle-check"></span><span class="checkbox-circle-icon icon">done</span>
														</label>
													</div>
												</div>
											</div>
										</div>
									</form>									
								</div>
							</div>
						</div>

						<div class="clearfix">
							<p class="margin-no-top pull-left"><a class="btn btn-flat btn-brand waves-attach" href="javascript:void(0)">Hilfe</a></p>
							<p class="margin-no-top pull-right"><a class="btn btn-flat btn-brand waves-attach" href="javascript:void(0)">Registrieren</a></p>
						</div>
					</section>

					<!-- login ok -->					
					
					<?php } else { ?>

					<section class="content-inner">
						<div class="card">
							<div class="card-main">
								<div class="card-header">
									<div class="card-inner">
										<h1 class="card-heading">Willkommen <?php echo $data['data']; ?>!</h1>
									</div>
								</div>
								<div class="card-inner">
									<p class="text-center">
										<span class="avatar avatar-inline avatar-lg">
											<img alt="Login" src="./public/images/users/avatar.jpg">
										</span>

										<p class="text-center">
											<a class="btn btn-flat btn-brand waves-attach" href="?controller=index">Home</a>
											<a class="btn btn-flat btn-brand waves-attach" href="?controller=login&action=logout">Logout</a>
										</p>
									</p>
							
								</div>
							</div>
						</div>
					</section>

					<?php } ?>
				</div>
			</div>
		</div>
	</main>