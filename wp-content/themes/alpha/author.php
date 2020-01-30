<?php get_header(); ?>
<body <?php body_class(); ?>>

<?php get_template_part( "template-parts/common/hero" ); ?>

<div class="container">
    <div class="author-section author-page">
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
</div>

<div class="posts text-center">
    <div <?php post_class(); ?>>

    <?php
    while( have_posts() ){
        the_post();
    ?>

    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

    <?php
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