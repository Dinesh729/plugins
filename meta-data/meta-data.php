<?php
/*
Plugin Name: Meta-data

Author: Dinesh Thakur

Plugin URI: http://www.thinksoftsolutions.com/

Description: This plugin will add metadata in post and page.

Version: 1.0

Author URI: http://www.thinksoftsolutions.com/


*/
ob_start();
include_once (plugin_dir_path(__FILE__) . 'admin_menu.php');

add_action('add_meta_boxes', 'meta_box');

add_action('save_post', 'save_meta');

/***       Start Style Sheet          ***/
add_action( 'admin_enqueue_scripts', 'safely_add_stylesheet' );

function safely_add_stylesheet() {
	wp_enqueue_style( 'my-admin-theme', plugins_url('css/style.css', __FILE__) );
}
/***        End Style Sheet           ***/


function meta_box(){
	add_meta_box('meta_fields', 'Wordpress Meta For SEO', 'meta_data_fields', 'post' );
	
}

function meta_data_fields($post){
	
	$metatitle = get_post_meta($post->ID, 'metaTitle', true);
	
	$metadescription = get_post_meta($post->ID, 'metaDescription', true);
	
	$metakeywords = get_post_meta($post->ID, 'metaKeywords', true);
	
	
	wp_nonce_field('product_nonce_action', 'product_nonce_name');
	
	echo '<div class="meta">
			<div class="title">
				<label for = "meta_fields">Meta Title:</label>
					<input type="text" id="meta_fields" name="metaTitle" value="'.$metatitle.'"  placeholder = "Enter Meta Title" />
				<span>The meta title will be 50 to 60 characters</span>
			</div>
			<div class="description">
				<label for = "meta_fields">Meta Description:</label>
				<textarea id="meta_fields" name="metaDescription" placeholder ="Enter Meta Description">'.$metadescription.'</textarea>
				<span>The meta description will be 120 to 160 characters</span>
			</div>
			<div class="keywords">
				<label for = "meta_fields">Meta Keywords:</label>
				<input type="text" id="meta_fields" name="metaKeywords" value="'.$metakeywords.'" placeholder ="Enter Meta Keywords">
			</div>
		</div>
	';
}

// Save our custom meta when save or publish our post

function save_meta($post_id){

	
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
	return;
	
	if(isset($_POST['metaTitle']) && ($_POST['metaTitle'] != '')){
		update_post_meta($post_id, 'metaTitle', esc_html($_POST['metaTitle']));
	}
	if(isset($_POST['metaDescription']) && ($_POST['metaDescription'] != '')){
		update_post_meta($post_id, 'metaDescription', esc_html($_POST['metaDescription']));
	}
	if(isset($_POST['metaKeywords']) && ($_POST['metaKeywords'] != '')){
		update_post_meta($post_id, 'metaKeywords', esc_html($_POST['metaKeywords']));
	}
	
	
	if(!isset($_POST['product_nonce_name']) || wp_verify_nonce($_POST['product_nonce_name'], 'product_nonce_action'))
	return;
}


?>

