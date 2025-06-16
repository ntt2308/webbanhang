<form action="" method="POST">
    <?php echo csrf_field(); ?>
    <div class="form-group">
      <label for="name">Tên danh mục</label>
      <input type="text" class="form-control" placeholder="Tên danh mục" value="<?php echo e(old('name',isset($category->c_name)? $category->c_name : '')); ?>" name="name">
      <?php if($errors->has('name')): ?>
        <span class="error-text">
          <?php echo e($errors->first('name')); ?>

        </span>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="name">Icon:<</label>
        <input type="text" class="form-control" placeholder="fa fa-home" value="<?php echo e(old('icon',isset($category->c_icon)? $category->c_icon: '')); ?>" name="icon">
        <?php if($errors->has('icon')): ?>
        <span class="error-text">
          <?php echo e($errors->first('icon')); ?>

        </span>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label for="name">Thuộc danh mục cha: </label>
        <select name="c_parent" id="">
            <option value="0">---DANH MỤC CHA---</option>
            <!-- Hiển thị danh sách các danh mục cha -->
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Kiểm tra xem danh mục cha có phải là danh mục đang được chỉnh sửa không -->
                <?php if($category && $category->id == $cat->id): ?>
                    <option value="<?php echo e($cat->id); ?>" selected><?php echo e($cat->c_name); ?></option>
                <?php else: ?>
                    <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->c_name); ?></option>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
  </form><?php /**PATH C:\ĐỒ ÁN\tot_nghiep\Modules/Admin\resources/views/category/form.blade.php ENDPATH**/ ?>