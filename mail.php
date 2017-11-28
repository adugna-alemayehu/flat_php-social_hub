<?php
session_start();
if (isset($_SESSION['mail']) and !empty($_SESSION['mail'])) {
    echo $_SESSION['mail'];
} else {
    echo "<h2 class='text-danger'>empty inbox</h2>";
}
?>
<script>
    (https ? :\/\/(?:www\.|(?!www))[a-zA-
Z0- 9][a-zA-Z0- 9 -]+[a-zA-Z0- 9 ]\.[^\s]{ 2,}|www\.[a-zA-Z0- 9 ][a-zA-Z0- 9-]+[a-zA-Z0- 9]\.[^\s]{ 2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0- 9 ]\.[^\s]{ 2,}|www\.[a-zA-Z0- 9 ]\.[^\s]{ 2 ,}


    /*var url_reg=https?:\/\/(?:www\.|(?!www))[a-zA-
   Z0- 9][a-zA-Z0- 9 -]+[a-zA-Z0- 9 ]\.[^\s]{ 2,}|www\.[a-zA-Z0- 9 ][a-zA-Z0- 9-]+[a-zA-Z0- 9]\.[^\s]{ 2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0- 9 ]\.[^\s]{ 2,}|www\.[a-zA-Z0- 9 ]\.[^\s]{ 2 ,}";*/
    //var url_reg=;
    bady.replace(/(((http|ftp|https):\/{2})+(([0-9a-z_-]+\.)+(aero|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|ac|a/i, "link");
    alert(bady);

    spoon
    library

    / (((http | ftp | https)
    :\/{2})+(([0-9a-z_-]+\.)+(aero|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|ac|ad|ae|af|ag|ai|al|am|an|ao|aq|ar|as|at|au|aw|ax|az|ba|bb|bd|be|bf|bg|bh|bi|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|cr|cu|cv|cx|cy|cz|cz|de|dj|dk|dm|do|dz|ec|ee|eg|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gg|gh|gi|gl|gm|gn|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|im|in|io|iq|ir|is|it|je|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mk|ml|mn|mn|mo|mp|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nc|ne|nf|ng|ni|nl|no|np|nr|nu|nz|nom|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|ps|pt|pw|py|qa|re|ra|rs|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tl|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw|arpa)(:[0-9]+)?((\/([~0-9a-zA-Z\#\+\%@\.\/_-]+))?(\?[0-9a-zA-Z\+\%@\/&\[\];=_-]+)?)?))\b/imu
    S

    var regxp = /^(https?:\/\/)?[0-9a-z]+\.[-_0-9a-z]+\.[0-9a-z]+$/i;


    function linkify(inputText) {
        var replacedText, replacePattern1, replacePattern2, replacePattern3;

        //URLs starting with http://, https://, or ftp://
        replacePattern1 = /(\b(https?|ftp):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/gim;
        replacedText = inputText.replace(replacePattern1, '<a href="$1" target="_blank">$1</a>');

        //URLs starting with "www." (without // before it, or it'd re-link the ones done above).
        replacePattern2 = /(^|[^\/])(www\.[\S]+(\b|$))/gim;
        replacedText = replacedText.replace(replacePattern2, '$1<a href="http://$2" target="_blank">$2</a>');

        //Change email addresses to mailto:: links.
        replacePattern3 = /(([a-zA-Z0-9\-\_\.])+@[a-zA-Z\_]+?(\.[a-zA-Z]{2,6})+)/gim;
        replacedText = replacedText.replace(replacePattern3, '<a href="mailto:$1">$1</a>');

        return replacedText;
    }
</script>