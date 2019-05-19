$(document).ready(function () {
   var tempHeader = $('head').html();
   $('head').load("../account/Template/header.html");
   $('head').append(tempHeader);

   $('#footer').load("../account/Template/footer.html");
   $('#ed_header_wrapper').load("../account/Template/navigation.html");
});