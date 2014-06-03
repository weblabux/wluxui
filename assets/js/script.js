// Highlight a selected table row
$('.table-active').on('click','tr',function(e){
	$('.table-active').find('tr.active').removeClass('active');
	$(this).addClass('active');
});

// Edit and Save mode disable effects
var editMode = false;
$('#isEditMode').click(function(){
	editMode = !editMode;
	if (editMode) {
		$(this).text("Edit Fields ");
		$(this).append("<span class='glyphicon glyphicon-pencil'></span>");

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
		$('.form-group').find('.cs-variables-extrabuttons').each(function() {
		    $(this).css({"display":"none"});
		});
		$('.form-group').find('.cs-extrarow').each(function() {
		    $(this).css({"display":"none"});
		});
		$('.form-group').find('#addvariable').each(function() {
		    $(this).css({"display":"none"});
		});

	} else {
		$(this).text("Save ");
		$(this).append("<span class='glyphicon glyphicon-floppy-save'></span>");

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
		$('.form-group').find('.cs-variables-extrabuttons').each(function() {
		    $(this).css({"display":"visible"});
		});
		$('.form-group').find('.cs-extrarow').each(function() {
		    $(this).css({"display":"visible"});
		});
		$('.form-group').find('#addvariable').each(function() {
		    $(this).css({"display":"visible"});
		});
		
	}
 });
 
 //Create study add variation
$('.cs-addvar').click(addvar);
function addvar() {
	var thisvariable = $(this).parent().parent().prev();
	
	var variation = $("<div>", {"class": "cs-row cs-variation"});
	
	var col2 = $("<div>", { "class": "cs-column" });
	var col3 = $("<div>", { "class": "cs-column" });
	
	var glyphicondiv = $("<div>", { "class": "cs-variables-extrabuttons" });
	var glyphicon = $("<span>", { "class": "glyphicon glyphicon-remove" });
	
	var input1 = $("<input>", {
		type: "text",
		"class": "form-control input-box",
		placeholder: "Arial"
	});
	var input2 = $("<input>", {
		type: "text",
		"class": "form-control input-box",
		placeholder: "/font-arial"
	});
	
	$(glyphicondiv).append(glyphicon);
	$(col2).append(input1);
	$(col3).append(input2);
	$(variation).append(glyphicondiv).append(col2).append(col3);
	$('.glyphicon-remove').unbind('click').click(delvar);
	
	thisvariable.after(variation);
};

//Create study delete variation
$('.glyphicon-remove').click(delvar);
function delvar(){
	$(this).parent().parent().remove();
};

 //Create study add variable
$('#addvariable').click(function(){
	var newvar = $("#tempvar").clone();
	newvar.attr("id","");
	$("#tempvar").prev().after(newvar);
	
	$('.cs-addvar').unbind('click').click(addvar);
	$('.glyphicon-remove').unbind('click').click(delvar);
	$('.cs-delvar').unbind('click').click(delvariable);
});

 //Create study delete variable
$('.cs-delvar').click(delvariable);
function delvariable(){
	var thisvariable = $(this).parent().parent().parent();
	thisvariable.remove();
};