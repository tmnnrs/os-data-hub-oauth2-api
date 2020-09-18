<?php

  // curl -u "projectAPIKey:projectAPISecret" -d "grant_type=client_credentials" "https://api.os.uk/oauth2/token/v1"

  $url = 'https://api.os.uk/oauth2/token/v1';
  $projectAPIKey = 'INSERT_API_KEY_HERE';
  $projectAPISecret = 'INSERT_API_SECRET_HERE';
  $body = 'grant_type=client_credentials';

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_USERPWD, "$projectAPIKey:$projectAPISecret");
  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch);
  curl_close($ch);

  header('access-control-allow-origin: *');
  header('access-control-allow-methods: GET, PUT, POST, DELETE, OPTIONS');
  header('access-control-allow-headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
  header('content-type: application/json; charset=utf-8');

  echo $result;

?>
