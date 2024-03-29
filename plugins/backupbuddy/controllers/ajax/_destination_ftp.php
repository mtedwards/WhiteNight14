<?php
if ( !empty( $_GET['callback_data'] ) ) {
	$callback_data = $_GET['callback_data'];
} else {
	$callback_data = '';
}?>


<form id="posts-filter" enctype="multipart/form-data" method="post" action="<?php echo pb_backupbuddy::ajax_url( 'destination_picker' ); ?>&callback_data=<?php if ( !empty( $_GET['callback_data'] ) ) { echo $_GET['callback_data']; } ?>&migrate=<?php echo pb_backupbuddy::_GET( 'migrate' ); ?>#pb_backupbuddy_remote_destinations_tab_ftp">
	<div class="tablenav">
		<div class="alignleft actions">
			<input type="submit" name="delete_destinations" value="<?php _e('Delete', 'it-l10n-backupbuddy' );?>" class="button-secondary delete" />
		</div>
	</div>
	<table class="widefat">
		<thead>
			<tr class="thead">
				<th scope="col" class="check-column">&nbsp;<!-- input type="checkbox" class="check-all-entries" --></th>
				<?php
					echo '<th>', __( 'Name',     'it-l10n-backupbuddy' ), '</th>',
						 '<th>', __( 'Address',  'it-l10n-backupbuddy' ), '</th>',
						 '<th>', __( 'Username', 'it-l10n-backupbuddy' ), '</th>',
						 '<th>', __( 'Path',     'it-l10n-backupbuddy' ), '</th>',
						 '<th>', __( 'Limit',    'it-l10n-backupbuddy' ), '</th>';
				?>
			</tr>
		</thead>
		<tfoot>
			<tr class="thead">
				<th scope="col" class="check-column">&nbsp;<!-- input type="checkbox" class="check-all-entries" --></th>
				<?php
					echo '<th>', __( 'Name',     'it-l10n-backupbuddy' ), '</th>',
						 '<th>', __( 'Address',  'it-l10n-backupbuddy' ), '</th>',
						 '<th>', __( 'Username', 'it-l10n-backupbuddy' ), '</th>',
						 '<th>', __( 'Path',     'it-l10n-backupbuddy' ), '</th>',
						 '<th>', __( 'Limit',    'it-l10n-backupbuddy' ), '</th>';
				?>
			</tr>
		</tfoot>
		<tbody>
			<?php
			$file_count = 0;
			foreach ( (array)pb_backupbuddy::$options['remote_destinations'] as $destination_id => $destination ) {
				if ( $destination['type'] != 'ftp' ) {
					continue;
				}
				
				$destination = array_merge( pb_backupbuddy::settings( 'ftp_defaults' ), $destination );
				?>
				<tr class="entry-row alternate">
					<th scope="row" class="check-column"><input type="checkbox" name="destinations[]" class="entries" value="<?php echo $destination_id; ?>" /></th>
					<td>
						<?php echo $destination['title']; ?><br />
							<a href="<?php echo $destination_id; ?>" alt="<?php echo $destination['title'] . ' (FTP)'; ?>" class="pb_backupbuddy_selectdestination"><?php _e('Select Destination','it-l10n-backupbuddy' );?></a> |
							<a href="<?php echo admin_url('admin-ajax.php') . '?action=pb_backupbuddy_destination_picker&duplicate=' . htmlentities( $destination_id ); ?>&callback_data=<?php if ( !empty( $_GET['callback_data'] ) ) { echo $_GET['callback_data']; } ?>&type=ftp&migrate=<?php echo pb_backupbuddy::_GET( 'migrate' ); ?>#pb_backupbuddy_remote_destinations_tab_ftp"><?php _e('Duplicate', 'it-l10n-backupbuddy' );?></a> |
							<a href="<?php echo admin_url('admin-ajax.php') . '?action=pb_backupbuddy_destination_picker&edit=' . htmlentities( $destination_id ); ?>&callback_data=<?php if ( !empty( $_GET['callback_data'] ) ) { echo $_GET['callback_data']; } ?>&type=ftp&migrate=<?php echo pb_backupbuddy::_GET( 'migrate' ); ?>#pb_backupbuddy_remote_destinations_tab_ftp"><?php _e('Edit', 'it-l10n-backupbuddy' );?></a>
					</td>
					<td style="white-space: nowrap;">
						<?php echo $destination['address']; ?>
					</td>
					<td style="white-space: nowrap;">
						<?php echo $destination['username']; ?>
					</td>
					<td style="white-space: nowrap;">
						<?php echo $destination['path']; ?>
					</td>
					<td>
						<?php
							echo $destination['archive_limit'];
						?>
					</td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
	<div class="tablenav">
		<div class="alignleft actions">
			<input type="submit" name="delete_destinations" value="<?php _e('Delete', 'it-l10n-backupbuddy' );?>" class="button-secondary delete" />
		</div>
	</div>
	
</form>

<br />

<?php
if ( isset( $_GET['edit'] ) && ( $_GET['edit'] != '' ) && ( $_GET['type'] == 'ftp' ) ) {
	$options = array_merge( pb_backupbuddy::settings( 'ftp_defaults' ), (array)pb_backupbuddy::$options['remote_destinations'][$_GET['edit']] );
	
	echo '<h3>',__('Edit Destination', 'it-l10n-backupbuddy' ),'</h3>';
	echo '<form method="post" action="' . pb_backupbuddy::ajax_url( 'destination_picker' ) . '&edit=' . htmlentities( $edit_id ) . '&callback_data=' . $callback_data . '&type=ftp&migrate=' . pb_backupbuddy::_GET( 'migrate' ) . '#pb_backupbuddy_remote_destinations_tab_ftp">';
	echo '	<input type="hidden" name="savepoint" value="remote_destinations#' . $_GET['edit'] . '" />';
} else {
	$options = pb_backupbuddy::settings( 'ftp_defaults' );
	
	echo '<h3>', __('Add New Destination', 'it-l10n-backupbuddy' ) . ' ' . pb_backupbuddy::video( 'O2fK6W4tokE', __('Add a new FTP destination', 'it-l10n-backupbuddy' ), false ) . '</h3>';
	echo '<form method="post" action="' . pb_backupbuddy::ajax_url( 'destination_picker' ) . '&callback_data=' . $callback_data . '&type=ftp&migrate=' . pb_backupbuddy::_GET( 'migrate' ) . '#pb_backupbuddy_remote_destinations_tab_ftp">';
}
?>
	<input type="hidden" name="#type" value="ftp" />
	<input type="hidden" name="required_fields" value="title,address,username,password,archive_limit">
	<table class="form-table">
		<tr>
			<td><label for="title"><?php _e('Destination Name', 'it-l10n-backupbuddy' ); pb_backupbuddy::tip( __('Name of the new destination to create. This is for your convenience only.', 'it-l10n-backupbuddy' ) ); ?></label></td>
			<td><input type="text" name="#title" id="title" size="45" maxlength="45" value="<?php echo $options['title']; ?>" /></td>
		</tr>
		<tr>
			<td><label for="address"><?php _e('Server Address', 'it-l10n-backupbuddy' ); pb_backupbuddy::tip( __('[Example: ftp.foo.com] - FTP server address.  Do not include http:// or ftp:// or any other prefixes. You may specify an alternate port in the format of ftp_address:ip_address such as yourftp.com:21', 'it-l10n-backupbuddy' ) ); ?></label></td>
			<td><input type="text" name="#address" id="address" size="45" maxlength="45" value="<?php echo $options['address']; ?>" /></td>
		</tr>
		<tr>
			<td><label for="username"><?php _e('Username', 'it-l10n-backupbuddy' ); pb_backupbuddy::tip( __('[Example: foo] - Username to use when connecting to the FTP server.', 'it-l10n-backupbuddy' ) ); ?></label></td>
			<td><input type="text" name="#username" id="username" size="45" maxlength="45" value="<?php echo $options['username']; ?>" /></td>
		</tr>
		<tr>
			<td><label for="password"><?php _e('Password', 'it-l10n-backupbuddy' ); pb_backupbuddy::tip( __('[Example: 1234xyz] - Password to use when connecting to the FTP server.', 'it-l10n-backupbuddy' ) ); ?></label></td>
			<td><input type="password" name="#password" id="password" size="45" maxlength="45" value="<?php echo $options['password']; ?>" /></td>
		</tr>
		<tr>
			<td><label for="path"><?php _e('Remote Path (optional)', 'it-l10n-backupbuddy' ); pb_backupbuddy::tip( __('[Example: /public_html/backups] - Remote path to place uploaded files into on the destination FTP server. Make sure this path is correct; if it does not exist BackupBuddy will attempt to create it. No trailing slash is needed.', 'it-l10n-backupbuddy' ) ); echo ' '; pb_backupbuddy::video( 'O2fK6W4tokE#43', __('Set a FTP remote directory', 'it-l10n-backupbuddy' ) ); ?></label></td>
			<td><input type="text" name="#path" id="path" size="45" maxlength="250" value="<?php echo $options['path']; ?>" /></td>
		</tr>
		<tr>
			<td><label for="archive_limit"><?php _e('Archive Limit', 'it-l10n-backupbuddy' ); pb_backupbuddy::tip( __('[Example: 5] - Enter 0 for no limit. This is the maximum number of archives to be stored in this specific destination. If this limit is met the oldest backups will be deleted.', 'it-l10n-backupbuddy' ) ); echo ' '; ?></label></td>
			<td><input type="text" name="#archive_limit" id="archive_limit" size="45" maxlength="6" value="<?php echo $options['archive_limit']; ?>" /></td>
		</tr>
		<tr>
			<td valign="top"><label><?php _e('File Transfer Mode', 'it-l10n-backupbuddy' ); pb_backupbuddy::tip( __('[Default: Active] - Determines whether the FTP file transfer happens in FTP active or passive mode.  Some servers or those behind a firewall may need to use PASV, or passive mode as a workaround.', 'it-l10n-backupbuddy' ) ); ?></label></td>
			<td>
				<select name="#active_mode">
					<option value="1" <?php if ( $options['active_mode'] == '1' ) { echo 'selected="selected"'; } ?>>Active (default)</option>
					<option value="0" <?php if ( $options['active_mode'] == '0' ) { echo 'selected="selected"'; } ?>>Passive</option>
				</select>
			</td>
		</tr>
		<tr>
			<td valign="top"><label><?php _e('Use FTPs Encryption', 'it-l10n-backupbuddy' ); pb_backupbuddy::tip( __('[Default: disabled] - Select whether this connection is for FTP or FTPs (enabled; FTP over SSL). Note that FTPs is NOT the same as sFTP (FTP over SSH) and is not compatible or equal.', 'it-l10n-backupbuddy' ) ); ?></label></td>
			<td>
				<input type="hidden" name="#ftps" value="0" />
				<input type="checkbox" name="#ftps" id="ftps" value="1" <?php if ( $options['ftps'] == '1' ) { echo 'checked'; } ?> /> <label for="high_security"><?php _e('Enable high security mode (not supposed by most servers)', 'it-l10n-backupbuddy' );?></label>
			</td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td>
				<a class="button button-secondary pb_backupbuddy_remotetest" id="pb_backupbuddy_remotetest_ftp" alt="<?php echo pb_backupbuddy::ajax_url( 'remote_test' ); ?>&service=ftp"><?php _e('Test these settings', 'it-l10n-backupbuddy' );?></a><span class="pb_backupbuddy_loading" style="display: none; margin-left: 10px;"><img src="<?php echo pb_backupbuddy::plugin_url();; ?>/images/loading.gif" <?php echo 'alt="', __('Loading...', 'it-l10n-backupbuddy' ),'" title="',__('Loading...', 'it-l10n-backupbuddy' ),'"';?> width="16" height="16" style="vertical-align: -3px;"></span>
			</td>
		</tr>
		
	</table>
	
	<?php
	if ( isset( $_GET['edit'] ) && ( $_GET['edit'] != '' ) && ( $_GET['type'] == 'ftp' ) ) {
		echo '<p class="submit"><input type="submit" name="edit_destination" value="', __('Save Changes', 'it-l10n-backupbuddy' ), '" class="button-primary" /></p>';
	} else {
		echo '<p class="submit"><input type="submit" name="add_destination" value="+ ', __('Add Destination', 'it-l10n-backupbuddy' ), '" class="button-primary" /></p>';
	}
	
	?>
</form>

