$(document).ready(function() {
   $(".cart-btn").on('click', function(e) {
      e.preventDefault();
      $.ajax({
         url: "cart1.php",
         type: "GET",
         dataType: "json",
         success: function(data) {
            $(".cart .nav-link").html("<span class='cart-content'>" + data + "</span>");
         }
      });
   });
});