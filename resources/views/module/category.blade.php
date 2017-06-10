@extends('baseform')

@section('bodysection')

	<div class = "thirteen wide column">
				<div class = "mcontent">
					<div class = "ui grid">

						<div class = "six wide column">
							<div class = "formpane">
								<div class = "mhead">
									<i class="write square big icon"></i>
								</div>

									<form id = "form" action="javascript:controlaction()">	
					
									<div class = "labelpane">

										<div class = "twelve wide column bspacing">
											<label class = "formlabel">Category Name
												<span class = "asterisk">*</span>
											</label>
										</div><br>

										<div class = "twelve wide column bspacing">
											<label class = "formlabel">Category Description
											</label>
										</div>
																				
															
									</div>

													
									<div class = "fieldpane">
										<input name="catID" id="catID" type="hidden" value="">


										<div class = "twelve wide column bspacing2">
											<div class="ui input field formfield">
												<input type="text" name="catName"  id="catName" placeholder=" e.g. Gadgets">
											</div>
										</div>

										<div class = "twelve wide column bspacing2">
											<div class="field">
												<textarea id="catDesc" name = "catDesc" class = "areastyle" rows = "4" placeholder="Type here..."></textarea>
											</div>
										</div>												

										<div class = "twelve wide column bspacing2">
											<center>
												<button class="ui tiny button submit savebtnstyle"
														id="dualbutton"
														type="submit"
														name="submit" 
														value = '1'>
																
														Save
												</button>

												<button class="ui tiny button"  
														type="button"  >
														Cancel
												</button>					
											</center>
										</div>								
									</div> 
									   

															
								</form>
								
							</div>
						</div>

						<div class = "ten wide column">
							<div class = "tablepane ">
								
							<div class = "mtitle">Product Catalog Category</div>

							<div class = "tablecon">	
								<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
								    <thead>
								    	<tr>
								            <th><center>Name</center></th>
								            <th><center>Description</center></th> 
								        </tr>	
								    </thead>
										                   
								    <tbody>
									    @foreach ($cat as $categ) 
									       	<tr class = "trow" onclick = "CRUD({{$categ->id}},2)" id= "{{$categ->id}}">
									    		<td><center>{{$categ->cat_name}}</center></td>
									    		<td><center>{{$categ->cat_description}}</center></td>
									    	</tr>  
											                               
									   @endforeach 
								    </tbody>
								</table>						
							</div>
								
							</div>
						</div>
						
						
					</div>
					
				</div>
					
			</div>


<script type="text/javascript">
		$(document).ready(function() {
		$('#datatable').DataTable();
	} );

		function controlaction() {
		var id = 0;
		var func = document.getElementById('dualbutton').value;

		CRUD(id, func);

	}//function controlaction() {

	function CRUD(id, func){

		var data;

		if(func == 1)
		{
			data = {
				'catname' : document.getElementsByName('catName')[0].value.trim(),
				'catdesc' : document.getElementsByName('catDesc')[0].value.trim(),
				'submit': document.getElementsByName("submit")[0].value,
				'callId' : 1,
				'_token' : '{{ Session::token() }}'
				};

			exec(data, func);
		}//add

		if(func == 2)
		{
			data = {
			'id' : id,
			'callId' : 2,
			'_token' : '{{ Session::token() }}'};
			document.getElementById('dualbutton').value = 3;
			flag = 1;

			exec(data, func);
			

		}//view

		if(func == 3)
		{
		
			data = {
				'id' : document.getElementById('catID').value,
				'catname' : document.getElementsByName('catName')[0].value.trim(),
				'catdesc' : document.getElementsByName('catDesc')[0].value.trim(),
				'submit': document.getElementsByName("submit")[0].value,
				'callId' : 3,
				'_token' : '{{ Session::token() }}'
				};

			exec(data, func);

		}//update\

			
	}

	function exec(data, func) {
		$.ajax({

			type: "POST",
			url: "{{url('module/categoriesCRUD')}}",
			data: data,
			dataype: "JSON",
			success:function(data){
				if(  func == 1 || func == 3){ 
					
					setTimeout(function(){
						location.reload();
					}, 50);

				}//if func
				else {
					$('#' + data['ID']).attr('class', 'activerow');
					$('tr').not("[id = '" + data['ID'] + "']").attr('class', 'trow');

					document.getElementById('catID').value = data['id'];
					document.getElementsByName('catName')[0].value = data['cat_name'];
					document.getElementsByName('catDesc')[0].value = data['cat_description'];
				}
			},
			
		});
	}//function exec() {	

</script>



@stop