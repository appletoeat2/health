$(function(){
	
	$("#main_product_group").change(function(){
		if($(this).attr("checked")) {
			_check_all(".product_group", "1") ;
			$(".group_div").css("display", "block") ;
		} else {
			_check_all(".product_group", "2") ;
			$(".group_div").css("display", "none") ;
		}
	}) ;
	
	$(".product_group").change(function(){		
		if($(this).attr("checked")) {
			var _id = "#"+"group_"+($(this).attr("id")) ;
        	$(_id).css("display", "block") ;
			if(if_all_checked(".product_group")) $("#main_product_group").attr("checked", true) ;
		} else {
			$("#main_product_group").attr("checked", false) ;
			var _id = "#"+"group_"+($(this).attr("id")) ;
        	$(_id).css("display", "none") ;
        }
	});
	
	$("#main_categories").change(function(){
		
		if($(this).attr("checked")) {
			_check_all(".product_category", "1") ;
			$(".product_item").each(function(){
            	var categories = $(this).attr("categories") ;
				if(categories != "") $(this).css("display", "block") ;
			});
		} else {
			_check_all(".product_category", "2") ;
			$(".product_item").each(function(){
            	var categories = $(this).attr("categories") ;
            	if(categories != "") $(this).css("display", "none") ;
			});
		}
	});
	
	$(".product_category").change(function(){
		var my_id = $(this).attr("id") ;
		
		if($(this).attr("checked"))
        {
			$(".product_item").each(function(){
            	var categories = $(this).attr("categories") ;
            	if(in_array(categories, my_id)) $(this).css("display","block") ;
			}) ;
			if(if_all_checked(".product_category")) $("#main_categories").attr("checked", true) ;
        }
        else
        {
			$("#main_categories").attr("checked", false) ;   
				$(".product_item").each(function(){
					var categories = $(this).attr("categories") ;
					if(in_array(categories, my_id)) $(this).css("display","none") ;
				});
        }
	});
	
	$("#main_food_sensitivites").change(function(){
		
		if($(this).attr("checked")) {
			_check_all(".food_sensitivity", "1") ;
			$(".product_item").each(function(){
            	var food_sensitivity = $(this).attr("food_sensitivities") ;
				if(food_sensitivity != "") $(this).css("display","block") ;
			});
		} else {
			_check_all(".food_sensitivity", "2") ;
			$(".product_item").each(function(){
            	var food_sensitivity = $(this).attr("food_sensitivities") ;
            	if(food_sensitivity != "") $(this).css("display","none") ;
			});
		}
	});
	
	$(".food_sensitivity").change(function(){
		var my_id = $(this).attr("id") ;
		if($(this).attr("checked")) {
			$(".product_item").each(function(){
            	var food_sensitivity = $(this).attr("food_sensitivities") ;
            	if(in_array(food_sensitivity, my_id))
					$(this).css("display","block") ;
			});
			if(if_all_checked(".food_sensitivity")) $("#main_food_sensitivites").attr("checked", true) ;
        } else {
			$("#main_food_sensitivites").attr("checked", false) ;   
			$(".product_item").each(function(){
            	var food_sensitivity = $(this).attr("food_sensitivities") ;
            	if(in_array(food_sensitivity, my_id))
					$(this).css("display","none") ;
			});
        }
	});
	
}) ;

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