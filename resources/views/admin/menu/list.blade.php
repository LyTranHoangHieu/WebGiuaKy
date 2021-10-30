@extends('admin.main')
@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Danh Mục</th>
                <th>Trạng Thái</th>
                <th>Cập Nhật</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helper\helper::menu($menu) !!}
        </tbody>
    </table>
@endsection
