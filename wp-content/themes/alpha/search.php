<?php get_header(); ?>
<body <?php body_class(); ?>>

<?php get_template_part( "template-parts/common/hero" ); ?>

<div class="posts">
    <div <?php post_class(); ?>>

        <?php
        if( !have_posts() ){
        ?>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="text-center"><?php _e( "No results found", "alpha" ); ?></h2>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <?php
        while( have_posts() ){
            the_post();
        
            get_template_part( "post-formats/content", get_post_format() );

        }
        ?>

        <div class="pagination-wrap mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-8">
                        <div class="text-center">
                            <?php
                            the_posts_pagination(array(
                                "screen_reader_text" => " ",
                                "prev_text" => "New Posts",
                                "next_text" => "Old Posts"
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php get_footer(); ?>