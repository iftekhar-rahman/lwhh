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

                    <div class="col-md-8 offset-md-2">
                        <div class="testimonials-wrap text-center">
                            <?php
                            $attachments = new Attachments( 'testimonials' );
                            if ( class_exists( 'Attachments' ) && $attachments->exist() ) {
                            ?>
                            <h2><?php _e( "Testimonials", "alpha" ); ?></h2>
                            <?php
                            }
                            ?>
                            <div class="testimonials slider">
                                <?php
                                if ( class_exists( 'Attachments' ) ) {
                                    
                                    if ( $attachments->exist() ) {
                                        while ( $attachment = $attachments->get() ) { ?>
                                            <div>
                                                <?php echo $attachments->image( 'thumbnail' ); ?>
                                                <h4><?php echo esc_html($attachments->field( 'name' )); ?></h4>
                                                <p><?php echo esc_html($attachments->field( 'testimonial' )); ?></p>
                                                <p>
                                                    <?php echo esc_html($attachments->field( 'position' )); ?>
                                                    <strong>
                                                        <?php echo esc_html($attachments->field( 'company' )); ?>
                                                    </strong>
                                                </p>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <?php
                    if(class_exists("Attachments")){
                    ?>
                    <div class="row">
                        <?php
                        $attachments = new Attachments( 'team' );
                        if ( $attachments->exist() ) {
                            while ( $attachment = $attachments->get() ) { ?>
                                <div class="col-md-4">
                                    <?php echo $attachments->image( "medium" ); ?>
                                    <h4><?php echo esc_html($attachments->field( 'name' )); ?></h4>
                                    <p><?php echo esc_html($attachments->field( 'position' )); ?></p>
                                    <p><?php echo esc_html($attachments->field( 'bio' )); ?></p>
                                    <p><?php echo esc_html($attachments->field( 'email' )); ?></p>
                                </div>
                            <?php
                            }
                        }
                        ?>
                    </div>
                    <?php 
                    }
                    ?>

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



