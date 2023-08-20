<div>
    <div class="container-fluid py-3">
{{--        @include('layouts.admins.alert')--}}
        <div class="main h-100">
            <h2 class="text-primary">{{__('Reservations')}}</h2>
            <div class="row g-0 mb-3">
                <div class="col-md-3 align-self-end">
                    <div class="d-inline">
                        {{--                        @if(auth()->user()->can('reservations create') )--}}
                        {{--                            <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#CreateReservation"--}}
                        {{--                               wire:click.prevent="CreateReservation" data-bs-original-title="" title=""><i--}}
                        {{--                                    class="fa-solid fa-user-plus pe-1"></i> اضافة حجز  </a>--}}
                        {{--                        @endif--}}
                    </div>
                </div>
                <div class="col-md-9">
                    <form class="row g-1 justify-content-end" wire:submit.prevent="search">

                        <div class="col-md-3 col-sm-7">
                            <label class="text-primary mb-1" for="UserName">اسم المستخدم</label>
                            <input type="text" class="form-control border-primary" wire:model.defer="name"
                                   placeholder="ابحث "
                                   id="UserName">
                        </div>

                        <div class="col-md-3 col-sm-7">
                            <label class="text-primary mb-1" for="Notes">ملاحظات</label>
                            <input type="text" class="form-control border-primary" wire:model.defer="notes"
                                   placeholder="ابحث "
                                   id="Notes">
                        </div>

                        <div class="col-md-3 col-sm-7">
                            <label class="text-primary mb-1" for="Date">التاريخ</label>
                            <input type="date" class="form-control border-primary" wire:model.defer="date_start"
                                   placeholder="ابحث "
                                   id="Date">
                        </div>

                        {{--                        <div class="col-md-2 col-sm-3 col-5">--}}
                        {{--                            <label for="StartDate" class="text-primary mb-1">تاريخ البداية</label>--}}
                        {{--                            <input type="date" class="form-control border-primary pointer"--}}
                        {{--                                   id="StartDate">--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-md-2 col-sm-3 col-5">--}}
                        {{--                            <label for="endDate" class="text-primary mb-1">تاريخ النهاية</label>--}}
                        {{--                            <input type="date" class="form-control border-primary pointer"--}}
                        {{--                                   id="endDate">--}}
                        {{--                        </div>--}}

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
                @if($reservations->count() > 0)
                    <table class="table table-borderless mb-md-5">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">#</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">اسم المستخدم</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">اسم العقار</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">سعر العقار</div>
                            </th>
                            <th scope="col" class="text-center p-1 col-end-2">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">تاريخ الحجز</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">وقت الحجز</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">حالة الحجز</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">التحكم</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                           @foreach($reservations as $key => $reservation)
                            <tr>
                                <td class="text-center p-1">
                                    <div class="table-os">{{ $key + $reservations->firstItem() }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div
                                        class="table-os">{{$reservation->user ? $reservation->user->name : 'لا يوجد'}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div
                                        class="table-os">{{$reservation->product ? $reservation->product->name : ''}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div
                                        class="table-os">{{$reservation->product ? $reservation->product->price1 : ''}}</div>
                                </td>
                                @if($reservation->date_reservation)
                                    <td class="text-center p-1">
                                        <div class="table-os">{{$reservation->date_reservation}}</div>
                                    </td>

                                @else
                                    <td class="text-center p-1">
                                        <div class="table-os">{{$reservation->date_start}}</div>
                                    </td>
                                    <td class="text-center p-1">
                                        <div class="table-os">{{$reservation->date_end}}</div>
                                    </td>
                                @endif
                                <td class="text-center p-1">
                                    <div class="table-os">{{$reservation->time_start}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$reservation->time_end}}</div>
                                </td>

                                <td class="text-center p-1">
                                    <div class="table-os">
                                        @if($reservation->status == 0)
                                            معلقة
                                        @elseif($reservation->status == 1)
                                            مؤكد
                                        @else
                                            ملغية
                                        @endif
                                    </div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">

                                        {{--   @if(auth()->user()->can('reservations show') )--}}
                                        {{-- <a href="{{route('admin.reservations.show',$reservation->id)}}"--}}
                                        {{--       class="btn btn-sm mx-1 btn-primary">--}}
                                        {{--         <i class="fa-solid fa-eye"></i>--}}
                                        {{--           </a>--}}
                                        {{--          @endif--}}

                                        {{-- <a class="btn btn-sm mx-1 btn-success {{$reservation->status == 1 ? 'disabled' : ''}}"
                                           href="#"
                                           wire:click.prevent="Status({{$reservation->id}})"
                                           data-bs-toggle="modal" data-bs-target="#activeModal"
                                           title="{{__("Active")}}"><i class="fa fa-check"></i>
                                        </a>

                                        <a class="btn btn-sm mx-1 btn-danger {{$reservation->status == 0 ? 'disabled' : ''}}"
                                           href="#"
                                           wire:click.prevent="Status({{$reservation->id}})"
                                           data-bs-toggle="modal" data-bs-target="#inactiveModal"
                                           title="{{__("Inactive")}}"><i class="fa fa fa-ban"></i>
                                        </a> --}}

                                        {{-- <a class="btn btn-sm mx-1 btn-info text-white border-end" href="#"
                                           wire:click.prevent="EditReservation({{$reservation->id}})"
                                           data-bs-toggle="modal" data-bs-target="#EditReservation">
                                            <i class="fa-solid fa-pen"></i>
                                        </a> --}}
                                        <a class="btn btn-sm mx-1 btn-danger" href="#"
                                           wire:click.prevent="deleteId({{$reservation->id}})"
                                           data-bs-toggle="modal" data-bs-target="#deleteModalReservation">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pt-2">
                        {{$reservations->links()}}
                    </div>
                @else
                    <div class="text-center e404 py-3">
                        <img width="400" class="img-fluid mb-3" src="{{asset('dashboard/images/error.png')}}" alt="">
                        <h4>{{__("Empty list")}}</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if(auth()->user()->can('reservations create') )
        <!--  Modal CreateReservation -->
        <div class="modal fade" wire:ignore.self id="CreateReservation" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content px-3 bg-light rounded-4">
                    <div class="modal-header border-0 py-0">
                        <span></span>
                        <button type="button" class="close btn ms-0"
                                data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                        </button>
                    </div>
                    <div class="text-center text-primary border-bottom">
                        <h5 class="" id="exampleModalLabel">اضافة حجز </h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{__("Loading please wait")}} ...
                        </div>
                    </div>
{{--                    @if($create_reservation)--}}
{{--                        @livewire('admin.reservations.reservations-create',[$reservation_id])--}}
{{--                    @endif--}}
                </div>
            </div>
        </div>
        <!--  Modal CreateReservation -->
    @endif

    @if(auth()->user()->can('reservations edit') )
        <!--  Modal EditReservation -->
        <div class="modal fade" wire:ignore.self id="EditReservation" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content px-3 bg-light rounded-4">
                    <div class="modal-header border-0 py-0">
                        <span></span>
                        <button type="button" class="close btn ms-0"
                                data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                        </button>
                    </div>
                    <div class="text-center text-primary border-bottom">
                        <h5 class="" id="exampleModalLabel">تعديل الحجز </h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{__("Loading please wait")}} ...
                        </div>
                    </div>
{{--                    @if($reservation_id)--}}
{{--                        @livewire('admin.reservations.reservations-edit',[$reservation_id])--}}
{{--                    @endif--}}
                </div>
            </div>
        </div>
        <!--  Modal EditReservation -->
    @endif

    <!-- Modal activeModal -->
    <div wire:ignore.self class="modal fade" id="activeModal" tabindex="-1" role="dialog"
         aria-labelledby="activeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="activeModalLabel"> تاكيد الحجز</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>هل تريد تاكيد الحجز</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger close-btn"
                            data-bs-dismiss="modal">{{__("Close")}}</button>
                    <button type="button" wire:click.prevent="active()" class="btn btn-success close-modal"
                            data-bs-dismiss="modal">{{__("نعم, تأكيد")}}</button>
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
                    <h5 class="modal-title" id="inactiveModalLabel">الغاء الحجز</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>هل تريد الغاء الحجز</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn"
                            data-bs-dismiss="modal">{{__("Close")}}</button>
                    <button type="button" wire:click.prevent="inactive()" class="btn btn-danger close-modal"
                            data-bs-dismiss="modal">{{__("نعم, الغاء")}}</button>
                </div>
            </div>
        </div>
    </div>

    @if(auth()->user()->can('reservations delete') )
        <!-- Modal deleteModalReservation -->
        <div wire:ignore.self class="modal fade" id="deleteModalReservation" tabindex="-1" role="dialog"
             aria-labelledby="deleteModalReservationLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalReservationLabel">{{__("Delete Confirm")}}</h5>
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
        <!-- Modal deleteModalReservation -->
    @endif

</div>
