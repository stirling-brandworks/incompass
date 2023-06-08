<?php
$et_active_sidebars = et_divi_footer_active_sidebars();
if ( $et_active_sidebars === false ) {
    return;
}
?>
<div id="footer-sidebars" class="w-100 clearfix clearboth d-block">
	<div class="d-md-flex w-100 mb-8">
		<?php
		foreach ( $et_active_sidebars as $footer_sidebar ) :
			if (!is_active_sidebar($footer_sidebar)) continue;
			echo '<div class="w-md-50 text-center text-md-left f-widget">';
			dynamic_sidebar( $footer_sidebar );
			echo '</div> <!-- end .footer-widget -->';
		endforeach;
		?>
	</div>
</div>
