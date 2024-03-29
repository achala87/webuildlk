
<?php $__env->startSection('title', 'Read Article'); ?>
<?php $__env->startSection('page_description', 'Citizen patriot gathering to develop a corruption free and sustainable sri lanka. This page lists articles written by buildlk contributors.'); ?>
<?php $__env->startSection('page_keywords', 'sri lanka, corruption free, fight corruption sri lanka, new politicial vision for sri lanka'); ?>
<?php $__env->startSection('author', 'Achala Arunalu'); ?>

<?php if (isset($component)) { $__componentOriginal8fe555013345b6ab3e9fbf44fd07b1212da4292e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ArticleLayout::class, []); ?>
<?php $component->withName('article-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
       
      <div class="container"> 
      
      <div class="row" style="margin: 0 auto;">    
        <form style="display: flex; flex-direction: row;" action="<?php echo e(route('article_search', app()->getLocale() )); ?>" method="GET" role="search">
		          <div class="col-lg-2 col-md-2 col-sm-2">
                  <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle" style="flex:none" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                      Category
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <li><a class="dropdown-item" href="<?php echo e(route('article_search', 'Economy', app()->getLocale())); ?>">Economy</a></li>
                      <li><a class="dropdown-item" href="<?php echo e(route('article_search', 'Environment', app()->getLocale())); ?>">Environment</a></li>
                      <li><a class="dropdown-item" href="<?php echo e(route('article_search', 'War and Peace', app()->getLocale())); ?>">War and Peace</a></li>
                      <li><a class="dropdown-item" href="<?php echo e(route('article_search', 'Sustainable Development', app()->getLocale())); ?>">Sustainable Development</a></li>
                      <li><a class="dropdown-item" href="<?php echo e(route('article_search', 'Agriculture', app()->getLocale())); ?>">Agriculture</a></li>
                      <li><a class="dropdown-item" href="<?php echo e(route('article_search', 'ICT', app()->getLocale())); ?>">ICT</a></li>
                      <li><a class="dropdown-item" href="<?php echo e(route('article_search', 'Healthcare', app()->getLocale())); ?>">Healthcare</a></li>
                      <li><a class="dropdown-item" href="<?php echo e(route('article_search', 'Security', app()->getLocale())); ?>">Security</a></li>
                      <li><a class="dropdown-item" href="<?php echo e(route('article_search', 'Fisheries', app()->getLocale())); ?>">Fisheries</a></li>
                      <li><a class="dropdown-item" href="<?php echo e(route('article_search', 'Cities and Colonization', app()->getLocale())); ?>">Cities and Colonization</a></li>
                      <li><a class="dropdown-item" href="<?php echo e(route('article_search', 'Services Economy', app()->getLocale())); ?>">Services Economy</a></li>
                      <li><a class="dropdown-item" href="<?php echo e(route('article_search', 'Industry - Value Added Production', app()->getLocale())); ?>">Industry - Value Added Production</a></li>
                    </ul>
                </div>
              </div>
                <div class="col-lg-9 col-md-8 col-sm-8"> 
                  <input type="text" class="form-control" id="search_term" name="search_term" placeholder="Search term in article content...">
                </div>
                <div class="col-lg-1 col-md-2 col-sm-2">  
                  <button class="btn btn-light" type="submit">Search<span class="glyphicon glyphicon-search"></span></button>
                </div>
              </form>
        </div>


      
      <div class="row"> 
      <div class="col-md-12" style="margin:0px auto; width: 100%; margin-top:0.5rem; text-align:center;">
      <div class="bg-white overflow-hidden shadow-sm p-1 bg-white border-b border-gray-200">
        
      
      <div class="container col-xxl-8 px-4 py-0">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-1">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="/webuildlk-logo.png" class="d-block mx-lg-auto img-fluid" alt="logo" width="300" height="200" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">United for Sri Lanka</h1>
        <p class="lead">Professionals and academia share tangible activities and processeses to develop a peaceful, properous, healthy, sustainably developed  and vibrant nation free of corruption we proudly call Sri Lanka.</p>
       
      </div>
    </div>
  </div>

<?php $checkFeatured = 0 ?>

        <?php if(isset($articles)): ?>
        <div class="mt-10 max-w-xl mx-auto">
        <div class="row mb-2">
        <?php $articleImg; ?>
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $articleImg = ""; ?>
          <?php if(isset($article->category)): ?>
          <?php $__currentLoopData = json_decode($article->category); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
           <?php $articleImg = !empty($article->image) ? "/storage/".$article->image : "/storage/image/buildlklogo.jpg" ?>

            <?php if($tag == "featured"): ?>
            <div class="col-md-6 ">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static bg-dark">
            <strong class="d-inline-block mb-2 text-primary"></strong>
            <h3 class="mb-0 text-white"><?php echo e($article->title); ?></h3>
              
              <div class="mb-1 text-muted">Posted: <?php echo e($article->created_at->diffForHumans()); ?></div>
              <div class="mb-1 text-muted">Author: <?php echo e($article->user->name); ?></div>
              <p class="card-text mb-auto"><?php echo nl2br(e($article->seo_description)); ?></p>
              <a href="<?php echo e(url(app()->getLocale()."/read-article/{$article->slug}")); ?>" class="stretched-link">Continue reading</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="150" height="175" src="{<?php echo $articleImg; ?>}" role="img" focusable="false">
          </div>
        </div>
        </div>
            <?php $checkFeatured = 1 ?>
            <?php break; ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
        <?php endif; ?>
        
        <?php if($checkFeatured == 0): ?>
        <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary"></strong>
            <h3 class="mb-0"><?php echo e($article->title); ?></h3>
              
              <div class="mb-1 text-muted">Posted: <?php echo e($article->created_at->diffForHumans()); ?></div>
              <div class="mb-1 text-muted">Author: <?php echo e($article->user->name); ?></div>
              <p class="card-text mb-auto"><?php echo nl2br(e($article->seo_description)); ?></p>
              <a href="<?php echo e(url(app()->getLocale()."/read-article/{$article->slug}")); ?>" class="stretched-link">Continue reading</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img" width="150" height="175" src="<?php echo e($articleImg); ?>" role="img" focusable="false">
          </div>
        </div>
        </div>
        <?php endif; ?>
        <?php $checkFeatured = 0 ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
      <?php if (isset($__componentOriginal8fe555013345b6ab3e9fbf44fd07b1212da4292e)): ?>
<?php $component = $__componentOriginal8fe555013345b6ab3e9fbf44fd07b1212da4292e; ?>
<?php unset($__componentOriginal8fe555013345b6ab3e9fbf44fd07b1212da4292e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/view-articles.blade.php ENDPATH**/ ?>