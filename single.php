<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php $countNumber = tutCount(get_the_ID()); ?>
<div itemscope itemtype="http://schema.org/Article">
  <!-- TOP -->
  <div class="bg-gray-200 pt-16 pb-32">
    <div class="container">
      <!-- BREADCRUMBS -->
      <div class="breadcrumbs text-sm text-gray-800 dark:text-gray-200 mb-6" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        <ul class="flex items-center flex-wrap -mr-4">
          <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item px-4 pl-8">
            <a itemprop="item" href="<?php echo home_url(); ?>" class="text-blue-500">
              <span itemprop="name"><?php _e( 'Home', 'treba-wp' ); ?></span>
            </a>                        
            <meta itemprop="position" content="1">
          </li>
          <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item px-4">
            <a itemprop="item" href="<?php echo get_page_url('page-blog'); ?>" class="text-blue-500">
              <span itemprop="name"><?php _e( 'Posts', 'treba-wp' ); ?></span>
            </a>                        
            <meta itemprop="position" content="2">
          </li>
          <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item text-gray-600 px-4">
            <span itemprop="name"><?php the_title(); ?></span>
            <meta itemprop="position" content="3" />
          </li>
        </ul>
      </div>
      <!-- TITLE -->
      <h1 class="h1 mb-4" itemprop="headline"><?php the_title(); ?></h1>  
      <div class="flex flex-wrap items-center mb-6">
        <!-- AUTHOR -->
        <div class="w-1/2 lg:w-auto flex items-center mb-2 lg:mb-0">
          <div class="mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>
          </div>
          <div class="font-semibold text-gray-700 opacity-75">
            <?php if (carbon_get_the_post_meta('crb_post_author')): ?>
              <span class="italic"><?php echo carbon_get_the_post_meta('crb_post_author'); ?></span>
            <?php else: ?>
              <?php echo get_the_author(); ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="hidden lg:block px-4">•</div>
        <!-- DATE -->
        <div class="w-1/2 lg:w-auto flex items-center mb-2 lg:mb-0">
          <div class="mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
            </svg>
          </div>
          <div class="text-gray-700 opacity-75"><?php echo get_the_modified_time('F j, Y') ?></div>
        </div>
        <div class="hidden lg:block px-4">•</div>
        <!-- CATEGORY -->
        <div class="w-1/2 lg:w-auto flex items-center">
          <div class="mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
            </svg>
          </div>
          <?php
          $post_categories = get_the_terms( get_the_ID(), 'category' );
          foreach (array_slice($post_categories,0,1) as $post_category){ ?>
            <a href="<?php echo get_term_link($post_category->term_id, 'category') ?>" class="text-blue-600 hover:text-red-500"><?php echo $post_category->name; ?></a>
          <?php } ?>
        </div>
        <div class="hidden lg:block px-4">•</div>
        <div class="w-1/2 lg:w-auto flex items-center">
          <div class="mr-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
            </svg>
          </div>
          <div class="text-gray-700 opacity-75"><?php echo $countNumber; ?></div>
        </div>
      </div>
    </div>
  </div>
  <!-- END TOP -->
</div>
<div class="container -mt-20">
  <div class="flex flex-wrap lg:-mx-6">
    <!-- MAIN -->
    <div class="w-full lg:w-2/3 lg:px-6 mb-12 lg:mb-0">
      <div class="bg-white border border-gray-400 rounded mb-12">
        <!-- IMG -->
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover rounded-t mb-2" itemprop="image">
        <!-- CONTENT -->
        <div class="content p-5" itemprop="articleBody">
          <div class="single-subjects mb-5">
            <div class="text-2xl custom-font mb-4"><?php _e("Content", "treba-wp"); ?></div>
            <div class="single-subjects-inner"></div>
          </div>
          <?php the_content(); ?>
        </div>
      </div>

      <!-- COMMENTS --> 
      <div class="bg-white border border-gray-400 rounded mb-12">
        <div class="bg-black/95 px-4 py-2 mb-4">
          <div class="text-2xl custom-font text-gray-200"><?php _e("Comments", "treba-wp"); ?></div>
        </div>
        <div class="content">
          <?php comments_template(); ?>
        </div>
      </div>
      
      <!-- SIMILAR POSTS --> 
      <div class="bg-black/95 px-4 py-2 mb-6">
        <div class="text-2xl custom-font text-gray-200"><?php _e("Similar Posts", "treba-wp"); ?></div>
      </div>
      <div class="flex flex-wrap lg:-mx-6 mb-6">
        <?php 
          $current_id = get_the_ID();
          $similar_posts = new WP_Query( array( 
            'post_type' => 'post', 
            'posts_per_page' => 4,
            'order' => 'DESC',
            'post__not_in' => array($current_id),
          ) );
          if ($similar_posts->have_posts()) : while ($similar_posts->have_posts()) : $similar_posts->the_post(); 
        ?>
          <div class="w-full lg:w-1/2 lg:px-6 mb-6">
            <?php get_template_part('template-parts/posts/post-item'); ?>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
    <!-- END MAIN --> 

    <!-- SIDEBAR -->
    <div class="w-full lg:w-1/3 lg:px-6">
      <?php get_template_part('template-parts/sidebar'); ?>
    </div>
    <!-- END SIDEBAR -->
  </div>
</div>
<?php endwhile; endif; wp_reset_postdata(); ?>
<?php get_footer(); ?>