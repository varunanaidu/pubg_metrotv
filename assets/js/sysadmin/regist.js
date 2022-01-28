$( function () {

	var t = $('#table').DataTable({
		"processing": true,
		"language": {
			"processing": '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
		},
		"serverSide": true,
		"order": [],
		"ajax": {
			"url": base_url + "view_regist",
			"type": "POST"
		},
		"searchDelay": 750,
		"columnDefs": [{
			"targets": [4],
			"orderable": false
		}]
	});

	t.on('click', '.btn-detail', function(event) {
		event.preventDefault();

		var row_id = $(this).data('id');

		$.ajax({
			url: base_url + "site/detail_regist",
			type: 'post',
			data: {
				'key': row_id
			},
			dataType: 'json',
			success: function(data) {
				if (data.type != 'done') {
					var sa_title = (data.type == 'done') ? "Success!" : "Failed!";
					var sa_type = (data.type == 'done') ? "success" : "error";
					Swal.fire({
						title: sa_title,
						type: sa_type,
						html: data.msg
					});
				} else {
					var el = '';
					$('memberContainer').html('');
					for (var i = 0; i < data.msg.length; i++) {
						el += '<div class="col-md-12"><div class="row"><div class="col-md-4"><img src="'+main_url+'assets/images/upload/player/'+data.msg[i].PhotoFullBody+'" alt="" class="img-rounded" width="200"></div><div class="col-md-4"><img src="'+main_url+'assets/images/upload/player/'+data.msg[i].PhotoWithID+'"  alt="" class="img-rounded" width="200"></div><div class="col-md-4"><h5>PEMAIN ' + (i+1) + ': ' + data.msg[i].PlayerName + '</h5><p>ID PUBG: '+data.msg[i].PubgID+' <br>NICK PUBG: '+data.msg[i].NickPubgID+' <br>NIK KANTOR: '+data.msg[i].EmployeeID+' <br>EMAIL: '+data.msg[i].Email+' <br></p></div></div></div>';

					}
					$('#memberContainer').append(el);
					$('#btn-approve').data('id', data.msg_2);
					$('#btn-reject').data('id', data.msg_2);
					$('#exampleModal').modal('show');
				}
			},
			error: function() {
				Swal.fire("(500)", "Error Occurred, Please refresh your browser.", "error");
			}
		});
	});

	$('#btn-approve').on('click', function(event) {
		event.preventDefault();

		var row_id = $(this).data('id');

		Swal.fire({
			title: 'Warning !',
			type: 'warning',
			html: '<span class="italic">Approve this team ?</span>',
			showCancelButton: true,
			confirmButtonText: "Yes, approve it!",
			cancelButtonText: "No, Cancelled",
			confirmButtonColor: "#DD6B55",
			showLoaderOnConfirm: true,
		}).then(function(result) {
			if (result.value) {
				$.ajax({
					url: base_url + "site/approve_team",
					type: 'post',
					data: {
						'key': row_id
					},
					dataType: 'json',
					success: function(data) {
						var sa_title = (data.type == 'done') ? "Success!" : "Failed!";
						var sa_type = (data.type == 'done') ? "success" : "error";
						Swal.fire({
							title: sa_title,
							type: sa_type,
							html: data.msg
						}).then(function() {
							if (data.type == 'done') window.location.reload();
						});
					},
					error: function() {
						Swal.fire("(500)", "Error Occurred, Please refresh your browser.", "error");
					}
				});
			} else {
				Swal.fire('Cancelled', '', 'warning');
			}
		});

		
	});

	$('#btn-reject').on('click', function(event) {
		event.preventDefault();

		var row_id = $(this).data('id');

		Swal.fire({
			title: 'Warning !',
			type: 'warning',
			html: '<span class="italic">Reject this team ?</span>',
			showCancelButton: true,
			confirmButtonText: "Yes, approve it!",
			cancelButtonText: "No, Cancelled",
			confirmButtonColor: "#DD6B55",
			showLoaderOnConfirm: true,
		}).then(function(result) {
			if (result.value) {
				$.ajax({
					url: base_url + "site/reject_team",
					type: 'post',
					data: {
						'key': row_id
					},
					dataType: 'json',
					success: function(data) {
						var sa_title = (data.type == 'done') ? "Success!" : "Failed!";
						var sa_type = (data.type == 'done') ? "success" : "error";
						Swal.fire({
							title: sa_title,
							type: sa_type,
							html: data.msg
						}).then(function() {
							if (data.type == 'done') window.location.reload();
						});
					},
					error: function() {
						Swal.fire("(500)", "Error Occurred, Please refresh your browser.", "error");
					}
				});
			} else {
				Swal.fire('Cancelled', '', 'warning');
			}
		});
	});

});