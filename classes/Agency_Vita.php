<?php

class Agency_Vita {
	public function get_vita( $slug, $heading = '' ) {

		if ( ! $slug ) {
			return ' ';
		}

		$base_url = AGENCY_API_BASE_URL .'/partial/vita/';

		$transient_name = 'agency-vita-' . $slug;

		if ( AGENCY_ENABLE_CACHE ) {
			$body = get_transient( $transient_name );
		} else {
			$body = false;
		}

		ob_start();

		if ( ! $body ) {
			$response = wp_remote_get( $base_url . $slug );

			if ( is_wp_error( $response ) ) {
				echo '<div>';
				echo '<p><strong>Fehler beim Abrufen der Daten</strong></p>';
				echo $response->get_error_message();
				echo '</div>';
			} elseif ( wp_remote_retrieve_response_code( $response ) != 200 ) {
				echo '<div>';
				echo '<p><strong>Fehler beim Abrufen der Daten</strong></p>';
				echo wp_remote_retrieve_response_code( $response ) . ': ' . wp_remote_retrieve_response_message( $response );
				echo '</div>';
			} else {
				$body = wp_remote_retrieve_body( $response );
				if ( AGENCY_ENABLE_CACHE ) {
					$body .= '<!-- Vita Cached ' . date("Y-m-d H:i:s") . '-->';
					set_transient( $transient_name, $body, 24 * 60 * 60 );
				}
			}
		}

		echo '<div class="vita">';

		if ( $heading ) {
			echo '<div class="mb-4 font-bold text-xl vita-heading">' . $heading . '</div>';
		}
		echo $body;

		echo '</div>';

		return ob_get_clean();
	}
}

