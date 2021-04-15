<?php $__env->startSection('content'); ?>
    <?php if($errors->any()): ?>
        <p class="mt-2 text-xs text-red-500"> <?php echo e("Please make sure Scenario, Description, Player Names, and Army Names have all been added"); ?></p>
    <?php endif; ?>

<form action="/create" METHOD="POST" id="formid">

        <?php echo csrf_field(); ?>

        <?php echo $__env->make('_scenario_select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('_player_layout',[
            'player_army'=>'player1_army',
            'player_name'=>'player1_name',
            'player_primary'=>'player1_primary',
            'player_secondary'=>'player1_secondary',
            'player_score'=>'player1_score'
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('_player_layout',[
            'player_army'=>'player2_army',
            'player_name'=>'player2_name',
            'player_primary'=>'player2_primary',
            'player_secondary'=>'player2_secondary',
             'player_score'=>'player2_score'
             ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
</div>
</div>


<div class=container>
    <div class="title">
        <div class="container flex items-center">
            <div class="flex items-center py-5 ml-8 mr-4">
                <button type="submit" form="formid" value="Submit" class="flex-1 px-4 py-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700">
                End This Game and Add to Archive
                </button>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/scoretracker/resources/views/create.blade.php ENDPATH**/ ?>