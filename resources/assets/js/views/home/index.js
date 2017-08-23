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
	home.events();
});
home = {
	events: function(){
		$('img.lazy').lazyload();
		$(".slip").sliphover();

		$('.page-header').parallaxElement({
			defaultSpeed:  0.2,   // Integer - Default speed if `data-speed` is not present 
			useOffset:     true,  // Boolean - Whether or not to start animations below bottom of viewport 
			defaultOffset: 200,   // Distance before element appears to start animation 
			disableMobile: false, // Boolean - allow function to run on mobile devices 
			minWidth:      false  // Integer - minimum width the function should fire 
		});
	}
};