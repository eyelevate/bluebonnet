const app = new Vue({
	el: '#root',
	data() {
		return {
			inventory_id: ''
		}
		
	},
	methods: {
		setInventory($event){
    		var option_selected = $($event.target).find('option:selected').val();
    		this.inventory_id = option_selected;
    		
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
	collections.pageLoad();
	collections.events();
});
collections = {
	pageLoad() {
	},
	events: function() {
	}
}