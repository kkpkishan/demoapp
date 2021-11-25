<?php
require 'vendor/autoload.php';

    use Aws\SecretsManager\SecretsManagerClient;
    use Aws\Exception\AwsException;


    $client = new SecretsManagerClient( [
        'version' => 'latest',
        'region' => 'eu-central-1'
    ] );

    $secretName = 'Secretdemo1';

    try {
        $result = $client->getSecretValue( [
            'SecretId' => $secretName,
        ] );
    } catch ( AwsException $e ) {
        $error = $e->getAwsErrorCode();
        if ( $error == 'DecryptionFailureException' ) { // Can't decrypt the protected secret text using the provided AWS KMS key.
            throw $e;
        }
        if ( $error == 'InternalServiceErrorException' ) { // An error occurred on the server side.
            throw $e;
        }
        if ( $error == 'InvalidParameterException' ) { // Invalid parameter value.
            throw $e;
        }
        if ( $error == 'InvalidRequestException' ) { // Parameter value is not valid for the current state of the resource.
            throw $e;
        }
        if ( $error == 'ResourceNotFoundException' ) { // Requested resource not found
            throw $e;
        }
    }
    // Decrypts secret using the associated KMS CMK, depends on whether the secret is a string or binary.
    if ( isset( $result[ 'SecretString' ] ) ) {
        $secret = $result[ 'SecretString' ];
    } else {
        $secret = base64_decode( $result[ 'SecretBinary' ] );
    }

    // Decode the secret json
    $secrets = json_decode( $secret, true );

//echo( '<p>hostname/ipaddress: ' . $secrets[ 'host' ] . '</p><p>username: ' . $secrets[ 'username' ] . '</p><p>password: ' . $secrets[ 'password' ] . '</p><p>dbname: ' . $secrets[ 'dbname' ] . '</p>' );



$db = @mysqli_connect($secrets[ 'host' ],$secrets[ 'username' ],$secrets[ 'password' ],$secrets[ 'dbname' ]);
if (mysqli_connect_errno())
    {
		echo ' 
			<!DOCTYPE html>
			<html>
			<head>
			<style>
			h1 {text-align: center;}
			h2 {text-align: center;}
			</style>
			</head>
			<center>
			<img src="assets/images/icon/logoem.png" width="280" height="125" title="Logo of a company" alt="Logo of a company" />
			</center>
			<br>
            <br>
			<h2>Please, Check Your Database Connection Details</h2>
			</body>
			</html>
			';
    }
	error_reporting(0);

?>