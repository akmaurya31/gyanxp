/*
	
*/


$("#refineSearch").on('click',function(){
	var form = $("#refine").serializeArray();
	 $.ajax({
        type: "POST",
        data: {data:form},
        url: baseURL+"website/refine",
        success: function(data){
           $("#refineData").html('');
           $("#refineData").html(data)

        }
    });
})