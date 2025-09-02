	$(document).ready(function() {
		$('#data_table').DataTable({
			responsive: true, // Table will adjust on smaller screens
			lengthMenu: [20, 25, 50, 75, 100], // Pagination options
			paging: true, // Enable pagination
			searching: true, // Enable search
			ordering: true, // Enable column sorting
			dom: 'Bfrtip', // Customize layout of elements (search box, pagination, etc.)
		});
	});
