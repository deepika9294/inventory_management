var manageTransacitonTable;

$(document).ready(function(){

	manageTransactionTable = $("#manageTransactionTable").DataTable({
		'ajax' : 'fetchTransactionDetails.php',
		'order' : [],
		"paging":  false,
        "info":   false
    });
    console.log(manageTransactionTable);
});