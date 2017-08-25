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
	},
	events: function(){
		$('img.lazy').lazyload();
		$(".slip").sliphover();

	},

};