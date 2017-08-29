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
<<<<<<< HEAD
	stone_sizes.events();
});
stone_sizes = {
=======
	stone_size.events();
});
stone_size = {
>>>>>>> a340ff5dc46b815cb6d6d35e412daa6979054732
	events: function() {
		console.log('test');
	}
};