$(document).ready(function () {
   var tempHeader = $('head').html();
   $('head').load("../user/Template/header.html");
   $('head').append(tempHeader);

   $('#footer').load("../user/Template/footer.html");
});