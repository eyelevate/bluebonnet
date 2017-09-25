const app = new Vue({
	el: '#root',
	data() {
		return {

		}
		
	},
	methods: {

	},
	computed: {

	},
	created() {

	},
	mounted() {

	}
});

$(document).ready(function() {
	collections.events();
});
collections = {
	events: function() {
		 
		var file = $('input[name="img"]'); // <input type="file" /> 
		var image = $('#preview'); // <img src="#" id="blah" /> 

		// file.addEventListener('change', upload.preview({
		//     element: image
		//     }, function(err, image) {
		//     // image variable is the image element with the file from input sorced. 
		// }));

		// watch for change in 
		$("#image-parent").on('change', file, function(event) {


			// iterate through files and update
			file.each(function() {
		        var $input = $(this);
		        var inputFiles = this.files;
		        if(inputFiles == undefined || inputFiles.length == 0) return;
		        $.each(inputFiles,function(index, el) {
		        	var reader = new FileReader();
			        reader.onload = function(event) {

			        	// app.images.push({
			        	// 	"name": (el.name.length > 15) ? el.name.substring(0,15) + '...' :  el.name,
			        	// 	"primary":false,
			        	// 	"primary_name":'primary_image['+index+']',
			        	// 	"src":event.target.result
			        	// });
			            image.attr("src", event.target.result);
			        };
			        reader.onerror = function(event) {
			            alert("ERROR: " + event.target.error.code);
			        };
			        reader.readAsDataURL(el);
		        });
		    });

		});
	}
}