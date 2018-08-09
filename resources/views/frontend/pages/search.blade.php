@extends('frontend.layout')
@section('content')
		<!-- search area -->
		<div class="search-area">
			<div class="container">
				<div class="row">
					<h2 class="get-section-header">Search</h2>
					<div class="search-get-ride">
					<form action="{{ url('/search') }}" method="post">
						{{ csrf_field() }}
						<div class="col-sm-3">
							<div class="form-group">
								<input type="text" name="from" id="" class="get-select-picker placepicker form-control" placeholder="From" required>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<input type="text" name="to" id="" class="get-select-picker placepicker form-control" placeholder="To" required>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<input type="text" name="when" class="form-control" id="datetimepicker4" placeholder="When">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<select name="seats" class="get-select-picker" title="Seats">
									<option value="1">1 seats</option>
									<option value="2">2 seats</option>
									<option value="3">3 seats</option>
									<option value="4">4 seats</option>
									<option value="5">5 seats</option>
								</select>
							</div>
						</div>
						<div class="get-search-control clearfix">
							<button type="submit" class="btn btn-info btn-offer">Search</button>
						</div>
					</form>
				</div>
				</div>
			</div>
		</div>
 @endsection