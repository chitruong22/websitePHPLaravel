@extends('layouts.admin')
@section('title', 'Loại sản phẩm | Admin - Graphics Tablet')
@section('content')
<!-- Static Table Start -->
<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Danh sách loại sản phẩm</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div class="add-product">
                                <a href="/admin/categories/create">Thêm mới</a>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                   data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                <tr>
                                    <th data-field="state" data-checkbox="true"></th>
                                    <th data-field="id">ID</th>
                                    <th data-field="name" data-editable="true">Tên loại</th>
                                    <th data-field="action"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $cat)
                                <tr>
                                    <td></td>
                                    <td>{{ $cat->id }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td>
                                        <a href="/admin/categories/edit/{{ $cat->id }}" class="btn btn-success">
                                            <i class="fa fa-pencil-square-o text-white" aria-hidden="true"></i>
                                        </a>
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#deletePopup" onclick="setEventId(<?=$cat->id?>)">
                                            <i class="fa fa-trash-o text-white" aria-hidden="true"></i>
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                            <form class="modal-dialog" role="document" action="/admin/categories/delete" method="post">
                                                {{ csrf_field() }}
                                                <div class="modal-content">
                                                    <div class="modal-body" style="border-bottom: 1px solid #e5e5e5;">
                                                       <h4 style="color: red">Bạn có chắn chắn muốn xóa!</h4>
                                                    </div>
                                                    <div class="modal-footer row" style="border: none !important;">
                                                        <div class="col-sm-6 text-left" >
                                                            <label>
                                                                <input type="checkbox" value="1" name="destroy"> Xóa khỏi thùng rác
                                                                <input type="hidden" value="" name="id" id="id">
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                            <button type="submit" class="btn btn-primary">Tiếp tục</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
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
