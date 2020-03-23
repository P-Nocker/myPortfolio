<footer>
    <div class="container" id="footertxt">
    </div>
    <div class="socials">
      <a href="https://www.linkedin.com/in/peternocker/" target="_blank">
      <i class="fab fa-linkedin fa-w-10 fa-lg"></i>
      </a>
      <a href="https://github.com/P-Nocker?tab=repositories" target="_blank" >
      <i class="fab fa-github fa-w-10 fa-lg"></i>
      </a>
      <a href="https://stackoverflow.com/users/13071253/peter-nocker" target="_blank" >
      <i class="fab fa-stack-overflow fa-w-10 fa-lg"></i>
      </a>
      <a href="http://www.facebook.com/" target="_blank">
      <i class="fab fa-facebook fa-w-10 fa-lg"></i>
      </a>
      <a href="http://www.instagram.com/" target="_blank">
      <i class="fab fa-instagram fa-w-10 fa-lg"></i>
      </a>
      <a href="https://nl.pinterest.com/peternocker/" target="_blank">
      <i class="fab fa-pinterest fa-w-10 fa-lg"></i>
      </a>
      <a href="https://open.spotify.com/user/peternocker" target="_blank" >
      <i class="fab fa-spotify fa-w-10 fa-lg"></i>
      </a>
      <a href="https://api.whatsapp.com/send?phone=31620828644&text=Hello%2C%20World!" target="_blank">
      <i class="fab fa-whatsapp fa-w-10 fa-lg"></i>
      </a>
      <i class="fa fa-copyright fa-w-10 fa-lg" style="font-weight: normal; font-size:1rem !important; width:auto; position:absolute; right:0px; margin-right:10px;"> Peter N&ouml;cker, <?php echo strftime("%Y", time()); ?></i>
    </div>
</footer>
<script>
function myFunction()
{
  var x = document.getElementById("myTopnav");
  var y = document.getElementById("fa-toggle");
  if (x.className === "topnav") {
    x.className += " responsive";
    y.className = "fas fa-times";
    y.title = "close menu";
  } else {
    x.className = "topnav";
    y.className = "fa fa-bars";
    y.title = "open menu";
  }

  console.log("x.className = " + x.className + " and y.className = " + y.className);
}


var txt = $('#copyright').html();
//$('#copyright').html(txt + " (" + $(window).width() + " x " + $(window).height() + ")");

$(window).on('resize', function(e) {
  //$('#copyright').html(txt + " (" + $(window).width() + " x " + $(window).height() + ")");
});

</script>