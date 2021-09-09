$(document).ready(function() {
	// Initialize a empty FileReader
	var reader  = new FileReader();

	// select the image 'on change' event
	$("#change-img").on('change', function(ev) {
		// get the file
		var file = ev.target.files[0];

		// set the file as data-url
		if(file) {
			reader.readAsDataURL(file);
		}

		// set the result reader on-load event
		$(reader).on('load', function() {
			// set the reader result into dom
			$("#profile-pic").attr({
				src: reader.result
			});
		});
	});
});
