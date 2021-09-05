<div class="container" style="width=80%; margin:0 auto;">
<nav class="navbar navbar-expand-lg navbar-expand-sm navbar-light bg-light">
    <div class="navbar-brand">
    <a href="<?php echo e(route('home', app()->getLocale())); ?>" title="Home Page"> <img src="/webuildlk-logo.png" width="70px;" height="70px"> </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

        <li class="nav-item">
            <a href="<?php echo e(route('list-organizations', app()->getLocale())); ?>" class="text-sm text-gray-700 underline">Rate Organization</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('anti-corruption', app()->getLocale())); ?>" class="ml-4 text-sm text-gray-700">I Pledge</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('value-added-economy', app()->getLocale())); ?>" class="ml-4 text-sm text-gray-700">Economy</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('centralized-cities-environment', app()->getLocale())); ?>" class="ml-4 text-sm text-gray-700">Environment</a>
        </li> 
        <li class="nav-item">
            <a href="<?php echo e(route('articles', app()->getLocale())); ?>" class="ml-4 text-sm text-gray-700">Articles</a>
        </li> 
        <li class="nav-item">
            <a href="<?php echo e(route('national-timeline-srilanka', app()->getLocale())); ?>" class="ml-4 text-sm text-gray-700">Timeline</a>
        </li> 
        <li class="nav-item">
            <a href="<?php echo e(route('about-us', app()->getLocale())); ?>" class="ml-4 text-sm text-gray-700">About</a>
        </li> 
        
        
           <!-- language selector -->
           <li class="nav-item dropdown ml-4 text-sm">
           <a class="nav-link dropdown-toggle text-gray-700" data-toggle="dropdown" href="#" role="button" style="padding-top:2px;" aria-haspopup="true" aria-expanded="false">
                <?php if(app()->getLocale() == 'en'): ?>
                    English
                <?php else: ?>
                    Sinhala
                <?php endif; ?> 
            </a>
            <div class="dropdown-menu">
                    <a href="<?php echo e(route(Route::currentRouteName(), 'en')); ?>" class="dropdown-item text-sm text-gray-700">English</a>

                    <a href="<?php echo e(route(Route::currentRouteName(), 'si')); ?>" class="dropdown-item text-sm text-gray-700">Sinhala</a>
            </div>
            </li>
        
        <?php if(Route::has('login')): ?>
                <?php if(auth()->guard()->check()): ?>
                    <!-- <a href="<?php echo e(url('/dashboard')); ?>" class="text-sm text-gray-700">Dashboard</a> -->
                <?php else: ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('login', app()->getLocale())); ?>" class="ml-4 text-sm text-gray-700">Login</a></li>

                    <?php if(Route::has('register')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('register', app()->getLocale())); ?>" class="ml-4 text-sm text-gray-700">Register</a></li>
                    <?php endif; ?>
                <?php endif; ?>
        <?php endif; ?>
        </ul>
    </div>
    

    <!-- Settings Dropdown -->
        <?php if(Auth::check()): ?> 
        <div style="margin-right:5%;" class="hidden sm:flex sm:items-center sm:ml-6">

    <div class="dropdown">
        <button class="btn dropdown-toggle text-sm" style="font-size: small;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo e(Auth::user()->name); ?>

        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item text-sm" href="#"><?php echo e(Auth::user()->email); ?></a>
            <a class="dropdown-item text-sm" href="<?php echo e(route('logout', app()->getLocale())); ?>" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                <?php echo e(__('Logout')); ?>

            </a>
            <form id="logout-form" action="<?php echo e(route('logout', app()->getLocale())); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>

        </div>
    </div>
    </div>
    <?php endif; ?>

    </nav>
    </div><?php /**PATH /var/www/html/resources/views/layouts/navigation.blade.php ENDPATH**/ ?>