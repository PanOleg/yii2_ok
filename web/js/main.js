$(document).ready(function () {

    $('#GetImageFromGiphy').click(function ()
    {
        var captcha = $('input[name=captcha]').val();
        $.ajax({
            url: getImageFromGiphy,
            type: "POST",
            data: {captcha: captcha},
            success: function (result)
            {

                result = JSON.parse(result);
                if (result.status == true)
                {
                    q = "dog"; // search query

                    request = new XMLHttpRequest;
                    request.open('GET', 'http://api.giphy.com/v1/gifs/random?api_key=dc6zaTOxFJmzC&tag=' + q, true);

                    request.onload = function () {
                        if (request.status >= 200 && request.status < 400) {
                            data = JSON.parse(request.responseText).data.image_url;
                            console.log(data);
                            $('#randImg').html('<center><img src = "' + data + '"  title="GIF via Giphy"></center>').show();
                        } else {
                            console.log('Reached giphy, but API returned an error');
                        }
                    };

                    request.onerror = function () {
                        console.log('Connection error');
                    };

                    request.send();
                    $('#capcha').hide();
                    $('#GetImageFromGiphy').hide();
                }
                else
                {
                    alert('Incorrect value. Try again!');
                    $('#w0-image').click();
                    $('#w0').val('');
                }

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert("Something went wrong. Please try again later! " + textStatus + " " + errorThrown);
            }
        });
    });

    $('#close_modal').click(function ()
    {
        $('#randImg').hide();
        $('#w0-image').click();
        $('#w0').val('');
        $('#capcha').show();
        $('#GetImageFromGiphy').show();
    });

    $('.modal_href').click(function ()
    {
        $('#w0-image').click();
    });

});