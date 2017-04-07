<?php
	/*
	* this file contains all shortcode functions and definitions for wp-schema-plugin
	*/


	/*
	*	returns formatted testimonial loop
	*/
	function wsp_testimonials_shortcode( $atts ) {
	    $a = shortcode_atts( array(
				'mode' => 'html',
	      'id' => false,
				'limit' => -1, // -1 removes post limit, 0 uses max posts
				'hr' => false
	    ), $atts );

			/*
			* get single testimonial if id is given,
			* else return array of testimonials
			*/
			if ($a['id']){

				// get post by id
				$get_testimonial = get_post($a['id']);

				// check if post is testimonial and return testimonial or notification
				if($get_testimonial->post_type == 'wsp_testimonials' && $get_testimonial->post_status == 'publish'){
					$testimonial = array(
						'ID' => $get_testimonial->ID,
						'date' => $get_testimonial->post_date,
						'content' => $get_testimonial->post_content,
						'title' => $get_testimonial->post_title,
						'stars' => get_post_meta( $a['id'], '_wsp_stars', true )
					);

						$output = (object) array($testimonial);

				} else {
					$output = _e('Not a testimonial', 'wp_schema_plugin');
				}
			} else {
				$args = array(
					'post_type' => 'wsp_testimonials',
					'post_status' => 'publish',
					'numberposts' => $a['limit']
				);
				$testimonials = get_posts( $args );

				foreach ( $testimonials as $testimonial ){
					$output[] = (object) array(
						'ID' => $testimonial->ID,
						'date' => $testimonial->post_date,
						'content' => $testimonial->post_content,
						'title' => $testimonial->post_title,
						'stars' => get_post_meta( $testimonial->ID, '_wsp_stars', true )
					);
				}
				wp_reset_postdata();
			}

			if($a['mode'] == 'raw'){
				return $output;
			} else {
				$star = '<span class="dashicons dashicons-star-filled"></span>';

				foreach($output as $html): ?>

				<div class="wsp wsp-review wsp-review-<?php echo $html->ID; ?>">
					<p class="wsp wsp-review-content"><?php echo $html->content; ?></p>
					<?php if($html->stars):?>
						<p class="wsp wsp-review-rating">
							<span class="wsp wsp-stars wsp-stars-<?php $html->ID ?>">
								<?php echo str_repeat($star, $html->stars); ?>
							</span>
						</p>
					<?php endif; ?>
					<p class="wsp wsp-review-name"><?php echo $html->title; ?></p>
				</div>
				<?php if($a['hr']): ?>
					<hr class="wsp-hr">
				<?php endif; ?>

				<?php endforeach;
			}
	}

	/*
	*	Now bring them to life
	*/
	add_shortcode( 'wsp_testimonials', 'wsp_testimonials_shortcode' );
?>
