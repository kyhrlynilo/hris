<div class="card">
	<div class="row">
		<div class="col s12">
			<pre>
				Sample usage of
				IO Class
			</pre>	
		</div>
		<form method="POST" id="some_form">
			<div class="col s4">
				<input type="text" name="some_input" placeholder="some_input">
			</div>
			<div class="col s4">
				<button class="btn green" type="submit" id="some_button">Submit</button>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	IO.setSubmitScript({
        form_id : "some_form",
        button_id : "some_button",
        data_receiver_url : base_url + "test/some_test_process" ,
        redirect_url : base_url + "test"
        //,post_script : postScript
        
    });	
</script>