@extends('admin::layouts.master')
@section('content')
<form action="" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Tên danh mục</label>
      <input type="text" class="form-control" placeholder="Tên danh mục" value="{{old('name',isset($category->c_name)? $category->c_name : '')}}" name="name">
      @if($errors->has('name'))
        <span class="error-text">
          {{$errors->first('name')}}
        </span>
        @endif
    </div>
    <div class="form-group">
        <label for="name">Thuộc danh mục cha: </label>
        <select name="c_parent" id="">
            <option value="0">---DANH MỤC CHA---</option>
            <!-- Hiển thị danh sách các danh mục cha -->
            @foreach($categories as $cat)
                <!-- Kiểm tra xem danh mục cha có phải là danh mục đang được chỉnh sửa không -->
                @if($category && $category->id == $cat->id)
                    <option value="{{$cat->id}}" selected>{{$cat->c_name}}</option>
                @else
                    <option value="{{$cat->id}}">{{$cat->c_name}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox">Nổi bật
            </label>
        </div>
    </div>
    
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
  </form>
  @stop