<?php
/*
* Template Name: front page
*/ 
?>

<?php get_header(); ?>
<body <?php body_class(); ?>>

<?php get_template_part( "template-parts/common/hero" ); ?>

<div class="posts" <?php post_class(); ?>>

    <?php
    while( have_posts() ):
        the_post();
    ?>

    <div class="post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>
                        <strong><?php the_author(); ?></strong><br/>
                        <?php echo get_the_date(); ?>
                    </p>
                    <!-- tag list -->
                    <?php echo get_the_tag_list( "<ul class=\"list-unstyled\"><li>", "</li><li>", "</li></ul>" ); ?>
                </div>
                <div class="col-md-8">
                    <p>
                        <?php 
                        if(has_post_thumbnail()){
                            echo '<a class="popup" href="#" data-featherlight="image">';
                            the_post_thumbnail( "large", array("class"=>"img-fluid") );
                            echo '</a>';
                        }

                        ?>
                    </p>
                    <?php 

                        the_excerpt();

                    // if( !post_password_required() ){
                    //     the_excerpt();
                    // } else{
                    //     echo get_the_password_form();
                    // }
                    
                        
                    ?>
                </div>
            </div>
            
            
        </div>
    </div>

    <?php
    endwhile;
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
<?php get_footer(); ?>