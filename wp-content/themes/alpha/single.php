<?php get_header(); ?>
<body <?php body_class(); ?>>

<?php get_template_part( "hero" ); ?>

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
                            the_post_thumbnail( "large", array("class"=>"img-fluid") );
                        }
                        ?>
                    </p>
                    <?php 
                        the_content();
                    ?>
                </div>
                <?php if(comments_open()): ?>
                <div class="col-md-10 offset-md-1">
                    <?php 
                    comments_template();
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
<?php get_footer(); ?>