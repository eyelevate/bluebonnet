const app = new Vue({
	el: '#root',
	data() {
		return {
			id:'',
			name:''
		}
		
	},
	methods: {
		onChange(type) {
			// make sure they are all hidden
			$("div.type-row:not(.hide)").addClass('hide');
			$("div.type-row[type='"+type+"']").removeClass('hide');
			// Toggle fixed price
			if (type < 5) {
				$("div.type-row[type='6']").removeClass('hide');
			} else {
				$("div.type-row[type='6']").addClass('hide');
			}
		},
		removeVendor() {
			this.name="";
			this.id = '';
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
	services.events();
	services.variables();	
});
services = {
	variables: function() {
		app.id = $("#vend-id").val();
		app.name = $("#vend-name").val();
	},
	events: function() {
		$(".vendor-selected").click(function(){
			// grab values
			var vendor_id = $(this).attr('vendor_id');
			var vendor_name = $(this).attr('vendor_name');
			// set values on page app vue class 
			app.id = vendor_id;
			app.name=vendor_name;
			// hide modal
			$("#vendorModal").modal('hide');
		});
	}
}