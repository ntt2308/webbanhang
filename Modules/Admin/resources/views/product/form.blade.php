<form action="" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label for="pro_name">Tên sản phẩm</label>
                <input type="text" class="form-control" placeholder="Tên sản phẩm"
                    value="{{ old('pro_name', isset($product->pro_name) ? $product->pro_name : '') }}" name="pro_name">
                @if ($errors->has('pro_name'))
                    <span class="error-text">
                        {{ $errors->first('pro_name') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Mô tả ngắn</label>
                <textarea name="pro_description" class="form-control" id="ckeditor" cols="30" rows="3"
                    placeholder="Mô tả ngắn" value="">{{ old('pro_description', isset($product->pro_description) ? $product->pro_description : '') }}</textarea>
                @if ($errors->has('pro_name'))
                    <span class="error-text">
                        {{ $errors->first('pro_name') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Mô tả sản phẩm</label>
                <textarea name="pro_content" class="form-control" id="ckeditor" cols="30" rows="3"
                    placeholder="Mô tả sản phẩm" value="">{{ old('pro_content', isset($product->pro_content) ? $product->pro_content : '') }}</textarea>
                @if ($errors->has('pro_name'))
                    <span class="error-text">
                        {{ $errors->first('pro_name') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="name">Loại Sản Phẩm</label>
                <select name="pro_category_id" id="" class="form-control">
                    <option value="">---Chọn Loại Sản Phẩm---</option>
                    @if (isset($product))
                        @foreach ($categorys as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $product->pro_category_id ? 'selected' : '' }}>
                                {{ $category->c_name }}
                            </option>
                        @endforeach
                    @else
                        @if (isset($categorys))
                            @foreach ($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->c_name }}</option>
                            @endforeach
                        @endif
                    @endif
                </select>
                @if ($errors->has('pro_category_id'))
                    <span class="error-text">
                        {{ $errors->first('pro_category_id') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="pro_price">Giá Sản Phẩm</label>
                <input type="number" placeholder="Giá sản phẩm" class="form-control" name="pro_price"
                    value="{{ old('pro_price', isset($product->pro_price) ? $product->pro_price : '') }}">
                @if ($errors->has('pro_price'))
                    <span class="error-text">
                        {{ $errors->first('pro_price') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Giá khuyến mãi</label>
                <input type="number" placeholder="Giảm giá %" class="form-control" name="pro_sale" 
                value="{{ old('pro_sale', isset($product->pro_sale) ? $product->pro_sale : '') }}">
            </div>
            <div class="form-group">
                <label for="name">Số lượng</label>
                <input type="number" placeholder="Nhập số lượng" class="form-control" name="quantity" 
                value="{{ old('quantity', isset($product->quantity) ? $product->quantity : '') }}">
            </div>
            
            {{-- <div class="form-group">
          <label for="pro_image">Hinh anh</label>
          <input type="file" placeholder="hinh anh" class="form-control" name="pro_image" value="0">
        </div> --}}
            <div class="form-group">
                <label for="name">Hình ảnh</label>
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" id="lfm" data-input="thumbnail" data-preview="holder"
                            class="btn btn-primary">Thêm ảnh</button>
                    </div>
                    <input type="text" class="form-control" id="thumbnail" name="pro_image"
                        value="{{ old('pro_image', isset($product->pro_image) ? $product->pro_image : '') }}" required>
                    @error('pro_image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="">Ảnh chi tiết</label>
                <input type="file" class="form-control" id="img_detail" name="img_detail[]" multiple="">
            </div>
            <div class="form-group" id="holder">
                <img id="holder"
                    style="width: 100%;
                height: 100%;
                object-fit: contain;"
                    src="{{ old('pro_image', isset($product->pro_image) ? $product->pro_image : '') }}"
                    alt="Selected Image">
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="pro_hot">Nổi bật
                    </label>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="/vendor/laravel-filemanager/js/filemanager.min.js"></script>

    <script src="{{ asset('/js/plugins/jquery-ui-1.13.2/jquery-ui.min.js') }}"></script>
    <script>
        var route_prefix = "/laravel-filemanager";
        $('#lfm').filemanager('image', {
            prefix: route_prefix,
        });
    </script>

    <!-- CKEditor init -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
        $('textarea[id=ckeditor]').ckeditor({
            height: 100,
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{ csrf_token() }}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{ csrf_token() }}'
        });
    </script>
@endsection
