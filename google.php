<?php
    require_once 'config.php';
    require_once 'Zend/Loader.php';

    $title = $_GET['title'];
    $id = $_GET['id'];
    $users = $_GET['share'];
    Zend_Loader::loadClass('Zend_Gdata');
    Zend_Loader::loadClass('Zend_Gdata_AuthSub');
    Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
    Zend_Loader::loadClass('Zend_Gdata_Docs');

        $service = Zend_Gdata_Docs::AUTH_SERVICE_NAME;
        $client = Zend_Gdata_ClientLogin::getHttpClient($guser, $gpass, $service);
        $AuthToken = $client->getClientLoginToken();
        //echo $AuthToken;


    if (!$_GET['share']) 
        {
    $url = 'https://docs.google.com/feeds/documents/private/full/';
    $ch = curl_init($url);
    $xml = "<?xml version='1.0' encoding='UTF-8'?>
    <atom:entry xmlns:atom='http://www.w3.org/2005/Atom' xmlns:docs='http://schemas.google.com/docs/2007'>
      <atom:category scheme='http://schemas.google.com/g/2005#kind'
          term='http://schemas.google.com/docs/2007#document' label='document'/>
      <atom:title>" . $title . "</atom:title>
      <docs:writersCanInvite value='false' />
    </atom:entry>";

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/atom+xml',
                        'Authorization: GoogleLogin auth=' . $AuthToken,
                        'GData-Version: 2.0'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $xml = curl_exec($ch);
   $xml = preg_replace('~(</?|\s)([a-z0-9_]+):~is', '$1$2_', $xml);
   $parse = new SimpleXMLElement($xml);
   $docs = explode(':', $parse->gd_resourceId[0]);
   $doc = $docs[1];
   echo $doc;
   curl_close($ch);
   $doc = $docs[1];
      
      
      $con= mysqli_connect($database,$user,$password, 'bhsjacke_jackpack');
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
  $sql = "UPDATE document WHERE id='$id'(google_docs) VALUES ('$doc')";
  mysqli_query($con, $sql);
  //header('Location: /auth.php' );

}

if ($_GET['share'])
{
                $url = 'https://docs.google.com/feeds/acl/private/full/document:' . $id . '/batch';
                $xml = '<feed xmlns="http://www.w3.org/2005/Atom" xmlns:gAcl="http://schemas.google.com/acl/2007" xmlns:batch="http://schemas.google.com/gdata/batch">\
<category scheme="http://schemas.google.com/g/2005#kind" term="http://schemas.google.com/acl/2007#accessRule"/>\
<entry><id>' . $url . '/' . $email + '</id><batch:operation type="query"/></entry>'; $index = 1;
            foreach ($users as $user) {
                $xml .= '<entry><batch:id>' . ($index++) .'</batch:id><batch:operation type="insert"/><gAcl:role value="writer"/><gAcl:scope type="user" value="' . $user . '"/></entry>';
            }
            $xml .= '</feed>';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                'Content-Type: application/atom+xml',
                                'Authorization: GoogleLogin auth=' . $AuthToken,
                                'GData-Version: 2.0'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch); 
}

?>
