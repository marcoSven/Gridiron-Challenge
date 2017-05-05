<html>

<head>
	<meta name="viewport" content="width=device-width" />
	<title>Gridiron Challenge</title>
	<link rel="stylesheet" type="text/css" href="<?php echo dirname(plugin_dir_url( __FILE__ ))."/styles.min.css"; ?>">
</head>

<body>

<main class="archive">

	<header><h1>Welcome Challenger</h1></header>
	<section id="stadium">
		<div id="field">
			<div class="yard"></div><!-- Touchdown -->
			<!-- Challenger: PHP/Markup -->
			<?php $i= 0; if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php if ( $i <= 4 ) { $class = "up"; } else {$class = "down"; }?>
				<articles class="yard line-<?php the_title(); ?> <?php echo $class; ?>"></articles>
			<?php $i++; endwhile; endif; ?>
			<div class="yard"></div><!-- Touchdown -->
			<div id="scrimmage" ><span>0</span></div>
		</div><!-- /#field -->
	</section><!-- /#stadium -->

</main>

<!--
<style type="text/css">

/* Challenger: Styles here */

<?php echo file_get_contents( dirname( dirname( __FILE__ ) )."/styles.css" );  ?>

</style>
-->
<!-- Challenger, use of jQuery libraries is optional -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
<!-- Adding touch support so we can drag the scrimmage line on touch devices -->
<script src="<?php echo dirname( plugin_dir_url( __FILE__ ) )."/assets/scripts/jQueryUITouchPunch.min.js"; ?>"></script>
<!-- Minified Gridiron script -->
<script src="<?php echo dirname( plugin_dir_url( __FILE__ ) )."/assets/scripts/gridiron.min.js"; ?>"></script>
<!--
<script type="text/javascript">

/* Challenger: Javascript here */

<?php echo file_get_contents( dirname( dirname( __FILE__ ) )."/assets/js/gridiron.js" );  ?>

</script>
-->

<footer>
	<div>
		<p>
			Please see <a href="<?php echo dirname( plugin_dir_url( __FILE__ ) )."/README.md";  ?>"> README.md </a> for my notes.
		</p>
		<p>
			Created by <a href="https://www.marcosven.com/">marcosven</a> .
		</p>
	</div>
</footer>

</body>

</html>