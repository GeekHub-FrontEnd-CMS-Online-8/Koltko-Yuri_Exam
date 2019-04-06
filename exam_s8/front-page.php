<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>



<div class="header__bg">
        
    </div>
    <section class="slaide__blok">
        <div class="container-fluid">
            <div class="row slaide__blok-hid">
                <div class="col-md-1 menu__soc">
                    <div class="menu__soc-icon">
                    	<a target="_blank" href="<?php echo get_theme_mod('ads_facebook'); ?>"><?php echo get_theme_mod('ads_facebook-icon'); ?></a>
                    
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    </div>
                    
                    


                    
                </div>
                <div class="col-md-7 slaide__text">

                    <div class="slaide__text-blok">
                        <div class="text__blok">
                            <h1><?php echo get_theme_mod('ads_name'); ?></h1>
                    <span>
                       <?php echo get_theme_mod('ads_code'); ?>
                    </span>
                        </div>
                        
                    </div>
                    <div class="slaide__img">
                   <img src="<?php echo get_theme_mod('ads_img'); ?>" alt="">
                </div>
                </div>
                <div class="col-md-4 slaide__pagination">
                   <!--  <ul>
                        <li><a href="">01</a></li>
                        <li><a href="">02</a></li>
                        <li><a href="">03</a></li>
                        <li><a href="">04</a></li>
                    </ul> -->
                </div>
                


            </div>
            
        </div>
    </section>
    <section class="portfolio">
        <div class="container-fluid">
            <div class="row">
                <div class="portfolio__menu">
            <!-- Вывод категории галереи -->

            <ul id="filters">
    <li><a href="#" data-filter="*" class="selected">All</a></li>
	<?php 
		$terms = get_terms('category', array('parent' => 2)); // get all categories, but you can use any taxonomy
		$count = count($terms); //How many are they?
		if ( $count > 0 ){  //If there are more than 0 terms
			foreach ( $terms as $term ) {  //for each term:
				echo "<li><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
				//create a list item with the current term slug for sorting, and name for label
			}
		} 
	?>
</ul>
<!-- END Вывод категории галереи -->
        </div>
        
        <div class="container-fluid">
        	<div class="row">
        	<div class="col-md-12">
        		<div class="portfolio__photo">
        	<!-- Фото галереи -->
          <?php 
     $terms_ID_array = array();
     foreach ($terms as $term)
     {
         $terms_ID_array[] = $term->term_id; // Add each term's ID to an array
     }
     $terms_ID_string = implode(',', $terms_ID_array); // Create a string with all the IDs, separated by commas
     $the_query = new WP_Query( 'posts_per_page=6&cat='.$terms_ID_string ); // Display 50 posts that belong to the categories in the string 
?>
<?php if ( $the_query->have_posts() ) : ?>
    <div id="isotope-list">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
	$termsArray = get_the_terms( $post->ID, "category" );  //Get the terms for this particular item
	$termsString = ""; //initialize the string that will contain the terms
		foreach ( $termsArray as $term ) { // for each term 
			$termsString .= $term->slug.' '; //create a string that has all the slugs 
		}
	?> 
	<div class="<?php echo $termsString; ?> item"> <?php // 'item' is used as an identifier (see Setp 5, line 6) ?>
		<!-- <h3><?php the_title(); ?></h3> -->
	        <?php if ( has_post_thumbnail() ) { 
                      the_post_thumbnail();
                } ?>
	</div> <!-- end item -->
    <?php endwhile;  ?>
    </div> <!-- end isotope-list -->
<?php endif; ?>

<!-- END Фото галереи -->
        </div>
        	</div>
        	
        </div>
        </div>


                
            </div>
        </div>
        <div class="button__more">
        	<a class="" href="">explore more</a>
        </div>
        
        
    </section>

<section class="news">
	<div class="news__h1">
		<h1>Latest News</h1>
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