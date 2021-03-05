<?php
    // =========================================================================
    // HELPER FUNCTIONS
    // =========================================================================
    require_once dirname(__FILE__) . '/functions/helpers.php';

    // =========================================================================
    // WORDPRESS HOOKS AND FUNCTIONS
    // =========================================================================
    require_once dirname(__FILE__) . '/functions/wp/base.php';
    require_once dirname(__FILE__) . '/functions/wp-hooks.php';

    // =========================================================================
    // ADVANCED CUSTOM FIELDS
    // =========================================================================
    require_once dirname(__FILE__) . '/functions/acf/options.php';

    // =========================================================================
    // CUSTOM POST TYPES
    // =========================================================================
    require_once dirname(__FILE__) . '/functions/cpt/people.php';
    // require_once dirname(__FILE__) . '/functions/cpt/case-study.php';
