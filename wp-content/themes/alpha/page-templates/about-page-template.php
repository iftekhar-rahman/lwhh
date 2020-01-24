<?php
/*
* Template Name: About Page Template
*/ 
get_header(); 
?>
<body <?php body_class(); ?>>

<?php get_template_part( "template-parts/about-page/hero-page" ); ?>

    <div class="posts" <?php post_class(); ?>>

        <?php
        while( have_posts() ):
            the_post();
        ?>

        <div class="post">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="post-title text-center"><?php the_title(); ?></h2>
                        <p class="text-center">
                            <strong><?php the_author(); ?></strong><br/>
                            <?php echo get_the_date(); ?>
                        </p>
                    </div>
                    <div class="col-md-10 offset-md-1">
                        <p>
                            <?php 
                            
                            if(has_post_thumbnail()){
                                // $thumbnail_url = get_the_post_thumbnail_url(null, "large");
                                // // echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
                                // printf( '<a href="%s" data-featherlight="image">', $thumbnail_url);
                                // the_post_thumbnail( "large", array("class"=>"img-fluid") );
                                // echo '</a>';

                                // $thumbnail_url = get_the_post_thumbnail_url(null, "large");
                                // echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
                                echo '<a class="popup" href="#" data-featherlight="image">';
                                the_post_thumbnail( "large", array("class"=>"img-fluid") );
                                echo '</a>';
                            }
                            
                            ?>
                        </p>
                        <?php 
                            the_content();

                            // next_post_link();
                            // echo "<br/>";
                            // previous_post_link();
                        ?>
                    </div>

                    <?php if(comments_open()): ?>
                    <div class="col-md-10 offset-md-1">
                        <?php 
                        // comments_template();
                        ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php
        endwhile;
        ?>

    </div>
</div>

<?php get_footer(); ?>



