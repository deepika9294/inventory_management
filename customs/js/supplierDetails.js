<<<<<<< HEAD
var manageSupplierTable;

$(document).ready(function(){

	manageCustomerTable = $("#manageSupplierTable").DataTable({
		'ajax' : 'fetchSupplier.php',
		'order' : [],
		"paging":  false,
        "info":   false
    });
    console.log(manageSupplierTable);
=======
var manageSupplierTable;

$(document).ready(function(){

	manageSupplierTable = $("#manageSupplierTable").DataTable({
		'ajax' : 'fetchSupplier.php',
		'order' : [],
		"paging":  false,
        "info":   false
    });
    console.log(manageSupplierTable);
>>>>>>> origin/master
});