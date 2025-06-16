<form action="" method="POST">
    @csrf

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="a_name">Tên bài viết</label>
                <input type="text" class="form-control" placeholder="Tên bài viết"
                    value="{{ old('a_name', isset($article->a_name) ? $article->a_name : '') }}" name="a_name">
                @if ($errors->has('a_name'))
                    <span class="error-text">
                        {{ $errors->first('a_name') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Mô tả</label>
                <textarea name="a_description" class="form-control" id="ckeditor" cols="30" rows="3"
                    placeholder="Mô tả ngắn" value="">{{ old('a_description', isset($article->a_description) ? $article->a_description : '') }}</textarea>
                @if ($errors->has('a_description'))
                    <span class="error-text">
                        {{ $errors->first('a_description') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Nội dung</label>
                <textarea name="a_content" class="form-control" id="ckeditor" cols="30" rows="3"
                    placeholder="Nội dung bài viết">{{ old('a_content', isset($article->a_content) ? $article->a_content : '') }}</textarea>
                @if ($errors->has('a_content'))
                    <span class="error-text">
                        {{ $errors->first('a_content') }}
                    </span>
                @endif
            </div>
            {{-- <div class="form-group">
                <label for="name">Meta Title</label>
                <input type="text" class="form-control" placeholder="Meta Title"
                    value="{{ old('a_title_seo', isset($article->a_title_seo) ? $article->a_title_seo : '') }}"
                    name="a_title_seo">
            </div>
            <div class="form-group">
                <label for="name">Meta description</label>
                <input type="text" class="form-control" placeholder="Meta description"
                    value="{{ old('a_description_seo', isset($article->a_description_seo) ? $article->a_description_seo : '') }}"
                    name="a_description_seo">
            </div> --}}
            <div class="form-group">
                <label for="name">Hình ảnh</label>
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" id="lfm" data-input="thumbnail" data-preview="holder"
                            class="btn btn-primary">Thêm ảnh</button>
                    </div>
                    <input type="text" class="form-control" id="thumbnail" name="a_avatar"
                        value="{{ old('a_avatar', isset($article->a_avatar) ? $article->a_avatar : '') }}" required>
                    @error('a_avatar')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group" id="holder">
                <img id="holder" style="width: 100%;
              height: 15rem;
              object-fit: contain;"
                    src="{{ old('a_avatar', isset($article->a_avatar) ? $article->a_avatar : '') }}"
                    alt="Selected Image">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="/vendor/laravel-filemanager/js/filemanager.min.js"></script>

    <script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
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
