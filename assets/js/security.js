function ValidateSession() {
   var sessionId = localstorage.getItem("sessionId");
if (sessionId != null && sessionId != "") {
   var fullEndPoint = endPoints.validateSession + '/' + sessionId;
   $.post(fullEndPoint)
      .done(function (response) {
         var JSONObject = JSON.parse(response);
         if (JSONObject.StatusCode == "00") {
            return;
         }
         else window.location.href = url.login
      })
      .fail(function (error) {
         console.log(error);


      })
}
}
