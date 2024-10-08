@extends('backend.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
    	<div class="row align-items-center">
    		<div class="col-md-12">
    			<h1 class="h3">{{translate('All Areas')}}</h1>
    		</div>
    	</div>
    </div>
    <div class="row">

        <div class="col-md-5">
    		<div class="card">
    			<div class="card-header">
    				<h5 class="mb-0 h6">{{ translate('Add New Area') }}</h5>
    			</div>
    			<div class="card-body">
    				<form action="{{ route('area.update',$area->id) }}" method="get">
    					@csrf
    					<div class="form-group mb-3">
    						<label for="name">{{translate('Area Name')}}</label>
    						<input type="text" placeholder="{{translate('Area Name')}}" name="area_name" class="form-control" value="{{$area->name}}" required>
    					</div>



                        <div class="form-group mb-3">
    						<label for="name">{{translate('Cost')}}</label>
    						<input type="number" min="0" step="0.01" placeholder="{{translate('Cost')}}" name="cost" value="{{$area->cost}}" class="form-control" required>
    					</div>
    					<div class="form-group mb-3 text-right">
    						<button type="submit" class="btn btn-primary">{{translate('UPDATE')}}</button>
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')
    <script type="text/javascript">
        function sort_cities(el){
            $('#sort_cities').submit();
        }

        function update_status(el){

            if('{{env('DEMO_MODE')}}' == 'On'){
                AIZ.plugins.notify('info', '{{ translate('Data can not change in demo mode.') }}');
                return;
            }

            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('area.status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Area status updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

    </script>
@endsection



