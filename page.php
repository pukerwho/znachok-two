<?php get_header(); ?>

<div class="pt-32 lg:pt-64 mb-20">
  <div class="container mx-auto px-4 md:px-0">
    <div class="flex flex-wrap">
      <div class="w-full xl:w-8/12 mx-auto">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <h1 class="text-4xl lg:text-6xl font-black mb-6"><?php the_title(); ?></h1>
          <div class="content">
            <?php the_content(); ?>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>