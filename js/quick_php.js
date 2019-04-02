// JavaScript Document
$(document).ready(function(){
	
	var tagDiv = $("#htmlTag");
	var hidden = $("#hidden");
	var htmlTagForm = $("#htmlTagForm");
	
	$("#convert").click(function(){
		
		htmlTagForm.submit();
		
	});
	
	if(hidden.val()==1) {
		callAjax();
	}
	
	
	
	
	
	
	function callAjax(){
		
		$.ajax({url : 'output.php',success : function(result) {
				
			$("#output").html(result);
		
		}});
	
	}
	
})