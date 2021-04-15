
<div class="mt-4 text-base">
    <div class="flex justify-between w-full py-2 pb-4 border-b border-blue-800">
        <select class="px-4 py-2 border rounded" x-model="<?php echo e($selection_id); ?>" name="<?php echo e($selection_id); ?>">
            <option value="">--</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <optgroup label="<?php echo e($category['name']); ?>">
                    <?php $__currentLoopData = $category['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($option); ?>"><?php echo e($option); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </optgroup>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
          <div class="flex items-center m-2">
            <div class="px-4">
              <button
                class="px-4 py-3 mr-6 font-bold text-white bg-red-500 border border-blue-700 rounded hover:bg-red-600"
                @click.prevent="if(<?php echo e($count_id); ?>>0) <?php echo e($count_id); ?>--"
              ></button>
              <button
                class="px-4 py-3 mr-6 font-bold text-white bg-green-500 border border-blue-700 rounded hover:bg-green-600"
                @click.prevent="if(<?php echo e($count_id); ?><15)<?php echo e($count_id); ?>++"
                @click.prevent="passvalues()"
              ></button>
            </div>
            <div x-text="<?php echo e($count_id); ?>" class="w-8 pr-4 font-bold text-right" id="<?php echo e($count_id); ?>"></div>
          </div>
        </div>
      </div>

<?php /**PATH /home/vagrant/scoretracker/resources/views/_category_select.blade.php ENDPATH**/ ?>