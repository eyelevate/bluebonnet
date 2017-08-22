const app = new Vue({
	el: '#root',

	data() {
		return {
			clientId:'',
			clientName: '',
			serviceId:'',
			serviceName:''
		}
		
	},
	methods: {
		removeClient() {
			this.clientName="";
			this.clientId = '';
		},

		removeService() {
			this.serviceName="";
			this.serviceId = '';
		}

	},
	computed: {

	},
	created() {
	},
	mounted() {

	}
});


$(document).ready(function(){
	projects.events();
});

projects = {
	events: function() {
		$(".datepicker").datepicker();

		$(".select-service").click(function(){
			// grab values
			var service_id = $(this).attr('service-id');
			var service_name = $(this).attr('service-name');
			// set values on page app vue class 
			app.serviceId = service_id;
			app.serviceName = service_name;
			// hide modal
			$("#serviceModal").modal('hide');
		});

		$(".client-selected").click(function(){
			// grab values
			var client_id = $(this).attr('client-id');
			var client_name = $(this).attr('client-name');
			// set values on page app vue class 
			app.clientId = client_id;
			app.clientName=client_name;
			// hide modal
			$("#clientModal").modal('hide');
		});
	}
};