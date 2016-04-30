
	<main class="content">
		<div class="content-header ui-content-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-sm-10 col-sm-push-1">
						<h1 class="content-heading">Willkommen <strong>
							<?php if(@$_SESSION['usersid']) {
									echo @$_SESSION['firstname'] . ' ' . @$_SESSION['lastname']; 
							} ?></strong></h1>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-sm-10 col-sm-push-1">
					<section class="content-inner margin-top-no">
						<?php foreach ($data as $key => $value) { ?>
						<div class="card">
							<div class="card-main">
								<div class="card-header">
									<div class="card-header-side pull-left">
										<div class="avatar">
											<img alt="John Smith Avatar" src="./public/images/users/avatar.jpg">
										</div>
									</div>
									<div class="card-inner">
										<span class="card-heading">
											<a href="?controller=index&action=detail&id=<?php echo $value['id']; ?>">
												
											</a>
											<?php echo $value['titel']; ?> verfasst von <?php echo $value['user']; ?>
										</span>
									</div>
								</div>
								<div class="card-img" style="height: auto; max-height: 30vh">
									<img alt="alt text" src="./public/images/summer.jpg" style="width: 100%;">
									<p class="card-img-heading"><?php echo  date("d.m.Y", strtotime($value['datum'])); ?></p>
								</div>
								<div class="card-inner">
									<p><?php echo $value['inhalt']; ?></p>
								</div>
								<div class="card-action">
									<div class="card-action-btn pull-left">
										<?php if(@$_GET['action'] == 'detail') { ?>
											<a class="btn btn-flat waves-attach waves-effect" href="?controller=index">
												<span class="icon">check</span>&nbsp;Zurück
											</a>
										<?php } else { ?>
											<a class="btn btn-flat waves-attach waves-effect" href="?controller=index&action=detail&id=<?php echo $value['id']; ?>">
												<span class="icon">check</span>&nbsp;Weiterlesen
											</a>
										<?php } ?>
										
									</div>

									<ul class="nav nav-list margin-no pull-right">
										<li class="dropdown">
											<a class="dropdown-toggle text-black waves-attach waves-effect" data-toggle="dropdown" aria-expanded="false"><span class="icon">keyboard_arrow_down</span></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<?php if($_SESSION['role'] == 2) { ?>
												<li>
													<a class="waves-attach waves-effect" href="?controller=index&action=delete&id=<?php echo $value['id']; ?>"><span class="icon margin-right-sm">filter_1</span>&nbsp;Beitrag löschen</a>
												</li>
												<?php } ?>
												<li>
													<a class="waves-attach waves-effect" href="javascript:void(0)"><span class="icon margin-right-sm">filter_2</span>&nbsp;Weitere Aktion</a>
												</li>
												<li>
													<a class="waves-attach waves-effect" href="javascript:void(0)"><span class="icon margin-right-sm">filter_3</span>&nbsp;Teilen</a>
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<?php } ?>
					</section>
				</div>
			</div>
		</div>
	</main>