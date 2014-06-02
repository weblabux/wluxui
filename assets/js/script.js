// Highlight a selected table row
$('.table-active').on('click','tr',function(e){
	$('.table-active').find('tr.active').removeClass('active');
	$(this).addClass('active');
})

// Edit and Save mode disable effects
var editMode = false;
$('#editButton').click(function(){
	editMode = !editMode;
	if (editMode) {
		$('.form-group').find('input').each(function() {
		    var $p = $("<p>", {
		        text: $(this).val()
		    });
		    $p.css({"margin-top":"6px", "padding-left":"12px"});
		    $(this).replaceWith($p);
		});
		$('#saveButton').attr('disabled', false);
	} else {
		$('.form-group').find('p').each(function() {
		  var $input = $("<input>", {
		        val: $(this).text(),
		        type: "text"
		    });
		    $input.addClass("form-control");
		    $(this).replaceWith($input);
		});
		$('#saveButton').attr('disabled', true);
	}
 });