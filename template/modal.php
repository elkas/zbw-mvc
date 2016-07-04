<div aria-hidden="true" class="modal fade" id="delete_modal" role="dialog" tabindex="-1">
	<form action="/index/delete/<?php echo @$value['id']; ?>" id="delete-form">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-heading">
					<a class="modal-close" data-dismiss="modal">×</a>
					<h2 class="modal-title">Löschen bestätigen</h2>
				</div>
				<div class="modal-inner">
					<p>Bitte bestätigen Sie das Löschen. Diese Aktion kann nicht mehr rückgängig gemacht werden!</p>
				</div>
				<div class="modal-footer">
					<p class="text-right">
						<button class="btn btn-flat btn-brand waves-attach" data-dismiss="modal" type="button">Abbrechen</button>
						<button class="btn btn-flat btn-brand waves-attach" data-dismiss="false" type="submit" id="delete-button">Bestätigen</button>
					</p>
				</div>
			</div>
		</div>
	</form>
</div>