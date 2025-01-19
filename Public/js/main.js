$(document).ready(function () {
    $('#example').DataTable();
});

$('#example').DataTable({
    "paging": true,
    "lengthMenu": [5, 10, 25, 50, 100] ,// Change the number of rows displayed per page

    "searching": false,   // Disable the search box
    "ordering": true,     // Enable column ordering
    "info": false ,        // Hide table info

    "columns": [
        { "data": "Name" },
        { "data": "Email" },
        { "data": "Address" },
        { "data": "Phone" }
    ],

    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    "dom": '<"top"f>rt<"bottom"lp><"clear">',
    "pagingType": "full_numbers",
    "responsive": true,
});