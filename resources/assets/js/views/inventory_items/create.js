const app = new Vue({
	el: '#root',
	data() {
		return {
			stones: false,
			metals: false,
			sizes: false,
			stones_data: [],
			metals_data: [],
			images:[],
			videos:[]
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
		},
		setMetals() {
			metals = (this.metals) ? false : true;
			this.metals = metals;
		},
		setStones() {
			stones = this.stones;

			if (stones) {
				this.stones = false;
				this.sizes = false;
			} else {
				this.stones = true;
				this.sizes = true;
			}
		},
		setSizes() {

			sizes = (this.sizes) ? false : true;
			this.sizes = sizes;
		},
		activateRow($event) {
			console.log($($event.target).is(':checked'));
			tr = $($event.target).parents('tr:first');
			if ($($event.target).is(':checked')) {
				tr.removeClass('table-active');
				tr.find('.active-input').removeClass('hide');
				tr.find('.active-button').removeClass('hide');
			} else {
				tr.addClass('table-active');
				tr.find('.active-input').addClass('hide');
				tr.find('.active-button').addClass('hide');
			}
			
		},
		imageEvents(){
			// set variables and file input
			var upload = require('simple-upload-preview');
			var file = $('input[name="imgs[]"]'); // <input type="file" /> 

			// watch for change in 
			$("#image-parent").on('change', file, function(event) {
				// remove previous variables
				app.images = [];

				// iterate through files and update
				file.each(function() {
			        var $input = $(this);
			        var inputFiles = this.files;
			        if(inputFiles == undefined || inputFiles.length == 0) return;
			        $.each(inputFiles,function(index, el) {
			        	var reader = new FileReader();
				        reader.onload = function(event) {
				        	app.images.push({
				        		"name": (el.name.length > 15) ? el.name.substring(0,15) + '...' :  el.name,
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
		},
		videoEvents() {
			// set variables and file input
			var upload = require('simple-upload-preview');
			var file = $('input[name="videos[]"]'); // <input type="file" /> 

			// watch for change in 
			$("#video-parent").on('change', file, function(event) {
				// remove previous variables
				app.images = [];

				// iterate through files and update
				file.each(function() {
			        var $input = $(this);
			        var inputFiles = this.files;
			        if(inputFiles == undefined || inputFiles.length == 0) return;
			        $.each(inputFiles,function(index, el) {
			        	var reader = new FileReader();
				        reader.onload = function(event) {
				        	app.videos.push({
				        		"name": (el.name.length > 15) ? el.name.substring(0,15) + '...' :  el.name,
				        		"primary":false,
				        		"primary_name":'primary_video['+index+']',
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
	},
	computed: {

	},
	created() {

	},
	mounted() {
		this.imageEvents();
		this.videoEvents();
	}
});

const vars = new Vue({
	el: '#variable-root',
	mounted() {
		app.stones_data = JSON.parse(this.$el.attributes.stones.value);
		app.metals_data = JSON.parse(this.$el.attributes.metals.value);
    }
});


$(document).ready(function() {
	inventory_items.events();

});



inventory_items = {
	
}