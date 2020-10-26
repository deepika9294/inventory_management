var manageStockTable;

$(document).ready(function(){

	manageStockTable = $("#manageStockTable").DataTable({
		'ajax' : 'fetchStock.php',
		'order' : [],
		"paging":  false,
        "info":   false
    });
    console.log(manageStockTable)
});