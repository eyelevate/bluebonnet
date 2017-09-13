const app = new Vue({
	el: '#root',
	props: [],
	data: {
		itemName: '',
		searchInventoryCount: 0,
		selectedItems: [],
		selectedOptions: [],
		items: [],
		current:1,
	},
	methods: {
		searchInventoryItem(){
	
			// get the price subtotal with all options selected
			axios.post('/inventory-items/find-items',{
				'name':this.itemName,
				'selected': this.selectedItems
			}).then(response => {
				if (response.data.status) {
					this.items = response.data.items;
					this.searchInventoryCount = response.data.items.length;
				}
			});
		},
		selectedItemOptions(){
			// get the price subtotal with all options selected
			axios.post('/inventory-items/get-options',{
				'selected': this.selectedItems
			}).then(response => {
				if (response.data.status) {
					this.selectedOptions = response.data.selected;
				}
			});
		},
		reset() {
			// get the price subtotal with all options selected
			axios.post('/invoices/reset').then(response => {
				if (response.data.status) {
					location.reload();
				}
			});
		},
		back() {
			this.current -= 1;
		},
		next() {
			this.current += 1;
		},
		selectItem(item_id) {
			this.selectedItems.push(item_id);
			this.searchInventoryItem();
			this.selectedItemOptions();
		},
		removeItem(item_id) {

		},
		quantitySelected(row,$event) {
			this.selectedOptions[row]['quantity'] = $($event.target).find('option:selected').val();
		},
		stoneSelected(row, $event) {

			this.selectedOptions[row]['stone_id'] = $($event.target).find('option:selected').val();
		},
		sizeSelected(row, $event) {

			this.selectedOptions[row]['metal_id'] = $($event.target).find('option:selected').val();
		},
		metalSelected(row, $event) {

			this.selectedOptions[row]['size_id'] = $($event.target).find('option:selected').val();
		},
		subtotal(row) {
			// get the price subtotal with all options selected
			axios.post('/inventory-items/get-subtotal',{
				'quantity': this.selectedOptions[row]['quantity'],
				'metal_id': this.selectedOptions[row]['metal_id'],
				'stone_id': this.selectedOptions[row]['stone_id'],
				'size_id': this.selectedOptions[row]['size_id'],

			}).then(response => {
				if (response.data.status) {
					location.reload();
				}
			});
		}
	},
	computed: {
	},
	created() {
	},
	mounted() {
	}
});
var vars = new Vue({
	el: '#variable-root',
	mounted: function mounted() {
		app.items = JSON.parse(this.$el.attributes.items.value);
		app.searchInventoryCount = app.items.length;
	}
});

$(document).ready(function(){
	invoices.pageLoad();
	invoices.events();
});

invoices = {
	pageLoad(){

	},
	events: function(){
	},

};