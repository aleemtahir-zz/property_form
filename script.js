
$(document).ready(function(){

	$(document).on('click', ".c-page-next-page", function() {
		$('.c-forms-pages').children().each(function () {

		  //console.log(tag.css('display'));
		  if ($(this).css('display') == 'block') {
		    $(this).css('display','none');
		    $(this).next().css('display','block');
		    return false;
		  }

		});

	});

    $(document).on('click', ".c-page-previous-page", function() {
		$('.c-forms-pages').children().each(function () {

		  //console.log(tag.css('display'));
		  if ($(this).css('display') == 'block') {
		    $(this).css('display','none');
		    $(this).prev().css('display','block');
		    return false;
		  }

		});

	});

    //Add Section
    $(document).on('click', ".c-repeating-section-add", function() {
    	var section_group 	= $(this).parent().find('.c-repeating-section-group');
    	var add_section 	= section_group.children().last().clone(true);

    	add_section.css('display', '');
    	add_section.find('.c-editor input').val('');
    	
    	add_section.find('.c-editor input').each(function() {
    		var arr			= $(this).attr('id').split('-');
    		var new_value 	= parseInt(arr[2]) + 1;
    		
    		arr[2]			= new_value;

    		var new_arr		= arr.join('-');	
    		$(this).attr('id', new_arr);
    	});
    	add_section.find('.c-datepicker').attr('id');
		add_section.appendTo(section_group);

		//numbering
		var num = 1;
		section_group.children().each(function () {

			if($(this).css('display') === "block"){
				$(this).find('.c-repeating-section-item-title span').text(num);
				num++;
			}
		});
	});

    //Remove Section
    $(document).on('click', ".c-action-col a", function() {

    	var section_group 		= $(this).parents('.c-repeating-section-group');
    	var section_container 	= $(this).parents('.c-repeating-section-container');
    	section_container.css('display', 'none');
    	
    	//numbering
		var num = 1;
		section_group.children().each(function () {

			if($(this).css('display') === "block"){
				$(this).find('.c-repeating-section-item-title span').text(num);
				num++;
			}
		});
	});

    /*$(function () {
        $('#c-6-252').datepicker();
        $('#c-6-253').datepicker();
        $('#c-6-254').datepicker();
        $('#c-6-255').datepicker();
    });*/
	/*$('.c-datepicker').datepicker({
	    defaultDate: "11/1/2013",
	});*/
	/*$(document).on('click', ".c-datepicker", function(){
	    var id = $(this).attr('id');
	    $('#'+id).datepicker();

	});*/

	/*$(function () {
       $('#datetimepicker1').datetimepicker();
    });*/

    /*$('#datetimepicker1').datepicker();*/

    $('.datepicker').each(function(){
	    $(this).datepicker();
	});

});

