const gpbrGFClientside = {
	populateFields: () => {
		if( typeof gpbrGfClientSideConfig !== 'undefined' ) {
			const urlParams = new URLSearchParams( window.location.search );
			
			gpbrGfClientSideConfig.populate.forEach( ( field ) => {
				const value = urlParams.get( field.parameter );
				
				if( value !== null ) {
					const inputField = document.getElementById(
					  field.fieldId ).value = value;
				}
			} )
		}
	},
}

gpbrGFClientside.populateFields()