const app = new Vue({
	el: '#root',
	data() {
		return {

		}
		
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

$(document).ready(function() {
	inventory_items.events();

});
inventory_items = {
	events(){
		var uploader = new qq.FineUploader({
            element: document.getElementById("uploader")
        })
	}
}