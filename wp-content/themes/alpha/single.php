<?php
$alpha_layout_class = "col-md-8";
$alpha_text_class = "";
if( !is_active_sidebar("sidebar-1") ){
    $alpha_layout_class = "col-md-10 offset-md-1";
    $alpha_text_class = "text-center";
}

?>

<?php get_header(); ?>
<body <?php body_class(array( "first_class", "second_class" )); ?>>

<?php get_template_part( "template-parts/common/hero" ); ?>

<div class="container">
    <div class="row">
        <div class="<?php echo $alpha_layout_class; ?>">
            <div class="posts">

                <?php
                while( have_posts() ):
                    the_post();
                ?>

                <div <?php post_class(); ?>>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 <?php echo $alpha_text_class; ?>">
                                <h2 class="post-title"><?php the_title(); ?></h2>
                                <p class="">
                                    <strong><?php the_author_posts_link(); ?></strong><br/>
                                    <?php echo get_the_date(); ?>
                                </p>
                            </div>
                            <div class="col-md-12">
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

                                    wp_link_pages($defaults);

                                    // next_post_link();
                                    // echo "<br/>";
                                    // previous_post_link();
                                ?>
                            </div>

                            <div class="author-section">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <?php
                                        echo get_avatar( get_the_author_meta("id"));
                                        ?>
                                    </div>
                                    <div class="col-lg-10">
                                        <h4>
                                            <?php 
                                            echo get_the_author_meta( "display_name" );
                                            ?>
                                        </h4>
                                        <p>
                                            <?php 
                                            echo get_the_author_meta( "description" );
                                            ?>
                                        </p>
                                    </div>
                                </div>
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
        </div>
        <?php
        if(is_active_sidebar("sidebar-1")):
        ?>
        <div class="col-md-4">
            <?php
            if(is_active_sidebar("sidebar-1")){
                dynamic_sidebar("sidebar-1");
            }
            ?>
        </div>
        <?php
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>



