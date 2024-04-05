<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <!-- in mobile set initial zoom level of page to 100%, set site size to equal device width not a larger canvas that is shrunk down-->
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <title>Login Page</title>
    <!-- Link to reset or normalize before main.css
    only choose one -->
    <title>Foundation Sixty6 | Unlock the door to possibility</title>
    <!-- ++++++++++++++ FAVICON  ++++++++++++++++-->
    <link rel="shortcut icon" href="../images/favicon.png" type="images/x-icon" />
    <!-- ++++++++++++++ ICON LIBRARY ++++++++++++++++-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin=""/>
    <!-- ++++++++++++++ CSS INCLUDES ++++++++++++++++-->
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../css/grid.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <!-- ++++++++++++++ GREENSOCK ++++++++++++++++-->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.0/ScrollTrigger.min.js"></script>
    <script defer src="../js/gsap.min.js"></script>
    <script defer src="../js/DrawSVGPlugin.min.js"></script>
    <script defer src="../js/scrolltrigger.js"></script>
    <!-- ++++++++++++++ PLYR  ++++++++++++++++-->
    <script defer src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
    <!-- ++++++++++++++ Charts JS  ++++++++++++++++-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    <script defer src="../js/charts.js"></script>
    <!-- ++++++++++++++ ScrollReveal JS ++++++++++++++++-->
    <script defer src="../js/scrollreveal.min.js"></script>
    <!-- ++++++++++++++ VUEJS ++++++++++++++++-->
    <script defer src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <!-- ++++++++++++++ VUEJS ROUTER ++++++++++++++++-->
    <script defer src="https://unpkg.com/vue-router@4.0.15/dist/vue-router.global.js"></script>
    <!-- ++++++++++++++ MAIN JS ++++++++++++++++-->
    <script type="module" defer src="../js/main.js"></script>
    <!-- main library -->

    <script
      async
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"
    ></script>
    <!-- ScrollTrigger plugin -->
    <script
      async
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"
    ></script>
    <!-- Text plugin -->
    <script
      async
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/TextPlugin.min.js"
    ></script>

    <!-- our main js file -->
    <script defer type="module" src="../js/main.js"></script>
  </head>
  <body class="admin-body">
    <section class="grid-con" id="admin-login">
      <div class="m-col-start-5 m-col-end-9 col-span-full admin-login-div">
        <h2>WELCOME</h2>
        <p>Login with your admin credentials.</p>
        <form id="admin-form" action="login.php" method="post">
          <label for="username">Username: </label>
          <input
            type="text"
            name="username"
            id="username"
            placeholder="Your username"
          /><br />
          <label for="password">Password: </label>
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Your password here"
          />

          <input type="submit" value="Login" />
          <p class="forgotPassword">
            <a href="forgotpassword.html">Forgotten your Password?</a>
          </p>
        </form>
      </div>
    </section>
  </body>
</html>
