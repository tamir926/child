<? require_once("config.php");?>
<? require_once("views/helper.php");?>
<? require_once("views/init.php");?>
<link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />

  <body>
    <!-- Content -->

    <div class="authentication-wrapper authentication-cover authentication-bg">
      <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
          <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
            <img
              src="assets/img/illustrations/girl-doing-yoga-light.png"
              alt="auth-login-cover"
              class="img-fluid my-5 auth-illustration"
              data-app-light-img="illustrations/auth-login-illustration-light.png"
              data-app-dark-img="illustrations/auth-login-illustration-dark.png"
            />
          </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
          <div class="w-px-400 mx-auto">
            <!-- Logo -->
            <div class="app-brand mb-4">
              <a href="index" class="app-brand-link gap-2">
                  <img src="<?=$g_icon;?>" style="width:40px; height:40px">
              </a>
            </div>
            <!-- /Logo -->
            <h3 class="mb-1 fw-bold">Welcome to <?=$g_title;?> 👋</h3>
            <p class="mb-4"><?=$g_description;?></p>

            <form class="auth-login-form mt-2" action="logining" method="POST">
                <div class="form-group mb-1">
                    <label class="form-label" for="login-email">Нэвтрэх нэр</label>
                    <input class="form-control" id="login-username" type="text" name="login-username" placeholder="Нэвтрэх нэр" aria-describedby="login-username" autofocus="" tabindex="1" />
                </div>
                <div class="form-group mb-1">
                    <div class="d-flex justify-content-between">
                        <label for="login-password">Нууц үг</label>
                        <!-- <a href="page-auth-forgot-password-v2.html"><small>Forgot Password?</small></a> -->
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input type="password" class="form-control form-control-merge" id="login-password" name="login-password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" autofocus/>
                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                </div>
                <div class="form-group mb-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="remember-me" name="login_remember" type="checkbox" tabindex="3" />
                        <label class="custom-control-label" for="remember-me"> Remember Me</label>
                    </div>
                </div>
                <button class="btn btn-danger w-100" tabindex="4">Нэвтрэх</button>
            </form>
          
          </div>
        </div>
        <!-- /Login -->
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="assets/vendor/libs/hammer/hammer.js"></script>
    <script src="assets/vendor/libs/i18n/i18n.js"></script>
    <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/pages-auth.js"></script>
  </body>
</html>
