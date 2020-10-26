var manageItemTable;

$(document).ready(function(){

	manageItemTable = $("#manageItemTable").DataTable({
		'ajax' : 'fetchItem.php',
		'order' : [],
		"paging":  false,
        "info":   false
    });
    console.log(manageItemTable)
});