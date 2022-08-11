@extends('layouts.admin')
@section('title', 'Danh sách đơn hàng | Admin - Graphics Tablet')
@section('content')
    <!-- Static Table Start -->
    <div class="data-table-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Danh sách đơn hàng</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control">
                                        <option value="">Xuất dữ liệu</option>
                                        <option value="all">Xuất tất cả</option>
                                        <option value="selected">Xuất theo tùy chọn</option>
                                    </select>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                       data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id">ID</th>
                                        <th data-field="name" data-editable="true">Tên khách hàng</th>
                                        <th data-field="email" data-editable="true">Email</th>
                                        <th data-field="phone" data-editable="true">Số điện thoại</th>
                                        <th data-field="address" data-editable="true">Địa chỉ</th>
                                        <th data-field="total" data-editable="true">Tổng tiền</th>
                                        <th data-field="date" data-editable="true">Ngày đặt hàng</th>
                                        <th data-field="payment" data-editable="true">Phương thức thanh toán</th>
                                        <th data-field="availability" data-editable="true">Trang thái</th>
                                        <th data-field="bill">Tạo hóa đơn</th>
                                        <th data-field="action"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="/admin/bills/add" class="pd-setting-ed">
                                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/admin/orders/detail" class="pd-setting-ed">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </a>
                                            <a href="/admin/orders/edit" class="pd-setting-ed">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>2</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="/admin/bills/add" class="pd-setting-ed">
                                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/admin/orders/detail" class="pd-setting-ed">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </a>
                                            <a href="/admin/orders/edit" class="pd-setting-ed">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>3</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="/admin/bills/add" class="pd-setting-ed">
                                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/admin/orders/detail" class="pd-setting-ed">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </a>
                                            <a href="/admin/orders/edit" class="pd-setting-ed">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>4</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="/admin/bills/add" class="pd-setting-ed">
                                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/admin/orders/detail" class="pd-setting-ed">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </a>
                                            <a href="/admin/orders/edit" class="pd-setting-ed">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>5</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="/admin/bills/add" class="pd-setting-ed">
                                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/admin/orders/detail" class="pd-setting-ed">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </a>
                                            <a href="/admin/orders/edit" class="pd-setting-ed">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>6</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="/admin/bills/add" class="pd-setting-ed">
                                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/admin/orders/detail" class="pd-setting-ed">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </a>
                                            <a href="/admin/orders/edit" class="pd-setting-ed">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>7</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="/admin/bills/add" class="pd-setting-ed">
                                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/admin/orders/detail" class="pd-setting-ed">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </a>
                                            <a href="/admin/orders/edit" class="pd-setting-ed">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>8</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="/admin/bills/add" class="pd-setting-ed">
                                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/admin/orders/detail" class="pd-setting-ed">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </a>
                                            <a href="/admin/orders/edit" class="pd-setting-ed">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>9</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="/admin/bills/add" class="pd-setting-ed">
                                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/admin/orders/detail" class="pd-setting-ed">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </a>
                                            <a href="/admin/orders/edit" class="pd-setting-ed">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>10</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="/admin/bills/add" class="pd-setting-ed">
                                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/admin/orders/detail" class="pd-setting-ed">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </a>
                                            <a href="/admin/orders/edit" class="pd-setting-ed">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>11</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="/admin/bills/add" class="pd-setting-ed">
                                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/admin/orders/detail" class="pd-setting-ed">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </a>
                                            <a href="/admin/orders/edit" class="pd-setting-ed">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>12</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="/admin/bills/add" class="pd-setting-ed">
                                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/admin/orders/detail" class="pd-setting-ed">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </a>
                                            <a href="/admin/orders/edit" class="pd-setting-ed">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="" class="pd-setting-ed">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Static Table End -->
@stop
