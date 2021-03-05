<?php
/* Template Name: Search Results */
get_header();
?>

<section class="layout search-results">
	<div class="wrapper">
        <?php if(facetwp_activated()) : ?>
            <?php get_template_part('inc/search/search-form'); ?>
            <?php get_template_part('inc/search/search-query'); ?>
        <?php else : ?>
            <h1>Error: FacetWP is not installed or activated.</h1>
        <?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
