<?php
/**
 * Template Name: Partnerships
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Limberlost
 */

get_header(); ?>

	<div class="content-area partnerships offset-alternating">

		<section>

			icon

			<?php the_field('section_description', 2104); ?>

		</section>

		<?php

		$oddpost = 'odd-row';

	    $args = array(
	        'post_type' => 'partnership',
			'posts_per_page' => 4,
	    );
	    $query = new WP_Query($args);

	    if($query->have_posts()) : ?>

		    <?php while($query->have_posts()) : ?>

		        <?php $query->the_post(); ?>

				<?php if ($query->current_post % 2 == 0): ?>

					<section class="<?php echo $oddpost; ?>">

						<div class="section-portal">

							<div class="section-content">

								<div>
									<img src="<?php the_field('company_logo'); ?>" alt="company_logo"/>
								</div>
								<div class="">
									<h1><?php the_title() ?></h1>
									<?php the_excerpt(); ?>
									<a href="<?php the_permalink(); ?>">View Case Study ></a>
								</div>

							</div>

						</div>

						<div class="section-supporting">

							<?php $mobile = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portal-mobile' ); ?>
							<?php $tablet = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portal-tablet' ); ?>
							<?php $desktop = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portal-desktop' ); ?>
							<?php $retina = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portal-retina' ); ?>

							<picture>
								<!--[if IE 9]><video style="display: none;"><![endif]-->
								<source
									srcset="<?php echo $mobile[0]; ?>"
									media="(max-width: 500px)" />
								<source
									srcset="<?php echo $tablet[0]; ?>"
									media="(max-width: 860px)" />
								<source
									srcset="<?php echo $desktop[0]; ?>"
									media="(max-width: 1180px)" />
								<source
									srcset="<?php echo $retina[0]; ?>"
									media="(min-width: 1181px)" />
								<!--[if IE 9]></video><![endif]-->
								<img srcset="<?php echo $image[0]; ?>">
							</picture>

						</div>

					</section>

				<?php else: ?>

					<section class="<?php echo $oddpost; ?>">

						<div class="section-supporting">

							<?php $mobile = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portal-mobile' ); ?>
							<?php $tablet = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portal-tablet' ); ?>
							<?php $desktop = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portal-desktop' ); ?>
							<?php $retina = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portal-retina' ); ?>

							<picture>
								<!--[if IE 9]><video style="display: none;"><![endif]-->
								<source
									srcset="<?php echo $mobile[0]; ?>"
									media="(max-width: 500px)" />
								<source
									srcset="<?php echo $tablet[0]; ?>"
									media="(max-width: 860px)" />
								<source
									srcset="<?php echo $desktop[0]; ?>"
									media="(max-width: 1180px)" />
								<source
									srcset="<?php echo $retina[0]; ?>"
									media="(min-width: 1181px)" />
								<!--[if IE 9]></video><![endif]-->
								<img srcset="<?php echo $image[0]; ?>">
							</picture>

						</div>

						<div class="section-portal">

							<div class="section-content">

								<div>
									<img src="<?php the_field('company_logo'); ?>" alt="company_logo"/>
								</div>
								<div class="">
									<h1><?php the_title() ?></h1>
									<?php the_excerpt(); ?>
									<a href="<?php the_permalink(); ?>">View Case Study ></a>
								</div>

							</div>

						</div>

					</section>

				<?php endif ?>

				<?php /* Changes every other post to a different class */
					if ('odd-row' == $oddpost) $oddpost = 'even-row';
					else $oddpost = 'odd-row';
				?>

			<?php endwhile; ?>

		<?php endif; ?>

		<section class="partner-contact-form">

			gravity form

		</section>

	</div><!-- #primary -->

<?php get_footer(); ?>