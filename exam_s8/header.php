<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package exam_s8
 */

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
   
	<?php wp_head(); ?>
    <title>MITALENT</title>
</head>
<body>
    <section class="header">    
        <div class="container-fluid">
            <div class="row header__blok">
                <div class="main__menu">
            <div id="menu">
                <button class="top-nav-btn">
                    <i class="fas fa-bars"></i>
                       

                </button>
                <nav>

               
        
         <div class="menu2">
      <?php wp_nav_menu( [
    'container'       => 'ul', 
    'container_class' => 'nav-item', 
    'menu_class'      => 'menu', 
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth'           => 0,
    'walker'          => '',
] ); ?>
     
        
        
            </nav>
            </div>
            <a href="">Clients</a>
            <a href="">News</a>
            
        </div>
        <div class="logo">
            <?php the_custom_logo( ); ?>
        </div>
        <div class="serch">
            <?php get_search_form(); ?><i class="fas fa-search"></i>
        </div>
            </div>
            
        </div>
        
        
    </section>



