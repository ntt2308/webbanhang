<form action="" method="POST">
    <?php echo csrf_field(); ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="b_name">Tên Banner</label>
                <input type="text" class="form-control" placeholder="Tên banner"
                    value="<?php echo e(old('b_name', isset($banner->b_name) ? $banner->b_name : '')); ?>" name="b_name">
                <?php if($errors->has('b_name')): ?>
                    <span class="error-text">
                        <?php echo e($errors->first('b_name')); ?>

                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="name">Hình ảnh</label>
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" id="lfm" data-input="thumbnail" data-preview="holder"
                            class="btn btn-primary">Thêm ảnh</button>
                    </div>
                    <input type="text" class="form-control" id="thumbnail" name="b_image"
                        value="<?php echo e(old('b_image', isset($banner->b_image) ? $banner->b_image : '')); ?>" required>
                    <?php $__errorArgs = ['b_banner'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="form-group" id="holder">
                <img id="holder" style="width: 100%;
              height: 15rem;
              object-fit: contain;"
                    src="<?php echo e(old('b_banner', isset($banner->b_image) ? $banner->b_image : '')); ?>"
                    alt="Selected Image">
            </div>
            <div class="form-group">
                <label for="b_discount">Banner Discount</label>
                <input type="text" class="form-control" placeholder="banner discount"
                    value="<?php echo e(old('b_discount', isset($banner->b_discount) ? $banner->b_discount : '')); ?>" name="b_discount">
                <?php if($errors->has('b_discount')): ?>
                    <span class="error-text">
                        <?php echo e($errors->first('b_discount')); ?>

                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
<?php $__env->startSection('scripts'); ?>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="/vendor/laravel-filemanager/js/filemanager.min.js"></script>

    <script src="<?php echo e(asset('/js/plugins/jquery-ui-1.13.2/jquery-ui.min.js')); ?>"></script>
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
<?php $__env->stopSection(); ?>
<?php /**PATH D:\tot_nghiep\tot_nghiep\tot_nghiep\Modules/Admin\resources/views/banner/form.blade.php ENDPATH**/ ?>