const app = new Vue({
	el: '#root',
	data() {
		return {
			sizeName: 'test teste ttestsest',
			sizeId: ''
		}
		
	},
	methods: {

	}
});

$(document).ready(function() {
	stone_size.events();
});
stone_size = {
	events: function() {
		console.log('test');
	}
};