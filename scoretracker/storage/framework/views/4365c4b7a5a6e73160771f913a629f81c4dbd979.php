<?php $__env->startSection('content'); ?>
<div class="flex container justify-center">
    <div class="text-center px-2 py-2 bg-blue-200 shadow-xl  border border-indigo-200 rounded-xl">
      <div class="grid grid-cols-3 bg-blue-100 ">
        <div class="flex-1">ID</div>
        <div class="flex-1 col-span-2">Date</div>
      </div>

                <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <a class="flex hover:text-white transition duration-150 ease-in-out" href="/games/<?php echo e($game->id); ?>">
                        <div class="bg-blue-100">
                            <div class="ml-5 px-2 w-8 ">
                                <?php echo e($game->id); ?>

                            </div>
                        </div>
                        <div class="bg-blue-100">
                            <div class="px-2 ml-2 w-40">
                                <?php echo e($game->created_at->format('M, d, Y')); ?>

                            </div>
                        </div>
                    </a>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/scoretracker/resources/views/index.blade.php ENDPATH**/ ?>