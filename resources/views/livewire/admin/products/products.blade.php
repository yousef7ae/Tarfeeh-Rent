<div>
    <div class="container-fluid py-3">
{{--        @include('layouts.admins.alert')--}}
        <div class="main h-100">
            <h2 class="text-primary">{{__("Products")}}</h2>
            <div class="row g-0 mb-3">
                <div class="col-md-3 align-self-end">
                    <div class="d-inline">
                        @if(auth()->user()->can('products create') )
                            <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#CreateProduct"
                               wire:click.prevent="createProduct" data-bs-original-title="" title=""><i
                                    class="fa-solid fa-user-plus pe-1"></i> {{__("Create Product")}} </a>
                        @endif
                    </div>
                </div>
                <div class="col-md-9">
                    <form class="row g-1 justify-content-end" wire:submit.prevent="search">

                        <div class="col-md-4 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__("Name")}}</label>
                            <input type="text" class="form-control border-primary" wire:model.live="name"
                                   placeholder="ابحث "
                                   id="PatientName">
                        </div>

                        <div class="col-md-4 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__("Description")}}</label>
                            <input type="text" class="form-control border-primary" wire:model.live="description"
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
                @if($products->count() > 0)
                    <table class="table table-borderless mb-md-5">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">#</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("مالك العقار")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Name")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Service")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("العنوان")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("الحجز من ")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("الحجز الى ")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("السعر الاول ")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("url video")}}</div>
                            </th>

                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("time expiry")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("تميز ")}}</div>
                            </th>

                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("رقم هاتف المؤجر")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("الايام المتاحة للايجار")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Status")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{ __('Control') }}</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $product)
                            <tr>
                                <td class="text-center p-1">
                                    <div class="table-os">{{ $loop->iteration }}</div>
                                </td>

                                <td class="text-center p-1">
                                    <div class="table-os">{{ $product->user->name }}</div>
                                </td>

                                <td class="text-center p-1">
                                    <div class="table-os">
                                        @if (!empty($product->image))
                                            <a class="text-decoration-none text-dark"
                                               href="{{ $product->image ? $product->image : url('dashboard/images/image1.png')}}"
                                               data-fancybox="gallery-{{$product->id}}"
                                               data-caption="{{$product->name}}">
                                                <img src="{{ asset('dashboard/images/image-loge.svg') }}" class="pe-1"
                                                     data-holder-rendered="true">
                                                {{$product->name}}
                                            </a>
                                        @else
                                            {{$product->name}}
                                        @endif
                                    </div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$product->service ? $product->service->name : ''}}</div>
                                </td>

                                <td class="text-center p-1">
                                    <div class="table-os">{{$product->address }}</div>
                                </td>

                                <td class="text-center p-1">
                                    <div class="table-os">{{$product->from_date }}</div>
                                </td>

                                <td class="text-center p-1">
                                    <div class="table-os">{{$product->date_expire }}</div>
                                </td>

                                <td class="text-center p-1">
                                    <div class="table-os">{{$product->price1 }}</div>
                                </td>

                                <td class="text-center p-1">
                                    <div class="table-os">
                                        @if (!empty($product->url_video))
                                            <a class="text-decoration-none text-dark"
                                               href="{{ $product->url_video ? $product->url_video : url('dashboard/images/image1.png')}}"
                                               data-fancybox="gallery-{{$product->id}}"
                                               data-caption="{{$product->name}}">
                                                <img src="{{ asset('dashboard/images/play.png') }}" width="30"
                                                     class="pe-1"
                                                     data-holder-rendered="true">
                                            </a>
                                        @else
                                            فارغ
                                        @endif
                                    </div>
                                </td>

                                <td class="text-center p-1">
                                    <div class="table-os">
                                        @if($product->time_expiry <= Carbon\Carbon::now() and $product->created_at >= Carbon\Carbon::now())
                                            {{ __('Underway') }}
                                        @elseif($product->time_expiry > Carbon\Carbon::now())
                                            <span
                                                class="btn btn-success btn-sm">{{ \Carbon\Carbon::parse($product->time_expiry)->diffForHumans() }}</span>
                                        @else
                                            <span class="btn btn-danger btn-sm">{{ __('Finished') }}</span>
                                        @endif
                                    </div>
                                </td>

                                <td class="text-center p-1">
                                    <div class="table-os">
                                        <span
                                            class="btn btn-success btn-sm">
                                             @if($product->Important == 0)
                                                غير متميز
                                            @else
                                                متميز
                                            @endif
                                        </span>
                                    </div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$product->user->mobile ?? '' }}</div>
                                </td>

                                <td class="text-center p-1">
                                    <div class="table-os">{{$product->reservation_counter}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{\App\Models\Product::statusList($product->status)}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">

                                        @if(auth()->user()->can('products edit') )
                                            <a class="btn btn-sm mx-1 btn-success {{$product->status == 1 ? 'disabled' : ''}}"
                                               href="#"
                                               wire:click.prevent="Status({{$product->id}})"
                                               data-bs-toggle="modal" data-bs-target="#activeModal"
                                               title="{{__("Active")}}"><i class="fa fa-check"></i>
                                            </a>

                                            <a class="btn btn-sm mx-1 btn-danger {{$product->status == 0 ? 'disabled' : ''}}"
                                               href="#"
                                               wire:click.prevent="Status({{$product->id}})"
                                               data-bs-toggle="modal" data-bs-target="#inactiveModal"
                                               title="{{__("Inactive")}}"><i class="fa fa fa-ban"></i>
                                            </a>
                                            <a class="btn btn-sm mx-1 btn-primary" href="#"
                                               wire:click.prevent="editProduct({{$product->id}})"
                                               data-bs-toggle="modal" data-bs-target="#EditProduct">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a class="btn btn-sm mx-1 btn-danger" href="#"
                                               data-bs-toggle="modal" data-bs-target="#createprop{{$product->id}}">
                                                <i class="fa-solid fa fa-angellist"></i>
                                            </a>
                                        @endif
                                        @if(auth()->user()->can('products delete') )
                                            <a class="btn btn-sm mx-1 btn-danger" href="#"
                                               wire:click.prevent="deleteProduct({{$product->id}})"
                                               data-bs-toggle="modal" data-bs-target="#deleteModalProduct">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>

{{--                            <div class="modal fade" id="createprop{{$product->id}}" tabindex="-1" role="dialog"--}}
{{--                                 aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-lg" role="document">--}}
{{--                                    <div class="modal-content px-3 bg-light rounded-4">--}}
{{--                                        <div class="modal-header border-0 py-0">--}}
{{--                                            <span></span>--}}
{{--                                            <button type="button" class="close btn ms-0"--}}
{{--                                                    data-bs-dismiss="modal" aria-label="Close">--}}
{{--                                                <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <div class="text-center text-primary border-bottom">--}}
{{--                                            <h5 class="" id="exampleModalLabel">{{__(" خصائص المنتج")}}</h5>--}}
{{--                                        </div>--}}

{{--                                        @php--}}
{{--                                            $service_category_id = $product->service->service_category_id;--}}
{{--                                            $properities = DB::table('properities')->where('service_categories_id',$service_category_id)->get();--}}
{{--                                        @endphp--}}

{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-12">--}}
{{--                                                <div class="row">--}}
{{--                                                    <form action="{{ url('admin/savedescription') }}" method="post">--}}
{{--                                                        @csrf--}}
{{--                                                        @foreach ($properities as $properitie)--}}

{{--                                                            @php--}}
{{--                                                                $product_descriptions = DB::table('product_descriptions')->where('product_id',$product->id)->where('prop_id',$properitie->id)->first();--}}
{{--                                                            @endphp--}}

{{--                                                            <div class="row mb-2">--}}
{{--                                                                <div class="col-md-5">--}}
{{--                                                                    <div class="form-group mb-0">--}}
{{--                                                                        <input type="hidden"--}}
{{--                                                                               value="{{ $properitie->id }}"--}}
{{--                                                                               name="prop_id[]">--}}

{{--                                                                        <input type="hidden" value="{{ $product->id }}"--}}
{{--                                                                               name="product_id">--}}

{{--                                                                        <label--}}
{{--                                                                            class="control-label"> {{ __('name') }} </label>--}}
{{--                                                                        <input value="{{ $properitie->name }}"--}}
{{--                                                                               name="name[]"--}}
{{--                                                                               class="form-control" type="text"--}}
{{--                                                                               readonly>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="col-md-5">--}}
{{--                                                                    <div class="form-group mb-0">--}}
{{--                                                                        <label--}}
{{--                                                                            class="control-label"> {{ __('Number') }} </label>--}}

{{--                                                                        <select class="form-control " name="number[]">--}}
{{--                                                                            @if($properitie->from_one_to_ten_or_one_thousand_to_five_thousand==1)--}}
{{--                                                                                @if($product_descriptions != null)--}}
{{--                                                                                    <option--}}
{{--                                                                                        value="{{ $product_descriptions->number }}">{{ $product_descriptions->number }}</option>--}}
{{--                                                                                @else--}}

{{--                                                                                    <option value="">اختر</option>--}}
{{--                                                                                @endif--}}

{{--                                                                                <option value="1">1</option>--}}
{{--                                                                                <option value="2">2</option>--}}
{{--                                                                                <option value="3">3</option>--}}
{{--                                                                                <option value="4">4</option>--}}
{{--                                                                                <option value="5">5</option>--}}
{{--                                                                                <option value="6">6</option>--}}
{{--                                                                                <option value="7">7</option>--}}
{{--                                                                                <option value="8">8</option>--}}
{{--                                                                                <option value="9">9</option>--}}
{{--                                                                                <option value="10">10</option>--}}
{{--                                                                            @endif--}}

{{--                                                                            @if($properitie->from_one_to_ten_or_one_thousand_to_five_thousand==2)--}}
{{--                                                                                @if($product_descriptions != null)--}}
{{--                                                                                    <option--}}
{{--                                                                                        value="{{ $product_descriptions->number }}">{{ $product_descriptions->number }}</option>--}}
{{--                                                                                @else--}}
{{--                                                                                    <option value="">اختر</option>--}}
{{--                                                                                @endif--}}

{{--                                                                                <option value="100">100</option>--}}
{{--                                                                                <option value="1500">500</option>--}}
{{--                                                                                <option value="1500">1000</option>--}}
{{--                                                                                <option value="1500">1500</option>--}}
{{--                                                                                <option value="2000">2000</option>--}}
{{--                                                                                <option value="2500">2500</option>--}}
{{--                                                                                <option value="3000">3000</option>--}}
{{--                                                                                <option value="3500">3500</option>--}}
{{--                                                                                <option value="4000">4000</option>--}}
{{--                                                                                <option value="4500">4500</option>--}}
{{--                                                                                <option value="5000">5000</option>--}}

{{--                                                                            @endif--}}
{{--                                                                        </select>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        @endforeach--}}

{{--                                                        <div class="modal-footer justify-content-center mt-2">--}}
{{--                                                            <button wire:loading.attr="disabled"--}}
{{--                                                                    class="btn btn-info mx-4"--}}
{{--                                                                    type="submit">{{__("حفظ")}}</button>--}}
{{--                                                            <button type="button" class="btn btn-danger close-btn"--}}
{{--                                                                    data-bs-dismiss="modal">{{__("Close")}}</button>--}}
{{--                                                        </div>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pt-2">
                        {{$products->links()}}
                    </div>
                @else
                    <div class="text-center e404 py-3">
                        <img width="170" class="img-fluid mb-3" src="{{asset('dashboard/images/error.png')}}" alt="">
                        <h4 class="text-danger ">{{__("Empty list")}}</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if(auth()->user()->can('products create') )
        <!--  Modal CreateProduct -->
        <div class="modal fade" wire:ignore.self id="CreateProduct" tabindex="-1" role="dialog"
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
                        <h5 class="" id="exampleModalLabel">{{__("Create Product")}}</h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{__("Loading please wait")}} ...
                        </div>
                    </div>
                    @if($create_product_id)
                        @livewire('admin.products.create-product',[$create_product_id])
                    @endif

                </div>
            </div>
        </div>
        <!--  Modal CreateProduct -->
    @endif

    @if(auth()->user()->can('products edit') )
        <!--  Modal EditProduct -->
        <div class="modal fade" wire:ignore.self id="EditProduct" tabindex="-1" role="dialog"
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
                        <h5 class="" id="exampleModalLabel">{{__("Edit Product")}}</h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{__("Loading please wait")}} ...
                        </div>
                    </div>

                    @if($edit_product_id)
                        @livewire('admin.products.edit-product',[$edit_product_id])
                    @endif

                </div>
            </div>
        </div>
        <!--  Modal EditProduct -->

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


                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__("reservation_counter")}}</label>
                                <input wire:model.defer="reservation_counter" placeholder="{{__("reservation_counter")}}"
                                       class="form-control @error('reservation_counter') is-invalid @enderror" type="number">
                                @error('reservation_counter')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
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
                        <button type="button" wire:click.prevent="inActive()" class="btn btn-danger close-modal"
                                data-bs-dismiss="modal">{{__("Yes, InActive")}}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal inactiveModal -->
    @endif

    @if(auth()->user()->can('products delete') )
        <!-- Modal deleteModalProduct -->
        <div wire:ignore.self class="modal fade" id="deleteModalProduct" tabindex="-1" role="dialog"
             aria-labelledby="deleteModalProductLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalProductLabel">{{__("Delete Confirm")}}</h5>
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
        <!-- Modal deleteModalProduct -->
    @endif

</div>

