<?php $__env->startSection('content'); ?>

<div class="lg:grid lg:grid-flow-col lg:grid-cols-2">
    <div class="block ml-20 lg:mx-auto">
        <img src="/images/abby.png"
        alt=""
        class="mt-6 mb-2 shadow-2xl"
        width="350px"
        height="450px"
        >
    </div>
    <div class="col-span-2 mt-5 text-justify justify-left lg:mr-60">
        <p> My name is Jacob and I am an avid lover of Warhammer 40k, both as a hobby and as a game! I decided to build this website as a way to practice coding in PHP
            but also as a way of keeping track of the games and statistics of all the games of Warhammer 40k I play. I hope you also enjoy using this website for tracking your
            own games of Warhammer 40k. For now, this website will only keep track of your games within the 9th edition ruleset but I want to expand the website to include other
            editions, Kill Team, Necromunda, Age of Sigmar, and other GW game systems. If you have any suggestions feel free to contact me!
        </p>
    </div>
</div>
<div class="mt-20">
    <?php echo $__env->make('_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/scoretracker/resources/views/about.blade.php ENDPATH**/ ?>