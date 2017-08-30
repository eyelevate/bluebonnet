const app = new Vue({
	el: '#root',
	data() {
		return {
			images:[]
		}
		
	},
	methods: {
		primaryImage(key, $event){
			images = this.images;
			$.each(images, function(index, val) {
				if (key == index) {
					
					$(".image-divs").removeClass('bg-success').removeClass('card-inverse').find('.make-primary').removeClass('hide');
					$($event.target).addClass('hide');
					$($event.target).parents('.card:first').addClass('card-inverse').addClass('bg-success');
					images[index]['primary'] = true;
				} else {
					images[index]['primary'] = false;
				}
			});

			// set data
			this.images = images;
		},
		removeImage(key){
			images = this.images;
			imgs = [];
			$.each(images, function(index, val) {
				if (key !== index) {
					imgs.push(val);
				}
			});

			// set data
			this.images = imgs;
		}
	},
	computed: {

	},
	created() {

	},
	mounted() {

	}
});

$(document).ready(function() {
	inventory_items.pageLoad();
	inventory_items.events();

});
inventory_items = {
	pageLoad() {
		app.images = JSON.parse($("#image-variables").val());
	},
	events(){
		// set variables and file input
		var upload = require('simple-upload-preview');
		var file = $('input[name="imgs[]"]'); // <input type="file" /> 

		// watch for change in 
		$("#image-parent").on('change', file, function(event) {
			// remove previous variables

			// iterate through files and update
			file.each(function() {
		        var $input = $(this);
		        var inputFiles = this.files;
		        if(inputFiles == undefined || inputFiles.length == 0) return;
		        $.each(inputFiles,function(index, el) {
		        	var reader = new FileReader();
			        reader.onload = function(event) {
			        	app.images.push({
			        		"name": el.name,
			        		"primary":false,
			        		"primary_name":'primary_image['+index+']',
			        		"src":event.target.result
			        	});
			            $input.next().attr("src", event.target.result);
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