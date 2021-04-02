<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mt-5 mx-auto">
        <form @submit.prevent="submit">
          <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>

          <div class="form-group">
            <label for="firstname"> First Name</label>
            <input type="text" v-model="form.firstname" class="form-control" name="first_name" placeholder="first name">
          </div>

          <div class="form-group">
            <label for="lastname"> Last Name</label>
            <input type="text" v-model="form.lastname" class="form-control" name="last_name" placeholder="last name">
          </div>

          <div class="form-group">
            <label for="email"> Email Address</label>
            <input type="email" v-model="form.email" class="form-control" name="email" placeholder="Email Address">
          </div>
           <div class="form-group">
            <label for="city"> City </label>
            <input type="text" v-model="form.city" class="form-control" name="city" placeholder="Your city">
          </div>            
          <div class="form-group">
            <label for="pc"> Postal Code</label>
            <input type="number" v-model="form.pc" class="form-control" name="pc" placeholder="Your PC">
          </div> 
          <div class="form-group">
            <label for="address"> Address</label>
            <input type="text" v-model="form.address" class="form-control" name="address" placeholder="Your Address">
          </div> 
          <div class="form-group">
            <label for="phone"> Phone number</label>
            <input type="number" v-model="form.phone" class="form-control" name="phone" placeholder="Phone">
          </div>

          <div class="form-group">
            <label for="password"> Password</label>
            <input type="password" v-model="form.password" class="form-control" name="password" placeholder="Password">
          </div>

          <button type="submit" class="btn btn-lg btn-primary btn-block">Sign up</button>
        </form>
      </div>
    </div>
  </div>

</template>


<script>

    import { mapActions } from 'vuex'

    export default{
        name: "SignUp",
        data(){
            return {
              form : {
                firstname: '',
                lastname: '',
                email: '',
                password: '',
                admin: '0',
                address: '',
                pc: '',
                city: '',
                phone: ''
            }}
        },
      methods: {
      ...mapActions({
        signUp: 'auth/signUp',
        async submit() {
        await this.signUp(this.form);
        this.$router.push("/dashboard");
        },
      }),
  }}
</script>