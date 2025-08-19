<?php
get_header();

$theme_options = cozycorner_get_theme_options();

$page_column_class = cozycorner_page_layout_columns_class($theme_options['ts_blog_layout'], $theme_options['ts_blog_left_sidebar'], $theme_options['ts_blog_right_sidebar']);

if( is_search() ){
	cozycorner_breadcrumbs_title(true, true, esc_html__( 'Search Results for: ', 'cozycorner' ) . get_search_query());
}
?>
<div class="page-template blog-template index-template page-container <?php echo esc_attr($page_column_class['main_class']); ?>">
	<!-- Left Sidebar -->
	<?php if( $page_column_class['left_sidebar'] ): ?>
		<div id="left-sidebar" class="ts-sidebar">
			<aside>
				<?php dynamic_sidebar( $theme_options['ts_blog_left_sidebar'] ); ?>
			</aside>
		</div>
	<?php endif; ?>			
	
	<div id="main-content">	
		<div id="primary" class="site-content">
			
			<?php	
				if( have_posts() ):
					echo '<div class="list-posts ' . cozycorner_get_theme_options('ts_blog_item_layout') . '">';
					while( have_posts() ) : the_post();
						get_template_part( 'content', get_post_format() ); 
					endwhile;
					echo '</div>';
				else:
					echo '<div class="alert alert-error">';
						echo '<h3>'.esc_html__('Sorry. There are no posts to display!', 'cozycorner').'</h3>';
						echo '<p>'.esc_html__('Try researching for something else.', 'cozycorner').'</p>';
					echo '</div>';
					echo '<div class="search-wrapper">';
						get_search_form();
					echo '</div>';
				endif;
				
				cozycorner_pagination();
			?>

		</div>
	</div>
	
	
	<!-- Right Sidebar -->
	<?php if( $page_column_class['right_sidebar'] ): ?>
		<div id="right-sidebar" class="ts-sidebar">
			<aside>
				<?php dynamic_sidebar( $theme_options['ts_blog_right_sidebar'] ); ?>
			</aside>
		</div>
	<?php endif; ?>	
		
</div>
<?php get_footer(); ?>