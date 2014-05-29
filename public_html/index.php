<?php

$uptime = shell_exec("cut -d. -f1 /proc/uptime");

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>CSR NINJA</title>
    <meta name="description" content="DNS Redirect, Domain redirects with CNAME, how to redirect"/>
    <meta name="author" content="Udlei Nati / udlei@nati.biz">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400|Inconsolata:400' rel='stylesheet' type='text/css'>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51158860-1', 'redirect.center');
  ga('send', 'pageview');
</script>

    <style>

body{
    background-color: #FAFAFA;
    color: #000;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    margin: 0;
    padding: 0;
}

.bold { 
    font-weight: bold;
}

.container{
    margin: auto;
    width: 800px;
}

#top-bar {
    border-bottom: 1px solid #999999;
}

#top-bar .container {
    text-align: right;
    padding: 4px;
}

#header{
    background-color: #DFF0E5;
    height: auto;
    padding: 10px 0;
    width: 100%;
}

#header h1, 
#footer h1{
    color: #DFF0E5;
    font-family: 'Inconsolata', Georgia, sans-serif;
    font-size: 48px;
    font-weight: bold;
    margin: 0;
    text-align: justify;
    text-transform: uppercase;
}

#header h1 a, 
#footer h1 a{
    color: #5D9170;
}

#footer .container {
    text-align: center;
}

#header h1 a:hover, 
#footer h1 a:hover{
    color: #FF350D;
}

#content.container { 
    margin-top: 20px;
}

#footer{
    background-color: #DFF0E5;
    margin-top: 20px;
    padding: 10px 0;
    width: 100%;
    bottom: 0;
    position: fixed;
}

#footer h1{
    margin-bottom: 10px;
}

.csr-ninja {
    color: #5D9170;
}

.redirect-center{
    color: #fc5a44;
}

label .help-block {
    font-size: 12px;
    font-weight: normal;
    margin-top: 0;
}

.control-label {
    padding-top: 0;
}

.form-group {
    margin-bottom: 5px;
}

    </style>
</head>
<body>
    <div id="top-bar">
        <div class="container">
    See too
    :
    <a href="http://redirect.center" class="redirect-center" title="redirect.center">redirect.center</a> 
    :
    <a href="http://csr.ninja" class="csr-ninja" title="csr.ninja">csr.ninja</a>
        </div>
    </div>
    <div id="header">
    <div class="container">
    </div>
        <div class="container">

    <div class="col-sm-4 control-label">
        <h1><a href="/">CSR.NINJA</a></h1>
    </div>
    <div class="col-sm-8">

            <span class="en help-block">
                Generate and send the CSR to your email address or view here.<br />
                Just fill the form and be happy.
            </span>

    </div>

        </div>
    </div>

    <div id="content" class="container">

<form class="form-horizontal" role="form">
  
  <div class="form-group">
    <label for="inputCountry" class="col-sm-4 control-label">Country
    <span class="help-block">Two letter abbreviation</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputCountry" placeholder="US">
    </div>
  </div>
  <div class="form-group">
    <label for="inputState" class="col-sm-4 control-label">State
    <span class="help-block">Full state name</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputState" placeholder="California">
    </div>
  </div>
  <div class="form-group">
    <label for="inputLocality" class="col-sm-4 control-label">Locality
    <span class="help-block">Full city name</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputLocality" placeholder="Brisbane">
    </div>
  </div>
  <div class="form-group">
    <label for="inputOrganization" class="col-sm-4 control-label">Organization
    <span class="help-block">Full legal company or personal name</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputOrganization" placeholder="Wal-Mart Stores, Inc.">
    </div>
  </div>
  <div class="form-group">
    <label for="inputOrganizationalUnit" class="col-sm-4 control-label">Organizational Unit
    <span class="help-block">Branch of organization</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputOrganizationalUnit" placeholder="Supermarket">
    </div>
  </div>
  <div class="form-group">
    <label for="inputCommonName" class="col-sm-4 control-label">Common Name
    <span class="help-block">The FQDN for your domain</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputCommonName" placeholder="www.walmart.com">
    </div>
  </div>
  <div class="form-group">
    <label for="inputYourEmail" class="col-sm-4 control-label">Your email
<span class="help-block">To receive a copy of CSR</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputYourEmail" placeholder="Optional">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-default">Generate CSR</button>
    </div>
  </div>
</form>

    </div>
    <div id="footer">
        <div class="container">
                <span class="csr-ninja">CSR.NINJA</span> is 
                <a href="https://github.com/unattis/csr.ninja">open source</a>, 
                general feedback and ideas are greatly appreciated via either 
                the <a href="https://github.com/unattis/csr.ninja/issues">GitHub issues</a>.
        </div>
    </div>
</body>
</html>
