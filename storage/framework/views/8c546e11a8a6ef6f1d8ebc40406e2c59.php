
<?php $__env->startSection('content'); ?>

<!-- HEADING-BANNER END -->
<!-- ELEMENTS-TAB START -->
<div class="elements-tab pb-80">            
    <!-- BLGO-AREA START -->
    <div class="blog-area blog-2 pt-30">
        <div class="container">
            <div class="tab-content row">
                <div class="tab-pane active" id="elements-preview-3">
                    <!-- Section-title start -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center">
                                <h2 class="title-border">TIN TỨC</h2>
                            </div>
                        </div>
                    </div>
                    <!-- Section-title end -->
                    <div class="row">
                        <!-- Single-blog start -->
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="single-blog mt-30">
                                <div class="blog-photo">
                                    <a href="<?php echo e(route('get.detail.article',[$article->a_slug, $article->id])); ?>"><img src="<?php echo e($article->a_avatar); ?>" alt="" style="width: auto;height: 200px;"/></a>
                                </div>
                                <div class="blog-info"> 
                                    <div class="post-meta fix">
                                        <div class="post-year floatleft">
                                            <p class="text-uppercase text-dark-red mb-0"><?php echo e($article->created_at->format('d-m-Y')); ?></p>
                                            <h4 class="post-title"><a href="<?php echo e(route('get.detail.article',[$article->a_slug, $article->id])); ?>" tabindex="0"><?php echo e($article->a_name); ?></a></h4>
                                        </div>
                                    </div>
                                    
                                    <a href="<?php echo e(route('get.detail.article',[$article->a_slug, $article->id])); ?>" class="button-2 text-dark-red">ĐỌc thêm</a>
                                </div>
                            </div>
                        </div>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $articles->links(); ?>

                    </div>
                </div>                             
            </div> 
        </div>
    </div>
    <!-- BLGO-AREA END -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\tot_nghiep\tot_nghiep\tot_nghiep\resources\views/article/index.blade.php ENDPATH**/ ?>