const app = new Vue({
	el: '#root',
	data() {
		return {
			checkEmail: true,
			sizes: []
		}
		
	},
	methods: {
		onEmailChecked(checked) {
			this.checkEmail = (checked == "on") ? false : true;
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
	stones.pageLoad();
	stones.events();
});
stones = {
	pageLoad() {
		console.log($("#sizes").val());
		app.sizes = JSON.parse($("#sizes").val());
	},
	events: function() {

	}
}