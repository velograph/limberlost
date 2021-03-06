<?php
/**
 * The template for displaying search results pages.
 *
 * @package Limberlost
 */

get_header(); ?>

<div class="content-area">

	<?php if ( have_posts() ) : ?>

		<section class="section">

			<div class="section-lead-in">
				<div class="section-title">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'Paul Component Engineering' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</div>
			</div>

		</section>


		<div class="search-answers">

			<?php while ( have_posts() ) : the_post(); ?>

						<div class="result">
							<h2>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>
							<div class="excerpt">
								<?php the_excerpt(); ?>
								<a class="read-more" href="<?php the_permalink(); ?>">
									Read More
									<span class="arrow">
										<svg viewBox="0 0 430.7 360.9">
										<g>
											<path d="M50.5,242.7c10.1,0.5,24.6-3.8,33.6-4.1c12.1,2.2,24.2,4.3,36.3,6.5c5.2-0.1,13.1-6.2,18.3-6.3c5.7,2,11.4,4.1,17.2,6.1
												c5.2,0,13.8-5.7,18.3-6.3c15.3-2.2,53.1-1,60.1,11.8c8.6,6.7,5.2,11.2,9.2,19.3c-6.1,14.5-15.6,20.2-27.3,22.4
												c-8.2,28.5,5.8,31.9,10.4,51.9c9.8,5.6,19.6,11.3,29.4,16.9c15.4-4.2,30.8-8.3,46.2-12.5c1.4-7,2.9-14,4.3-21
												c1.9-2.4,9.6-3.8,11.6-5.5c8.2-6.6,13.4-18.3,21.6-24.5c13.9-5.8,27.7-11.6,41.6-17.4l11.8-15.1c5.1-4,16.1-6.8,20.4-12
												c9.8-11.9,5.5-23.7,16.9-29.4c1.9-8.4-4.1-46.4-7.6-51c-7.9-4.9-15.8-9.9-23.7-14.8c-1.5-4.8-3-9.7-4.5-14.5
												c-4.5-5.5-9.2-3.5-12.2-10.8c0.7-1.9,1.3-3.8,2-5.7c-3.9-7-14.6-7.8-20.8-13.8c-6.5-6.4-9.3-19.2-16.7-25.2
												c-13.3-4.8-26.6-9.5-40-14.3c-8.2-6.4-15.2-21.3-22.4-27.3c-11.1-5-22.1-10-33.2-15C242.7,22.7,238,7.8,226.9,0
												c-10.8,6.2-49.1,14.3-62.5,13.1c-2.5,11.2,0.2,17.2,0.4,25.9c-2.8,5-7,6.1-5.1,14.3c1.3,5.5,8.2,9.1,11.2,13.6
												c7.9,11.8,11,31.5,8.6,48.1c19.7,12.4,38.1,28.9,51.8,44.1c-13.3,17.6-39.9,4.2-62.4,3.6c-13.4-0.4-30.4,4-43.2,3.9
												c-16.4-0.1-30.3-9.7-47.7-10.5c-17.6-0.8-48.2-0.7-63.4,6.4c-3.2,1.8-6.6,7.5-9.8,9.4c-10.8,29.8-1.3,34.8,2.7,55.6
												C22,232.6,36.2,237.6,50.5,242.7"/>
										</g>
										</svg>
									</span>
								</a>
							</div>
						</div>

			<?php endwhile; ?>

			<div class="post-navigation">

				<div class="older"><?php next_posts_link( '&laquo; Older', '' ); ?></div>
				<div class="newer"><?php previous_posts_link( 'Newer &raquo;' ); ?></div>

			</div>

		</div>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

</div>

<?php get_footer(); ?>
