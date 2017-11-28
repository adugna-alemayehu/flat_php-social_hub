</div>
<footer>
    <div class="row" style="padding: 15px">

        <div class="col-sm-9 col-sm-offset-1">
            <div class="footer-border"></div>
            <p><i class="fa fa-copyright"></i><?php echo date('Y'); ?> PicassoPack Inc. <a
                        href="adexdealex@gmail.com" target="_blank"><strong>Adugna Alemayehu</strong></a>
                Enjoy!! <i class="fa fa-smile-o"></i></p>
            <h5><i class="fa fa-android"></i> try pack droid</h5>
            <p><a href="https://play.google.com/store?hl=en">goto app store to use pp 200% faster</a></p>
            <p>the source code to this project is available on <a href="www.github.com/adugna/repository//"><i
                            class="fa fa-github"> Github</i></a></p>
        </div>

    </div>
</footer>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        //var the_link=urlpattern.exec(bady);
        //bady= bady.replace(urlpattern,"#"+the_link);
        //alert(linkify(bady));
//bady.replace('"/"'+url_reg+'"/"'g,'link');
        $.each($('#navbar').find('li'), function () {
            $(this).toggleClass('active',
                window.location.pathname.indexOf($(this).find('a').attr('href')) > -1);
        });
        $('#query').keyup(function () {
            var key = $("#query").val();
            if (key.length >=1) {
                $('#json_data').load('search_react.php', {key: key}, function (data) {
                    var jsonList = JSON.parse(data);
                    //alert(jsonList);
                    jsonList.forEach(function (result) {
                        var option = document.createElement('option');
                        option.style.padding = "20px";
                        option.style.fontFamily = "cursive";
                        option.value = result;
                        $('#json_data').append(option);
                    });
                });
            }
        });
        $('#poster').click(function () {
            var idea = $('#status').val();
            $('#show_stat').load('post_on_tl.php', {idea: idea}, function (data) {
                window.location.reload();
            });

        });
        $('#paging').click(function () {
            alert("next page");
        });
       $('#time-stamp').load('time_ago.php',{})
    });
</script>
</body>
</html>