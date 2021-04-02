<template>

  <div class="container">
    <div class="row">
      <div class="col-md-6 mt-5 mx-auto">
        <form @submit.prevent="submit">
          <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <div class="form-group">
              <label for="email">
                Email
              </label>

              <input type="text" class="form-control" name="email" placeholder="Email Address" id="email" v-model="form.email">
            </div>

            <div class="form-group">
              <label for="password">
                Password
              </label>
              <input type="password" class="form-control" name="password" placeholder="Password" id="password" v-model="form.password">
            </div>

            <div>
              <button class="btn btn-lg btn-primary btn-block" type="submit">
                Sign in
              </button>
            </div>
          </form>
        </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import { mapActions } from 'vuex'


export default {
  name: 'SignIn',
  components: {
    //
  },
    data () {
      return {
        form: {
          email: '',
          password: '',
        }
      }
    },
  methods: {
      ...mapActions({
        signIn: 'auth/signIn'
      }),
        submit(){
            this.signIn(this.form).then(() => {
             this.$router.replace({
               name: 'Dashboard'
             })
}) 
       }
  }
}
</script>