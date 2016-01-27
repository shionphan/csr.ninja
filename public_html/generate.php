<?php

require_once "Mail.php";

$dn = array(
  "countryName" => $_POST["inputCountry"],
  "stateOrProvinceName" => $_POST["inputState"],
  "localityName" => $_POST["inputLocality"],
  "organizationName" => $_POST["inputOrganization"],
  "organizationalUnitName" => $_POST["inputOrganizationalUnit"],
  "commonName" => $_POST["inputCommonName"]
);

if ($_POST["inputMyPrivateKey"]) {

  $privkey = openssl_pkey_get_private($_POST["inputMyPrivateKey"]);

  if (!$privkey) {
    print "You have entered an invalid key. Verify and try again.";
    exit();
  }

} else {
  $privkey = openssl_pkey_new();
}

$csr = openssl_csr_new($dn, $privkey);

openssl_csr_export($csr, $csrout);
openssl_pkey_export($privkey, $pkeyout);

$msg  = $csrout;
$msg .= "\n";
$msg .= $pkeyout;

print $msg;

if ($_POST["inputYourEmail"]) {

  $contents = file_get_contents("/etc/smtp.conf");
  $contents = utf8_encode($contents);
  $results = json_decode($contents);

  $from = "CSR Ninja <noreply@csr.ninja>";
  $to = $_POST["inputYourEmail"];
  $subject = "Your CSR and KEY - ".$_POST["inputCommonName"];
  $body = $msg;

  $headers = array (
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
  );

 	$smtp = Mail::factory('smtp',array (
    'host' => $results->host,
    'auth' => true,
    'username' => $results->username,
    'password' => $results->password)
  );

  $mail = $smtp->send($to, $headers, $body);
 
  if (PEAR::isError($mail)) {
    print $mail->getMessage();
  }

}

?>
