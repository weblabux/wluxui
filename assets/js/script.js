// Highlight a selected table row
$('.table-active').on('click','tr',function(e){
	$('.table-active').find('tr.active').removeClass('active');
	$(this).addClass('active');
})

// Edit and Save mode disable effects
var editMode = false;
$('#isEditMode').click(function(){
	editMode = !editMode;
	if (editMode) {
		$(this).text("Save ");
		$(this).append("<span class='glyphicon glyphicon-floppy-save'></span>");

		$('.form-group').find('.input-box').each(function() {
		    var $p1 = $("<p>", {
		        text: $(this).val()
		    });
		    $p1.css({"margin-top":"6px", "padding-left":"12px"});
		    $p1.addClass("input-box");
		    $(this).replaceWith($p1);
		});
		$('.form-group').find('.text-box').each(function() {
		    var $p2 = $("<p>", {
		        text: $(this).val()
		    });
		    $p2.css({"margin-top":"6px", "padding-left":"12px"});
		    $p2.addClass("text-box");
		    $(this).replaceWith($p2);
		});
	} else {
		$(this).text("Edit Fields ");
		$(this).append("<span class='glyphicon glyphicon-pencil'></span>");

		$('.form-group').find('.input-box').each(function() {
		  var $input = $("<input>", {
		        val: $(this).text(),
		        type: "text"
		    });
		    $input.addClass("form-control input-box");
		    $(this).replaceWith($input);
		});
		$('.form-group').find('.text-box').each(function() {
		  var $textarea = $("<textarea>", {
		        val: $(this).text(),
		        type: "text"
		    });
		    $textarea.addClass("form-control text-box");
		    $(this).replaceWith($textarea);
		});
	}
 });