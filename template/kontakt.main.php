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
						<div class="card">
							<div class="card-main">
								<div class="card-inner">
									<h2>Kontaktseite</h2>
									<form id="contactform">
										<div class="form-group form-group-label form-group-brand">
											<label class="floating-label" for="firstname">Vorname</label>
											<input class="form-control" id="firstname" type="text">
										</div>
										<div class="form-group form-group-label form-group-brand">
											<label class="floating-label" for="lastname">Nachname</label>
											<input class="form-control" id="lastname" type="text">
										</div>
										<div class="form-group form-group-label form-group-brand">
											<label class="floating-label" for="email">E-Mail Adresse</label>
											<input class="form-control" id="email" type="text">
										</div>
										<div class="form-group form-group-label form-group-brand">
											<label class="floating-label" for="website">Website</label>
											<input class="form-control" id="website" type="text">
										</div>
										<div class="form-group form-group-label form-group-brand-accent">
										    <label class="floating-label" for="message">Nachricht</label>
										    <textarea class="form-control textarea-autosize" id="message" rows="1"></textarea>
										</div>
										<button class="btn btn-brand-accent waves-attach waves-light" type="submit">Absenden</button>
									</form>

								</div>
							</div>
						</div>

					</section>
				</div>
			</div>
		</div>
	</main>
