<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Warhammer 40k Score Tracker</title>
	<meta name="author" content="name">
    <meta name="description" content="description here">
	<meta name="keywords" content="keywords,here">
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
	<link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> <!--Replace with your tailwind.css once created-->
	<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->

</head>

        <?php echo $__env->make('_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


	<!--Container-->
        <div class="">
            <div class="container px-6 pt-24 mx-auto md:pt-16">
                <?php echo $__env->yieldContent('content'); ?>
            </div>

        </div>




</body>
</html>
<?php /**PATH /home/vagrant/scoretracker/resources/views/layouts/layout.blade.php ENDPATH**/ ?>