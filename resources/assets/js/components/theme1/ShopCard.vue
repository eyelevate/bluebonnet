<template>
    <div class="card">
	    <div class="card-header" :class="hClass" v-if="checkCardHeader">
	       	<slot name="header"></slot>
	    </div>
        <div v-if="checkCardImageTop" :class="iTopDivClass">
            <img class="card-img-top lazy" :data-original="iTopSrc" :class="iTopClass">    
        </div>
        
	    <div class="card-block" :class="bClass" v-if="checkCardBody">
	        <slot name="body"></slot>
	    </div>
	    <div class="card-footer" :class="fClass" v-if="checkCardFooter">
	    	<slot name="footer"></slot>
	    </div>
	</div>
</template>

<script>
    export default {
    	props:[
            'body-class',
            'footer-class', 
            'header-class',
            'use-header',
            'use-body',
            'use-footer',
            'use-img-top',
            'img-top-src',
            'img-top-div-class',
            'img-top-class',
        ],
    	data() {
    		return {
    			checkCardHeader: (this.useHeader == 'true'),
    			checkCardBody: (this.useBody == 'true'),
    			checkCardFooter: (this.useFooter == 'true'),
                checkCardImageTop: (this.useImgTop == 'true'),
    			bClass: this.bodyClass,
    			fClass: this.footerClass,
                hClass: this.headerClass,
                iTopSrc: this.imgTopSrc,
                iTopDivClass: this.imgTopDivClass,
                iTopClass: this.imgTopClass,
                iTopSrcClass: this.imgTopClass
    		}
    	},
    	methods: {

    	},
        mounted() {

        }
    }
</script>