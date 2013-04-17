$(document).ready(function() {

	$('#search_button').live('click', function (){

		var pattern = $('#search_pattern').val();

        $.post(OC.filePath('search_public', 'ajax', 'search_pattern.php'), {
            pattern : pattern,
        }, function(jsondata) {
            if(jsondata.status == 'success') {
            	$('#search_result').html(jsondata.data.page);
            } else {
                OC.dialogs.alert(jsondata.data.message, jsondata.data.title  );
            }
        }, 'json');

	});

})
