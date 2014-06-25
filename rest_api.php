<?php header('Content-Type: application/json'); ?>
<?php
if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] == "get_app" && isset($_GET["key"]) && $_GET["key"] == "my_long_private_key") 
{
  $id = ($_GET['id']);
  if($id > 0) 
      {
        die("The id you provided is not valid. Currently only id 0 is supported");
      }   

  $key = ($_GET['key']);
  //allow only 40 calls per key, per day.
  if ($key == 'my_long_private_key')
    {
      //I know the next 28 lines is dummy code. if you know a cleverer way please let me know
      //open and read the contents of the 2 files
      $myfile = fopen("my_long_private_key.txt", "a+") or die("Error processing your key (0)");
      $myfileday = fopen("my_long_private_key.txt", "a+") or die("Error processing your key (1)");
      $day = fgets($myfileday);

      //if the day has changed we reset the counter and change the day in the file
      if (date('l') != $day)
        {
           $zero = 0;
           @ftruncate($myfileday, 0);
           fwrite($myfileday, date('l'));
           @ftruncate($myfile, 0);
           fwrite($myfile, $zero);
        }

      //if the day hasnt changed we first check how many calls have been made, and then add to the counter
      $count = fgets($myfile);  
      if ($count >= 40)
        {
            die("Exceeded allowed number of api calls");
        }

      $count = $count + 1;
      @ftruncate($myfile, 0);
      fwrite($myfile, $count);
      fclose($myfile);
      fclose($myfileday);
    }

  $app_info = file_get_contents('http://domain.com/path/to/api/api.php?action=get_app&id=' . $_GET["id"]);
  $app_info = json_decode($app_info, true);
  ?>
        <?php
        echo json_encode($app_info); 
        ?>
        
  <?php
}
else // some error checking
{

    //check if the call provided an id
    if(!isset($_GET['id'])) 
      {
        die("You did not provide an id");
      }
    //correct id or empty id?
    $id = ($_GET['id']);
    if(isset($_GET['id']) && $id > 0) 
      {
        die("The id you provided is not valid. Currently only id 0 is supported");
      }
    else if (isset($_GET['id']) && $id === '')
      {
         die("You did not provide an id");
      }   
    //empty key?
    if (empty($_GET['key'])) 
      {
        die("You did not provide a key");
      }

    //check if the call provided a key
    if(!isset($_GET['key'])) 
      {
        die("You did not provide a key");
      }

    $key = ($_GET['key']);
    //check if the provided key is valid. Only valid keys allowd for security
    if ($key != 'my_long_private_key')
      {
        die("The key you provided is not valid");
      }

  ?>
     
  <?php
} ?>
