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
		stepFour: false,
		shipping: 1,
		progress: 0,
		formStatusOne: false,
		formStatusTwo: false,
		formStatusThree: false,
		formStatusFour: false,
		formStatusFive: false,
		formStatusSix: false,
		formStatusSeven: false,
		formStatusEight: false,
		formStatusNine: false,
		formStatusTen: false,
		formErrorOne: false,
		formErrorTwo: false,
		formErrorThree: false,
		formErrorFour: false,
		formErrorFive: false,
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
		selectItem(item_id, $event) {
			
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
			this.getTotals();


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
			this.selectedOptions[row]['stone_size_id'] = '';
			this.subtotal(row);
			this.validation();
		},
		sizeSelected(row, $event) {

			this.selectedOptions[row]['stone_size_id'] = $($event.target).find('option:selected').val();
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
				'size_id': this.selectedOptions[row]['stone_size_id'],

			}).then(response => {
				this.selectedOptions[row]['subtotal'] = response.data.subtotal;
				this.getTotals();
			});
		},
		getTotals() {

			// get the price subtotal with all options selected
			axios.post('/inventory-items/get-totals',{
				'items': this.selectedOptions
			}).then(response => {
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
			this.validation();

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
				 	
				 	$.each(val.inventoryItem.item_stone,function(k, v) {
				 		if (v.id == val.stone_id) {
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
					 		if (val.stone_size_id == null || val.stone_size_id == '') {
						 		checkTwo = false;
						 		return false;
						 	}
					 	}
				 	}
				 	
				 }

				 if (val.subtotal == 0) {
				 	checkTwo = false;
				 }
			});
			if (checkTwo) {
				this.stepTwo = true;
			}

			// Step 3
			this.stepThree = false;
			if (this.firstName != '' 
				&& this.lastName != '' 
				&& this.phone != '' 
				&& this.email != '' 
				&& this.street != '' 
				&& this.city != '' 
				&& this.state != '' 
				&& this.country != ''
				&& this.zipcode != '') {
				this.stepThree = true;
			}

			// Step 4
			this.stepFour = false;

			if (this.billingStreet != ''
				&& this.billingCity != ''
				&& this.billingState != ''
				&& this.billingCountry != ''
				&& this.billingZipcode != ''
				&& this.cardNumber != ''
				&& this.expMonth != ''
				&& this.expYear != '') {
				this.stepFour = true;
			}


		},
		updateShipping(shipping) {
			this.shipping = shipping;

			options = this.selectedOptions;
			$.each(options, function(index, val) {
				options[index]['shipping'] = shipping;
			});

			this.selectedOptions = options;

			this.getTotals();
		},
		makeSession() {
			this.progress = 0;
			this.formStatusOne = true;
			axios.post('/invoices/make-session',{
				'items': this.selectedOptions
			}).then(response => {
				if (response.data.status) {
					this.progress = 10;
					this.formStatusTwo = true;
					this.authorizePayment();
					
				} else {
					this.formErrorOne = true;
				}
			});
		},
		authorizePayment() {
			this.progress = 20
			this.formStatusThree = true;
			axios.post('/invoices/authorize-payment').then(response => {
				if (response.data.status) {
					this.formStatusFour = true;
					this.progress = 30;
					this.store();
				} else {
					this.formErrorTwo = true;
				}
			});
		},
		store() {
			this.progress = 40;
			this.formStatusFive = true;
			axios.post('/invoices/store').then(response => {
				if (response.data.status) {
					this.formStatusSix = true;
					this.progress = 50;
					this.sendEmail();
				} else {
					this.formErrorThree = true;
				}
			});
		},
		sendEmail() {
			this.progress = 60;
			this.formStatusSeven = true;
			axios.post('/invoices/send-email').then(response => {
				if (response.data.status) {
					this.formStatusEight = true;
					this.progress = 75;
					this.forgetSession();
				} else {
					this.formErrorFour = true;
				}
			});
		},
		forgetSession() {
			this.progress = 90;
			this.formStatusNine = true;
			axios.post('/invoices/forget-session').then(response => {
				if (response.data.status) {
					this.formStatusTen = true;
					this.progress = 100;
					// send user back to page
				} else {
					this.formErrorFive = true;
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