<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<spring:url value="/"/>">Home</a></li>
                        <li><a href="<spring:url value="/productList"/>">Product</a></li>
                        <li><a href="<spring:url value="/contact"/> ">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</div>
<hr>
<br>
<div class="container">
    <p>Envelope icon: <span class="glyphicon glyphicon-envelope"></span></p>
    <p>Envelope icon as a link:
        <a href="#"><span class="glyphicon glyphicon-envelope"></span></a>
    </p>
    <p>Search icon: <span class="glyphicon glyphicon-search"></span></p>
    <p>Search icon on a button:
        <button type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-search"></span> Search
        </button>
    </p>
    <p>Search icon on a styled button:
        <button type="button" class="btn btn-info">
            <span class="glyphicon glyphicon-search"></span> Search
        </button>
    </p>
    <p>Print icon: <span class="glyphicon glyphicon-print"></span></p>
    <p>Print icon on a styled link button:
        <a href="#" class="btn btn-success btn-lg">
            <span class="glyphicon glyphicon-print"></span> Print
        </a>
    </p>
</div>
<div class="container">
    <div class="form-group checkbox checkbox-primary">
        <label><input type="checkbox" class="form-control"> Remmember me</label>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>