<?php

		// Delete our Gridiron yardlines

		$args = array (
			'post_type' => 'gridiron',
			'nopaging' => true
			);
		$loop = new WP_Query ($args);
		while ($loop->have_posts ()) {
			$loop->the_post ();
			$id = get_the_ID ();
			wp_delete_post ($id, true);
		}
		wp_reset_postdata ();

?>