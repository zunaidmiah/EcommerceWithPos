@extends('backend.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="aiz-titlebar text-left mt-2 mb-3">
            <h5 class="mb-0 h6">{{translate('Landing Page Information')}}</h5>
        </div>
        <form action="{{ route('landing_page.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{translate('Main Banner')}}</h5>
                </div>
                <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 control-label" for="name">{{translate('Page Name')}}</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{translate('Name')}}" value="{{ $landing_page->name }}" id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label" for="title">{{translate('Title')}}</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{translate('Title')}}" value="{{ $landing_page->title_1 }}" id="title" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Banner Image(OR)')}}</label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="banner_image" value="{{ $landing_page->image_1 }}" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                                <span class="small text-muted">{{ translate('This image is shown as cover banner in landing page details page.') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label" for="top_video">{{translate('Video')}}</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{translate('Video')}}" id="top_video" name="top_video_link" class="form-control" value="{{ $landing_page->top_video }}">
                                <span class="small text-muted">{{ translate('This video is shown as cover banner in landing page details page.') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label" for="phone">{{translate('Phone')}}</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{translate('Phone')}}" value="{{ $landing_page->phone }}" id="phone" name="phone" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label" for="description">{{translate('Long Description')}}</label>
                            <div class="col-sm-9">
                                {{-- <input type="text" placeholder="{{translate('Long Description')}}" id="description" name="description" class="form-control" required> --}}
                                <textarea class="aiz-text-editor" style="display: none;" name="description">{{ $landing_page->description }}</textarea>
                            </div>
                        </div>
                        <br>
                        
                        {{-- <div class="form-group" id="discount_table">
                        </div> --}}

                        {{-- <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                        </div> --}}
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{translate('Featue Details')}}</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="title_2">{{translate('Title')}}</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{translate('Title')}}" value="{{ $landing_page->title_2 }}" id="title_2" name="title_2" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="image_2">{{translate('Image(2)')}}</label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="image_2" value="{{ $landing_page->image_2 }}" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                            <span class="small text-muted">{{ translate('This image is shown as banner in landing page details page.') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="description_2">{{translate('Long Description')}}</label>
                        <div class="col-sm-9">
                            {{-- <input type="text" placeholder="{{translate('Long Description')}}" id="description" name="description" class="form-control" required> --}}
                            <textarea class="aiz-text-editor" style="display: none;" name="description_2">{{ $landing_page->description_2 }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{translate('why Us')}}</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="title_3">{{translate('Title')}}</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{translate('Title')}}" value="{{ $landing_page->title_3 }}" id="title_3" name="title_3" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="image_3">{{translate('Image(3)')}}</label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="image_3" class="selected-files" value="{{ $landing_page->image_3 }}">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                            <span class="small text-muted">{{ translate('This image is shown as banner in landing page details page.') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="description_3">{{translate('Long Description')}}</label>
                        <div class="col-sm-9">
                            {{-- <input type="text" placeholder="{{translate('Long Description')}}" id="description" name="description" class="form-control" required> --}}
                            <textarea class="aiz-text-editor" style="display: none;" name="description_3">{{ $landing_page->description_3 }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{translate('Video(1)')}}</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="title_1">{{translate('Title')}}</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{translate('Title')}}" value="{{ $landing_page->video1_title }}" id="video_title_1" name="video_title_1" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="video_1">{{translate('Video')}}</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{translate('Video')}}" value="{{ $landing_page->video1_link }}" id="video_1" name="video_1_link" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{translate('Video(2)')}}</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="video_title_2">{{translate('Title')}}</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{translate('Title')}}" value="{{ $landing_page->video2_title }}" id="video_title_2" name="video_title_2" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="video_2">{{translate('Video')}}</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{translate('Video')}}" value="{{ $landing_page->video2_link }}" id="video_2" name="video_2_link" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{translate('Slider Images')}}</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="slider_1">{{translate('Image(1)')}}</label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="slider_1" value="{{ $landing_page->slide_image_1 }}" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                            <span class="small text-muted">{{ translate('This image is shown as banner in landing page details page.') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="slider_2">{{translate('Image(2)')}}</label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="slider_2" value="{{ $landing_page->slide_image_2 }}" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                            <span class="small text-muted">{{ translate('This image is shown as banner in landing page details page.') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="slider_3">{{translate('Image(3)')}}</label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="slider_3" value="{{ $landing_page->slide_image_3 }}" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                            <span class="small text-muted">{{ translate('This image is shown as banner in landing page details page.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{translate('Products')}}</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="products">{{translate('Products')}}</label>
                        <div class="col-sm-9">
                            <select name="products[]" id="products" class="form-control aiz-selectpicker" multiple required data-placeholder="{{ translate('Choose Products') }}" data-live-search="true" data-selected-text-format="count">
                                @foreach(\App\Models\Product::where('published', 1)->where('approved', 1)->get() as $product)
                                    @php
                                        $landing_page_product = \App\Models\LandingPageProduct::where('landing_page_id', $landing_page->id)->where('product_id', $product->id)->first();
                                    @endphp
                                    <option value="{{$product->id}}" <?php if($landing_page_product != null) echo "selected";?> >{{ $product->getTranslation('name') }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="{{ $landing_page->id }}">
            <div class="form-group mb-0 text-right">
                <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
            </div>
        </form>
    </div>
</div>

@endsection

{{-- @section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#products').on('change', function(){
                var product_ids = $('#products').val();
                if(product_ids.length > 0){
                    $.post('{{ route('flash_deals.product_discount') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids}, function(data){
                        $('#discount_table').html(data);
                        AIZ.plugins.fooTable();
                    });
                }
                else{
                    $('#discount_table').html(null);
                }
            });
        });
    </script>
@endsection --}}
