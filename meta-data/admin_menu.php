<?php

	function seo_add_init() {
		$file_dir= plugins_url();
		wp_enqueue_style("functions", $file_dir."/meta-data/css/functions.css", false, "1.0", "all");
		wp_enqueue_script("rm_script", $file_dir."/meta-data/js/rm_script.js", false, "1.0");
	}

	ob_start();
	global $wpdb;
	session_start();
		$name_of_theme = "Seo Analytic";
		$short_name = "seo";
			$option_data = array (  
				array( "name" => $name_of_theme." option_data",
					"type" => "title"),				  
				 
				array( "name" => "General",
					"type" => "section"),
					
				array( "type" => "open"),
				  
				array( "name" => "Google Analytic Code",
					"desc" => "Enter Google Analytic Code",
					"id" => $short_name."_google_analytic",
					"type" => "text",
					"std" => ""					
					),
					 
				array( "name" => "Bing Analytic Code",
					"desc" => "Enter Bing Analytic Code",
					"id" => $short_name."_bing_analytic",
					"type" => "text",
					"std" => ""
					),
				  
				array( "type" => "close")
				  
			);

		function seo_add_admin() {
		  
			global $name_of_theme, $short_name, $option_data;
			  
				if ( $_GET['page'] == basename(__FILE__) ) {
				  
					if ( 'save' == $_REQUEST['action'] ) {
				  
						foreach ($option_data as $value) {
						update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
				  
						foreach ($option_data as $value) {
							if( isset( $_REQUEST[ $value['id'] ] ) ) {
							
								update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
								
								} else {
								
								delete_option( $value['id'] ); } 
						}
							header("Location: admin.php?page=admin_menu.php&saved=true");
						die;
					} else if( 'reset' == $_REQUEST['action'] ) {
				  
						foreach ($option_data as $value) {
							delete_option( $value['id'] );
						}
				  
						header("Location: admin.php?page=admin_menu.php&reset=true");
						die;			  
					}
				}

			add_theme_page($name_of_theme, $name_of_theme, 'administrator', basename(__FILE__), 'seo_admin');

		}
 
		function seo_admin() {
		  
			global $name_of_theme, $short_name, $option_data;
				$i=0;
		  
				if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$name_of_theme.' settings saved.</strong></p></div>';
					if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$name_of_theme.' settings reset.</strong></p></div>';
		  
			?>
			<div class="wrap rm_wrap">
				<h2><?php echo $name_of_theme; ?> Settings</h2>
		  
				<div class="rm_opts">
					<form method="post">
			
						<?php foreach ($option_data as $value) {
							switch ( $value['type'] ) {
							case "open":
						?>
		  
						<?php break;		  
							case "close":
						?>
				
				</div>
			</div>
			<br />
			<?php break;
			  
				case "title":
			
			?>
			
			<p>You can use the boxes below to verify with Google & Bing Webmaster Tools.</p>
		 
		  
		<?php break;
		  
			case 'text':
		
		?>
		 
		<div class="rm_input rm_text">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
			<small><?php echo $value['desc']; ?></small>
			
			<div class="clearfix"></div>
		  
		</div>
		<?php
		break;
		  
			case 'textarea':
			
		?>
		 
		<div class="rm_input rm_textarea">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
			<small><?php echo $value['desc']; ?></small>
			<div class="clearfix"></div>
		  
		</div>
		   
		<?php
		
		break;
		  
			case 'select':
		
		?>
		 
		<div class="rm_input rm_select">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			 
			<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
				<?php foreach ($value['option_data'] as $option) { ?>
					<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
			</select>
		 
			<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		</div>
		<?php
		break;
		  
			case "checkbox":
		
		?>
		 
		<div class="rm_input rm_checkbox">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			 
			<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
			
			<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />		 
		 
			<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		 </div>
		<?php break;

			case "section":
		 
		$i++;

		?>
		 
		<div class="rm_section">
			<div class="rm_title">
				<span class="submit"><input name="save<?php echo $i; ?>" style="float: right;" type="submit" value="Save Your Code" />
				</span>
				<div class="clearfix"></div>
			</div>
			<div class="rm_option_data">
		  
				<?php break;
				  
				}
				}
				?>
				  
					<input type="hidden" name="action" value="save" />
				</form>
				<form method="post">
					<p class="submit">
						<input name="reset" type="submit" value="Reset" />
						<input type="hidden" name="action" value="reset" />
					</p>
				</form>

			</div> 
		</div> 
		 
		<?php
		}

add_action('admin_init', 'seo_add_init');
add_action('admin_menu', 'seo_add_admin');

?>