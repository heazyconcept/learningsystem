var utilities = {

}

function AjaxInit(URL, Data, isRedirect = false, isSelfRedirect = false, showNotification = false) {
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
            catch (err) {
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
function SimpleAjaxInit(URL, Data, isRedirect = false, isSelfRedirect = false) {
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
            catch (err) {
                console.log(err);

                alert("fatal: " + "Internal server error");
            }
        })
        .fail(function (error) {
            console.log(error);
            alert("fatal: " + "Internal server error");
        })

}

