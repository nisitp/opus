<?php
 
if ( ! class_exists( 'WPV_Shortcode_Generator' ) ) {
	
	/**
	 * Shortcodes generator class for Views.
	 *
	 * Inherits from Toolset_Shortcode_Generator which is the base class 
	 * used to register items in the backend Admin Bar item for Toolset shortcodes.
	 * Since 2.3.0 it is also used to generate the Fields and Views editor buttons 
	 * and the dialogs for inserting shortcodes using the Shortcodes GUI API.
	 *
	 * @since unknown
	 * @since 2.3.0 Used to generate the Fields and Views buttons and dialogs.
	 */
	
	class WPV_Shortcode_Generator extends Toolset_Shortcode_Generator {
		
		public $admin_bar_item_registered	= false;
		public $dialog_groups				= array();
		public $footer_dialogs				= '';
		public $footer_dialogs_needing		= array();
		public $footer_dialogs_existing		= array();
		public $footer_dialogs_added		= false;

	    public function initialize() {
			
			/**
			 * ---------------------
			 * Admin Bar
			 * ---------------------
			 */
			
			// Track whether the Admin Bar item has been registered
			$this->admin_bar_item_registered		= false;
			// Register the Fields and Views item in the backend Admin Bar
			add_filter( 'toolset_shortcode_generator_register_item',	array( $this, 'register_fields_and_views_shortcode_generator' ) );
			
			/**
			 * ---------------------
			 * Fields and Views button and dialogs
			 * ---------------------
			 */
			
			// Initialize dialog groups and the action to register them
			$this->dialog_groups					= array();
			add_action( 'wpv_action_wpv_register_dialog_group',			array( $this, 'register_dialog_group' ), 10, 2 );
			
			// Fields and Views button in native editors plus on demand:
			// - From media_buttons actions, for posts, taxonomy or users depending on the current edit page
			// - From Views inner actions, for posts, taxonomy or users
			// - From Toolset arbitrary editor toolbars, for posts
			add_action( 'media_buttons',										array( $this, 'generate_fields_and_views_button' ) );
			add_action( 'wpv_action_wpv_generate_fields_and_views_button',		array( $this, 'generate_fields_and_views_button' ), 10, 2 );
			add_action( 'toolset_action_toolset_editor_toolbar_add_buttons',	array( $this, 'generate_fields_and_views_custom_button' ), 10, 2 );
			
			// Generate the shortcodes dialog for a given target. Called from render_footer_dialogs.
			// In native editors, they target 'posts'; on demand they can also target 'taxonomy' or 'users'.
			add_action( 'wpv_action_wpv_generate_shortcodes_dialog',	array( $this, 'generate_shortcodes_dialog' ) );
			
			// Make sure at least the 'posts' dialog is added, even on pages without editors, if the settings state so, 
			// or if we are in a backend editor or frontend editor page, 
			// or if we want to force it with the wpv_filter_wpv_force_generate_fields_and_views_dialog filter
			add_action( 'wp_footer',				array( $this, 'force_fields_and_views_dialog_shortcode_generator' ), 1 );
			add_action( 'admin_footer',				array( $this, 'force_fields_and_views_dialog_shortcode_generator' ), 1 );
			
			// Track whether dialogs re needed and have been rendered in the footer
			$this->footer_dialogs					= '';
			$this->footer_dialogs_needing			= array();
			$this->footer_dialogs_existing			= array();
			$this->footer_dialogs_added				= false;
			
			// Generate and print the shortcodes dialogs in the footer,
			// both in frotend and backend, as long as there is anything to print.
			// Do it as late as possible because page builders tend to register their templates,
			// including native WP editors, hence shortcode buttons, in wp_footer:10.
			// Also, because this way we can extend the dialog groups for almost the whole page request.
			add_action( 'wp_footer',				array( $this, 'render_footer_dialogs' ), PHP_INT_MAX );
			add_action( 'admin_footer',				array( $this, 'render_footer_dialogs' ), PHP_INT_MAX );
			
			/**
			 * ---------------------
			 * Assets
			 * ---------------------
			 */
			 
			// Register shortcodes dialogs assets
			add_action( 'init',											array( $this, 'register_assets' ) );
			add_action( 'wp_enqueue_scripts',							array( $this, 'frontend_enqueue_assets' ) );
			add_action( 'admin_enqueue_scripts',						array( $this, 'admin_enqueue_assets' ) );
			
			// Ensure that shortcodes dialogs assets re enqueued
			// both when using the Admin Bar item and when a Fields and Views button is on the page.
			add_action( 'wpv_action_wpv_enforce_shortcodes_assets', 	array( $this, 'enforce_shortcodes_assets' ) );
			
			/**
			 * ---------------------
			 * Compatibility
			 * ---------------------
			 */
			 
			add_filter( 'gform_noconflict_scripts',	array( $this, 'gform_noconflict_scripts' ) );
			add_filter( 'gform_noconflict_styles',	array( $this, 'gform_noconflict_styles' ) );
			
	    }
		
		/**
		 * Register the Fields and Views shortcode generator in the Toolset shortcodes admin bar entry.
		 *
		 * Hooked into the toolset_shortcode_generator_register_item filter.
		 * 
		 * @since unknown
		 */
		
		public function register_fields_and_views_shortcode_generator( $registered_sections ) {
			$this->admin_bar_item_registered = true;
			do_action( 'wpv_action_wpv_enforce_shortcodes_assets' );
			$registered_sections[ 'fields_and_views' ] = array(
				'id'		=> 'fields-and-views',
				'title'		=> __( 'Fields and Views', 'wpv-views' ),
				'href'		=> '#fields_and_views_shortcodes',
				'parent'	=> 'toolset-shortcodes',
				'meta'		=> 'js-wpv-shortcode-generator-node'
			);
			return $registered_sections;
		}
		
		/**
		 * Register all the dedicated shortcodes assets:
		 * - Shortcodes GUI script.
		 *
		 * @todo Move the assets registration to here
		 *
		 * @since 2.3.0
		 * @todo Actually register th shortcodes asets from here, using the Toolset Assets Manager class.
		 */
		
		function register_assets() {
			// Register here the shortcodes GUI script and see which CSS is needed
		}
		
		/**
		 * Enforce some assets that need to be in the frontend header, like styles, 
		 * when we detect that we are on a page that needs them.
		 * Basically, this involves frontend page builders, detected by their own methods.
		 * Also enforces the generation of the Fields and Views dialog, just in case, in the footer.
		 *
		 * @uses is_frontend_editor_page which is a parent method.
		 *
		 * @since 2.3.0
		 */
		
		function frontend_enqueue_assets() {
			// Enqueue on the frontend pages that we know it is needed, maybe on users frontend editors only
			
			if ( $this->is_frontend_editor_page() ) {
				$this->enforce_shortcodes_assets();
				add_filter( 'wpv_filter_wpv_force_generate_fields_and_views_dialog', '__return_true' );
			}
			
		}
		
		/**
		 * Enforce some assets that need to be in the backend header, like styles, 
		 * when we detect that we are on a page that needs them.
		 * Also enforces the generation of the Fields and Views dialog, just in case, in the footer.
		 *
		 * Note that register_fields_and_views_shortcode_generator happens on admin_init:99 
		 * so by admin_enqueue_scripts:10 we already know whether the Admin Bar item is registered or not, 
		 * hence $this->admin_bar_item_registered is a valid flag.
		 *
		 * Note that we enforce the shortcode assets in all known admin editor pages.
		 *
		 * @uses is_admin_editor_page which is a parent method.
		 *
		 * @since 2.3.0
		 */
		
		function admin_enqueue_assets( $hook ) {
			if ( 
				$this->admin_bar_item_registered 
				|| $this->is_admin_editor_page()
			) {
				$this->enforce_shortcodes_assets();
				add_filter( 'wpv_filter_wpv_force_generate_fields_and_views_dialog', '__return_true' );
			} else {
				/**
				 * When the Admin Bar item is not registered, we still know that some 
				 * admin pages demand those assets.
				 */
			}
		}
		
		/**
		 * Enfoces the shortcodes assets when loaded at a late time.
		 * Note that there should be no problem with scripts, 
		 * although styles might not be correctly enqueued.
		 *
		 * @usage do_action( 'wpv_action_wpv_enforce_shortcodes_assets' );
		 *
		 * @since 2.3.0
		 * @todo Create proper Views, or Toolset, dialog styles.
		 */
		
		function enforce_shortcodes_assets() {
			
			wp_enqueue_script( 'views-shortcodes-gui-script' );
			wp_enqueue_style( 'views-admin-css' );
			wp_enqueue_style( 'toolset-common' );
			wp_enqueue_style( 'toolset-dialogs-overrides-css' );
			
			do_action( 'otg_action_otg_enforce_styles' );
			
		}
		
		/**
		 * Register a Fields and Views dialog group with its fields.
		 *
		 * This can also be used to:
		 * - register groups with no fields, just to ensure the group order position in the registered groups, and fill it later.
		 * - extend an alredy registered group by just passing more fields to its group ID.
		 *
		 * @param $group_id		string 	The group unique ID.
		 * @param $group_data	array	The group data:
		 *     name		string	The group name that will be used over the group fields.
		 *     fields	array	Optional. The group fields. Leave blank or empty to just pre-register the group.
		 *         array(
		 *             field_key => array(
		 *                 shortcode	string	The shortcode that this item will insert.
		 *                 name			string	The button label for this item.
		 *                 callback		string	The JS callback to execute when this item is clicked.
		 *             )
		 *         )
		 *     target	string	Optional. Which target this group is aimed to: 'posts'|'taxonomy'|'users'. Defaults to all of them.
		 *
		 * @usage do_action( 'wpv_action_wpv_register_dialog_group', $group_id, $group_data );
		 *
		 * @since 2.3.0
		 */
		
		function register_dialog_group( $group_id = '', $group_data = array() ) {
			
			$group_id = sanitize_text_field( $group_id );
			
			if ( empty( $group_id ) ) {
				return;
			}
			
			$group_data['fields'] = ( isset( $group_data['fields'] ) && is_array( $group_data['fields'] ) ) ? $group_data['fields'] : array();
			
			$dialog_groups = $this->dialog_groups;
			
			if ( isset( $dialog_groups[ $group_id ] ) ) {
				
				// Extending an already registered group, which should have a name and a target already.
				if ( 
					! array_key_exists( 'name', $dialog_groups[ $group_id ] ) 
					|| ! array_key_exists( 'target', $dialog_groups[ $group_id ] ) 
				) {
					return;
				}
				foreach( $group_data['fields'] as $field_key => $field_data ) {
					$dialog_groups[ $group_id ]['fields'][ $field_key ] = $field_data;
				}
				
			} else {
				
				// Registering a new group, the group name is mandatory
				if ( ! array_key_exists( 'name', $group_data ) ) {
					return;
				}
				$dialog_groups[ $group_id ]['name']		= $group_data['name'];
				$dialog_groups[ $group_id ]['fields']	= $group_data['fields'];
				$dialog_groups[ $group_id ]['target']	= isset( $group_data['target'] ) ? $group_data['target'] : array( 'posts', 'taxonomy', 'users' );
			
			}
			$this->dialog_groups = $dialog_groups;
			
		}
		
		/**
		 * Generates a shortodes dialog for a given target, 
		 * by checking the registered dialog groups for that target.
		 * This usually happens when an editor button is generated for a given target, 
		 * or is forced in the footer when needed and no editor button was generated 
		 * (like when having an Admin Bar item on an admin page withotu editors).
		 *
		 * @param $target string Which target this group is aimed to: 'posts'|'taxonomy'|'users'. Defaults to 'post'.
		 *
		 * @usage do_action( 'wpv_action_wpv_generate_shortcodes_dialog', $target );
		 *
		 * @since 2.3.0
		 */
		
		function generate_shortcodes_dialog( $target = 'posts' ) {
			
			$existing_dialogs = $this->footer_dialogs_existing;
			if ( in_array( $target, $existing_dialogs ) ) {
				return '';
			}
			
			$dialog_links = array();
			$dialog_content = '';
			foreach ( $this->dialog_groups as $group_id => $group_data ) {
				
				if ( ! in_array( $target, $group_data['target'] ) ) {
					continue;
				}
				
				if ( empty( $group_data['fields'] ) ) {
					continue;
				}
				
				$dialog_links[] = '<li data-id="' . md5( $group_id ) . '" class="editor-addon-top-link" data-editor_addon_target="editor-addon-link-' . md5( $group_id ) . '">' . esc_html( $group_data['name'] ) . ' </li>';

				$post_field_section_classname = ( $group_data['name'] == __('Post field', 'wpv-views') ) ? ' js-wpv-shortcode-gui-group-list-post-field-section' : '';

				$dialog_content .= '<div class="group"><h4 data-id="' . md5( $group_id ) . '" class="group-title  editor-addon-link-' . md5( $group_id ) . '-target">' . esc_html( $group_data['name'] ) . "</h4>";
				$dialog_content .= "\n";
				$dialog_content .= '<ul class="wpv-shortcode-gui-group-list js-wpv-shortcode-gui-group-list' . $post_field_section_classname . '">';
				$dialog_content .= "\n";
				foreach ( $group_data['fields'] as $group_data_field_key => $group_data_field_data ) {
					if (
						! isset( $group_data_field_data['callback'] ) 
						|| empty( $group_data_field_data['callback'] )
					) {
						$dialog_content .= sprintf(
							'<li class="item"><button class="button button-secondary button-small" onclick="WPViews.shortcodes_gui.insert_shortcode_with_no_attributes(\'%s\', \'%s\'); return false;">%s</button></li>',
							esc_attr( $group_data_field_data['shortcode'] ),
							'[' . esc_attr( $group_data_field_data['shortcode'] ) . ']',
							esc_html( $group_data_field_data['name'] )
						);
					} else {
						$dialog_content .= sprintf(
							'<li class="item"><button class="button button-secondary button-small" onclick="%s; return false;">%s</button></li>', 
							$group_data_field_data['callback'], 
							esc_html( $group_data_field_data['name'] )
						);
					}
					$dialog_content .= "\n";
				}
				$dialog_content .= '</ul>';
				$dialog_content .= "\n";
				$dialog_content .= '</div>';
			}

			$direct_links = implode( '', $dialog_links );
			$dropdown_class = 'js-wpv-fields-and-views-dialog-for-' . $target;

			// add search box
			$searchbar = '<div class="searchbar">';
            $searchbar .=   '<label for="searchbar-input-for-' . esc_attr( $target ) . '">' . __( 'Search', 'wpv-views' ) . ': </label>';
            $searchbar .=   '<input id="searchbar-input-for-' . esc_attr( $target ) . '" type="text" class="search_field" onkeyup="wpv_on_search_filter(this)" />';
            $searchbar .= '</div>';

			// generate output content
			$out = '
			<div class="wpv-fields-and-views-dialog wpv-editor_addon_dropdown '. $dropdown_class .'" id="wpv-editor_addon_dropdown_' . rand() . '">'
				. "\n"
				. '<div class="wpv-editor_addon_dropdown_content editor_addon_dropdown_content js-wpv-fields-views-dialog-content">'
						. "\n"
						. $searchbar
						. "\n"
						. '<div class="direct-links-desc"><ul class="direct-links"><li class="direct-links-label">' . __( 'Jump to:', 'wpv-views' ) . '</li>' . $direct_links . '</ul></div>'
						. "\n"
						. $dialog_content
						. '
				</div>
			</div>';
			
			$existing_dialogs[] = $target;
			$this->footer_dialogs_existing = $existing_dialogs;
			$this->footer_dialogs .= $out;
			
		}
		
		/**
		 * Generate the dialogs and add the HTML markup for the shortcode dialogs to both backend and frontend footers, 
		 * as late as possible, because page builders tend to register their templates, including native WP editors, 
		 * hence shortcode buttons, in wp_footer:10.
		 * Also, because this way we can extend the dialog groups for almost the whole page request.
		 *
		 * @since 2.3.0
		 */
		
		function render_footer_dialogs() {
			
			$footer_dialogs_needing = $this->footer_dialogs_needing;
			foreach( $footer_dialogs_needing as $footer_dialogs_target_needing ) {
				do_action( 'wpv_action_wpv_generate_shortcodes_dialog', $footer_dialogs_target_needing );
			}
			
			$footer_dialogs = $this->footer_dialogs;
			if ( 
				'' != $footer_dialogs
				&& ! $this->footer_dialogs_added
			) {
				?>
				<div class="js-wpv-fields-views-footer-dialogs" style="display:none">
					<?php 
					echo $footer_dialogs; 
					$this->footer_dialogs_added = true;
					?>
				</div>
				<?php
			}
			
		}
		
		/**
		 * Generates the Fields and Views button on native editors, using the media_buttons action, 
		 * and also on demand using a custom action.
		 *
		 * @param $editor		string
		 * @param $args			array
		 *     output	string	'span'|'button'. Defaults to 'span'.
		 *     target	string	'posts'|'taxonomy'|'users'. Defaults to 'posts'.
		 *
		 * @usage do_action( 'wpv_action_wpv_generate_fields_and_views_button', $editor_id, $args );
		 *
		 * @since 2.3.0
		 */
		
		function generate_fields_and_views_button( $editor, $args = array() ) {
			
			if ( 
				empty( $args ) 
				&& (
					! apply_filters( 'toolset_editor_add_form_buttons', true ) 
					/**
					 * wpv_filter_public_wpv_add_fields_and_views_button
					 *
					 * Public filter to disable the Fields and Views button on native WordPress editors.
					 *
					 * @since 2.3.0
					 */
					|| ! apply_filters( 'wpv_filter_public_wpv_add_fields_and_views_button', true )
				)
			) {
				// Disable the Fields and Views button just on native WP Editors
				return;
			}
			
			$defaults = array(
				'output'	=> 'span',
				'target'	=> $this->get_default_target(),
			);
			
			$args = wp_parse_args( $args, $defaults );
			
			$button			= '';
			$button_label	= __( 'Fields and Views', 'wpv-views' );
			
			switch ( $args['output'] ) {
				case 'button':
					$button = '<button'
						. ' class="button-secondary js-wpv-fields-and-views-in-toolbar"'
						. ' data-editor="' . esc_attr( $editor ) . '">'
						. '<i class="icon-views-logo ont-icon-18"></i>'
						. '<span class="button-label">'. esc_html( $button_label ) . '</span>'
						. '</button>';
					break;
				case 'span':
				default:
					$button = '<span'
					. ' class="button js-wpv-fields-and-views-in-toolbar"'
					. ' data-editor="' . esc_attr( $editor ) . '">'
					. '<i class="icon-views-logo fa fa-wpv-custom ont-icon-18 ont-color-gray"></i>'
					. '<span class="button-label">' . esc_html( $button_label ) . '</span>'
					. '</span>';
					break;
			}
			
			do_action( 'wpv_action_wpv_enforce_shortcodes_assets' );
			
			$footer_dialogs_needing = $this->footer_dialogs_needing;
			if ( ! in_array( $args['target'], $footer_dialogs_needing ) ) {
				$footer_dialogs_needing[] = $args['target'];
			}
			$this->footer_dialogs_needing = $footer_dialogs_needing;
			
			echo apply_filters( 'wpv_add_media_buttons', $button );
			
		}
		
		/**
		 * Generate a Fields and Views button for custom editor toolbars, inside a <li></li> HTML tag.
		 *
		 * @param $editor	string	The editor ID.
		 * @param $source	string	The Toolset plugin originting the call.
		 *
		 * Hooked 9into the toolset_action_toolset_editor_toolbar_add_buttons action.
		 *
		 * @note Return early when the source is `views`, 
		 * since we need to manage Fields and Views buttons differently in our case 
		 * because we need to take care of the target of the button, etc etc.
		 *
		 * @since 2.3.0
		 */
		
		public function generate_fields_and_views_custom_button( $editor, $source = '' ) {
			
			if ( 'views' == $source ) {
				return;
			}
			
			$args = array(
				'output'	=> 'button',
				'target'	=> 'posts',
			);
			echo '<li class="wpv-vicon-codemirror-button">';
			$this->generate_fields_and_views_button( $editor, $args );
			echo '</li>';
			
		}
		
		/**
		 * Enforce at least the shortcode dialog for 'posts', 
		 * when the Admin Bar is registered but no editor triggered the dialog generation.
		 * Also, this can be enforced with the custom wpv_filter_wpv_force_generate_fields_and_views_dialog filter.
		 *
		 * @since unknown
		 */
		
		public function force_fields_and_views_dialog_shortcode_generator() {
			
			$target = $this->get_default_target();
			
			if ( $this->admin_bar_item_registered ) {
				// If we got to the footer without an editor that generates the Fields and Views dialog
				// It means we are on a page that might as well show all the Types shortcodes too
				// Since there is no active post to restrict to
				$footer_dialogs_needing = $this->footer_dialogs_needing;
				if ( ! in_array( $target, $footer_dialogs_needing ) ) {
					$footer_dialogs_needing[] = $target;
				}
				$this->footer_dialogs_needing = $footer_dialogs_needing;
			} else if ( 
				/**
				* wpv_filter_wpv_force_generate_fields_and_views_dialog
				*
				* Manually force the Fields and Views dialog content.
				*
				* Forces the Fields and Views dialog content on the admin or frontend footer,
				* in case it has not been rendered yet and the current page is not already loading it either.
				*
				* This is automatically enforced for pages that we decide are editor pages.
				*
				* @param bool false
				*
				* @since 2.3.0
				*/
				apply_filters( 'wpv_filter_wpv_force_generate_fields_and_views_dialog', false ) 
			) {
				do_action( 'wpv_action_wpv_enforce_shortcodes_assets' );
				$footer_dialogs_needing = $this->footer_dialogs_needing;
				if ( ! in_array( $target, $footer_dialogs_needing ) ) {
					$footer_dialogs_needing[] = $target;
				}
				$this->footer_dialogs_needing = $footer_dialogs_needing;
			}
			
		}
		
		/**
		 * Get the default shortcodes dialog target based on the current page characteristics.
		 *
		 * @since 2.3.0
		 */
		
		public function get_default_target() {
			
			global $pagenow;
			
			switch ( $pagenow ) {
				case 'term.php':
				case 'edit-tags.php':
					$target = 'taxonomy';
					break;
				case 'profile.php':
				case 'user-edit.php':
				case 'user-new.php':
					$target = 'users';
					break;
				default:
					$target = 'posts';
					break;
			}
			
			return $target;
			
		}
		
		/**
		 * Generate a dummy dialog for the shortcode generation response on the Admin Bar item.
		 *
		 * @since unknown
		 */
		
		public function display_shortcodes_target_dialog() {
			parent::display_shortcodes_target_dialog();
			if ( $this->admin_bar_item_registered ) {
				?>
				<div class="toolset-dialog-container">
					<div id="wpv-shortcode-generator-target-dialog" class="toolset-shortcode-gui-dialog-container js-wpv-shortcode-generator-target-dialog">
						<div class="wpv-dialog">
							<p>
								<?php echo __( 'This is the generated shortcode, based on the settings that you have selected:', 'wpv-views' ); ?>
							</p>
							<textarea id="wpv-shortcode-generator-target" readonly="readonly" style="width:100%;resize:none;box-sizing:border-box;font-family:monospace;display:block;padding:5px;background-color:#ededed;border: 1px solid #ccc !important;box-shadow: none !important;"></textarea>
							<p>
								<?php echo __( 'You can now copy and paste this shortcode anywhere you want.', 'wpv-views' ); ?>
							</p>
						</div>
					</div>
				</div>
				<?php
			}
		}
		
		/**
		 * ====================================
		 * Compatibility
		 * ====================================
		 */
		
		/**
		 * Gravity Forms compatibility.
		 *
		 * GF removes all assets from its admin pages, and offers a series of hooks to add your own to its whitelist.
		 * Those two callbacks are hooked to these filters.
		 *
		 * @param array $required_objects
		 *
		 * @return array
		 *
		 * @since 2.4.1
		 */
		function gform_noconflict_scripts( $required_objects ) {
			$required_objects[] = 'views-shortcodes-gui-script';
			return $required_objects;
		}
		function gform_noconflict_styles( $required_objects ) {
			$required_objects[] = 'views-admin-css';
			$required_objects[] = 'toolset-common';
			$required_objects[] = 'toolset-dialogs-overrides-css';
			$required_objects[] = 'onthego-admin-styles';
			return $required_objects;
		}
		
	}
	
}