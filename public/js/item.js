$(document).ready(function () {
	generateDatatables()
})

function generateDatatables()
{
	$('#item_table').DataTable({
		// responsive: true,
		processing: true,
		serverSide: true,
		bDestroy: true,
		ordering: false,
		ajax: $('#item_table').data('table-route'),
		lengthMenu: [5, 10, 25, 50, 100],
		columnDefs: [{
			// "targets": [0],
			// "visible": false,
			// "searchable": false
		}],
		"order": [
			[0, "asc"]
		],
		columns: [
			// { data: 'id', name: 'id', searchable: false },
			{ data: 'name', name: 'name' , orderable: false, searchable: true},
			{ data: 'item_category.name', name: 'itemCategory.name' , orderable: false, searchable: true},
			{ data: 'price_formatted', name: 'price' , orderable: false, searchable: true},
			{ data: 'stock', name: 'stock' , orderable: false, searchable: true},
			{ data: 'is_discount_formatted', name: 'is_discount' , orderable: false, searchable: true},
			{ data: 'actions', name: 'actions'},
		],
		language: {

		}
	});
}

// delete_button
$(document).on('click', '#delete_button', function () {
	let table   = $('#item_table').DataTable();
	let data_row = table.row($(this).parents('tr')).data(); // Ini digunakan ketika hanya 1 table aja tanpa tambahan div/class baru

	let url = $(this).data('delete-route')
	let url_fix = url.replace(':id', data_row['id'])
	
	Swal.fire({
		title: "Delete Data  ?",
		text: "Data changes will affect the stored data!",
		icon: "question",
		showCancelButton: true,
		allowOutsideClick: false,
		confirmButtonColor: '#DC3545',
		confirmButtonText: 'Delete!',
		cancelButtonText: 'Cancel!',
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: url_fix,
				type: 'DELETE',
				success: function (data) {
					if (data.error == 0) {
						toast.fire({
							icon: 'success',
							title: data.message
						})

						$('#item_table').DataTable().ajax.reload()
					}

					// Muncul alert error ketika tidak lolos validasi
					if (data.error == 1) {
						if (data.code == 'validation') {
							$.each(data.message, function (index, message) {
								toast.fire({
									icon: 'error',
									title: data.message
								})
							})
						} else {
							$.each(data.message, function (index, message) {
								toast.fire({
									icon: 'error',
									title: data.message
								})
							})
						}
					}
				}
			})
		}
	})
})
