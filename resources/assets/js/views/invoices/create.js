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
		firstName:'',
		lastName:'',
		phone:'',
		email:'',
		street:'',
		suite:'',
		city:'',
		state:'TX',
		country:'US',
		zipcode:'',
		billingStreet:'',
		billingSuite:'',
		billingCity:'',
		billingState:'TX',
		billingCountry:'US',
		billingZipcode:'',
		cardNumber:'',
		expMonth:'',
		expYear:'',
		sas: false,
		totals: []
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
		removeItem(row, $event) {

			//remove the rows
			rows = [];
			ids = [];
			$.each(this.selectedOptions, function(index, val) {
				 if (index != row) {
				 	rows.push(val);
				 	ids.push(val.inventoryItem.id);
				 }
			});
			this.selectedOptions = rows;
			this.selectedItems = ids;
			this.searchInventoryItem();


		},
		fingerSelected(row,$event) {
			this.selectedOptions[row]['finger_id'] = $($event.target).find('option:selected').val();
		},
		quantitySelected(row,$event) {
			this.selectedOptions[row]['quantity'] = $($event.target).find('option:selected').val();
			this.subtotal(row);
		},
		stoneSelected(row, $event) {

			this.selectedOptions[row]['stone_id'] = $($event.target).find('option:selected').val();
			this.selectedOptions[row]['size_id'] = '';
			this.subtotal(row);
		},
		sizeSelected(row, $event) {

			this.selectedOptions[row]['size_id'] = $($event.target).find('option:selected').val();
			this.subtotal(row);
		},
		metalSelected(row, $event) {

			this.selectedOptions[row]['metal_id'] = $($event.target).find('option:selected').val();
			this.subtotal(row);
		},
		subtotal(row) {
			// get the price subtotal with all options selected
			axios.post('/inventory-items/'+this.selectedOptions[row].inventoryItem.id+'/get-subtotal',{
				'quantity': this.selectedOptions[row]['quantity'],
				'metal_id': this.selectedOptions[row]['metal_id'],
				'stone_id': this.selectedOptions[row]['stone_id'],
				'size_id': this.selectedOptions[row]['size_id'],

			}).then(response => {
				this.selectedOptions[row]['subtotal'] = response.data.subtotal;
				this.totals = response.data.totals;
			});
		},
		sameAsShipping() {
			if (this.sas) {
				this.sas = false;
				this.billingStreet = '';
				this.billingSuite = '';
				this.billingCity = '';
				this.billingState = '';
				this.billingCountry = '';
				this.billingZipcode = '';
			} else {
				this.sas = true;
				this.billingStreet = this.street;
				this.billingSuite = this.suite;
				this.billingCity = this.city;
				this.billingState = this.state;
				this.billingCountry = this.country;
				this.billingZipcode = this.zipcode;
			}

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