var managePurchaseTable;

$(document).ready(function(){

	managePurchaseTable = $("#managePurchaseTable").DataTable({
		'ajax' : 'fetchpurchaseDetails.php',
		'order' : [],
		"paging":  false,
        "info":   false
    });
    console.log(managePurchaseTable);
});