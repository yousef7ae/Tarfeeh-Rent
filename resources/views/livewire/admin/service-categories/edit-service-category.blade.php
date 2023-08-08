<form class="mt-2" method="post" wire:submit.prevent="update">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="card d-table p-1 m-auto">
                    @if($imageTemp)
                        <img width="150" class="rounded-circle img-thumbnail img-fluid"
                             src="{{ $imageTemp->temporaryUrl() }}"
                             data-holder-rendered="true">
                    @else
                        <img width="200" class="img-fluid rounded"
                             src="{{ !empty($service_category['image']) ? asset('storage/'.$service_category['image']) : url('dashboard/images/image1.png')}}"
                             data-holder-rendered="true">
                    @endif
                </div>

                <div class="d-table p-1 m-auto uniform-uploader">
                    <input type="file" wire:model="imageTemp"
                           class="form-input-styled form-control submit2 @error('imageTemp') is-invalid @enderror"
                           data-fouc=""
                    >
                    <span class="filename" >{{__("File Image ")}}</span>
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
            <div class="form-group">
                <label class="control-label">{{ __('Name') }}</label>
                <input value="" wire:model="service_category.name" placeholder="{{ __('Add Name') }}"
                       name="name"
                       class="form-control @error('service_category.name') is-invalid @enderror" type="text">
                @error('service_category.name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

{{--            <div class="row">--}}
{{--                <div class="col-md-6 mb-2">--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="control-label">{{__('Country')}} </label>--}}
{{--                        <select wire:model.defer="service_category.country_id"--}}
{{--                                wire:change = "getCities()" class="form-control @error('service_category.country_id') is-invalid @enderror" id="service">--}}
{{--                            <option value="0">{{__("Select")}} ...</option>--}}
{{--                            @foreach( $countries as $key => $country )--}}
{{--                                <option value="{{$country->id}}">{{$country->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        @error('service_category.country_id')--}}
{{--                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-6 mb-2">--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="control-label">{{__('City')}}</label>--}}
{{--                        <select wire:model.defer="service_category.city_id"--}}
{{--                                class="form-control @error('service_category.city_id') is-invalid @enderror" id="service">--}}
{{--                            <option value="0">{{__("Select")}} ...</option>--}}
{{--                            @if($cities)--}}
{{--                                @foreach( $cities as $key => $city )--}}
{{--                                    <option value="{{$city->id}}">{{$city->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        </select>--}}
{{--                        @error('service_category.city_id')--}}
{{--                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


            <div class="form-group" wire:ignore>
                <label class="control-label">{{ __('Description') }}</label>
                <textarea rows="5" value="" wire:model="service_category.description" placeholder="{{ __('Add Description') }}"
                          id="description2" data-description2="@this"    name="description2"
                          class="form-control editor @error('service_category.description') is-invalid @enderror"
                          type="text"></textarea>
                @error('service_category.description')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

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
</form>
