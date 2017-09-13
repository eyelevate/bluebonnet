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
		totals: [],
		stepOne: false,
		stepTwo: false,
		stepThree: false,
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
					this.validation();
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
			this.validation();
		},
		next() {
			this.current += 1;
			this.validation();
		},
		selectItem(item_id) {
			this.selectedItems.push(item_id);
			this.searchInventoryItem();
			this.selectedItemOptions();
			this.validation();
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
			this.validation();


		},
		fingerSelected(row,$event) {
			this.selectedOptions[row]['finger_id'] = $($event.target).find('option:selected').val();
			this.validation();
		},
		quantitySelected(row,$event) {
			this.selectedOptions[row]['quantity'] = $($event.target).find('option:selected').val();
			this.subtotal(row);
			this.validation();
		},
		stoneSelected(row, $event) {
		
			this.selectedOptions[row]['stone_id'] = $($event.target).find('option:selected').val();
			this.selectedOptions[row]['size_id'] = '';
			this.subtotal(row);
			this.validation();
		},
		sizeSelected(row, $event) {

			this.selectedOptions[row]['size_id'] = $($event.target).find('option:selected').val();
			this.subtotal(row);
			this.validation();
		},
		metalSelected(row, $event) {

			this.selectedOptions[row]['metal_id'] = $($event.target).find('option:selected').val();
			this.subtotal(row);
			this.validation();
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

		},
		validation() {
			// Step 1
			this.stepOne = false;
			if (this.selectedItems.length > 0) {
				this.stepOne = true;
			}

			// Step 2
			this.stepTwo = false;
			checkTwo = true;
			$.each(this.selectedOptions, function(index, val) {
				 /* iterate through array or object */
				 // determine the rules
				 var fingers = val.inventoryItem.fingers;
				 var metals = val.inventoryItem.metals;
				 var stones = val.inventoryItem.stones;
				 var sizes = val.inventoryItem.sizes;
				 var email = false;
				 if (fingers) {
				 	if (val.finger_id == null || val.finger_id == '') {
				 		checkTwo = false;
				 		return false;
				 	}
				 }

				 if (metals) {
				 	if (val.metal_id == null || val.metal_id == '') {
				 		checkTwo = false;
				 		return false;
				 	}
				 }

				 if (stones) {
				 	
				 	$.each(val.item_stone,function(k, v) {
				 		if (v.stone_id == val.stone_id) {
				 			email = v.stones.email;
				 			return false;
				 		}
				 	});

				 	if (val.stone_id == null || val.stone_id == '') {
				 		checkTwo = false;
				 		return false;
				 	}
				 	if (!email) {
				 		if (sizes) {
					 		if (val.size_id == null || val.size_id == '') {
						 		checkTwo = false;
						 		return false;
						 	}
					 	}
				 	}
				 	
				 }


			});
			if (checkTwo) {
				this.stepTwo = true;
			}

			// Step 3
			this.stepThree = false;

			// Step 4
			this.stepFour = false;


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