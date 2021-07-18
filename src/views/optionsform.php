<?php
namespace Fragen\Category_Colors;

$teccc->setup_terms( $options );

?>
<table class="teccc form-table" xmlns="http://www.w3.org/1999/html">

	<style type="text/css">.form-table th {
			font-size: 12px;
		}</style>

	<tr>
		<th style="width:10px;"><strong><?php esc_html_e( 'Hide', 'the-events-calendar-category-colors' ); ?></strong>
		</th>
		<th><strong><?php esc_html_e( 'Category Slug', 'the-events-calendar-category-colors' ); ?></strong></th>
		<th><strong><?php esc_html_e( 'Border Color', 'the-events-calendar-category-colors' ); ?></strong></th>
		<th><strong><?php esc_html_e( 'Background Color', 'the-events-calendar-category-colors' ); ?></strong></th>
		<th><strong><?php esc_html_e( 'Text Color', 'the-events-calendar-category-colors' ); ?></strong></th>
		<th><strong><?php esc_html_e( 'Current Display', 'the-events-calendar-category-colors' ); ?></strong></th>
	</tr>

	<?php foreach ( (array) $teccc->all_terms as $id => $attributes ) : ?>
		<?php
		$slug = esc_attr( $attributes[ Main::SLUG ] );
		$name = esc_attr( $attributes[ Main::NAME ] );
		?>
		<tr>
			<td>
				<label>
					<input name="teccc_options[hide][<?php echo $slug; ?>]" type="checkbox" value="<?php echo $slug; ?>" <?php checked( $slug, $options['hide'][ $slug ] ); ?> />
				</label>
				<?php
				if ( ! empty( $options['hide'][ $slug ] ) ) {
					$options[ "{$slug}-border_none" ]     = isset( $options[ "{$slug}-border_none" ] ) ? $options[ "{$slug}-border_none" ] : null;
					$options[ "{$slug}-background_none" ] = isset( $options[ "{$slug}-background_none" ] ) ? $options[ "{$slug}-background_none" ] : null;
				}
				?>
			</td>

			<td> <?php echo $slug; ?> </td>

			<td class="color-control">
				<div class="transparency">
					<label>
						<input name="teccc_options[<?php echo $slug; ?>-border_none]" type="checkbox" value="1" <?php checked( '1', $options[ "{$slug}-border_none" ] ); ?> /> <?php esc_html_e( 'No Border', 'the-events-calendar-category-colors' ); ?>
					</label><br>
					<?php
					if ( '1' === $options[ "{$slug}-border_none" ] ) :
						$options[ "{$slug}-border" ] = null;
						?>
					<?php endif ?>
				</div>
				<div class="colorselector">
					<label>
						<input class="teccc-color-picker" type="text" name="teccc_options[<?php echo $slug; ?>-border]" value="<?php esc_attr_e( $options[ "{$slug}-border" ] ); ?>" />
					</label>
				</div>
			</td>

			<td class="color-control">
				<div class="transparency">
					<label>
						<input name="teccc_options[<?php echo $slug; ?>-background_none]" type="checkbox" value="1" <?php checked( '1', $options[ "{$slug}-background_none" ] ); ?> /> <?php esc_html_e( 'No Background', 'the-events-calendar-category-colors' ); ?>
					</label><br>
					<?php
					if ( '1' === $options[ "{$slug}-background_none" ] ) :
						$options[ "{$slug}-background" ] = null;
						?>
					<?php endif ?>
				</div>
				<div class="colorselector">
					<label>
						<input class="teccc-color-picker" type="text" name="teccc_options[<?php echo $slug; ?>-background]" value="<?php esc_attr_e( $options[ "{$slug}-background" ] ); ?>" />
					</label>
				</div>
			</td>

			<td>
				<label> <select name="teccc_options[<?php echo $slug; ?>-text]">
						<?php foreach ( (array) $teccc->text_colors as $key => $value ) : ?>
							<option value="<?php esc_attr_e( $value ); ?>" <?php selected( $value, $options[ "{$slug}-text" ] ); ?> > <?php esc_html_e( $key ); ?> </option>
						<?php endforeach ?>
					</select> </label>
			</td>

			<td>
				<span style="
				<?php if ( null !== $options[ "{$slug}-background" ] ) : ?>
					background-color: <?php esc_attr_e( $options[ $slug . '-background' ] ); ?>;
				<?php endif ?>
				<?php if ( null !== $options[ "{$slug}-border" ] ) : ?>
					border-left: 5px solid <?php esc_attr_e( $options[ "{$slug}-border" ] ); ?>;
				<?php endif ?>
					border-right: 5px solid transparent;
				<?php if ( 'no_color' !== $options[ "{$slug}-text" ] ) : ?>
					color:<?php esc_attr_e( $options[ "{$slug}-text" ] ); ?>;
				<?php endif ?>
					padding: 0.5em 1em;
					font-weight: <?php esc_attr_e( $options['font_weight'] ); ?>;">
					<?php echo $name; ?>
				</span>
			</td>
		</tr>
	<?php endforeach ?>

	<tr>
		<td  colspan="2">
			<div><?php esc_html_e( 'Featured Event Color', 'the-events-calendar-category-colors' ); ?></div>
		</td>
		<td class="color-control">
			<div class="transparency">
				<label>
					<input name="teccc_options[featured-event_none]" type="checkbox" value="1" <?php checked( '1', $options['featured-event_none'] ); ?> /> <?php esc_html_e( 'Transparent', 'the-events-calendar-category-colors' ); ?>
				</label><br>
				<?php
				if ( '1' === $options['featured-event_none'] ) :
					$options['featured-event'] = 'transparent';
					?>
				<?php endif ?>
			</div>
			<div class="colorselector">
				<label>
					<input class="teccc-color-picker" type="text" name="teccc_options[featured-event]" value="<?php esc_attr_e( $options['featured-event'] ); ?>" />
				</label>
			</div>
		</td>
		<td colspan="2">
			<p><?php esc_html_e( 'Add right border for featured events.', 'the-events-calendar-category-colors' ); ?></p>
		</td>
	</tr>
	<tr valign="top" style="border-top:#dddddd 1px solid;">
		<td colspan="5"></td>
	</tr>

</table>

<div id="teccc_options">

	<div class="teccc_options_col1"> <?php esc_html_e( 'Reset Button', 'the-events-calendar-category-colors' ); ?> </div>
	<div class="teccc_options_col2">
		<input name="teccc_options[reset_show]" type="checkbox" value="1" <?php checked( '1', $options['reset_show'] ); ?> />
		<label for="teccc_options[reset_show]"><?php esc_html_e( 'Show reset button', 'the-events-calendar-category-colors' ); ?></label>
	</div>
	<div class="teccc_options_col2">
		<input name="teccc_options[reset_label]" type="text" placeholder="Reset" value="<?php echo $options['reset_label']; ?>" />
		<label for="teccc_options[reset_label]">Reset button label</label>
	</div>
	<div class="teccc_options_col2">
		<input name="teccc_options[reset_url]" type="text" placeholder="<?php echo tribe_get_events_link(); ?>" value="<?php echo $options['reset_url']; ?>" />
		<label for="teccc_options[reset_url]">Reset button URL</label>
		<p>By default the reset button will point to the default calendar URL.</p>
	</div>

	<div class="teccc_options_col1"> <?php esc_html_e( 'Font-Weight Options', 'the-events-calendar-category-colors' ); ?> </div>
	<div class="teccc_options_col2">
		<label> <select name="teccc_options[font_weight]" id="teccc_font_weight">
				<?php foreach ( (array) $teccc->font_weights as $key => $value ) : ?>
					<option value="<?php esc_attr_e( $value ); ?>" <?php selected( $value, $options['font_weight'] ); ?>>
						<?php esc_html_e( $key ); ?>
					</option>
				<?php endforeach ?>
			</select> </label>
	</div>
<div id="category_legend_checkboxes">
	<div class="teccc_options_col1"> <?php esc_html_e( 'Show Category Legend', 'the-events-calendar-category-colors' ); ?> </div>
	<div id="category_legend_setting" class="teccc_options_col2">
		<input id="add_legend_month_view" name="teccc_options[add_legend][]" type="checkbox" value="month" <?php checked( 1, in_array('month', $options['add_legend'] ) ); ?>>
		<label for="add_legend_month_view"><?php esc_html_e( 'Month view', 'the-events-calendar-category-colors' ); ?></label>
	</div>
	<div id="category_legend_setting_list_view" class="teccc_options_col2">
		<input id="add_legend_list_view" name="teccc_options[add_legend][]" type="checkbox" value="list" <?php checked( '1', in_array('list', $options['add_legend'] ) ); ?>>
		<label for="add_legend_list_view"><?php esc_html_e( 'List view', 'the-events-calendar-category-colors' ); ?></label>
	</div>
	<div id="category_legend_setting_day_view" class="teccc_options_col2">
		<input id="add_legend_day_view" name="teccc_options[add_legend][]" type="checkbox" value="day" <?php checked( '1', in_array('day', $options['add_legend'] ) ); ?>>
		<label for="add_legend_day_view"><?php esc_html_e( 'Day view', 'the-events-calendar-category-colors' ); ?></label>
	</div>

	<?php if ( class_exists( 'Tribe__Events__Pro__Main' ) ) : ?>
	<div id="category_legend_setting_week_view" class="teccc_options_col2">
		<input id="add_legend_week_view" name="teccc_options[add_legend][]" type="checkbox" value="week" <?php checked( '1', in_array('week', $options['add_legend'] ) ); ?>>
		<label for="add_legend_week_view"><?php esc_html_e( 'Week view', 'the-events-calendar-category-colors' ); ?></label>
	</div>
	<div id="category_legend_setting_photo_view" class="teccc_options_col2">
		<input id="add_legend_photo_view" name="teccc_options[add_legend][]" type="checkbox" value="photo" <?php checked( '1', in_array('photo', $options['add_legend'] ) ); ?>>
		<label for="add_legend_photo_view"><?php esc_html_e( 'Photo view', 'the-events-calendar-category-colors' ); ?></label>
	</div>
	<div id="category_legend_setting_map_view" class="teccc_options_col2">
		<input id="add_legend_map_view" name="teccc_options[add_legend][]" type="checkbox" value="map" <?php checked( '1', in_array('map', $options['add_legend'] ) ); ?>>
		<label for="add_legend_map_view"><?php esc_html_e( 'Map view', 'the-events-calendar-category-colors' ); ?></label>
	</div>
	<div id="category_legend_setting_summary_view" class="teccc_options_col2">
		<input id="add_legend_summary_view" name="teccc_options[add_legend][]" type="checkbox" value="summary" <?php checked( '1', in_array('summary', $options['add_legend'] ) ); ?>>
		<label for="add_legend_summary_view"><?php esc_html_e( 'Summary view', 'the-events-calendar-category-colors' ); ?></label>
	</div>
	<?php endif; ?>
</div>
	<!-- Add Legend Superpowers -->
	<div class="teccc_options_col1"> <?php esc_html_e( 'Legend Superpowers', 'the-events-calendar-category-colors' ); ?> </div>
	<div class="teccc_options_col2 legend_related_notice">
		<?php esc_html_e( 'For this option you have to show the category legend at least on one view.', 'the-events-calendar-category-colors' ); ?>
	</div>
	<div class="teccc_options_col2 legend_related">
		<label>
			<input name="teccc_options[legend_superpowers]" type="checkbox" value="1" <?php checked( '1', $options['legend_superpowers'] ); ?> /> <?php esc_html_e( 'Check to add Legend Superpowers.', 'the-events-calendar-category-colors' ); ?>
		</label>
		<p><?php esc_html_e( 'Legend Superpowers are an optional visual effect allowing visitors to focus only on those events that belong to categories of interest - without reloading the page and without eliminating other categories from view completely. Click on the category of interest in the Legend for the effect; click again to remove it.', 'the-events-calendar-category-colors' ); ?> </p>
	</div>

	<div class="teccc_options_col1 legend_related"><!-- Show Hidden Categories --></div>
	<div class="teccc_options_col2 legend_related">
		<label>
			<input name="teccc_options[show_ignored_cats_legend]" type="checkbox" value="1" <?php checked( '1', $options['show_ignored_cats_legend'] ); ?> /> <?php esc_html_e( 'Show hidden categories in legend.', 'the-events-calendar-category-colors' ); ?>
		</label>
	</div>

	<div class="teccc_options_col1 legend_related"><!-- Custom Legend CSS --></div>
	<div class="teccc_options_col2 legend_related">
		<label>
			<input name="teccc_options[custom_legend_css]" type="checkbox" value="1" <?php checked( '1', $options['custom_legend_css'] ); ?> /> <?php esc_html_e( 'Check to use your own CSS for category legend.', 'the-events-calendar-category-colors' ); ?>
		</label>
	</div>

	<div class="teccc_options_col1"> <?php esc_html_e( 'Database Options', 'the-events-calendar-category-colors' ); ?> </div>
	<div class="teccc_options_col2">
		<label>
			<input name="teccc_options[chk_default_options_db]" type="checkbox" value="1" <?php checked( '1', $options['chk_default_options_db'] ); ?> /> <?php esc_html_e( 'Restore defaults upon plugin deactivation/reactivation', 'the-events-calendar-category-colors' ); ?>
		</label>
		<p> <?php esc_html_e( 'Only check this if you want to reset plugin settings upon Plugin reactivation', 'the-events-calendar-category-colors' ); ?> </p>
	</div>

</div>
