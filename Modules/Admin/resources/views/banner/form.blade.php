<form action="" method="POST">
    @csrf

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="b_name">Tên Banner</label>
                <input type="text" class="form-control" placeholder="Tên banner"
                    value="{{ old('b_name', isset($banner->b_name) ? $banner->b_name : '') }}" name="b_name">
                @if ($errors->has('b_name'))
                    <span class="error-text">
                        {{ $errors->first('b_name') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Hình ảnh</label>
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" id="lfm" data-input="thumbnail" data-preview="holder"
                            class="btn btn-primary">Thêm ảnh</button>
                    </div>
                    <input type="text" class="form-control" id="thumbnail" name="b_image"
                        value="{{ old('b_image', isset($banner->b_image) ? $banner->b_image : '') }}" required>
                    @error('b_banner')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group" id="holder">
                <img id="holder" style="width: 100%;
              height: 15rem;
              object-fit: contain;"
                    src="{{ old('b_banner', isset($banner->b_image) ? $banner->b_image : '') }}"
                    alt="Selected Image">
            </div>
            <div class="form-group">
                <label for="b_discount">Banner Discount</label>
                <input type="text" class="form-control" placeholder="banner discount"
                    value="{{ old('b_discount', isset($banner->b_discount) ? $banner->b_discount : '') }}" name="b_discount">
                @if ($errors->has('b_discount'))
                    <span class="error-text">
                        {{ $errors->first('b_discount') }}
                    </span>
                @endif
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

    <script>
        $(document).ready(function() {

            // Define function to open filemanager window
            var lfm = function(options, cb) {
                var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager',
                    'width=900,height=600');
                window.SetUrl = cb;
            };

            // Define LFM summernote button
            var LFMButton = function(context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="note-icon-picture"></i> ',
                    tooltip: 'Insert image with filemanager',
                    click: function() {

                        lfm({
                            type: 'image',
                            prefix: '/laravel-filemanager'
                        }, function(lfmItems, path) {
                            lfmItems.forEach(function(lfmItem) {
                                context.invoke('insertImage', lfmItem.url);
                            });
                        });

                    }
                });
                return button.render();
            };

            // Initialize summernote with LFM button in the popover button group
            // Please note that you can add this button to any other button group you'd like
            $('#summernote-editor').summernote({
                toolbar: [
                    ['popovers', ['lfm']],
                ],
                buttons: {
                    lfm: LFMButton
                }
            })
        });
    </script>
@endsection
