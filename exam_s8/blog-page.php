<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<section>
	<div class="container-fluid">
		<div class="">
			<div class="">
				<?php
              // параметры по умолчанию
 $posts = get_posts( array(
  'numberposts' => 0,
  'category_name'    => 'blog',
  'orderby'     => 'date',
  'order'       => 'DESC',
  'include'     => array(),
  'exclude'     => array(),
  'meta_key'    => '',
  'meta_value'  =>'',
  'post_type'   => 'post',
  'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
 ) );

 foreach( $posts as $post ){
  setup_postdata($post);
    ?>

<div class="post__blog">
	<div class="blog__taitle">
		<h2><?php the_title(); ?></h2>
	</div>
	<div class="blog__desc">
		<p><?php the_excerpt(); ?></p>
	</div>

</div>

	<div class="blog__img">
		<?php the_post_thumbnail(); ?>
	
</div>

    <?php
 }

 wp_reset_postdata(); // сброс
                                ?>
			</div>
			
		</div>
	</div>
</section>

<section class="news">
	<div class="news__h1">
		<h1>You may also like</h1>
	</div>
	<div class="container-fluid">
		<div class="row latest__news">
			<?php
              // параметры по умолчанию
 $posts = get_posts( array(
  'numberposts' => 3,
  'category_name'    => 'news',
  'orderby'     => 'date',
  'order'       => 'DESC',
  'include'     => array(),
  'exclude'     => array(),
  'meta_key'    => '',
  'meta_value'  =>'',
  'post_type'   => 'post',
  'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
 ) );

 foreach( $posts as $post ){
  setup_postdata($post);
    ?>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6">
						<div class="news__img">
					<?php the_post_thumbnail(); ?>
				</div>
					</div>
					<div class="col-md-6">
						<div class="news_text">
					<div class="news__teitle">
						<?php the_title(); ?>
					</div>
					<div class="news__date">
						<?php echo get_the_date('n-j-Y'); ?>
					</div>
					
				</div>
					</div>
				</div>
				
				
				
			</div>
			<?php
 }

 wp_reset_postdata(); // сброс
                                ?>
		</div>
	</div>
	
</section>


<?php get_footer(); ?>