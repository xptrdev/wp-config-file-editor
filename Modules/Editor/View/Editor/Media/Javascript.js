/**
* 
*/

/**
* 
*/
(function($) {

	
	/**
	* 
	*/
	var WCFESecureKeyGenerator = new function() {
		
		/**
		* 
		*/
		this.generateFieldKey = function(event) {
			// Send key generation server request
			$.get(editorServiceKeyGenUrl).done($.proxy(
				function(secureKey) {
					// Set Input field
					$(event.target).prev().val(secureKey);
				}, this)
			);
			// Inactive
			return false;
		};

		/**
		* 
		*/
		this.initialize = function() {
			$('.secure-key-generator-key').click($.proxy(this.generateFieldKey, this));
		};
	
		// Generate key when generation link is clicked
		$($.proxy(this.initialize, this));
	};
	
	
})(jQuery);