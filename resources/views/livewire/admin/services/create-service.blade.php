<form class="mt-2" method="post" wire:submit.prevent="store">
    {{csrf_field()}}
    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <div class="card d-table p-1 m-auto">
                    @if($imageTemp)
                        <img width="150" class="img-fluid rounded"
                             src="{{ $imageTemp->temporaryUrl() }}"
                             data-holder-rendered="true">

                    @else
                        <img width="200" class="img-fluid rounded"
                             src="{{ empty(['image']) ? url(empty(['image'])) : url('dashboard/images/image1.png')}}"
                             data-holder-rendered="true">
                    @endif
                </div>

                <div class="d-table p-1 m-auto uniform-uploader">
                    <input type="file" wire:model.defer="imageTemp"
                           class="form-input-styled form-control submit @error('imageTemp') is-invalid @enderror"
                           data-fouc=""
                    >
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
                        <label class="control-label">{{ __('Name') }}</label>
                        <input value="" wire:model.live="service.name" placeholder="{{ __('Add Name') }}"
                               name="title"
                               class="form-control @error('service.name') is-invalid @enderror" type="text">
                        @error('service.title')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">{{__("Service Category")}}</label>
                        <select wire:model.live="service.service_category_id"
                                class="form-control @error('service.service_category_id') is-invalid @enderror">
                            <option value="0">{{__("Select Service Category")}} ...</option>
                            @foreach( $service_categories as $key => $service_category )
                                <option value="{{$service_category->id }}">{{$service_category->name}}</option>
                            @endforeach
                        </select>
                        @error('service.service_category_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">{{__("Country")}}</label>
                        <select wire:model.live="service.country_id"
                                wire:change = "getCities()" class="form-control @error('service.country_id') is-invalid @enderror">
                            <option value="0">{{__("Select Country")}} ...</option>
                            @foreach( $countries as $key => $country )
                                <option value="{{$country->id }}">{{$country->name}}</option>
                            @endforeach
                        </select>
                        @error('service.country_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">{{__("City")}}</label>
                        <select wire:model.live="service.city_id"
                                class="form-control @error('service.city_id') is-invalid @enderror">
                            <option value="0">{{__("Select City")}} ...</option>
                            @foreach( $cities as $key => $city )
                                <option value="{{$city->id }}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        @error('service.city_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

            </div>


            <div class="form-group" >
                <label class="control-label">{{ __('Description') }}</label>
                <textarea rows="5" value="" wire:model.live="service.description"
                          placeholder="{{ __('Add Description') }}"
                          id="description" name="description"
                          class="form-control @error('service.description') is-invalid @enderror"
                          type="text"></textarea>
                @error('service.description')
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
        <button wire:loading.attr="disabled" class="btn btn-primary mx-4"
                type="submit">{{__("Store")}}</button>
        <button type="button" class="btn btn-danger close-btn" data-bs-dismiss="modal">{{__("Close")}}</button>
    </div>
</form>
