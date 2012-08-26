<table>

	<tr>
		<td scope="row" style="padding:0 0 0.5em 0;">
			<label for="woo_ai_aioseop_title"><?php _e( 'Title', 'woo_ai' ); ?></label>
		</td>
		<td>
			<input type="text" id="woo_ai_aioseop_title" name="aioseop_title" value="<?php echo $title; ?>" size="62" />
		</td>
	</tr>

	<tr>
		<td scope="row" style="padding:0 0 0.25em 0;">
			<label for="woo_ai_aioseop_description"><?php _e( 'Description', 'woo_ai' ); ?></label>
		</td>
		<td>
			<textarea id="woo_ai_aioseop_description" name="aioseop_description" rows="3" cols="60"><?php echo $description; ?></textarea>
		</td>
	</tr>

	<tr>
		<td scope="row" style="padding:0 0 0.25em 0;">
			<label for="woo_ai_aioseop_keywords"><?php _e( 'Keywords (comma separated)', 'woo_ai' ); ?></label>
		</td>
		<td>
			<input type="text" id="woo_ai_aioseop_keywords" name="aioseop_keywords" value="<?php echo $keywords; ?>" size="62" />
		</td>
	</tr>

	<tr>
		<td scope="row" style="padding:0 0 0.25em 0;">
			<label for="woo_ai_aioseop_title_atr"><?php _e( 'Title atrributes', 'woo_ai' ); ?></label>
		</td>
		<td>
			<input type="text" id="woo_ai_aioseop_title_atr" name="aioseop_titleatr" value="<?php echo $title_atr; ?>" size="62" />
		</td>
	</tr>

	<tr>
		<td scope="row" style="padding:0 0 0.25em 0;">
			<label for="woo_ai_aioseop_menu_label"><?php _e( 'Menu label', 'woo_ai' ); ?></label>
		</td>
		<td>
			<input type="text" id="woo_ai_aioseop_menu_label" name="aioseop_menulabel" value="<?php echo $menu_label; ?>" size="62" />
		</td>
	</tr>

</table>