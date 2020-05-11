<template>
  <div>
    <div class="login-box">
      <div class="login-logo">
        <a href="#">
          <b>Caravane</b>
        </a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Connectez-vous pour commencer</p>
          <form  method="post">
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember" />
                  <label for="remember">Se souvenir de moi</label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4 md-2">
                <button type="submit" v-on:click="test" class="btn btn-primary btn-block">Login</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <!-- /.social-auth-links -->

          <p class="mb-1">
            <a href="#">Mot de passe oublié</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "login",
  data() {
    return {
      
    }
  },

  methods: {
    test(){
      this.$router.push("/home");
    }
  },
}
</script>

<style lang="stylus">

</style>
