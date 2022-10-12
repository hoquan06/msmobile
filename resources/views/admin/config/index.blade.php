@extends('admin.master')
@section('title')
    <h3>Quản Lý Cấu hình</h3>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="height: auto">
                <div class="card-content collapse show">
                    <div class="card-body">
                        <form action="/admin/cau-hinh" method="post">
                            @csrf

                            @for($i = 1; $i < 6; $i++)
                            @php
                                $name = 'slide_' . $i;
                            @endphp
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label>Silde {{ $i }}</label>
                                        <div class="input-group">
                                            <input id="anh_dai_dien_{{$name}}" name="{{$name}}" class="form-control" type="text" value="{{ (isset($config->$name) && Str::length($config->$name) > 0) ? $config->$name : ''}}">
                                            <input type="button" class="btn-info lfm" data-input="anh_dai_dien_{{$name}}" data-preview="holder_{{$name}}" value="Upload">
                                        </div>
                                        <img id="holder_{{$name}}" style="margin-top:15px;max-height:100px;" src="{{ (isset($config->$name) && Str::length($config->$name) > 0) ? $config->$name : ''}}">
                                    </div>
                                </div>
                            </div>
                            @endfor

                            <div class="form-actions right">
                                <button type="submit" class="btn btn-primary">
                                    Cập Nhật Cấu Hình
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('.lfm').filemanager('image');
    </script>
@endsection
