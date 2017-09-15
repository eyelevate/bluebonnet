const app = new Vue({
	el: '#root',
	data: {
		count:0,
		archivedCount:0,
		firstMessages:[],
		secondMessages:[]
	},
	methods: {
		prepareData(data) {
			var countFirst = 0;
			var countSecond = 0;
			var firstMessages = [];
			var secondMessages = [];
			$.each(data['first'], function(index, val) {
				countFirst++;
				key = (index > 0) ? index+' day(s) ago' : 'Today'; 

				firstMessages[key] = val;
				
			});
			$.each(data['second'], function(index, val) {
				countSecond++;
				key = (index > 0) ? index+' day(s) ago' : 'Today'; 	
				secondMessages[key] = val;
			});


			this.firstMessages = firstMessages;
			console.log(firstMessages);
			this.secondMessages = secondMessages;
			this.count = countFirst;
			this.archivedCount = countSecond;
		}
	},
	computed: {

	},
	created() {

	},
	mounted() {
		// set variables for saving
		var set = JSON.parse($("#root").attr('data'));
		this.prepareData(set);
	}
});


$(document).ready(function(){
	bootstrap.events();
});

bootstrap = {
	events: function() {
		$('div.alert').not('.alert-important').delay(3000).fadeOut(350);

		$('.table-responsive').on('show.bs.dropdown', function () {
		     $('.table-responsive').css( "overflow", "inherit" );
		});

		$('.table-responsive').on('hide.bs.dropdown', function () {
		     $('.table-responsive').css( "overflow", "auto" );
		});
	}
};