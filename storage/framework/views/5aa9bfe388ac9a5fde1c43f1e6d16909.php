
<?php $__env->startSection('content'); ?>


                            <form action="#" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="shop-cart-table check-out-wrap">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="billing-details pr-20" style="color:black; font-size:15px">
                                                <?php if(Auth::check()): ?>
                                                <h4 class="title-1 title-border text-uppercase mb-30">CHI TIẾT THANH TOÁN</h4>
                                                <label for="region_id">Tên khách hàng</label>
                                                <div class="input-box">
                                                <input type="text" placeholder="Tên của bạn" value="<?php echo e(Auth::user()->name); ?>" name="name">
                                                </div>
                                                <label for="region_id">Địa chỉ email</label>
                                                <input type="text" placeholder="Địa chỉ email" value="<?php echo e(Auth::user()->email); ?>" name="email">
                                                <label for="region_id">Số điện thoại</label>
                                                <input type="text" placeholder="Số điện thoại" value="<?php echo e(Auth::user()->phone); ?>" name="phone">
                                                <label for="region_id">Địa chỉ nhận hàng</label>
                                                <input type="text" placeholder="Địa chỉ của bạn" value="<?php echo e(Auth::user()->address); ?>" name="address">
                                                <textarea class="custom-textarea" placeholder="Ghi chú" name="note" ></textarea>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-xs-30">
                                            <div class="billing-details pl-20">
                                                <?php
                                                $sum = 0 ;
                                                $sum_vat = 0 ;
                                                $tong = 0;
                                                foreach($carts as $item) {
                                                $sum = $sum + $item->quantity * $item->price;
                                                $sum_vat = $sum_vat + $item->quantity * $item->price * 0.1 ;
                                                $tong = $tong + $item->quantity ;
                                                }
                                                 ?>
                                                <h4 class="title-1 title-border text-uppercase mb-30">Đơn hàng của bạn</h4>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th><strong>Sản phẩm</strong></th>
                                                            <th class="text-end"><strong>Giá trị</strong></th>
                                                        </tr>
                                                    </thead>
                                                   
                                                    <tbody style=" color:black; font-size:15px">
                                                        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr >
                                                            <td style="padding-right: 60px;padding-top: 10px;"><?php echo e($cart->name); ?></td>
                                                            <td class="text-end"><?php echo e(number_format($cart->quantity * $cart->price)); ?> (VND)(VND)</td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td style="padding-top: 10px;">Tổng đơn hàng</td>
                                                            <td class="text-end"><?php echo e(number_format($sum)); ?></td>
                                                        </tr>
                                                        <tr style="padding: 10px;">
                                                            <td style="padding-top: 10px;">Vat 10%</td>
                                                            <td class="text-end"><?php echo e(number_format($sum_vat)); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top: 10px">Tổng thanh toán đơn hàng</td>
                                                            <td class="text-end"><?php echo e(number_format($sum+$sum_vat)); ?></td>
                                                        </tr>
                                                    </tbody>
                                                    
                                                </table>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="payment-method mt-60  pl-20">
                                                <div class="payment-accordion">
                                                    <button class="button-one submit-button mt-15" data-text="place order" type="submit">Đặt hàng</button>			
                                                </div>															
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>											
                        </div>
                    
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\tot_nghiep\tot_nghiep\tot_nghiep\resources\views/layouts/pay.blade.php ENDPATH**/ ?>