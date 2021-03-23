<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
    $.ajaxPrefilter(function(options, originalOptions, jqXHR) {
        options.async = true;
    });
    </script>
    <title><?=$_title?></title>
</head>

<body>
    <div id="nav">
        <?=$_nav?>
    </div>
    <div id="content">
        <?=$_content?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script>
    var base_url, loading, x;
    $(document).ready(function() {
        base_url = window.location.origin + '/' + window.location.pathname.split('/')[1] + '/';
        x = window.location;
    });
    $(".change-page").click(function(event) {
        var $this = $(this);
        var href = $this.data("link");
        event.preventDefault();
        if (x != href) {
            $.ajax({
                url: href,
                method: "GET",
                beforeSend: function() {
                    $('#content').html('loading');
                },
                success: function(data) {
                    $(document.body).html(data);
                    history.pushState({}, null, href);
                },
                complete: function() {
                    x = href;
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                window.location.href = base_url + '404';
            })
        }
    });
    $(".change-content").click(function(event) {
        var $this = $(this);
        var href = $this.data("link");
        event.preventDefault();
        if (x != href) {
            $.ajax({
                url: href,
                method: "GET",
                beforeSend: function() {
                    $('#content').html('loading');
                },
                success: function(data) {
                    $('#content').html(data);
                    history.pushState({}, null, href);
                },
                complete: function() {
                    x = href;
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                window.location.href = base_url + '404';
            })
        }
    });
    $(window).on('popstate', function(event) {
        // navigate to the url that's returned
        if (history.state != null && history.state.sitesearch != null) {
            var params = parseParams(window.location.search);
            prepareSearch(params['s'], params['page'], false);
            console.log(params);
        } else {
            //  window.location = window.location.href;
            $(document.body).load(window.location.href);
        }
    });
    </script>
</body>

</html>