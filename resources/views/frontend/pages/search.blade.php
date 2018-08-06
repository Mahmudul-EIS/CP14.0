@extends('frontend.layout')
@section('content')
		<!-- search area -->
		<div class="search-area">
			<div class="container">
				<div class="row">
					<h2 class="get-section-header">Search</h2>
					<div class="search-get-ride">
					<form action="#">
						<div class="col-sm-3">
							<div class="form-group">
								<select name="" id="" class="get-select-picker" title="Form">
									<option value="dhaka">Dhaka</option>
									<option value="Kualalampur">Kualalampur</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<select name="" id="" class="get-select-picker" title="To">
									<option value="dhaka">Dhaka</option>
									<option value="Kualalampur">Kualalampur</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<input type="text" class="form-control datepicker-f" placeholder="When">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<select name="" id="" class="get-select-picker" title="Seats">
									<option value="1_seats">1 seats</option>
									<option value="2_seats">2 seats</option>
									<option value="3_seats">3 seats</option>
								</select>
							</div>
						</div>
						<div class="get-search-control clearfix">
							<button class="btn btn-info btn-offer">Search</button>
						</div>

						<div class="get-add-request">
							<button type="button" class="btn btn-info btn-offer" data-toggle="modal" data-target="#myModal">Delete Request</button>
							<button type="button" class="btn btn-info btn-offer" data-toggle="modal" data-target="#myModal2">Add Request</button>
						</div>
					</form>
				</div>
				</div>
			</div>
		</div>




	<!-- delete request popup -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog delete-popup-modal" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">My Requests</h4>
	      </div>
	      <div class="modal-body table-responsive">
	        <table class="table table-hover ">
			    <tbody>
			      <tr>
			        <td><div class="table-form-form"><span>From :</span> <span class="right-text">Kampung Nyabor Malaysia</span></div></td>
			        <td><div class="table-form-to"><span>To :</span> <span class="right-text">Kuching, sarawak Malaysia</span></div></td>
			        <td><div class="table-form-req"><span>Requested Seats :</span> 4 Seats</div></td>
			        <td><div class="table-form-req"><span>Date :</span> 13/08/2018</div></td>
			        <td>
			        	<input type="checkbox" id="checkbox2" name="checkbox01">
			        	<label for="checkbox2"></label>
			        </td>
			      </tr>
			      <tr>
			        <td><div class="table-form-form"><span>From :</span> <span class="right-text">Kampung Nyabor Malaysia</span></div></td>
			        <td><div class="table-form-to"><span>To :</span> <span class="right-text">Kuching, sarawak Malaysia</span></div></td>
			        <td><div class="table-form-req"><span>Requested Seats :</span> 4 Seats</div></td>
			        <td><div class="table-form-req"><span>Date :</span> 13/08/2018</div></td>
			        <td>
			        	<input type="checkbox" id="checkbox3" name="checkbox01">
			        	<label for="checkbox3"></label>
			        </td>
			      </tr>
			      <tr>
			        <td><div class="table-form-form"><span>From :</span> <span class="right-text">Kampung Nyabor Malaysia</span></div></td>
			        <td><div class="table-form-to"><span>To :</span> <span class="right-text">Kuching, sarawak Malaysia</span></div></td>
			        <td><div class="table-form-req"><span>Requested Seats :</span> 4 Seats</div></td>
			        <td><div class="table-form-req"><span>Date :</span> 13/08/2018</div></td>
			        <td>
			        	<input type="checkbox" id="checkbox1" name="checkbox01">
			        	<label for="checkbox1"></label>
			        </td>
			      </tr>
			      <tr>
			      	<td><div class="table-form-form"><span>From :</span> <span class="right-text">Kampung Nyabor Malaysia</span></div></td>
			        <td><div class="table-form-to"><span>To :</span> <span class="right-text">Kuching, sarawak Malaysia</span></div></td>
			        <td><div class="table-form-req"><span>Requested Seats :</span> 4 Seats</div></td>
			        <td><div class="table-form-req"><span>Date :</span> 13/08/2018</div></td>
			        <td>
			        	<input type="checkbox" id="checkbox4" name="checkbox01">
			        	<label for="checkbox4"></label>
			        </td>
			      </tr>
			    </tbody>
			  </table>
	      </div>
	      <div class="modal-footer">
	       <button class="btn btn-info btn-offer ">Delete Requests</button>
	   		</div>
	    </div>
	  </div>
	</div>


	<!--Add request popup -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog add-modal-item add-modal-item-get-ride" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">My Requests</h4>
	      </div>
	      <div class="modal-body">
	        <form method="post"  action="{{ url('/c/search') }}" role="form">
	        	{{ csrf_field() }}

				<div class="get-a-ride">
					<div class="get-form-control">
						<select name="from" id="from" class="get-select-picker" title="From">
							<option value="dhaka">Dhaka</option>
							<option value="Kualalampur">Kualalampur</option>
						</select>
					</div>
					<div class="get-form-control">
						<select name="to" id="to" class="get-select-picker" title="To">
							<option value="dhaka">Dhaka</option>
							<option value="Kualalampur">Kualalampur</option>
						</select>
					</div>
					<div class="get-form-control">
						<input name="departure_date" type="date" placeholder="Pick a date" class="form-control">
					</div>
					<div class="get-form-control">
						<select name="seat_required" id="seat_required" class="get-select-picker" title="REQUIRED SEATS">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
					</div>
					<div class="get-form-control-button">
						<button type="submit"	class="btn btn-info btn-offer" data-toggle="modal" data-target="#myModal2">Confirm</button>
					</div>
				</div>

			</form>
	      </div>
	    </div>
	  </div>
	</div>

	<!--Add request confirm popup -->
	<div class="modal fade" id="myModal2c" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Send Request</h4>
	      </div>
	      <div class="modal-body">
	        <p>Your Request has been created successfully</p>
	      </div>
	      <div class="modal-footer">
	      	<button class="btn btn-info btn-offer" data-dismiss="modal" aria-label="Close">Okay</button>
	      </div>
	    </div>
	  </div>
	</div>
 @endsection