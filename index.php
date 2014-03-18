<!DOCTYPE html>
<? include('data.php'); ?>
<head>
  <meta charset="UTF-8"/>
  <link rel="icon" href="images/logo 80x80.png" type="image/png"/><!--Show logo on tab-->
  <title>VOLCANO.VN</title>
  <meta name="description" content="Volcano Team"/>
  <meta name="author" content="VOLCANO.VN"/>
  <link rel="stylesheet" href="css/intro-page.css"/>
  <script type="text/javascript" src="javascript/jquery-2.0.3.min.js"></script>
  <script type="text/javascript" src="javascript/intro-page.js"></script>
   <script type="text/javascript" src="javascript/balloontip.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">

  <link rel="stylesheet" href="/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
  <script type="text/javascript" src="/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".fancybox").fancybox();
    });
  </script>
</head><!--End @head-->
<body>
  <div id="header-wrapper">
    <div class="wrapper">
      <ul class="navigation">
        <li class="section anchor-what-we-do"><a href="#">WHAT<br />WE DO</a></li><!--WHAT WE DO-->
        <li class="section who-we-are"><a href="#">WHO<br />WE ARE</a></li><!--WHO WE ARE-->
        <li id="icon"><img src="images/logo 80x80.png"/></li>
        <li class="section our-work"><a href="#">OUR<br />WORK</a></li><!--OUR WORK-->
        <li class="section contact-us"><a href="#">CONTACT<br />US</a></li><!--CONTACT US-->
      </ul>
    </div>
  </div>

  <div id="content-wrapper">
      <div id="what-we-do">
        <div class="bg-orange"></div>
         <div class="wrapper">
          <p>VOLCANO VIETNAM</p>
          <div id="anchor-what-we-do"></div>
          <img src="images/volcano-whatwedo.png" />
          <div class="anchor anchor1" data-anchor="1" data-text="<?= $web_development ?>">WEB<br>DEVELOPMENT</div>
          <div class="anchor anchor2" data-anchor="2" data-text="<?= $app_development ?>">APP<br>DEVELOPMENT</div>
          <div class="anchor anchor3" data-anchor="3" data-text="<?= $design_and_more?>">DESIGN<br>AND MORE</div>
          <span class="text text1"><?= $text[0] ?></span>
          <span class="text text2"><?= $text[1] ?></span>
          <span class="text text3"><?= $text[2] ?></span>

          <div class="magma magma1"><img src="images/volcano-magma1.png"></div>
          <div class="magma magma2"><img src="images/volcano-magma2.png"></div>
          <div class="magma magma3"><img src="images/volcano-magma3.png"></div>
        </div>
      </div><!--End @what-we-do-->

      <div id="transit1"></div><!--End @transit1-->
      <div id="transit2"></div><!--End @transit2-->

      <div id="who-we-are">
        <div class="wrapper">
          <img id="bg_whoweare" src="images/BG whoweare.png"/>
          <? while($result = mysql_fetch_array($members)) { ?>
              <a id="propic<?= $result['slot'] ?>" href="javascript:void(0);" rel="balloon<?= $result['slot'] ?>">
              <img  src="Admin/UploadedImage/<?= $result['image_url'] ?>" />
              </a>
          <? } ?>
          <p>
              <?= $description ?>
          </p>
        </div>
      </div><!--End @who-we-are-->

      <div id="transit3"></div><!--End @transit3-->
      <div id="transit4"></div><!--End @transit4-->

      <div id="our-work">
        <!-- <img id="bg_ourwork" src="images/BG ourwork.png" /> -->
        <div class="inner">
          <div class="wrapper">
            <?
              for ($i = 0; $i < 12; $i++) {
                if ($projects[$i]) {
                  $image_url  = "Admin/UploadedImage/".$projects[$i]['image_url'];
                  // $projects[$i]['url']
                  echo "<a class='fancybox' target='_blank' href='".$image_url."'><img class='project' src=".$image_url." /></a>";
                }
                else {
                  $image_url = "images/project.jpg";
                  echo "<img class='project' src=".$image_url." />";
                }
              }
            ?>
          </div>
        </div>
      </div><!--End @our-work-->

      <div id="transit5"></div><!--End @transit5-->
      <div id="transit6"></div><!--End @transit6-->

      <div id="contact-us">
        <div class="inner">
          <div class="contact-menu">
            <a id="contact_email" href="mailto:<?= $contact_email ?>?Subject=Hello%20again" target="_top">
                <img src="images/img-contact-email-icon.png"/>
            </a>
            <a id="contact_phone" href="tel:<?= $contact_phone ?>">
                <img src="images/img-contact-phone-icon.png"/>
            </a>
          </div>
          <div class="wrapper">
            <form name="contact-form" action="mail.php" method="post" enctype="multipart/form-data">
              <textarea id="mess_content" name="mess-contact" required="required" maxlength="1000" placeholder="Send us a message here."></textarea>
              <div class="col-left">
                <input type="text" class="small" required="required"  name="name" id="name" maxlength="50" placeholder="Your name"><br>
                <input type="text" class="small" required="required"  name="email" id="email" maxlength="50" placeholder="Your email address"><br>
                <button id="button_send" type="submit"/>SEND</button>
              </div>
            </form>
          </div>
        </div>
      </div><!--End @contactus-->

      <div id="transit7" ></div><!--End @transit7-->
      <div id="transit8" ></div><!--End @transit8-->

      <div id="signature">
        <div class="wrapper">
          <p>&COPY; 2013 Volcano Vietnam Design by Jokohama </p>
        </div>
      </div>
  </div><!--End @content-wrapper-->

  <? while($result = mysql_fetch_array($members1)) { ?>
    <div id="balloon<?= $result['slot'] ?>" class="balloonstyle">
      <span class="name"><?= $result['name'] ?></span><br>
      <span class="position"><?= $result['position'] ?></span>
    </div>
  <? } ?>

</body>
</html>