@extends('layout.default')
@section('title')
	Example
@stop

@section('content')
            <div>

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Example</div>

				<div class="panel-body">
					@if (isset($user))
						HI!!! <strong>{!! $user !!} </strong> this is a example page
					@else
						HI!!! <strong>Nobody </strong>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
	
@stop
<div>
<hr/>
@include('layout.footer')
<hr/>
</div>