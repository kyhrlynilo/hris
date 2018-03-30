
function button_loader(id, num)
{
	var loader = "<div class='loader'></div>";
	var original_text = $.trim($("#"+id).text());

	if(num==1)
	{
		$('#'+id).prop("disabled",true);
		$("#"+id).prepend(loader);
	}
	
	if(num==0)
	{
		setTimeout(function(){ 
			$('#'+id).prop("disabled",false);
			$(".loader").detach();
		},200);
		
	}

	
}

function get_form_data(form_id)
{
	var data = $("form#" +form_id  +" :input").each(function(){
		var input = $(this); 
	}).serializeArray();

	return data;
}

function notify(data, url)
{
	swal( JSON.parse(data) ).then( ( value ) => {
		switch(value){
			case "success":
				if(url!=null)
				window.location = url;
			break;
		}
	});
}

function reset_fields(id)
{
	$('#'+id)[0].reset();
}

var IO = new function(){
    this.setSubmitScript = function( io ){
        $('#'+io.form_id).on("submit",function(e){

            e.preventDefault();     
            button_loader(io.button_id,1);

            $.post(
                io.data_receiver_url,
                {
                    data: get_form_data(io.form_id)
                },
                function(data){                             
                    button_loader(io.button_id,0);
                	notify( data, io.redirect_url ); 
                    if(io.post_script != null && io.post_script instanceof Function ) 
                    	io.post_script();            
                }
                );

        });
    }            
}