<template>
	<div class = "form-group">
        <label v-if="uLabel">{{label}}</label>
        <slot name="select"></slot> 
        
        <span class="help-block text-danger" v-if="err">
            <small>{{ bError }}</small>
        </span> 
	</div>
    

</template>

<script>
    export default {
    	props:['b-error','b-err', 'use-label', 'label'],

    	data() {
    		return {
    			err: this.bError,
                uLabel: (this.useLabel == "true")
    		}
    	},
        mounted() {

        }
    }
</script>