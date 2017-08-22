const app = new Vue({
	el: '#root',

	data() {
		return {
			// planItem
			planItemCount: 0,
			planItemSubtotal: 0,
			planItems: [],

		}
		
	},
	methods: {
		/** 
		* plan item section
		*/
		getPlanItemData(plan_item_id){
			var check = true;
			// check if plan item is inside array
			this.planItems.forEach( function(v, k) {
				if (v.id == plan_item_id) {
					check = false;

				}	
			});
			if (check) {
				// get plan item info from server and post it to form
				axios.post('/plan-items/retrieve',{id:plan_item_id}).then(response => {
					response.data['inputName'] = 'itemPlan['+response.data.id+']';
					this.planItems.push(response.data);
					this.planItemCount = this.planItems.length;
					this.calculatePlanItem();
				});
				
			} else {
				alert('This plan item has already been included in the Cancel-fee table. Please review the table.');
			}
			
			
		},
		removePlanItemRow(plan_item_id){
			// create a new object for editing
			somearray = this.planItems;
			somearray.forEach(function(v, k){
				if (v.id == plan_item_id) { // If id matches then delete the row from array
					somearray.splice(k,1);
					$('tbody tr').find('.select-plan-items[plan-item-id="'+plan_item_id+'"]').parents('tr:first').removeClass('table-info');
				}
			});
			// reestablish the reactivity and set the label for the count
			this.planItems = somearray;
			this.planItemCount = this.planItems.length;
			this.calculatePlanItem();

		},
		calculatePlanItem(){
			sum = 0; // start base sum
			this.planItems.forEach(function(v, k){ //iterate through array to get total sum
				sum += parseFloat(v.subtotal); 
			});

			$("#subtotal").val(sum.toFixed(2));// add sum to input
			this.planItemSubtotal = sum.toFixed(2);
		},

		
		setVariables(planItem) {
			
			//plan items
			planItems = $.parseJSON(planItem);
			planItems.forEach(function(v, k){ //iterate through array to get total sum
				planItems[k]['inputName'] = 'itemPlan['+v.id+']';
			});
			this.planItems = planItems;
			this.planItemCount = planItems.length;
			this.calculatePlanItem();

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
	edit.preload();
	edit.variables();
	edit.events();
});

edit = {
	preload: function() {


	},
	variables: function() {
		var planItemData = $('#get-item-plan-data').val();
		var pid = JSON.parse($('#get-item-plan-data').val());
		app.setVariables(planItemData);
		pid.forEach( function(v, k) {
			plan_item_id = v.id;
			$(".select-plan-items[plan-item-id='"+plan_item_id+"']").parents('tr:first').addClass('table-info');
		});

	},
	events: function() {

		// plan item click
		$( document ).on( "click", ".select-plan-items" ,function() {
			var plan_item_id = $(this).attr('plan-item-id');

			// update plan item table
			app.getPlanItemData(plan_item_id);

			// highlight the row
			$(this).parents('tr:first').addClass('table-info');

		});



	}
};