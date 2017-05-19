<?php
global $cl_redata, $cl_current_view;

$cl_current_view = 'blog';
$spancontent = 12;

$layout = $cl_redata['bloglayout'];

if($cl_redata['overwrite_layout'])
    $layout = $cl_redata['layout'];

if($layout == 'fullwidth')
    $spancontent = 12;
else if($layout == 'dual')
    $spancontent = 6;
else
    $spancontent = 9;

$blog_page = $cl_redata['blogpage'];

get_header();

?>
 
<?php $blog_style = $cl_redata['blog_style']; ?>

<?php get_template_part('includes/view/page_header'); ?>

<?php if($blog_style != 'fullscreen'): ?>

<section id="content" class="<?php echo esc_attr($layout) ?>">
    	
        <div class="container" id="blog">
        	<div class="row">

            <?php if($layout == 'sidebar_left' || $layout == 'dual') get_sidebar() ?>   

                <div class="span<?php echo esc_attr($spancontent) ?>" id="posts_container">
                <?php
                    if($blog_style == 'grid')
                        get_template_part( 'includes/view/blog/loop', 'grid' ); 
                    elseif($blog_style == 'alternate')
                        get_template_part( 'includes/view/blog/loop', 'second-style' );
                    elseif($blog_style == 'timeline')
                        get_template_part( 'includes/view/blog/loop', 'timeline' );
                    else
                        get_template_part( 'includes/view/blog/loop', 'index' );
                ?>

            </div>

            <?php wp_reset_query(); ?> 
            
            <?php if($layout == 'sidebar_right' || $layout == 'dual') if($layout != 'dual') get_sidebar(); else get_sidebar('dual'); ?>  

            </div>
        </div> 
        

        

</section>

<?php endif; ?>
<?php 
    if($blog_style == 'fullscreen')
        get_template_part( 'includes/view/blog/loop', 'fullscreen' );
?>

<?php get_footer(); ?>