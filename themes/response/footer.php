</section><!-- Container End -->

<div class="row full-width">
	<?php dynamic_sidebar("Footer"); ?>
</div>

<footer class="row full-width" role="contentinfo">
	<div class="small-12 large-4 columns">
	<hr>
		<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
        <?php if(is_user_logged_in()){ echo get_num_queries(); } ?>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>