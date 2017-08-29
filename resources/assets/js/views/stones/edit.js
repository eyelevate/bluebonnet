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
			this.checkEmail = (checked == "on") ? true : false;
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
		
		app.sizes = JSON.parse($("#sizes").val());
		console.log($("#check-email").val());
		app.checkEmail = ($("#check-email").val() == 1) ? true : false;
	},
	events: function() {

	}
}