// Highlight a selected table row
$('.table-active').on('click','tr',function(e){
	$('.table-active').find('tr.active').removeClass('active');
	$(this).addClass('active');
})