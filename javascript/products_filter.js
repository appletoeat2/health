$(function(){
	
	$("#main_product_group").change(function(){
		if($(this).attr("checked")) {
			$(".group_div").css("display", "block") ;
			$(".product_group").attr("checked", false) ;
		} else {
			$(".group_div").css("display", "none") ;
		}
	}) ;
	
	$(".product_group").change(function(){		
		if($(this).attr("checked")) {
			var _id = "#"+"group_"+($(this).attr("id")) ;
			$("#main_product_group").attr("checked", false) ;
			$(".group_div").css("display", "none") ;
			$(".product_group").each(function(){
				if($(this).attr("checked"))
					$(_id).css("display", "block") ;
			}) ;
		} else {
			var _id = "#"+"group_"+($(this).attr("id")) ;
        	$(_id).css("display", "none") ;
        }
		
		display_group() ;
	});
	
	
	$(".product_category").change(function(){
		var my_id = $(this).attr("id") ;
		
		if($(this).attr("checked"))
        {
			$(".product_item").each(function(){
            	var categories = $(this).attr("categories") ;
            	if(!in_array(categories, my_id)) $(this).css("display","none") ; 
			}) ;
        }
        else
        {
			$(".product_item").each(function(){
				var categories = $(this).attr("categories") ;
				if(!in_array(categories, my_id)) $(this).css("display","block") ;
			});
			adjust_filter() ;
        }
		
		display_group() ;
	});
	
	$(".food_sensitivity").change(function(){
		var my_id = $(this).attr("id") ;
		if($(this).attr("checked")) {
			$(".product_item").each(function(){
            	var food_sensitivity = $(this).attr("food_sensitivities") ;
            	if(!in_array(food_sensitivity, my_id)) $(this).css("display","none") ;
			});
		} else {
			   
			$(".product_item").each(function(){
            	var food_sensitivity = $(this).attr("food_sensitivities") ;
            	if(!in_array(food_sensitivity, my_id)) $(this).css("display","block") ;
			});
			
        	adjust_filter() ;
		}
		display_group() ;
	});
	
}) ;

function display_group()
{
	$(".group_div").each(function(){
		var display_flag = false ;
		
		$(this).children("div.product_item").each(function(){
        	if($(this).css("display") == "block") 
				display_flag = true ;
		});
		
		if(display_flag) $(this).css("display","block") ;
		else $(this).css("display","none") ;
	}) ;
}

function adjust_filter()
{
	$(".product_category").each(function(){
		var new_my_id = $(this).attr("id") ;
		if($(this).attr("checked")) {
			$(".product_item").each(function(){
				var categories = $(this).attr("categories") ;
				if(!in_array(categories, new_my_id)) $(this).css("display","none") ; 
			}) ;
		}
	});
	
	$(".food_sensitivity").each(function(){
		var my_id = $(this).attr("id") ;
		if($(this).attr("checked"))
		{
			$(".product_item").each(function(){
            	var food_sensitivity = $(this).attr("food_sensitivities") ;
            	if(!in_array(food_sensitivity, my_id)) $(this).css("display","none") ;
			});
		}
	});
}

function _check_all(_class, _check)
{
	$(_class).each(function(){
		if(_check == "1") $(this).attr("checked", true) ;
		else $(this).attr("checked", false) ;
	}) ;
}

function if_all_checked(_class)
{
	var false_flag = 0 ;
	var true_flag = 0 ;
	$(_class).each(function(){
		if($(this).attr("checked"))
			true_flag = 1 ;
		else
			false_flag = 1 ;
	});
	
	if(false_flag == 1) return false ;
	else return true ;
}

function in_array(string, id)
{
	if(string == "") return false ;
	else
	{
		string_array = string.split(",") ;
		for(var i = 0 ; i < string_array.length ; i++)
		{
			if(string_array[i] == id)
				return true ;
		}
		return false ;
	}
}