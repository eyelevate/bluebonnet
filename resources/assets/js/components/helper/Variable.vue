<template>
    <router-view></router-view>
</template>

<script>
    export default {
    	props:[
            'var-1',
            'var-2',
            'var-3',
            'var-4',
            'var-5'
        ],
    	data() {
    		return {
                variable1:this.var1;
                variable2:this.var2;
                variable3:this.var3;
                variable4:this.var4;
                variable5:this.var5;
    		}
    	},
    	methods: {
            
    	},
        mounted() {

        }
    }
</script>