const app = new Vue({
	el: '#root',
	data() {
		return {
			carat:null,
			size:null,
			name:""
		}
		
	},
	methods: {
		createName() {
			this.name = this.size+"mm ("+this.carat+" ct)";
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
	metals.events();
});
metals = {
	events: function() {

	}
}