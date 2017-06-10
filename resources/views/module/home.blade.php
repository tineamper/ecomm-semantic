@extends('baseform')

@section('bodysection')

<div class = "hcontent">
	<div class =  "dcon">

		<div class = "nine wide column">
			<select id="searchbox" name="q" placeholder="Search PRODUCTS(s)" >
				
			</select>

		</div>
							
			<h6 class="ui horizontal divider divtitle">
				<label class="textStyle2">LIST OF PRODUCTS</label>
			</h6>

			<div class="infinite-scroll">
			<div id = "accardlist" class = "ui doubling grid cardlist2 ">
			

							<div class = "four wide column colheight ">
								<div class = "cardstyleportrait">
									@foreach($load as $rs1)	
										<img class = "advphoto1" src="{{URL::asset($rs1->prd_image)}}"/>
									
									<div class = "advdata1">
										<h5 class = "name">
													{{$rs1->prd_name}}
										</h5>
										<p class = "p1">
											P{{$rs1->prd_price}}							
										</p>

										<center>
										<button id="myBtn" type='button' onclick='show()' class="btnCenter btn">VIEW PRODUCT</button>
										</center>
									@endforeach	
										
									</div>
								</div>

							</div>
						
			</div>
			</div>
			
	</div>
</div>	

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script type="text/javascript" src='{{ URL::asset("jscroll/jquery.jscroll.min.js") }}'></script>

	<script type="text/javascript">
			$('.ui.modal')
	  		.modal();
	$('#tab1').attr('class', 'mlink item active');

	function show(){
		$("#viewadv").modal("show");
	}

	 $('ul.pagination').hide();
		        $(function() {
		            $('.infinite-scroll').jscroll({
		                autoTrigger: true,
		                loadingHtml: '<img class="center-block" src="/customized/objects/loading.gif" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
		                padding: 0,
		                nextSelector: '.pagination li.active + li a',
		                contentSelector: 'div.infinite-scroll',
		                callback: function() {
		                    $('ul.pagination').remove();
		                }
		            });
		        });

	</script>

	@include('module.product_modal')

@stop	