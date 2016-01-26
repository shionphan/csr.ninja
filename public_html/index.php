<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>CSR.NINJA</title>
    <meta name="description" content="Easy CSR Generator. Let a copy to your email."/>
    <meta name="author" content="Udlei Nati / udlei@nati.biz">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300,400|Inconsolata:400' rel='stylesheet' type='text/css'>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="/javascript.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>

<script type="text/javascript">

$( document ).ready(function() {

  $("#formCertificate").validate({
        rules: {
            "inputCountry": {
                minlength: 2,
                maxlength: 2,
                required: true
            },
            "inputState": {
                required: true
            },
            "inputLocality": {
                required: true
            },
            "inputOrganization": {
                required: true
            },
            "inputOrganizationalUnit": {
                required: true
            },
            "inputCommonName": {
                required: true
            },
            "inputYourEmail": {
                email: true
            },

	},
         highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
	submitHandler: function(form) {

		$('#alertEmail').hide();

		$('#certificateResult').show();
		$('#textareaCSR').val('Please wait...');
		$(window).scrollTop(($("#certificateResult").offset().top - 10));

        	$.post( "generate.php", { 
                	inputCountry: $('#inputCountry').val(), 
                	inputState: $('#inputState').val(), 
                	inputLocality: $('#inputLocality').val(), 
                	inputOrganization: $('#inputOrganization').val(), 
                	inputOrganizationalUnit: $('#inputOrganizationalUnit').val(), 
                	inputCommonName: $('#inputCommonName').val(),
			inputYourEmail: $('#inputYourEmail').val()
        	}).done(function( data ) {

			if ($('#inputYourEmail').val()) {
				$('#alertEmail').html('A copy was sent to your email - ' + $('#inputYourEmail').val());
				$('#alertEmail').show();
			}

                	$('#textareaCSR').val(data); 
        	}); 


    	}
	
    });


});

</script>
    
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51158860-2', 'csr.ninja');
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

span.error { 
	color: #A94442;
	font-size: 12px;
	margin-bottom: 5px;
	margin-left: 5px;
	margin-top: 2px;
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
}

#footer h1{
    margin-bottom: 10px;
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

#textareaCSR {
	font-family: Courier, monospace;
	font-size: 13px;
	width: 100%;
}

#certificateResult {
	margin-top: 40px;
	position: relative;
	overflow: hidden;
}

    </style>
</head>
<body>
    <div id="top-bar">
        <div class="container">
            <div class="see-too">
    See too
    : <a href="http://redirect.center" title="redirect.center">redirect.center</a> 
    : <a href="http://csr.ninja" title="csr.ninja">csr.ninja</a>
            </div>
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

<form class="form-horizontal" role="form" id="formCertificate">
  
  <div class="form-group">
    <label for="inputCountry" class="col-sm-4 control-label">Country
    <span class="help-block">Two letter abbreviation</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputCountry" name="inputCountry" placeholder="US" onKeyUp="this.value=removeDiacritics(this.value).toUpperCase()">
    </div>
  </div>
  <div class="form-group">
    <label for="inputState" class="col-sm-4 control-label">State
    <span class="help-block">Full state name</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputState" name="inputState" placeholder="California" onKeyUp="this.value=removeDiacritics(this.value)">
    </div>
  </div>
  <div class="form-group">
    <label for="inputLocality" class="col-sm-4 control-label">Locality
    <span class="help-block">Full city name</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputLocality" name="inputLocality" placeholder="Brisbane" onKeyUp="this.value=removeDiacritics(this.value)">
    </div>
  </div>
  <div class="form-group">
    <label for="inputOrganization" class="col-sm-4 control-label">Organization
    <span class="help-block">Full legal company or personal name</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputOrganization" name="inputOrganization" placeholder="Wal-Mart Stores, Inc." onKeyUp="this.value=removeDiacritics(this.value)">
    </div>
  </div>
  <div class="form-group">
    <label for="inputOrganizationalUnit" class="col-sm-4 control-label">Organizational Unit
    <span class="help-block">Branch of organization</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputOrganizationalUnit" name="inputOrganizationalUnit" placeholder="Supermarket" onKeyUp="this.value=removeDiacritics(this.value)">
    </div>
  </div>
  <div class="form-group">
    <label for="inputCommonName" class="col-sm-4 control-label">Common Name
    <span class="help-block">The FQDN for your domain</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputCommonName" name="inputCommonName" placeholder="www.walmart.com" onKeyUp="this.value=removeDiacritics(this.value).toLowerCase()">
    </div>
  </div>
  <div class="form-group">
    <label for="inputYourEmail" class="col-sm-4 control-label">Your email
<span class="help-block">To receive a copy of CSR</span>
    </label>
    <div class="col-sm-8">
      <input type="text" class="form-control input-lg" id="inputYourEmail" name="inputYourEmail" placeholder="Optional">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-default generate" id="generateCSR">Generate CSR</button>
    </div>
  </div>
</form>

<div id="certificateResult" style="display: none;">
	<div class="col-sm-2"></div>
	<div class="alert alert-success col-sm-9">

<div class="alert alert-info" id="alertEmail" style="display: none;">
</div>

<textarea class="form-control" id="textareaCSR" rows="47"></textarea>  

	</div>

</div>

    </div>
    <div id="footer">
        <div class="container">
                <span>CSR.NINJA</span> is 
                <a href="https://github.com/unattis/csr.ninja">open source</a>, 
                general feedback and ideas are greatly appreciated via either 
                the <a href="https://github.com/unattis/csr.ninja/issues">GitHub issues</a>.
        </div>
    </div>

<a href="https://github.com/udlei/csr.ninja"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/652c5b9acfaddf3a9c326fa6bde407b87f7be0f4/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6f72616e67655f6666373630302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_orange_ff7600.png"></a>

</body>
</html>
