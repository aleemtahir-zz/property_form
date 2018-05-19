
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

		$('.c-forms-progress ol').children().each(function () {

			//console.log(tag.css('display'));
			if ( $(this).hasClass('c-page-selected') ) {
				$(this).removeClass('c-page-selected');
			    $(this).next().addClass('c-page-selected');
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

		$('.c-forms-progress ol').children().each(function () {

			//console.log(tag.css('display'));
			if ( $(this).hasClass('c-page-selected') ) {
				$(this).removeClass('c-page-selected');
			    $(this).prev().addClass('c-page-selected');
			    return false;
			}

		});

	});

    //Add Section
    $(document).on('click', ".c-repeating-section-add", function() {
    	var section_group 	= $(this).parent().find('.c-repeating-section-group');
    	var add_section 	= section_group.children().last().clone();

    	add_section.css('display', '');
    	add_section.find('.c-editor input').val('');
    	
    	add_section.find('.c-editor input').each(function() {
    		//console.log($(this));
    		var arr			= $(this).attr('id').split('-');
    		var new_value 	= parseInt(arr[2]) + 1;
    		
    		arr[2]			= new_value;

    		var new_arr		= arr.join('-');	
    		$(this).attr('id', new_arr);

    		if($(this).hasClass('datepicker')){
    			//$('.datepicker');
    			//console.log(new_arr);
    			$(this).datepicker();
    		}
    	});
    	//add_section.find('.c-datepicker').attr('id');
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


	$(function () {
       $('.datepicker').datepicker();
    });

});

