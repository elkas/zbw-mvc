	<main class="content">
		<div class="content-header ui-content-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-sm-10 col-sm-push-1">
						<h1 class="content-heading">Willkommen <strong><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></strong></h1>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-sm-10 col-sm-push-1">
					<section class="content-inner margin-top-no">
						<div class="table-responsive">
							<table class="table" title="Datentabelle">
								<thead>
									<tr>
										<th>#</th>
										<th>Vorname</th>
										<th>Nachname</th>
										<th>Beschreibung</th>
										<th>Role</th>
										<th>Benutzername</th>
										<th></th>
									</tr>
								</thead>
								<tbody id="datatable">
									<tr>
										<?php 
											foreach ($data as $key => $value) {
												echo '<tr>';
												echo '<td style="vertical-align: middle !important;">' . $value['usersid'] . '</td>';
												echo '<td style="vertical-align: middle !important;">' . $value['firstname'] . '</td>';
												echo '<td style="vertical-align: middle !important;">' . $value['lastname'] . '</td>';
												echo '<td style="vertical-align: middle !important;">' . $value['description'] . '</td>';
												echo '<td style="vertical-align: middle !important;">' . $value['role'] . '</td>';
												echo '<td style="vertical-align: middle !important;">' . $value['loginname'] . '</td>';
												echo '<td class="text-right" style="vertical-align: middle !important;"><a id="btn-delete" class="btn btn-brand-accent waves-attach waves-light" title="Benutzer entfernen" data-toggle="modal" href="#delete_modal" onclick="confirmDeleteEntry(' . $value['usersid'] . ');">Löschen</a></td>';
												echo '</tr>';
											}
										?>

									</tr>
								</tbody>
							</table>
						</div>


					</section>
				</div>
			</div>
		</div>
	</main>