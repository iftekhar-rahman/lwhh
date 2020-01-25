<?php
get_header();
?>

    <body <?php body_class(); ?>>

    <?php get_template_part( "template-parts/common/hero" ); ?>
        <div class="erro-page">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="text-center">
                            <?php _e("Not Found", "alpha"); ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </body>

<?php
get_footer();