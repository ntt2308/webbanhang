
<?php $__env->startSection('content'); ?>
<style>
    .abc{
    position: absolute;
    top: 45%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    color: white;
    }
</style>
<h1 class="page-header">Trang tổng quan</h1>
<div class="row placeholders">
    <div class="col-xs-6 col-sm-4 placeholder">
        <img src="<?php echo e(asset('img/a1.jpg')); ?>" width="200" height="200"  alt="Generic placeholder thumbnail">
        <h4 class="abc"><?php echo e($totalTransaction); ?> Đơn hàng</h4>
    </div>
    <div class="col-xs-6 col-sm-4 placeholder">
        <img src="<?php echo e(asset('img/a2.jpg')); ?>" width="200" height="200" alt="Generic placeholder thumbnail">
        <h4 class="abc"><?php echo e($totalTransactionDone); ?> Đơn hàng đã xử lý</h4>
    </div>
    <div class="col-xs-6 col-sm-4 placeholder">
        <img src="<?php echo e(asset('img/a3.jpg')); ?>" width="200" height="200"  alt="Generic placeholder thumbnail">
        <h4 class="abc"><?php echo e($totalTransaction - $totalTransactionDone); ?> Đơn hàng chưa xử lý</h4>
    </div>
    
</div>
<div class="row">
    <div class="col-sm-12">
        <h2>Danh sách đơn hàng của bạn</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Thời gian</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($transaction->id); ?></td>
                        <td><?php echo e(isset($transaction->user->address) ? $transaction->user->address : '[N/A]'); ?></td>
                        <td><?php echo e($transaction->tr_phone); ?></td>
                        <td><?php echo e(number_format($transaction->tr_total,0,',','.')); ?> VND</td>
                        <td>
                            <?php if($transaction->tr_status == 1): ?>
                                <a href="" class="label-success label">Đã xử lý</a>
                            
                            <?php else: ?>
                                <a href="#" class="label label-default">Đang chờ</a>
                        
                            
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($transaction->created_at); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <?php echo $transactions->links(); ?>

        </table>
    </div>
</div>

            </table>
        </div>
    </div>
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ĐỒ ÁN\tot_nghiep\resources\views/user/index.blade.php ENDPATH**/ ?>