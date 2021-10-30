@extends('admin.main')
@section('header')
    <script src="/ckeditor/ckeditor.js"></script>

@endsection
@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Tên Danh Mục</label>
                <input type="text" value="{{ $menu->name }}" class="form-control" name="name" id="name" placeholder="Tên Danh Mục">
            </div>
            <div class="form-group">
                <label>Danh Mục</label>
                <select class="form-control" name="parent_id" id="parent_id">
                    <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}>
                        Danh Mục Cha
                    </option>
                    @foreach($parents as $p)
                        <option value="{{ $p->id }}" {{ $menu->parent_id == $p->id ? 'selected' : '' }}>
                            {{ $p->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Mô Tả</label>
                <textarea class="form-control" name="description" id="description">
                    {{ $menu->description }}
                </textarea>
            </div>
            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea class="form-control" name="content" id="content">
                    {{ $menu->content }}
                </textarea>
            </div>
            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active"
                           name="status" {{ $menu->status == 1 ? ' checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="inactive"
                           name="status" {{ $menu->status == 0 ? ' checked=""' : '' }}>
                    <label for="inactive" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
        </div>
        @csrf
    </form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
