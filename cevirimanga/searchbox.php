  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="style1.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>
      <!--header section start-->
      <div class="containerheader">
          <div class="nav1">
              <a href="index.php"><img src="images/logo.png" alt="logo" /></a>
          </div>
          <nav>
              <div class="nav2">
                  <div class="navtext">
                      <a href="index.php">
                          <i class="fa-solid fa-house" style="padding-right: 1rem;"></i>
                          Ana Sayfa
                      </a>
                  </div>
              </div>
              <div class="navtema">
                  <div class="navtext" id="themetext">
                      Tema
                  </div>
                  <div class="navtext">
                      <i class="fa-regular fa-sun" id="theme"></i>
                  </div>
              </div>
              <div class="nav3">
                  <div class="navtext">
                      <a href=""><i class="fa-solid fa-user"></i></a>
                  </div>
                  <div class="navtext" style="padding-left: 0rem;"><a href="#">Giriş Yap</a></div>
                  /
                  <div class="navtext"><a href="#">Üye Ol</a></div>
              </div>
          </nav>
      </div>
      <!--header section end-->

      <!--search section start-->
      <div class="anchor" id="search"></div>
      <section class="search">
          <div class="containersearch">
              <form action="searchbox.php" method="get" name="searchform">
                  <input type="text" name="aranan" id="aranan" placeholder="Ara" />
                  <button type="submit" name="submit" value="submit" style="background-color: transparent; scale: 1.2; margin-right: 1.2rem; cursor: pointer;">
                      <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
              </form>
          </div>
      </section>
      <!--search section end-->

      <!--butunmangalar section start-->
      <div class="manga">
        <div class="mangaresim">
          <a href="mangalar/vinland-saga/vinland-saga.php">
            <img src="mangalar/vinland-saga/kapak-fotografi/vinland-saga.jpg" alt="Vinland Saga" />
          </a>
        </div>
        <div class="mangatext">
          <a href="mangalar/vinland-saga/vinland-saga.php">
            <h3>Vinland Saga</h3>
          </a>
        </div>
      </div>
      <!--butunmangalar section end-->

      <!--footer section start-->
      <?php include("footer.html"); ?>
      <!--footer section end-->

      <!--theme section start-->
      <?php include("scriptfortheme.html"); ?>
      <!--theme section end-->
  </body>

  </html>