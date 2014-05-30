<?php

$dn = array(
    "countryName" => $_POST["inputCountry"],
    "stateOrProvinceName" => $_POST["inputState"],
    "localityName" => $_POST["inputLocality"],
    "organizationName" => $_POST["inputOrganization"],
    "organizationalUnitName" => $_POST["inputOrganizationalUnit"],
    "commonName" => $_POST["inputCommonName"]
);

$privkey = openssl_pkey_new();

$csr = openssl_csr_new($dn, $clientPrivKey);

openssl_csr_export($csr, $csrout);
openssl_pkey_export($privkey, $pkeyout);

print $pkeyout;
print $csrout;

?>
