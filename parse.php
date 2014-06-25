<?php

//we simply call the api
//you need to change this to your domain
 $url="http://domain.com/path/to/api/rest_api.php?action=get_app&id=0&key=my_long_private_key";
 $json = file_get_contents($url);

 //some debugging
 //just to see if the script can get the returned json from the api call
 //echo $json;
 //echo '<br><br>';

 //some error checking
 if ($json == 'The key you provided is not valid')
   {
   	  die("The key you provided is not valid");
   }
 else if ($json == 'You did not provide a key') 
   {
 	  die("You did not provide a key"); 
   }
 else if ($json == 'You did not provide an id') 
   {
 	  die("You did not provide an id"); 
   }
 else if ($json == 'The id you provided is not valid. Currently only id 0 is supported') 
   {
    die("The id you provided is not valid. Currently only id 0 is supported"); 
   }      
 else if ($json == 'Exceeded allowed number of api calls') 
   {
 	  die("Exceeded allowed number of api calls"); 
   }

 //this will decode the json into an associative 2 dimensional array (key => value)
 $data = json_decode($json, TRUE);
 
 //now output the value of any particular key in the array
 //note that this parces the json of my own personal information. obviously you need to change it accordingly with your information.
 echo $data[0]['photo'];
 echo "<br>";
 echo $data[0]['gravatar'];
 echo "<br>";
 echo $data[0]['name'];
 echo '<br>';
 echo $data[0]['birthday'];
 echo '<br>';
 echo $data[0]['age'];
 echo '<br>';
 echo $data[0]['email'];
 echo '<br>';
 //this is an array of array. social networks is an array, not a key
 echo $data[0]['social networks']['Facebook'];
 echo '<br>';
 echo $data[0]['social networks']['LinkedIn'];
 echo '<br>';
 echo $data[0]['social networks']['Google+'];
 echo '<br>';
 echo $data[0]['social networks']['Twitter'];
 echo '<br>';
 echo $data[0]['country'];
 echo '<br>';
 echo $data[0]['city'];
 echo '<br>';
 echo $data[0]['languages'];
 echo '<br>';
 echo $data[0]['keywords'];
 echo '<br>';
 echo $data[0]['programming languages'];
 echo '<br>';
 echo $data[0]['web programming'];
 echo '<br>';
 echo $data[0]['web frameworks'];
 echo '<br>';
 echo $data[0]['databases'];
 echo '<br>';
 echo $data[0]['website'];
 echo '<br>';
 echo $data[0]['blog'];
 echo '<br>';
 echo $data[0]['rss'];
 echo '<br>';
 echo $data[0]['github'];
 echo '<br>';
 echo $data[0]['military status'];
 echo '<br>';
 echo $data[0]['marital status'];
 echo '<br>';
 echo $data[0]['api version'];
 echo '<br>';
 echo '<br>';

//or we simply loop through the array
foreach ($data[0] as $key => $value) 
  {
    if (!is_array($value))
      {
        echo "$key  =>  $value";
        echo '<br>';
      }
    else //if the value is an array, iterate through that array
      {
        echo $key ." => array( \r\n";
        echo '<br>';
        foreach ($value as $key2 => $value2)
       {
           echo "\t". $key2 ." => ". $value2 ."\r\n";
           echo '<br>';
       }

        echo ")<br>"; 
      }    
}

//using this code we can now take the data we want from the api and use it in our website or service
?>

 