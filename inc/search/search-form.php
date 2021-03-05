<h1>Search Results</h1>

<div class="fieldset search-field">
    <div class="search-field-wrapper">
        <?php echo facetwp_display( 'facet', 'search_field' ); ?>
    </div>
</div>

<div class="fieldset search-filters">
    <div class="content-types">
        <?php echo facetwp_display( 'facet', 'content_types' ); ?>
    </div>
    <div class="taxonomy-filters">
        <?php echo facetwp_display( 'facet', 'post_categories' ); ?>
    </div>
</div>