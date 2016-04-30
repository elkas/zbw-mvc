	<nav aria-hidden="true" class="menu" id="ui_menu" tabindex="-1">
		<div class="menu-scroll">
			<div class="menu-content">
				<a class="menu-logo" href="?controller=index">Startseite</a>
				<ul class="nav">
					<li>
						<a class="collaosed waves-attach" data-toggle="collapse" href="#ui_menu_components">Unterseiten</a>
						<ul class="menu-collapse collapse" id="ui_menu_components">
							<li><a class="waves-attach" href="?controller=kontakt">Kontakt<small class="margin-left-xs">(Kontaktformular)</small></a></li>
							<?php if (@$_SESSION['admin'] <> 0) { ?>
							<li><a class="waves-attach" href="?controller=login&action=logout">Abmelden</a></li>
							<?php } else { ?>
							<li><a class="waves-attach" href="?controller=login">Anmelden</a></li>
							<?php } ?>
							<li><a class="waves-attach" href="?controller=info">Info</a></li>
							<?php if (@$_SESSION['role'] == 2) { ?>
							<li><a class="waves-attach" href="?controller=admin">Admin</a></li>
							<?php } ?>
						</ul>
					</li>

					<li>
						<a class="collapsed waves-attach" data-toggle="collapse" href="#ui_menu_extras">Extras</a>
						<ul class="menu-collapse collapse" id="ui_menu_extras">
							<li>
								<a class="waves-attach" href="#">Test</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>