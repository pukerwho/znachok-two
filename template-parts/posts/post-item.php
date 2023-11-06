<div class="h-full flex flex-col bg-white border border-gray-400 rounded">
  <!-- Photo -->
  <div class="mb-4">
    <?php $medium_thumb = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
    <img 
    class="w-full h-[180px] object-cover rounded-t" 
    alt="<?php the_title(); ?>" 
    src="<?php echo $medium_thumb; ?>" 
    loading="lazy">
  </div>

  <div class="grow">
    <!-- Title -->
    <div class="text-xl custom-font px-4 mb-4">
      <?php the_title(); ?>
    </div>
    <!-- Content -->
    <div class="px-4 mb-4">
      <?php 
        $content_text = wp_strip_all_tags( get_the_content() );
        echo mb_strimwidth($content_text, 0, 120, '...');
      ?>
    </div>
  </div>

  <!-- Link -->
  <a href="<?php the_permalink(); ?>" class="inline-block w-full bg-black/95 hover:bg-black/90 text-gray-200 text-center text-lg font-bold rounded-b px-4 py-3"><?php _e("View post", "treba-wp"); ?></a>
</div>