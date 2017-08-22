const app = new Vue({
	el: '#root',

	data() {
		return {
			//subtotal
			planItemCount: 0,
			planItemSubtotal: 0,
			planItems: []
		}
		
	},
	methods: {
		/**
		* Plan Item Section
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
					this.calculatePlanItems();
				});
				
			} else {
				alert('This plan item has already been included in the plan items table. Please review the table.');
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
			this.calculatePlanItems();

		},
		calculatePlanItems(){
			sum = 0; // start base sum
			this.planItems.forEach(function(v, k){ //iterate through array to get total sum
				sum += parseFloat(v.subtotal); 
			});

			$("#subtotal").val(sum.toFixed(2)); // add sum to input
			this.planItemSubtotal = sum.toFixed(2);
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
	create.events();
});

create = {
	events: function() {

		// plan-items event
		$( document ).on( "click", ".select-plan-items" ,function() {
			var plan_item_id = $(this).attr('plan-item-id');
			// update plan items table
			app.getPlanItemData(plan_item_id);

			// highlight the row
			$(this).parents('tr:first').addClass('table-info');

		});


	}
};