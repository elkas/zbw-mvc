function deleteEntry(id) {
	//console.log(id);
	$.ajax({
		url: '?controller=admin&action=delete',
		type: 'POST',
		dataType: "JSON",
		data: { id:id },
		success: function(response) {
			//console.log(response);
			viewEntries();
		}
	});
}


function viewEntries() {
	var html = '';
	$.ajax({
		url: '?controller=admin&action=load',
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
