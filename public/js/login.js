
    $(document).ready(function () {
        // Handle form submission
        $("#loginForm").submit(function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Serialize the form data
            var formData = $(this).serialize();

            // Perform an AJAX request
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: formData,
                success: function (response) {
                    // Handle the success response
                    // console.log(response);
                    data = JSON.parse(response);
                    console.log(data);
                    var url = "http://localhost/MokhlisBelhaj_Wiki/"+data.url
                       if( confirm('hello')){
                            window.location.href = url ;
                   }
                // You can redirect or perform other actions based on the response
            },
            error: function (error) {
                    // Handle the error response
                    // console.log(error);
                    data = error.responseJSON;

                    $("#email_err").text(data.email_err);
                if (data.email_err) {
                    $("#email").addClass('border-red-500');
                } else {
                    $("#email").removeClass('border-red-500');
                }

                $("#password_err").text(data.password_err);
                if (data.password_err !== "") {
                    $("#password").addClass('border-red-500');
                } else {
                    $("#password").removeClass('border-red-500');
                }
                }
            });
        });
    });
