( function( $ ) {
	$( 'document' ).ready( function() {
		console.log( 'Test' );
		const modal_window = $( '#page div.modal .content' );

		$( '[data-modal]' ).on( 'click', function( event ) {
			event.preventDefault();
			const target = '#' + $( this ).attr( 'data-modal' );
			modal_window.html( $( target ).html() );
			$( '.modal-wrapper, body' ).addClass( 'active' );
		} );

		$( '.modal-wrapper, .modal-close' ).bind( 'click', function( e ) {
			if ( e.target === e.currentTarget ) {
				$( this ).removeClass( 'active' );
				$('body').removeClass('active');
			}
		} );
	} );
}( jQuery ) );
