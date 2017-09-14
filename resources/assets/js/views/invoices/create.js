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
		cvv:'',
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
		done: false,
		formErrors: false,
		authorizationErrorMessage: '',
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
			this.itemName= '';
			this.searchInventoryCount= 0;
			this.selectedItems= [];
			this.selectedOptions= [];
			this.items= [];
			this.current=1;
			this.firstName='';
			this.lastName='';
			this.phone='';
			this.email='';
			this.street='';
			this.suite='';
			this.city='';
			this.state='TX';
			this.country='US';
			this.zipcode='';
			this.billingStreet='';
			this.billingSuite='';
			this.billingCity='';
			this.billingState='TX';
			this.billingCountry='US';
			this.billingZipcode='';
			this.cardNumber='';
			this.expMonth='';
			this.expYear='';
			this.cvv = '';
			this.sas= false;
			this.totals= [];
			this.stepOne= false;
			this.stepTwo= false;
			this.stepThree= false;
			this.stepFour= false;
			this.shipping= 1;
			this.progress= 0;
			this.formStatusOne= false;
			this.formStatusTwo= false;
			this.formStatusThree= false;
			this.formStatusFour= false;
			this.formStatusFive= false;
			this.formStatusSix= false;
			this.formStatusSeven= false;
			this.formStatusEight= false;
			this.formStatusNine= false;
			this.formStatusTen= false;
			this.formErrorOne= false;
			this.formErrorTwo= false;
			this.formErrorThree= false;
			this.formErrorFour= false;
			this.formErrorFive= false;
			this.done= false;
			this.formErrors = false;
			this.authorizationErrorMessage = '';
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
				&& this.expYear != ''
				&& this.cvv != '') {
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
			this.resetSendingForm();
			try {
				axios.post('/invoices/make-session',{
					'selected_options': this.selectedOptions,
					'first_name':this.firstName,
					'last_name':this.lastName,
					'phone':this.phone,
					'email':this.email,
					'street':this.street,
					'suite':this.suite,
					'city':this.city,
					'state':this.state,
					'country':this.country,
					'zipcode':this.zipcode,
					'billing_street':this.billingStreet,
					'billing_suite':this.billingSuite,
					'billing_city':this.billingCity,
					'billing_state':this.billingState,
					'billing_zipcode':this.billingZipcode,
					'card_number':this.cardNumber,
					'exp_month':this.expMonth,
					'exp_year':this.expYear,
					'cvv': this.cvv,
					'item_name':this.itemName,
					'search_inventory_count':this.searchInventoryCount,
					'selected_items':this.selectedItems,
					'items':this.items,
					'current':this.current,
					'sas':this.sas,
					'totals':this.totals,
					'shipping':this.shipping				
				}).then(response => {
					if (response.data.status) {
						this.progress = 10;
						this.formStatusTwo = true;
						this.authorizePayment();
						
					} else {
						this.formErrors = true;
						this.formErrorOne = true;
					}
				});
			} catch(e) {
				this.formErrors = true;
				this.formErrorOne = true;
			}
			
		},
		authorizePayment() {
			this.progress = 20
			this.formStatusThree = true;
			try {
				axios.post('/invoices/authorize-payment').then(response => {
					if (response.data.status) {
						this.formStatusFour = true;
						this.progress = 30;
						this.store();
					} else {
						this.formErrors = true;
						this.formErrorTwo = true;
						this.authorizationErrorMessage = response.data.message;
					}
				});
			} catch(e) {
				this.formErrors = true;
				this.formErrorTwo = true;
			}
			
		},
		store() {
			this.progress = 40;
			this.formStatusFive = true;
			try {
				axios.post('/invoices/store').then(response => {
					if (response.data.status) {
						this.formStatusSix = true;
						this.progress = 50;
						this.sendEmail();
					} else {
						this.formErrors = true;
						this.formErrorThree = true;
					}
				});
			} catch(e) {
				this.formErrors = true;
				this.formErrorThree = true;
			}
		},
		sendEmail() {
			this.progress = 60;
			this.formStatusSeven = true;
			try {
				axios.post('/invoices/push-email').then(response => {
					if (response.data.status) {
						this.formStatusEight = true;
						this.progress = 75;
						this.forgetSession();
					} else {
						this.formErrors = true;
						this.formErrorFour = true;
					}
				});
			} catch(e) {
				// statements
				this.formErrors = true;
				this.formErrorFour = true;
			}
			
		},
		forgetSession() {
			this.progress = 90;
			this.formStatusNine = true;
			try {
				axios.post('/invoices/forget-session').then(response => {
					if (response.data.status) {
						this.formStatusTen = true;
						this.progress = 100;
						this.done = true;
						this.formErrors = false;
						// send user back to page
					} else {
						this.formErrors = true;
						this.formErrorFive = true;

					}
				});
			} catch(e) {
				this.formErrors = true;
				this.formErrorFive = true;
			}
			

		},
		resetSendingForm() {
			this.progress= 0;
			this.formStatusOne= false;
			this.formStatusTwo= false;
			this.formStatusThree= false;
			this.formStatusFour= false;
			this.formStatusFive= false;
			this.formStatusSix= false;
			this.formStatusSeven= false;
			this.formStatusEight= false;
			this.formStatusNine= false;
			this.formStatusTen= false;
			this.formErrorOne= false;
			this.formErrorTwo= false;
			this.formErrorThree= false;
			this.formErrorFour= false;
			this.formErrorFive= false;
			this.done= false;
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