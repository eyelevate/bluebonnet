const app = new Vue({
	el: '#root',
	props: [],
	data: {
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

$(document).ready(function(){
	home.pageLoad();
	home.events();
});
home = {
	pageLoad(){
		// init Masonry
		var $grid = $('.grid').masonry({
			// set itemSelector so .grid-sizer is not used in layout
			itemSelector: '.grid-item',
			percentPosition: true
		});

		// layout Masonry after each image loads
		$grid.imagesLoaded().progress( function() {
			$grid.masonry('layout');
		});

		// google map
		$('#map').on('shown.bs.modal', function () {
		    var map = maps[0].map;
		    var currentCenter = map.getCenter();
		    google.maps.event.trigger(map, "resize");
		    map.setCenter(currentCenter);
		});
	},
	events: function(){
		$('img.lazy').lazyload();
		$(".slip").sliphover();

	},

};