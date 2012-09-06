<?php
$key = 'GoogleSearchResult';
$query = '';
try{
    $client = new SoapClient('http://dic.googlecode.com/files/GoogleSearch.wsdl');
    $results = $client->doGoogleSearch($key, $query, 0, 10, FALSE,'', FALSE, '', '', '');
    //echo $client->__getLastRequestHeaders();
    //echo $client->__getLastRequest();
    foreach ($results->resultElements as $result){
        echo '<a href="' . htmlentities($result->URL) . '">';
        echo htmlentities($result->title, ENT_COMPAT, 'UTF-8');
        echo '</a><br/>';
    }
}catch (SoapFault $e){
    echo $e->getMessage();
}
echo '<br>';
