<?php 
get_header();

$theme_options = cozycorner_get_theme_options();
$classes = array();
$classes[] = 'show_breadcrumb_' . $theme_options['ts_breadcrumb_layout'];

$image_404 = is_array($theme_options['ts_404_page_image'])?$theme_options['ts_404_page_image']['url']:$theme_options['ts_404_page_image'];
if( !$image_404 ){
	$image_404 = get_template_directory_uri() . '/images/img-404.jpg'; 
}

cozycorner_breadcrumbs_title(true, false, get_the_title());
?>
	<div class="page-container <?php echo esc_attr(implode(' ', $classes)); ?>">
		<div id="main-content">	
			<div id="primary" class="site-content">
				<article>
					<div class="not-found">
						<div class="content-404">
							<h1><?php esc_html_e('404', 'cozycorner'); ?></h1>
							<p><?php esc_html_e('This page does not exist', 'cozycorner'); ?></p>
						</div>
						
						<div class="image-404">
							<img loading="lazy" src="<?php echo esc_url($image_404); ?>" alt="<?php esc_attr_e('404 image', 'cozycorner'); ?>">
						</div>
					</div>
				</article>
			</div>
		</div>
	</div>
<?php
get_footer();