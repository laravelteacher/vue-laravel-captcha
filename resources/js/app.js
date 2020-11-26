
require('./bootstrap');

import 'es6-promise/auto'
import axios from 'axios'
import Vue from 'vue'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import Index from './Index'
import auth from './auth'
import router from './router'

// Set Vue globally
window.Vue = Vue
 Vue.component( 'vue-recaptcha', VueRecaptcha )

// Set Vue router
Vue.router = router
Vue.use(VueRouter)

// Set Vue authentication
Vue.use(VueAxios, axios)
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api/v1`
Vue.use(VueAuth, auth)

// Load Index
Vue.component('index', Index)






// Vue.component( 'my_vue_form', {
// 	template: ` 
// 		<form
// 			@submit.prevent="mxSubmit"
// 			:class="{mx_form_inv: formInv}"
// 		>

// 			<div>
// 				<label for="mxSubject">Subject</label><br />
// 				<input 
// 					type="text"
// 					id="mxSubject"
// 					v-model="subject"
// 					:class="{mx_empty_filed: !subject}"
// 				/><br />
// 				<small>Fill in the subject</small>
// 			</div>
			
// 			<div>
// 				<label for="mxMessage">Your message</label><br />
// 				<textarea
// 					id="mxMessage"
// 					cols="30" rows="10"
// 					v-model="message"
// 					:class="{mx_empty_filed: !message}"
// 				></textarea><br />
// 				<small>Fill in the message</small>
// 			</div>

// 			<div
// 				:class="{mx_recaptcha_failed: !recaptcha}"
// 			>
// 				<vue-recaptcha
// 					sitekey="6Le9WAEVAAAAAO-U7wI50TYIP5nKAxb7VkbkyoSY"
// 					@verify="mxVerify"
// 				></vue-recaptcha>
// 				<br />
// 				<small>Doesn't complete!</small>
// 			</div>

// 			<div>
// 				<button>Submit</button>
// 			</div>
			
			
// 		</form>
// 	`,
// 	data() {
// 		return {
// 			subject: null,
// 			message: null,
// 			formInv: false,
// 			recaptcha: null
// 		}
// 	},
// 	methods: {
// 		mxVerify( response ) {

// 			this.recaptcha = response

// 		},
// 		mxSubmit() {

// 			if( this.subject && this.message && this.recaptcha ) {

// 				console.log( 'Submit' )


// 			} else {

// 				this.formInv = true

// 			}
			
// 		}
// 	}
// } )

const app = new Vue({
  el: '#app',
  router
})

