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
											<label class = "formlabel">Product Name
												<span class = "asterisk">*</span>
											</label>
										</div><br>

										<div class = "twelve wide column bspacing">
											<label class = "formlabel">Product Description
											</label>
										</div><br><br><br><br><br>

										<div class = "twelve wide column bspacing">
											<label class = "formlabel">Product Price(PHP)
											<span class = "asterisk">*</span>
											</label>
										</div><br>

										<div class = "twelve wide column bspacing">
											<label class = "formlabel">Image
											<span class = "asterisk">*</span>
											</label>
										</div><br><br><br><br>
																				
															
									</div>

													
									<div class = "fieldpane">
										<input type="hidden" value="" name="prdID" id='prdID'/>
										<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">

										<div class = "twelve wide column bspacing2">
										<div class = "field">
											<select class="modified ui selection dropdown selectstyle2" name="category1" id = "category1">
												<option value = "disitem">Select One</option>

												@foreach($categ as $rs1)
										       		<option value="{{$rs1->id}}">{{$rs1->cat_name}}</option>
												@endforeach												 

											</select>
														
										</div>
													
									</div>


										<div class = "twelve wide column bspacing2">
											<div class="ui input field formfield">
												<input type="text" name="prodname"  id="prodname" placeholder=" e.g. Cellphone">
											</div>
										</div>

										<div class = "twelve wide column bspacing2">
											<div class="field">
												<textarea id="proddesc" name = "proddesc" class = "areastyle" rows = "4" placeholder="Type here..."></textarea>
											</div>
										</div>

										<div class = "twelve wide column bspacing2">
											<div class="ui input field formfield">
												<input type="number" name="prodprice"  id="prodprice" placeholder=" e.g. 100.00">
											</div>
										</div>	

								<div class = "three wide column">
									<div class = "fborder piccon">
										<div class = "ui medium image">
											<img class = "profpic" id = "profpic"  src="{{URL::asset('customized/objects/InitProfile.png')}}">
										</div>

										<div class = "ui input sixteen wide field">
											<input type = "file" onchange = "previewphoto()" accept="image/*" id = "upphoto" name = "upphoto"/>
											
										</div>

									</div>

									<span class ="message" id="message">{{session('message')}}</span>


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
								            <th><center>Category Name</center></th>
								            <th><center>Product Name</center></th> 
								            <th><center>Product Description</center></th>
								            <th><center>Product Price</center></th>
								        </tr>	
								    </thead>
										                   
								    <tbody>
									    @foreach ($load as $key) 
									       	<tr class = "trow" onclick = "CRUD({{$key->prd_id}},2)" id = "{{$key->prd_id}}">
									    		<td><center>{{$key->categories->cat_name}}
									    		</center></td>
									    		<td><center>{{$key->prd_name}}</center></td>
									    		<td><center>{{$key->prd_description}}</center></td>
									    		<td><center>{{$key->prd_price}}</center></td>
									    	</tr>  
											                               
									   @endforeach 
								    </tbody>
								</table>						
							</div>
								
							</div>
						</div>
						
						
					</div>
					
				</div>
					
			</div><BR><br>

<script type="text/javascript">

		var photo = "";
			var upphoto = document.getElementsByName('upphoto')[0].files;
			var blob = new Blob();
			var blobreader = new FileReader();

			if(upphoto.length == 1) {
				blob = new Blob(document.getElementsByName('upphoto')[0].files, 
								{type: document.getElementsByName('upphoto')[0].files[0]['type']});

			}//upphoto

			var blobsize = blob.size;			

			blobreader.onload = function(event){

				if(blobsize == 0) {
					photo = "";
				} else {
					photo = event.target.result;
				}//if
			}//endBlobReader

		$(document).ready(function() {
		$('#datatable').DataTable();
		} );

		$('.ui.dropdown').dropdown();
		$('#select').dropdown();

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
				'catname' : $('#category1').val(),
				'prdname' : document.getElementsByName('prodname')[0].value.trim(),
				'prddesc' : document.getElementsByName('proddesc')[0].value.trim(),
				'prdprice' : document.getElementsByName('prodprice')[0].value,
				'upphoto' : photo,
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
				'id' : document.getElementById('prdID').value,
				'catname' : $('#category1').val(),
				'prdname' : document.getElementsByName('prodname')[0].value.trim(),
				'prddesc' : document.getElementsByName('proddesc')[0].value.trim(),
				'prdprice' : document.getElementsByName('prodprice')[0].value,
				'upphoto' : photo,
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
			url: "{{url('module/productCRUD')}}",
			data: data,
			dataype: "JSON",
			success:function(data){
				if(  func == 1 || func == 3){ 
					
					setTimeout(function(){
						location.reload();
					}, 50);

				}//if func
				else {
					$('#' + data['prd_id']).attr('class', 'activerow');
					$('tr').not("[id = '" + data['id'] + "']").attr('class', 'trow');

					$('#category1').dropdown('set selected', data['cat_id']);
					document.getElementById('prdID').value = data['prd_id'];
					document.getElementsByName('prodname')[0].value = data['prd_name'];
					document.getElementsByName('proddesc')[0].value = data['prd_description'];
					document.getElementsByName('prodprice')[0].value = data['prd_price'];
					document.getElementsByName('upphoto')[0].files = data['prd_image'];
				}

			},
			
		});
	}//function exec() {	


	function loaddata(id) {

			$('#' + id).attr('class', 'activerow');
			$('tr').not("[id = '" + id + "']").attr('class', 'trow');

			var data = {
				'id' : id,
				'_token' : '{{ Session::token() }}'
			};
			document.getElementById('dualbutton').value = 3;
			flag = 1;


			$.ajax({
				type: "POST",
				url: "{{url('module/product')}}",
				data: data,
				dataType: "JSON",
			   	success : function(data) {	

			   		document.getElementById('prdID').value = data[0]['prd_id'];
			   		$('#category1').dropdown('set selected', data['cat_id']);
			   		document.getElementsByName('prodname')[0].value = data[0]['prd_name'];
			   		document.getElementsByName('proddesc')[0].value = data[0]['prd_description']; 
			   		document.getElementsByName('prodprice')[0].value = data[0]['prd_price'];
			   			document.getElementsByName('upphoto')[0].files = data['prd_image']; 
			   
			   		
			   	},
			});


		}//function loaddata() 	



//PHOTO

		function validatefiletype(photo) {
			var upext = photo['type'];
			var upsize = photo['size'];
			var maxsize = 1048576;
			var message = "false";
			var error;
			var validext = ['image/pjpeg', 'image/jpeg', 'image/jpg', 'image/JPEG', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/GIF', 'image/gif'];
				
				
			for (var ctr = 0 ; ctr < validext.length ; ctr++) {
				if(upext == validext[ctr]) {
					message = "true";
					break;
				}//if(data['type'] == validext[ctr]) {
			};


			if(message === "true" && upsize <= maxsize) {
				return message;
			} else if(message === "true" && upsize > maxsize) {
				return "IMAGE TOO LARGE";

			} else {
				return "INVALID FILE TYPE";

			}//if

		}//function validatefiletype() {

		function previewphoto() {

			var upphoto = document.getElementsByName('upphoto')[0].files;
			var result;

			if (upphoto.length == 1) {
				result = validatefiletype(upphoto[0]);

				if( result === "true") {
					var reader = new FileReader();

			        reader.onload = function (e) {
		            document.getElementById('profpic').src = e.target.result;

		        }//reader.onload
	
	        	reader.readAsDataURL(upphoto[0]);
	        	document.getElementById('message').innerHTML = "";

			    } else {
			    	document.getElementById('message').innerHTML = result;
			    }//if
			}//if

		}//previewphoto	


		
</script>





@stop