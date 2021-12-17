<?php
// firebase\JWT käyttöön.
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require_once '../../inc/functions.php';
require_once '../../inc/headers.php';

//Haetaan otsikot pyynnöstä
$requestHeaders =  apache_request_headers();

//Onko auth header olemassa?
if( isset( $requestHeaders['authorization'] ) ){

    //Halkaistaan osiin Bearer ja token
    $auth_value = explode(' ', $requestHeaders['authorization']);

    //Tarkistetaan onko Bearer sanaa
    if( $auth_value[0] === 'Bearer' ){

        //Otetaan itse token talteen
        $token = $auth_value[1];

        try{
            //Tarkistetaan ja dekoodataan token. Jo ei validi, siirtyy catchiin.
            $decoded = JWT::decode($token, new Key(base64_encode('mysecret'), 'HS256')  );

            //Onnistunut dekoodaus sisältää sub-kentän, jossa käyttäjänimi.
            $username = $decoded->sub;

            //Lähetetään clientille ykstyisen resurssi, koska oikeus tarkistettu.
            echo  json_encode( array("message"=>"Moi ".$username ."!") ); 
            //Catch mahdollisten virhetilanteiden varalta.
        }catch(Exception ){
            echo  json_encode( array("message"=>"Ei käyttöoikeutta!") );
        }

    }

}
