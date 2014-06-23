<?php
function mifp_options_page() {

  global $mifp_options;
  
	ob_start(); ?>
	<div class="wrap">
		<h2>Instagram Favourites</h2>
		<p>This adds the option to display the images favourited by an Instagram account.</p>
		<form method="post" action="options.php">
 
			<?php settings_fields('mifp_settings_group'); ?>
 
			<h4><?php _e('Instagram Information', 'mifp_domain'); ?></h4>
			<p>
				<label class="description" for="mifp_settings[instagram_username]"><?php _e('Enter your Username', 'mifp_domain'); ?></label><br>
				<input style="width:500px; padding:10px; max-width:100%;" id="mifp_settings[instagram_username]" name="mifp_settings[instagram_username]" type="text" value="<?php echo $mifp_options['instagram_username']; ?>"/>
			</p>
			<p>
				<label class="description" for="mifp_settings[instagram_user_id]"><?php _e('Enter your User ID', 'mifp_domain'); ?></label><br>
				<input style="width:500px; padding:10px; max-width:100%;" id="mifp_settings[instagram_user_id]" name="mifp_settings[instagram_user_id]" type="text" value="<?php echo $mifp_options['instagram_user_id']; ?>"/>
			</p>
			<p>
				<label class="description" for="mifp_settings[instagram_access_token]"><?php _e('Enter your Access Token', 'mifp_domain'); ?></label><br>
				<input style="width:500px; padding:10px; max-width:100%;" id="mifp_settings[instagram_access_token]" name="mifp_settings[instagram_access_token]" type="text" value="<?php echo $mifp_options['instagram_access_token']; ?>"/>
			</p>
			
		  <p>
				<label class="description" for="mifp_settings[instagram_display]"><?php _e('What would you like to display?', 'mifp_domain'); ?></label><br>
        <?php $displayOptions = array('All', 'Favourites'); ?>
        <?php $display = $mifp_options['instagram_display'];?>
        <select type="checkbox" id="mifp_settings[instagram_display]" name="mifp_settings[instagram_display]" />
          <?php foreach($displayOptions as $displayOption) { ?>
          <?php if($display == $displayOption) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
            <option <?php echo $selected; ?> value="<?php echo $displayOption; ?>"><?php echo $displayOption; ?></option> 
          <?php } ?> 
        </select>
			</p>

			
      <p>
				<label class="description" for="mifp_settings[instagram_css]"><?php _e('Include Basic CSS', 'mifp_domain'); ?></label><br>
        <?php $cssOptions = array('Yes', 'No'); ?>
        <?php $css = $mifp_options['instagram_css'];?>
        <select type="checkbox" id="mifp_settings[instagram_css] cssVal" name="mifp_settings[instagram_css]" />
          <?php foreach($cssOptions as $cssOption) { ?>
            <?php if($css == $cssOption) { $selected = 'selected="selected"'; } else { $selected = ''; } ?>
              <option <?php echo $selected; ?> value="<?php echo $cssOption; ?>"><?php echo $cssOption; ?></option> 
            <?php } ?> 
        </select>
			</p>
      

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Options', 'mifp_domain'); ?>" />
			</p>
 
		</form>
		<br><br>
		<h3>Available Shortcodes:</h3>
		<p><b>[insta_gallery]</b> Outputs the last 16 images and a link to retrieve more images. Note: Links only appear if there ARE more images to retrieve.</p>
		<p><b>[insta_single]</b> Display the most recent Instagram image favourited</p>
		<p><b>[insta_single_link link="XXXXX"]</b> Returns the most recent image as a link, where XXXX is the URL to link to.</p>
	</div>
	<?php
	echo ob_get_clean();
}

function mifp_add_options_link() {
	add_options_page('Instagram Favourites Plugin', 'Instagram', 'manage_options', 'mifp-options', 'mifp_options_page');
}
add_action('admin_menu', 'mifp_add_options_link');


function mifp_register_settings() {
	// creates our settings in the options table
	register_setting('mifp_settings_group', 'mifp_settings');
}
add_action('admin_init', 'mifp_register_settings');
