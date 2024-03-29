const app = new Vue({
	el: '#root',
	data() {
		return {
			stones: true,
			metals: true,
			sizes: true,
			stones_data: [],
			metals_data: [],
			images:[],
			videos: [],
			oVideos: [],
		}
		
	},
	methods: {
		primaryImage(key, $event){
			console.log(key);
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
		removeVideo(key){
			videos = this.videos;
			vids = [];
			$.each(videos, function(index, val) {
				if (key !== index) {
					vids.push(val);
				}
			});

			// set data
			this.videos = vids;
		},
		removeoVideo(key){
			videos = this.oVideos;
			vids = [];
			$.each(videos, function(index, val) {
				if (key !== index) {
					vids.push(val);
				}
			});

			// set data
			this.oVideos = vids;
		},
		setVideos($event) {
			this.video = $($event.target).val();

		},
		setMetals() {
			metals = (this.metals) ? false : true;
			this.metals = metals;
		},
		setStones() {

			if (this.stones) {
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
			// var upload = require('simple-upload-preview');
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
			// var upload = require('simple-upload-preview');
			var file = $('input[name="videos[]"]'); // <input type="file" /> 

			// watch for change in 
			$("#video-parent").on('change', file, function(event) {
				// remove previous variables
				app.videos = [];

				// iterate through files and update
				file.each(function() {
			        var $input = $(this);
			        var inputFiles = this.files;
			        if(inputFiles == undefined || inputFiles.length == 0) return;
			        $.each(inputFiles,function(index, el) {
			        	console.log(el);
			        	var reader = new FileReader();
				        reader.onload = function(event) {
				        	app.videos.push({
				        		"name": (el.name.length > 15) ? el.name.substring(0,15) + '...' :  el.name,
				        		"primary":false,
				        		"type":el.type,
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
		},
		submitForm(){
			console.log('here');
			$('#send-form-modal').modal('show');
			$( "#item-form" ).submit();
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
		console.log(this.$el.attributes.sizes.value)
		app.stones_data = JSON.parse(this.$el.attributes.stonesData.value);
		console.log(app.stones_data);
		app.metals_data = JSON.parse(this.$el.attributes.metalsData.value);
		app.images = JSON.parse(this.$el.attributes.imageVariables.value);
		app.stones = (this.$el.attributes.stones.value == true);
		app.metals = (this.$el.attributes.metals.value == true);
		app.sizes = (this.$el.attributes.sizes.value == true);
		app.oVideos = JSON.parse(this.$el.attributes.oVideos.value);
    }
});

$(document).ready(function() {
	inventory_items.pageLoad();
	inventory_items.events();

});
inventory_items = {
	pageLoad() {
		
	},
	events(){



	}
}