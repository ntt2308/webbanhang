
<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('admin.home')); ?>">Trang chủ</a></li>
            <li><a href="">Banner</a></li>
            <li><a href="">Danh sách</a></li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>QUẢN LÝ Banner <a href="<?php echo e(route('admin.get.create.banner')); ?>" class="pull-right"><i class="fa-solid fa-circle-plus"></i></a></h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên banner</th>
                    <th>Hình ảnh</th>
                    <th>Banner Discount</th>
                    <th>Trạng thái</th>
                    <th>Banner Sale</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if( isset($banners)): ?>
                    <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($banner->id); ?></td>
                        <td><?php echo e($banner->b_name); ?></td>
                        <td>
                            <img src="<?php echo e(isset($banner->b_image) ? $banner->b_image :'[N\A]'); ?>" alt="" style="max-width:60px;height: auto;">
                        </td>
                        <td><?php echo e($banner->b_discount); ?>%</td>
                        <td>
                            <a href="<?php echo e(route('admin.get.action.banner',['active',$banner->id])); ?>"class="label <?php echo e($banner->getStatus($banner->b_active)['class']); ?>"><?php echo e($banner->getStatus($banner->b_active)['name']); ?></a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.get.action.banner',['sale',$banner->id])); ?>"class="label <?php echo e($banner->getSale($banner->b_sale)['class']); ?>"><?php echo e($banner->getSale($banner->b_sale)['name']); ?></a>
                        </td>
                        <td><?php echo e($banner->created_at); ?></td>
                
                        <td>
                            <a style="padding: 5px 10px; border: 1px solid #995" href="<?php echo e(route('admin.get.edit.banner',$banner->id)); ?>"><i class="fa-solid fa-pen" style="font-size:11px"></i>Chỉnh sửa</a>
                            <a style="padding: 5px 10px; border: 1px solid #995" href="<?php echo e(route('admin.get.action.banner',['delete',$banner->id])); ?>"><i class="fa-solid fa-trash" style="font-size:11px"></i>Xoá</a>
                        </td>
                    </tr>                
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
            </tbody>
        </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ĐỒ ÁN\tot_nghiep\Modules/Admin\resources/views/banner/index.blade.php ENDPATH**/ ?>