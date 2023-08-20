<form class="mt-2" method="post" wire:submit.prevent="update">
    {{csrf_field()}}

    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <div class="card d-table p-1 m-auto">
                    {{--@if($imageTemp)
                        @foreach ($imageTemp as $image)
                            <img width="150" class="img-fluid rounded"
                                 src="{{ $image->temporaryUrl() }}"
                                 data-holder-rendered="true">

                        @endforeach

                        @if(!empty($product['image']))
                            <img width="200" class="img-fluid rounded"
                                 src="{{ $product['image']}}"
                                 data-holder-rendered="true">
                        @endif

                    @endif--}}
                </div>

                <div class="d-table p-1 m-auto uniform-uploader">
                    <input type="file" wire:model.defer="imageTemp"
                           class="form-input-styled form-control submit2 @error('imageTemp.*') is-invalid @enderror"
                           data-fouc="" multiple>
                    <span class="filename">{{__("File Image ")}}</span>
                    @error('imageTemp')
                    <span class="invalid-feedback"
                          role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">اسم العقار</label>
                        <input value="" wire:model.defer="product.name" placeholder="{{ __('Add Name') }}"
                               name="name"
                               class="form-control @error('product.name') is-invalid @enderror" type="text">
                        @error('product.name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">الخدمة </label>
                        <select wire:model.defer="product.service_id"
                                class="form-control @error('product.service_id') is-invalid @enderror">
                            <option value="0">{{__("Select")}} ...</option>
                            @foreach( $services as $key => $service )
                                <option value="{{$service->id }}">{{$service->name}}</option>
                            @endforeach
                        </select>
                        @error('product.service_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ __('Address') }}</label>
                        <input value="" wire:model.defer="product.address" placeholder="{{ __('Add Address') }}"
                               name="address"
                               class="form-control @error('product.address') is-invalid @enderror" type="text">
                        @error('product.address')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                {{-- comment --}}

                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label class="control-label">{{ __('وقت الحجز من ') }}</label>
                        <input value="" wire:model.defer="product.from_date"
                               name="from_date"
                               class="form-control @error('product.from_date') is-invalid @enderror"
                               type="date">
                        @error('product.from_date')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label class="control-label">{{ __('وقت الحجز الى ') }}</label>
                        <input value="" wire:model.defer="product.date_expire"
                               name="date_expire"
                               class="form-control @error('product.date_expire') is-invalid @enderror"
                               type="date">
                        @error('product.date_expire')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">{{ __('file') }}</label>
                        <input value="" wire:model.defer="product.file" accept="application/pdf"
                               name="file"
                               class="form-control @error('product.file') is-invalid @enderror" type="file">
                        @error('product.file')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label class="control-label">الدولة </label>
                        <select wire:model.defer="product.country_id"
                                wire:change="getCities()"
                                class="form-control @error('product.country_id') is-invalid @enderror" id="service">
                            <option value="0">{{__("Select")}} ...</option>
                            @foreach( $countries as $key => $country )
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                        @error('product.country_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="form-group" {{--wire:init="getCities()"--}}>
                        <label class="control-label">المدينة </label>
                        <select wire:model.defer="product.city_id"
                                class="form-control @error('product.city_id') is-invalid @enderror" id="service">
                            <option value="0">{{__("Select")}} ...</option>
                            @if($cities)
                                @foreach( $cities as $key => $city )
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('product.city_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">{{ __('url video') }}</label>
                        <input value="" wire:model.defer="product.url_video" placeholder="{{ __('Add url video') }}"
                               name="url_video"
                               class="form-control @error('product.url_video') is-invalid @enderror" type="text">
                        @error('product.url_video')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>


                @if ($product_times)

                    <div class="col-md-12">

                        @foreach ($product_times as $key => $product_time)
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <div class="form-group mb-0">
                                        <label class="control-label"> {{ __('وقت متاح من') }}</label>
                                        <input value="" wire:model.defer="product_times.{{$key}}.from_time"
                                               name="from_time"
                                               class="form-control @error('product_times.'.$key.'.from_time') is-invalid @enderror"
                                               type="time" placeholder=" 09:00 Pm  08:00 Am">
                                        @error('product_times.'.$key.'.from_time')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group mb-0">
                                        <label class="control-label"> {{ __('وقت متاح إلى') }}</label>
                                        <input value="" wire:model.defer="product_times.{{$key}}.time_expire"
                                               name="time_expire"
                                               class="form-control @error('product_times.'.$key.'.time_expire') is-invalid @enderror"
                                               type="time" placeholder=" 09:00 Pm  08:00 Am">
                                        @error('product_times.'.$key.'.time_expire')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-2 form-group mb-2 ">
                                    @if(count($product_times) > 1 and $key > 0)
                                        <label for="episode-add" class="control-label d-block">حذف </label>
                                        <button class="btn btn-sm btn-danger mx-auto"
                                                wire:click.prevent="RemoveProductTime({{$key}})"><i
                                                class="fas fa-minus"></i></button>
                                    @else
                                        <label for="episode-add" class="control-label d-block">إضافة </label>
                                        <button class="btn btn-sm btn-success mx-auto"
                                                wire:click.prevent="AddProductTime()"><i
                                                class="fas fa-plus"></i></button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="clearfix">
                        <label for="episode-add" class="control-label d-block">إضافة </label>
                        <button class="btn btn-sm btn-success mx-auto"
                                wire:click.prevent="AddProductDescription()"><i
                                class="fas fa-plus"></i>
                        </button>
                    </div>
                @endif

                <div class="row mb-2">

{{--                    <div class="col-md-6 mb-2">--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label">السعر الاول</label>--}}
{{--                            <input value="" wire:model.defer="product.name_price1" placeholder=" السعر الاول"--}}
{{--                                   name="name_price1"--}}
{{--                                   class="form-control @error('product.name_price1') is-invalid @enderror" type="text">--}}
{{--                            @error('product.name_price1')--}}
{{--                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label class="control-label"> قيمة السعر الاول</label>
                            <input value="" wire:model.defer="product.price1"
                                   placeholder="{{ __(' السعر  الاول ') }}"
                                   name="value_price1"
                                   class="form-control @error('product.value_price1') is-invalid @enderror" type="text">
                            @error('product.value_price1')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-2">

{{--                        <div class="col-md-6 mb-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="control-label">السعر الثانى</label>--}}
{{--                                <input value="" wire:model.defer="product.name_price2"--}}
{{--                                       placeholder="{{ __('السعر الثانى ') }}"--}}
{{--                                       name="name_price2"--}}
{{--                                       class="form-control @error('product.name_price2') is-invalid @enderror"--}}
{{--                                       type="text">--}}
{{--                                @error('product.name_price2')--}}
{{--                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-6 mb-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="control-label"> قيمةالسعر الثانى </label>--}}
{{--                                <input value="" wire:model.defer="product.value_price2"--}}
{{--                                       placeholder="{{ __('قيمة السعر  الثانى ') }}"--}}
{{--                                       name="value_price2"--}}
{{--                                       class="form-control @error('product.value_price2') is-invalid @enderror"--}}
{{--                                       type="text">--}}
{{--                                @error('product.value_price2')--}}
{{--                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-6 mb-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="control-label">{{__("متميز ")}}</label>--}}
{{--                                <select wire:model.defer="product.Important"--}}
{{--                                        class="form-control @error('product.Important') is-invalid @enderror"--}}
{{--                                        name="Important">--}}
{{--                                    <option value="free">اختر</option>--}}
{{--                                    <option value="1">متميز</option>--}}
{{--                                    <option value="0">غير ميتمز</option>--}}

{{--                                </select>--}}
{{--                                @error('product.type_reservation')--}}
{{--                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        {{-- comment --}}

                        {{-- comment --}}

                    </div>
                </div>
            </div>

            <div>
                <div wire:loading>
                    <i class="fas fa-sync fa-spin"></i>
                    {{__("Loading please wait")}} ...
                </div>
            </div>
            <div class="modal-footer justify-content-center mt-2">
                <button wire:loading.attr="disabled" class="btn btn-info mx-4"
                        type="submit">{{__("Update")}}</button>
                <button type="button" class="btn btn-danger close-btn" data-bs-dismiss="modal">{{__("Close")}}</button>
            </div>
        </div>
    </div>
</form>
