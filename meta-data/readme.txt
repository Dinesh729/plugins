=== Meta Data ===
Contributors: 2015 
Tags:  Meta Data, Meta Box, Meta Data Plugin 
Requires at least: 3.0.1
Tested up to: 4.2.1 
Stable tag: 1.4.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

  1. It is a Meta Data Plugin.
  2. This plugin add three fields in your post: 1)Meta Title 2)Meta Description 3)Meta Keywords.
  3. You can check these fields below post content area.
  4. You can change your meta data according to requirement.
  5. You can add and edit Google and Bing analytic code: appearance->Seo Analytic

= Languages =

English  



== Installation ==

= You can either install it automatically from the WordPress admin, or do it manually: =

1. Unzip the archive and put the "Meta Data" folder into your plugins folder (/wp-content/plugins/).
2. Activate the plugin from the Plugins menu.




== Screenshots ==

Post: http://screenshot.ru/upload/images/2015/05/04/Firefox_Screenshot_2015-05-04T08-51-16.468Zf934e.png
http://screenshot.ru/upload/images/2015/05/04/meta83dc7.png

Google Analytic:
http://screenshot.ru/upload/images/2015/05/05/analy375e5.png



====Get Meta Analytic Code On Header===

Go to header.php
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo get_option('google_track_id');?>', 'auto');
  ga('send', 'pageview');

	</script>

	
==== Get Meta Data Content ===

<?php
	$meta_values = get_post_meta($id);
	
	Meta Title: echo $meta_values['metaTitle'][0]);
	
	Meta Description: echo $meta_values['metaDescription'][0]);
	
	Meta Keywords: echo $meta_values['metaKeywords'][0]);
?>
	

== Changelog ==
No updated version
