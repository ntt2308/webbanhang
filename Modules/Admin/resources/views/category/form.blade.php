{{-- <form action="" method="POST">
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
        <label for="name">Icon:<</label>
        <input type="text" class="form-control" placeholder="fa fa-home" value="{{old('icon',isset($category->c_icon)? $category->c_icon: '')}}" name="icon">
        @if($errors->has('icon'))
        <span class="error-text">
          {{$errors->first('icon')}}
        </span>
        @endif
      </div>
      <div class="form-group">
        <label for="name">Thuộc danh mục cha: </label>
        <select name="c_parent" id="">
          <option value="0">---DANH MỤC CHA---</option>
        @foreach($categorys as $key=>$val)
          <option value="{{$val->id}}">{{$val->c_name}}</option>
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
  </form> --}}