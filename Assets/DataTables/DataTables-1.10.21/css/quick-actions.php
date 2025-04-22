<?php
/**
 * Single listing quick actions template.
 *
 * @since 2.0
 */

if ( empty( $layout['quick_actions'] ) ) {
	$layout['quick_actions'] = [];
	$actions = require locate_template( 'includes/src/listing-types/quick-actions/quick-actions.php' );
	$defaults = ['get-directions', 'call-now', 'direct-message', 'send-email', 'visit-website', 'leave-review', 'claim-listing', 'bookmark', 'share', 'report-listing'];
	foreach ( $defaults as $default_action ) {
		if ( empty( $actions[ $default_action ] ) ) {
			continue;
		}

		$layout['quick_actions'][] = $actions[ $default_action ];
	}
}
?>

<div class="container qla-container">
	<style>
		.diu-container{
			position: fixed;
			z-index: 1039!important;
			bottom: 0;
			left: 0;
			width: 100%;
			background-color: blue;
			padding: 20px 0;
			box-shadow: 0 -3px 6px #00000029;
			text-align: center;
		}
		.diu-container show{
			transform: translateY(0);
		}
		.diu-container-content{
			display: flex;
			align-items: center;
			justify-content: baseline;
			color: var(--gfg-body-color);
		}
		.diu-container-action{
			display: flex;
			align-items: center;
			margin-left: 32px;
		}	
	</style>
	<div class="diu-container show">
		<div class="diu-container-content">
			<a href="#" onclick="downloadvCard();" class="btn btn-lg btn-block btn-gray-100 d-flex align-items-center justify-content-center" style="color: white;border: outset;">Download Contact</a>
			<a href="#" onclick="downloadvCard();" class="btn btn-lg btn-block btn-gray-100 d-flex align-items-center justify-content-center" style="color: white;border: outset;">Download Contact</a>
		</div>
	</div>
	<div class="quick-listing-actions">
		<ul class="cts-carousel">
			<li id="" class="crearboton">
				<a href="#" onclick="downloadvCard();" class="btn btn-sm btn-block btn-gray-100 d-flex align-items-center justify-content-center">Download Contact</a>
			</li>

			<?php foreach ( $layout['quick_actions'] as $action ):
				if ( empty( $action['id'] ) ) {
					$action['id'] = sprintf( 'qa-%s', substr( md5( json_encode( $action ) ), 0, 6 ) );
				}

				$action['original_label'] = $action['label'];
				$action['label'] = do_shortcode( $listing->compile_string( $action['label'] ) );

				// active/checked label, e.g. for bookmark action, it'd be 'Bookmarked'.
				if ( ! empty( $action['active_label'] ) ) {
					$action['original_active_label'] = $action['active_label'];
					$action['active_label'] = do_shortcode( $listing->compile_string( $action['active_label'] ) );
				}

				$template = sprintf( 'templates/single-listing/quick-actions/%s.php', $action['action'] ); ?>
				
				<?php if ( locate_template( $template ) ): ?>
					<?php require locate_template( $template ) ?>
				<?php elseif ( has_action( sprintf( 'mylisting/single/quick-actions/%s', $action['action'] ) ) ): ?>
					<?php do_action( sprintf( 'mylisting/single/quick-actions/%s', $action['action'] ), $action, $listing ) ?>
				<?php else: ?>
					<?php // dump($action) ?>
				<?php endif ?>
			<?php endforeach ?>

            <li class="cts-prev">prev</li>
            <li class="cts-next">next</li>
		</ul>
	</div>
</div>

<script>
	function downloadvCard(){
		let url = "https://www.lazoapp.co/vcard.php";
		let web = jQuery("#qa-6c92c1 a").attr("href");
		let imgFoto = document.getElementById("foto_imagen").src;
		let full_name = jQuery('.listing-main-info .profile-name .case27-primary-text').text().trim() + ' ' + jQuery('.apellido').text().trim();
		
		//Obtener numero tlf
		var str1 = jQuery("#qa-549f5e a").attr("href").replace('tel:','');
		var str = str1;
		var buscar="%20";
		var globals =str.replace(new RegExp(buscar,"g") ," ");
		var caracteres= globals.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '')
		let telefono = caracteres;

		let direccion = jQuery('.map-block-address p').text();
		let title = jQuery('#area').text();
		let role = jQuery('#puesto').text();
		let organization = jQuery('.listing-details .category-name').text();
		//Obtener correo
		let correo = jQuery('#correo').text();

		let links = [];
		if(jQuery('#links').text()!='') { 
			let linktemp = JSON.parse(jQuery('#links').text());
			linktemp.forEach( function(valor, indice, array) {
				links.push({'name': valor.name, 'link': valor.link});
			});
		};
		let note = jQuery('.listing-tagline-field').text();
		let namefile = jQuery('.listing-main-info .profile-name .case27-primary-text').text().trim();

		let params = {
			'web' : web,'foto' : imgFoto,'full_name' : full_name,'telefono' : telefono,'direccion' : direccion,'title' : title,'role' : role,'organization' : organization,
			'correo' : correo, 'links': links,'note' : note,'namefile' : namefile
		};
		let paramsJson = JSON.stringify(params);
		window.location = url + '?params='+paramsJson;
	}
</script>