<?php
function wcl_social_links() {
	$social_links = get_field( 'social_links', 'option' );

	ob_start();

	if ( ! empty( $social_links ) ) {
		echo '<ul class="wcl-social-links">';
		foreach ( $social_links as $link ) {
			echo '<li>';
			echo '<a href="' . esc_url( $link['link'] ) . '" class="wcl-social-links__item" target="_blank" rel="noopener nofollow" aria-label="Follow us">';
			echo '<i class="' . esc_attr( $link['social_media'] ) . '"></i>';
			echo '</a>';
			echo '</li>';
		}
		echo '</ul>';
	}
	return ob_get_clean();
}

add_shortcode( 'wcl_social_links', 'wcl_social_links' );