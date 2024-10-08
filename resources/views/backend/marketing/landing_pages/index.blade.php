@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">{{translate('All Landing Pages')}}</h1>
		</div>
        {{-- @can('add_flash_deal') --}}
            <div class="col-md-6 text-md-right">
                <a href="{{ route('landing_page.create') }}" class="btn btn-circle btn-info">
                    <span>{{translate('Create New Landing Page')}}</span>
                </a>
            </div>
        {{-- @endcan --}}
	</div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Landing Pages')}}</h5>
        <div class="pull-right clearfix">
            <form class="" id="sort_flash_deals" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type name & Enter') }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0" >
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th>{{translate('Name')}}</th>
                    <th data-breakpoints="lg">{{ translate('Title') }}</th>
                    <th data-breakpoints="lg">{{ translate('Banner') }}</th>
                    <th data-breakpoints="lg">{{ translate('Phone') }}</th>
                    {{-- <th data-breakpoints="lg">{{ translate('Description(1)') }}</th> --}}
                    {{-- <th data-breakpoints="lg">{{ translate('Description(2)') }}</th> --}}
                    {{-- <th data-breakpoints="lg">{{ translate('Description(3)') }}</th> --}}
                    <th data-breakpoints="lg">{{ translate('2nd Title') }}</th>
                    <th data-breakpoints="lg">{{ translate('2nd Image') }}</th>
                    <th data-breakpoints="lg">{{ translate('3rd Title') }}</th>
                    <th data-breakpoints="lg">{{ translate('3rd Image') }}</th>
                    <th data-breakpoints="lg">{{ translate('1st Video Title') }}</th>
                    {{-- <th data-breakpoints="lg">{{ translate('1st Video Link') }}</th> --}}
                    <th data-breakpoints="lg">{{ translate('2nd Video Title') }}</th>
                    {{-- <th data-breakpoints="lg">{{ translate('2nd Video Link') }}</th> --}}
                    {{-- <th data-breakpoints="lg">{{ translate('1st Slider Image') }}</th> --}}
                    {{-- <th data-breakpoints="lg">{{ translate('2nd Slider Image') }}</th> --}}
                    {{-- <th data-breakpoints="lg">{{ translate('3rd Slider Image') }}</th> --}}
                    <th data-breakpoints="lg">{{ translate('Status') }}</th>
                    <th class="text-right">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($landing_pages as $key => $landing_page)
                    <tr>
                        <td>{{ ($key+1)}}</td>
                        <td>{{ $landing_page->name }}</td>
                        <td>{{ $landing_page->title_1 }}</td>
                        <td><img src="{{ uploaded_asset($landing_page->image_1) }}" alt="banner" class="h-50px"></td>
                        <td>{{ $landing_page->phone }}</td>
                        {{-- <td>{!! $landing_page->description !!}</td> --}}
                        {{-- <td>{!! $landing_page->description_2 !!}</td> --}}
                        {{-- <td>{!! $landing_page->description_3 !!}</td> --}}
                        <td>{{ $landing_page->title_2 }}</td>
                        <td><img src="{{ uploaded_asset($landing_page->image_2) }}" alt="banner" class="h-50px"></td>
                        <td>{{ $landing_page->title_3 }}</td>
                        <td><img src="{{ uploaded_asset($landing_page->image_3) }}" alt="banner" class="h-50px"></td>
                        <td>{{ $landing_page->video1_title }}</td>
                        {{-- <td>{{ $landing_page->video1_link }}</td> --}}
                        <td>{{ $landing_page->video2_title }}</td>
                        {{-- <td>{{ $landing_page->video2_link }}</td> --}}
                        {{-- <td><img src="{{ uploaded_asset($landing_page->slide_image_1) }}" alt="banner" class="h-50px"></td> --}}
                        {{-- <td><img src="{{ uploaded_asset($landing_page->slide_image_2) }}" alt="banner" class="h-50px"></td> --}}
                        {{-- <td><img src="{{ uploaded_asset($landing_page->slide_image_3) }}" alt="banner" class="h-50px"></td> --}}
                        <td>
							<label class="aiz-switch aiz-switch-success mb-0">
								<input onchange="update_landing_page_status(this)" value="{{ $landing_page->id }}" type="checkbox" <?php if($landing_page->status == 1) echo "checked";?> >
								<span class="slider round"></span>
							</label>
						</td>
						<td class="text-right">
                            {{-- @can('edit_flash_deal') --}}
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('landing_page.edit', ['id'=>$landing_page->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                    <i class="las la-edit"></i>
                                </a>
                            {{-- @endcan --}}
                            {{-- @can('delete_flash_deal') --}}
                                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('landing_page.destroy', $landing_page->id)}}" title="{{ translate('Delete') }}">
                                    <i class="las la-trash"></i>
                                </a>
                                {{-- @endcan --}}
                                <a href="{{route('landingPage.details', $landing_page->id)}}" class="btn btn-soft-success btn-icon btn-circle btn-sm" title="{{ translate('View') }}">
                                    <i class="las la-eye"></i>
                                </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                {{-- {{ $flash_deals->appends(request()->input())->links() }} --}}
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
        function update_landing_page_status(el){
            // console.log(el);
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('landing_page.update_status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    location.reload();
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }
    </script>
@endsection
