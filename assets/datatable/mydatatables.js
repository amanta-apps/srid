$(document).ready( function () {
    $("#ddata01").DataTable({
      "bInfo": true,
      "lengthChange": false,
      "pageLength": 50,
      "ordering": true,
      "info":     false,
      "bFilter": true,
      "pagingType": 'simple_numbers',
      dom: 'Bfrtip',
      // scrollX: true,
      // scrolly: true,
      lengthMenu: [ [10, 25, 50, -1], [10,25, 50, 75, "All"] ]
    });

    $("#ddata02").DataTable({
      "bInfo": false,
      "lengthChange": false,
      "pageLength": 10,
      "ordering": true,
      "info":     false,
      "bFilter": true,
      "pagingType": 'simple_numbers',
      dom: 'Bfrtip',
      // scrollX: true,
      // scrolly: true,
      // lengthMenu: [ [10, 25, 50, -1], [10,25, 50, 75, "All"] ]
    });
  });