<<<<<<< HEAD
var manageItemSupplyTable;

$(document).ready(function(){

	manageItemSupplyTable = $("#manageItemSupplyTable").DataTable({
		'ajax' : 'fetchItemSuppliers.php',
		'order' : [],
		"paging":  false,
        "info":   false
    });
    console.log(manageItemSupplyTable);
=======
var manageItemSupplyTable;

$(document).ready(function(){

	manageItemSupplyTable = $("#manageItemSupplyTable").DataTable({
		'ajax' : 'fetchItemSuppliers.php',
		'order' : [],
		"paging":  false,
        "info":   false
    });
    console.log(manageItemSupplyTable);
>>>>>>> origin/master
});