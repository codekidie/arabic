<?php 
    require_once("layouts/header.php");   
?>
<div class="container">
	<div class="row" style="margin-top:40px;">
	<div class="col-md-12">
	<div class="col-md-6"> 
		<div class="form-group ">
		  <label for="exampleInputText">Arabic</label>
		 <textarea class="form-control" placeholder="Description" id="arabic" readonly=""  style="height: 400px;"> </textarea> 
		</div>

	</div>
	
	<div class="col-md-6"> 
		<div class="form-group ">
		  <label for="exampleInputText">English</label>
		 <textarea class="form-control" placeholder="Description" id="english" style="height: 400px;"></textarea> 		
		</div>
	<button class="btn btn-info btn-block" id="translator"> Translate </button>
		
	</div>	
	</div>
</div>

<?php 
    require_once("layouts/footer.php");    
?>