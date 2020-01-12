<!-- Footer Section Start -->
    <footer>
      <!-- Footer Area Start -->
      <section class="footer-Content">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-12">
              <div class="widget">
                <div class="footer-logo"><img src="/img/logo-footer.png" alt=""></div>
                <div class="textwidget">
                  <p>Sed consequat sapien faus quam bibendum convallis quis in nulla. Pellentesque volutpat odio eget diam cursus semper.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-4 col-xs-12">
              <div class="widget">
                <h3 class="block-title">Quick Links</h3>
                <ul class="menu">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Support</a></li>
                  <li><a href="#">License</a></li>
                  <li><a href="#">Contact</a></li>
                </ul>
                <ul class="menu">
                  <li><a href="#">Terms & Conditions</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Refferal Terms</a></li>
                  <li><a href="#">Product License</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-12">
              <div class="widget">
                <h3 class="block-title">Subscribe Now</h3>
                <p>Sed consequat sapien faus quam bibendum convallis.</p> 
                <form method="post" id="subscribe-form" name="subscribe-form" class="validate">
                  <div class="form-group is-empty">
                    <input type="email" value="" name="Email" class="form-control" id="EMAIL" placeholder="Enter Email..." required="">
                    <button type="submit" name="subscribe" id="subscribes" class="btn btn-common sub-btn"><i class="lni-envelope"></i></button>
                    <div class="clearfix"></div>
                  </div>
                </form>
                <ul class="mt-3 footer-social">
                  <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
                  <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
                  <li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
                  <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
                </ul>        
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Footer area End -->
      
      <!-- Copyright Start  
      <div id="copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="site-info text-center">
                <p>Designed and Developed by MS Management Consulting</p>
              </div>     
            </div>
          </div>
        </div>
      </div>
      Copyright End -->
    </footer>
    <!-- Footer Section End -->  

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="lni-arrow-up"></i>
    </a> 

    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="/js/jquery-min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
     <!-- 

    if you want mdbootstrap,use this
    <script type="text/javascript" src="/mdjs/mdb.min.js"></script> 
    <script type="text/javascript" src="/mdjs/addons/datatables.min.js"></script> 

     -->
    <script src="/js/popper.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>     
    <script src="/js/jquery.slicknav.js"></script>     
    <script src="/js/jquery.counterup.min.js"></script>      
    <script src="/js/waypoints.min.js"></script>     
    <script src="/js/form-validator.min.js"></script>
    <script src="/js/contact-form-script.js"></script>   
    <script src="/js/main.js"></script>
    <script type="text/javascript" src="/vendor/jsvalidation/js/jsvalidation.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js">
    </script>

<script>
$(document).ready(function(){
var date = new Date();
var time =  date.getTime();
var set_time = date.setHours(14,28);

    console.log(date);
function loadbackground(){
  // alert('hi');
 // console.log(set_time);
    $.ajax({
            type: 'get',
            url: '/api/v1/getBg',
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data, textStatus, jqXHR) {

                // console.log(data.data);
            $(".page-header").css('background', 'url(' + data.data + ')');

            },
            error: function (data, textStatus, jqXHR) {
                console.log('Error:', data);
            }
        });
            // $(".page-header").css('background', 'url(' + imageUrl + ')');
}
loadbackground();
  setInterval(function(){
    loadbackground(); // this will run after every 5 seconds
},5000);
});

</script>
    



