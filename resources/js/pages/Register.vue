<template>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-6">
        <div class="card card-default">
          <div class="card-header">Register</div>
          <div class="card-body">
         <div class="alert alert-danger" v-if="has_error && !success">
                <p v-if="error == 'registration_validation_error'">Validation Errors.</p>
                <p v-else>Error.</p>
            </div>
           	<form
			@submit.prevent="register"
			:class="{mx_form_inv: formInv}"
			method="post"
		>

			<div>
				<label for="name">Name</label>
				<div class="form-group" >
				<input  class="form-control" 
					type="text"
					id="name"
					v-model="name"
					:class="{mx_empty_filed: !name}"
				/>
				<small>Fill in the Name</small>
				</div>
			</div>
			
			<div>
				<label for="email">E-mail</label>
				<div class="form-group" v-bind:class="{ 'has-error': has_error && errors.email }">
				<input  class="form-control" 
					type="email"
					id="email"
					v-model="email"
					:class="{mx_empty_filed: !email}"
				/>
				<span class="help-block alert alert-danger" v-if="has_error && errors.email">{{ errors.email }}</span>
				<small>Fill in the E-mail</small>
				</div>
			</div>
			<div>
				<label for="password">Password</label>
				<div class="form-group" >
				<input  class="form-control" 
					type="password"
					id="password"
					v-model="password"
					:class="{mx_empty_filed: !password}"
				/>
				<small>Fill in the password</small>
				</div>
			</div>

			<div>
				<label for="password_confirmation">password_confirmation</label>
				<div class="form-group" >
				<input  class="form-control" 
					type="password"
					id="password_confirmation"
					v-model="password_confirmation"
					:class="{mx_empty_filed: !password_confirmation}"
				/>
				<p class="alert alert-danger" :class="{passwords: !passwords}">passwords Doesnt match</p>
				<small>Fill in the password_confirmation</small>
				</div>
			</div>

			<!-- <div
				:class="{mx_recaptcha_failed: !recaptcha}"
			> -->
			 <div class="form-group" v-bind:class="{ mx_recaptcha_failed: !recaptcha }">
				<vue-recaptcha
					sitekey="6Le9WAEVAAAAAO-U7wI50TYIP5nKAxb7VkbkyoSY"
					@verify="mxVerify"
				></vue-recaptcha>
				
				<small>Doesn't complete!</small>
			</div>

			<div>
				<button>Submit</button>
			</div>
			
			
		</form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
   data() {
		return {
			name: null,
			email: null,
			password:null,
			password_confirmation:null,
			formInv: false,
			recaptcha: null,
			success: false,
			passwords:false,
			error: '',
			errors: {},
			has_error: false,
		}
	},
	methods: {
		mxVerify( response ) {

			this.recaptcha = response

		},
		register() {

			var app = this
			if(this.password === this.password_confirmation){
		       if(this.recaptcha){
                    this.$auth.register({
                        data: {
                        name: app.name,
                        email: app.email,
                        password: app.password,
                        password_confirmation: app.password_confirmation
                        },
                        success: function () {
							if(this.password === this.password_confirmation){
                                app.success = true
								this.$router.push({name: 'login', params: {successRegistrationRedirect: true}})
							}else {
					            this.formInv = true
					            }
                        },
          error: function (res) {
            //console.log(res.response.data.errors)
            app.has_error = true
            app.error = res.response.data.error
            app.errors = res.response.data.errors || {}
          }
			
		            })
	            }
	             else {
					this.formInv = true
					}
			}else {

				this.passwords = true
                }
		}

    }
}
</script>