@extends('webmaster.layout.master')

@section('breadcrumb')
    @parent

    <li class="breadcrumb-item active"><a href="#">تیکت ها</a></li>
@endsection

@section('title')


@endsection

@section('styles')


@endsection

@section('scripts')
    <script src="{{ asset('/webmaster/js/scripts/ui/data-list-view.js') }}"></script>
    <script src="{{ asset('/webmaster/vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('/webmaster/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/webmaster/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('/webmaster/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/webmaster/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('/webmaster/vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('/webmaster/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
@endsection

@section('content')
    <!-- Data list view starts -->
    <section id="data-thumb-view" class="data-thumb-view-header">
        <div class="action-btns d-none">
            <div class="btn-dropdown mr-1 mb-1">
                <div class="btn-group dropdown actions-dropodown">
                    <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        عملیات ها
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>حذف</a>
                        <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>آرشیو کردن</a>
                        <a class="dropdown-item" href="#"><i class="feather icon-file"></i>پرینت</a>
                        <a class="dropdown-item" href="#"><i class="feather icon-save"></i>خروجی اکسل</a>
                        <a class="dropdown-item" href="#"><i class="feather icon-save"></i>خروجی CSV</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- dataTable starts -->
        <div class="table-responsive">
            <table class="table data-thumb-view">
                <thead>
                    <tr>
                        <th></th>
                        <th>ردیف</th>
                        <th>کاربر ثبت کننده</th>
                        <th>عنوان</th>
                        <th>بخش</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td></td>
                            <td>{{ $loop->iteration }}</td>
                            <td class="product-name">{{ $ticket->user->full_name }}</td>
                            <td class="product-category">{{ $ticket->title }}</td>
                            <td class="product-category">{{ $ticket->subject->title }}</td>
                            <td>
                                @if ($ticket->active)
                                    <div class="chip chip-primary">
                                        <div class="chip-body">
                                            <div class="chip-text">فعال</div>
                                        </div>
                                    </div>
                                @else
                                    <div class="chip chip-danger">
                                        <div class="chip-body">
                                            <div class="chip-text">غیر فعال</div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                            <td class="product-action">
                                <a href="{{ route('webmaster.tickets.edit', $ticket->id) }}">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                </a>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- dataTable ends -->
    </section>
    <!-- Data list view end -->
@endsection