var manageCustomerTable;

$(document).ready(function(){

	manageCustomerTable = $("#manageCustomerTable").DataTable({
		'ajax' : 'fetchCustomer.php',
		'order' : [],
		"paging":  false,
        "info":   false
    });
    console.log(manageCustomerTable);
});