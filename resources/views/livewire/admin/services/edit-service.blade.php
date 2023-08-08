<form class="mt-2" method="post" wire:submit.prevent="update">
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
                        @if(!empty($service['image']))
                            <img width="200" class="img-fluid rounded"
                                 src="{{ asset('storage/'.$service['image'])}}"
                                 data-holder-rendered="true">
                        @endif
                    @endif
                </div>

                <div class="d-table p-1 m-auto uniform-uploader">
                    <input type="file" wire:model.defer="imageTemp"
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
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">{{ __('Name') }}</label>
                        <input value="" wire:model.defer="service.name" placeholder="{{ __('Add Name') }}"
                               name="title"
                               class="form-control @error('service.name') is-invalid @enderror" type="text">
                        @error('service.name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">{{__("Service Category")}}</label>
                        <select wire:model.defer="service.service_category_id"
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
            </div>


            <div class="form-group" >
                <label class="control-label">{{ __('Description') }}</label>
                <textarea rows="5" value="" wire:model.defer="service.description" placeholder="{{ __('Add Description') }}"
                          id="description"  name="description"
                          class="form-control  @error('service.description') is-invalid @enderror"
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
        <button wire:loading.attr="disabled" class="btn btn-info mx-4"
                type="submit">{{__("Update")}}</button>
        <button type="button" class="btn btn-danger close-btn" data-bs-dismiss="modal">{{__("Close")}}</button>
    </div>
</form>
