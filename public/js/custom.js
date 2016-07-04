function deleteEntry(id) {
	//console.log(id);
	$.ajax({
		url: '/admin/delete',
		type: 'POST',
		dataType: "JSON",
		data: { id:id },
		success: function(response) {
			//console.log(response);
			viewEntries();
			$('#delete_modal').modal('hide')
		}
	});
}

function confirmDeleteEntry(id) {
	$('#delete_modal #delete-form').removeAttr('action');
	$('#delete_modal #delete-button').data('dismiss', 'modal').attr('type', 'button').attr('onclick', 'deleteEntry('+id+')');
}


function viewEntries() {
	var html = '';
	$.ajax({
		url: '/admin/load',
		type: 'GET',
		dataType: "JSON",
		data: { },
		//async: true,
		beforeSend: function() {
			$('#datatable').html('');
		},
		success: function(response) {
			console.log(response);
			$.each(response, function(key, value) {
				html += '<tr>\
					<td style="vertical-align: middle !important;">' + value.usersid + '</td>\
					<td style="vertical-align: middle !important;">' + value.firstname + '</td>\
					<td style="vertical-align: middle !important;">' + value.lastname + '</td>\
					<td style="vertical-align: middle !important;">' + value.description + '</td>\
					<td style="vertical-align: middle !important;">' + value.role + '</td>\
					<td style="vertical-align: middle !important;">' + value.loginname + '</td>\
					<td class="text-right" style="vertical-align: middle !important;">\
						<a class="btn btn-brand-accent waves-attach waves-light" title="Benutzer entfernen" onclick="deleteEntry('+value.usersid+');">Löschen</a>\
					</td>';
			});
			$('#datatable').html(html);
		}
	});
}


$('#contactform').submit(function(event) {
	event.preventDefault();
	//var formdata = $(this).serialize();
	var firstname = $('#firstname').val();
	var lastname = $('#lastname').val();
	var email = $('#email').val();
	var website = $('#website').val();
	var message = $('#message').val();
	
	// Datenarray zusammenstellen
	var formdata = {
		'firstname' : firstname, 
		'lastname' : lastname, 
		'email' : email, 
		'website' : website, 
		'message' : message
	}

	// AJAX Request
	$.ajax({
		type: 'POST',
		//url: 'ajax.php',
		url: '/kontakt/send',
		data: formdata,
		dataType: 'json',
		beforeSend: function() {
			//console.log(formdata);
		},
		success: function (data) {
			console.log(data);
		},
		complete: function() {
			console.log('AJAX request completed!');
		}
	});
});