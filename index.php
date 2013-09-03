<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
 *
 */
?>
<?php get_header(); ?>

<div id="content" class="row clearfix">
      <div id="main" class="span9" role="main">     
<?php if ( have_posts() ): ?>
<h1>Latest News</h1>	

<?php while ( have_posts() ) : the_post(); ?>


<!-- View template content -->



<?php endwhile; ?>

<?php else: ?>
<h2>No posts to display</h2>
<?php endif; ?>
<footer>
<?php engage_pagination();?>
</footer>
     </div><!-- /#main -->

<div id="sidebar" class="span3" >
<?php dynamic_sidebar('news'); ?>
</div>

    </div><!-- /#content -->

<?php get_footer(); ?>