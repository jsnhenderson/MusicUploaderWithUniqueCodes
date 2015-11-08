
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>PHP, jQuery username availability demo</title>
<link rel="stylesheet" type="text/css" href="my.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">

$(function() {

    $(".search_button").click(function() {
        // hetting the value that user typed
        var searchString    = $("#username_box").val();
        // forming the queryString
        var data            = 'user='+ searchString;
        
        // if searchString is not empty
        if(searchString) {
            // ajax call
            $.ajax({
                type: "POST",
                url: "do_check.php",
                data: data,
                beforeSend: function(html) { // this happen before actual call
                    $("#results").html(''); 
               },
               success: function(html){ // this happen after we get result
                    $("#results").show();
                    $("#results").append(html);
              }
            });    
        }
        return false;
    });
});
</script>
</head>
<body>
<div id="container">
<div>
<p>This is demo for the <a href="http://www.codeforest.net/username-availability-check-using-php-and-jquery">Username availability check using PHP and jQuery</a> on <a href="http://www.codeforest.net">Codeforest - web programming blog</a></p>
</div>
<div style="margin:20px auto; text-align: center;">
<form method="post" action="">
<h2>Usernames <em>codeforest and carlito</em> already exist:</h2>
<input type="text" name="username" id="username_box" class="search_box"/>
<input type="submit" value="Check" class="search_button"/><br/>
</form>
</div>
<div>
<ul id="results" class="update">
</ul>
</div>
</div>
</body>
</html>