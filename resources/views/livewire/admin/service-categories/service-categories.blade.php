<div>
    <div class="container-fluid py-3">
{{--        @include('layouts.admins.alert')--}}
        <div class="main h-100">
            <h2 class="text-primary">{{__('Services Categories')}}</h2>
            <div class="row g-0 mb-3">
                <div class="col-md-3 align-self-end">
                    <div class="d-inline">
                        @if(auth()->user()->can('services categories create') )
                            <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                               data-bs-target="#CreateServiceCategory"
                               wire:click.prevent="createServiceCategory" data-bs-original-title="" title=""><i
                                    class="fa-solid fa-user-plus pe-1"></i> {{__("Create Service Category")}} </a>
                        @endif
                    </div>
                </div>
                <div class="col-md-9">
                    <form class="row g-1 justify-content-end"{{-- wire:submit.prevent="search"--}}>

                        <div class="col-md-4 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__("Name")}}</label>
                            <input type="text" class="form-control border-primary" {{--wire:model.defer="name"--}}
                                   placeholder="ابحث "
                                   id="PatientName">
                        </div>

                        <div class="col-md-4 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__("Description")}}</label>
                            <input type="text" class="form-control border-primary" {{--wire:model.defer="description"--}}
                                   placeholder="ابحث "
                                   id="PatientName">
                        </div>

                        <div class="col-md-1 col-sm-2 col-2 align-self-end">
                            <button type="submit" wire:loading.attr="disabled" class="btn btn-primary py-2 w-100">
                                <i wire:loading class="fas fa-sync fa-spin"></i>
                                <i class="fa-solid py-1 fa-magnifying-glass"></i>

                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive pb-3">
                @if($service_categories->count() > 0)
                    <table class="table table-borderless mb-md-5">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">#</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Name")}}</div>
                            </th>
{{--                            <th scope="col" class="text-center p-1">--}}
{{--                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Status")}}</div>--}}
{{--                            </th>--}}
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">التحكم</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($service_categories as $service_category)
                            <tr>
                                <td class="text-center p-1">
                                    <div class="table-os">{{--{{ $key + $service_categories->firstItem() }}--}}#</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        @if (!empty($service_category->image))
                                            <a class="text-decoration-none text-dark"
                                               href="{{ $service_category->image ? $service_category->image : url('dashboard/images/image1.png')}}"
                                               data-fancybox="gallery-{{$service_category->id}}"
                                               data-caption="{{$service_category->name}}">
                                                <img src="{{ asset('dashboard/images/image-loge.svg') }}" class="pe-1"
                                                     data-holder-rendered="true">
                                                {{$service_category->name}}
                                            </a>
                                        @else
                                            {{$service_category->name}}
                                        @endif
                                    </div>
                                </td>
{{--                                <td class="text-center p-1">--}}
{{--                                    <div class="table-os">{{\App\Models\ServiceCategory::statusList($service_category->status)}}</div>--}}
{{--                                </td>--}}
                                <td class="text-center p-1">
                                    <div class="table-os">

                                        @if(auth()->user()->can('services categories edit') )
                                            <a class="btn btn-sm mx-1 btn-success {{$service_category->status == 1 ? 'disabled' : ''}}"
                                               href="#"
                                               wire:click.prevent="Status({{$service_category->id}})"
                                               data-bs-toggle="modal" data-bs-target="#activeModal"
                                               title="{{__("Active")}}"><i class="fa fa-check"></i>
                                            </a>

                                            <a class="btn btn-sm mx-1 btn-danger {{$service_category->status == 0 ? 'disabled' : ''}}"
                                               href="#"
                                               wire:click.prevent="Status({{$service_category->id}})"
                                               data-bs-toggle="modal" data-bs-target="#inactiveModal"
                                               title="{{__("Inactive")}}"><i class="fa fa fa-ban"></i>
                                            </a>
                                            <a class="btn btn-sm mx-1 btn-primary" href="#"
                                               wire:click.prevent="editServiceCategory({{$service_category->id}})"
                                               data-bs-toggle="modal" data-bs-target="#EditServiceCategory">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endif
                                        @if(auth()->user()->can('services categories delete') )
                                            <a class="btn btn-sm mx-1 btn-danger" href="#"
                                               wire:click.prevent="delete_id({{$service_category->id}})"
                                               data-bs-toggle="modal" data-bs-target="#deleteModalServiceCategory">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        @endif

                                        <a class="btn btn-sm mx-1 btn-danger" href="{{ url('admin/service-properities/'.$service_category->id) }}">
                                            <i class="fa-solid fa fa-angellist"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
{{--                    <div class="pt-2">--}}
{{--                        {{$service_categories->links()}}--}}
{{--                    </div>--}}
                @else
                    <div class="text-center e404 py-3">
                        <img width="170" class="img-fluid mb-3" src="{{asset('dashboard/images/error.png')}}" alt="">
                        <h4 class="text-danger ">{{__("Empty list")}}</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if(auth()->user()->can('services categories create') )
        <!--  Modal CreateServiceCategory -->
        <div class="modal fade" wire:ignore.self id="CreateServiceCategory" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content px-3 bg-light rounded-4">
                    <div class="modal-header border-0 py-0">
                        <span></span>
                        <button type="button" class="close btn ms-0"
                                data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                        </button>
                    </div>
                    <div class="text-center text-primary border-bottom">
                        <h5 class="" id="exampleModalLabel">{{__("Create Service Category")}}</h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{__("Loading please wait")}} ...
                        </div>
                    </div>
                    @if($create_service_category_id)
                        @livewire('admin.service-categories.create-service-category',[$create_service_category_id])
                    @endif

                </div>
            </div>
        </div>
        <!--  Modal CreateServiceCategory -->
    @endif

    @if(auth()->user()->can('services categories edit') )
        <!--  Modal EditServiceCategory -->
        <div class="modal fade" wire:ignore.self id="EditServiceCategory" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content px-3 bg-light rounded-4">
                    <div class="modal-header border-0 py-0">
                        <span></span>
                        <button type="button" class="close btn ms-0"
                                data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                        </button>
                    </div>
                    <div class="text-center text-primary border-bottom">
                        <h5 class="" id="exampleModalLabel">{{__("Edit Service Category")}}</h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{__("Loading please wait")}} ...
                        </div>
                    </div>

                    @if($edit_service_category_id)
                        @livewire('admin.service-categories.edit-service-category',[$edit_service_category_id])
                    @endif

                </div>
            </div>
        </div>
        <!--  Modal EditServiceCategory -->

        <!-- Modal activeModal -->
        <div wire:ignore.self class="modal fade" id="activeModal" tabindex="-1" role="dialog"
             aria-labelledby="activeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="activeModalLabel">{{__("Active Confirm")}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true close-btn"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{__("Are you sure want to Active ?")}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger close-btn"
                                data-bs-dismiss="modal">{{__("Close")}}</button>
                        <button type="button" wire:click.prevent="active()" class="btn btn-success close-modal"
                                data-bs-dismiss="modal">{{__("Yes, Active")}}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal activeModal -->

        <!-- Modal inactiveModal -->
        <div wire:ignore.self class="modal fade" id="inactiveModal" tabindex="-1" role="dialog"
             aria-labelledby="inactiveModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inactiveModalLabel">{{__("InActive Confirm")}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true close-btn"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{__("Are you sure want to InActive ?")}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn"
                                data-bs-dismiss="modal">{{__("Close")}}</button>
                        <button type="button" wire:click.prevent="inactive()" class="btn btn-danger close-modal"
                                data-bs-dismiss="modal">{{__("Yes, InActive")}}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal inactiveModal -->
    @endif

    @if(auth()->user()->can('services categories delete') )
        <!-- Modal deleteModalServiceCategory -->
        <div wire:ignore.self class="modal fade" id="deleteModalServiceCategory" tabindex="-1" role="dialog"
             aria-labelledby="deleteModalServiceCategoryLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalServiceCategoryLabel">{{__("Delete Confirm")}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true close-btn"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{__("Are you sure want to delete?")}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn"
                                data-bs-dismiss="modal">{{__("Close")}}</button>
                        <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal"
                                data-bs-dismiss="modal">{{__("Yes, Delete")}}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal deleteModalServiceCategory -->
    @endif
</div>
