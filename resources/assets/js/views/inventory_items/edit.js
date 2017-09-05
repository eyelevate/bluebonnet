const app = new Vue({
	el: '#root',
	data() {
		return {
			stones: true,
			metals: true,
			sizes: true,
			stones_data: [],
			metals_data: [],
			images:[]
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
			
		}
	},
	computed: {

	},
	created() {

	},
	mounted() {

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
		// set variables and file input
		var upload = require('simple-upload-preview');
		var file = $('input[name="imgs[]"]'); // <input type="file" /> 

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
			        	// reindex
						var reindex = app.images.length;
			        	app.images.push({
			        		"name": el.name,
			        		"primary":false,
			        		"primary_name":'primary_image['+reindex+']',
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