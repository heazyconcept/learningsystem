var utilities = {
     colors : {
        "danger-color": "#e74c3c",
        "success-color": "#81b53e",
        "warning-color": "#f0ad4e",
        "inverse-color": "#2c3e50",
        "info-color": "#2d7cb5",
        "default-color": "#6e7882",
        "default-light-color": "#cfd9db",
        "purple-color": "#9D8AC7",
        "mustard-color": "#d4d171",
        "lightred-color": "#e15258",
        "body-bg": "#f6f6f6"
      },
      config:  {
        theme: "html",
        skins: {
          "default": {
            "primary-color": "#42a5f5"
          }
        }
      },
      

}

function AjaxInit(URL, Data, isRedirect = false, isSelfRedirect = false, showNotification = false ) {
    $.ajax({
        url: URL,
        data: Data,
        type: 'POST',
        success: function (resp) {
           console.log(resp);
           try {
            var Response = JSON.parse(resp);
            if (Response.StatusCode == "00") {
                if (isRedirect) {
                    location.href = Response.RedirectUrl;
                } else {
                    alert("success: " + Response.StatusMessage);
                }
                if (isSelfRedirect) {
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                }
            } else if (Response.StatusCode == "99") {
                alert("error: " + Response.StatusMessage);
            }
            else {
                console.log(resp);
                alert("fatal: " + "Internal server error");
            }
          }
          catch(err) {
              console.log(err);
              
              alert("fatal: " + "Internal server error");
          }
            


        },
        error: function (error) {
            console.log(error);
            alert("fatal: " + "Internal server error");


        },
        cache: false,
        contentType: false,
        processData: false
    }); // ajax asynchronus request 
    //the following line wouldn't work, since the function returns immediately
    //return data; // return data from the ajax request
}
function SimpleAjaxInit(URL, Data, isRedirect = false, isSelfRedirect = false ) {
    $.post(URL, Data)
    .done(function (resp) {
        console.log(resp);
        try {
            var Response = JSON.parse(resp);
            if (Response.StatusCode == "00") {
                if (isRedirect) {
                    if (showNotification) {
                        alert("success: " + Response.StatusMessage);
                        setTimeout(() => {
                            location.href = Response.RedirectUrl;
                        }, 2000);
                    } else {
                        location.href = Response.RedirectUrl;
                    }
                    
                } else {
                    alert("success: " + Response.StatusMessage);
                }
                if (isSelfRedirect) {
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                }
            } else if (Response.StatusCode == "99") {
                alert("error: " + Response.StatusMessage);
            }
            else {
                console.log(resp);
                alert("fatal: " + "Internal server error");
            }
          }
          catch(err) {
              console.log(err);
              
              alert("fatal: " + "Internal server error");
          }
    })
    .fail(function (error) {
        console.log(error);
        alert("fatal: " + "Internal server error");
    })
    
}

