<?php
// This is the API, 2 possibilities: show the app list or show a specific app by id.
// This would normally be pulled from a database but for demo purposes, I will be hardcoding the return values.

function get_app_by_id($id)
{
  $app_info = array();

  // normally this info would be pulled from a database.
  // build JSON array.
  switch ($id){
    case 0:
      //the array below is filled with my personal information. You need to change it accordingly with your information
      $app_info = array(array("photo" => "https://gravatar.com/avatar/04e39d86bc166679c911014743486ebd?s=400", "gravatar" => "https://en.gravatar.com/sotiris84", "name" => "Sotiris Karagiorgis", "birthday" => "15-03-1984", "age" => "30", "email" => "sotiris@karagiorgis.info", "social networks" => array("Facebook" => "https://www.facebook.com/skaragiorgis", "LinkedIn" => "https://www.linkedin.com/pub/sotiris-karagiorgis/51/b19/950", "Google+" => "https://plus.google.com/+SotirisKaragiorgis/posts", "Twitter" => "https://twitter.com/s_karagiorgis"), "country" => "Cyprus", "city" => "Limassol", "languages" => "Greek, English", "keywords" => "Software Engineering & Design, Software Development, Web Development, System Administration, Operating Systems, Computer security, Penetration Testing, Network Monitoring, C, Python, Ruby", "programming languages" => "C, Python, Ruby", "web programming" => "HTML, CSS, jQuery, JavaScript, PHP", "web frameworks" => "Bootstrap, Foundation, WordPress, Joomla!, Rails, Google App Engine, Django, Google Web Starter Kit", "databases" => "MySQL, PostgreSQL, SQLite", "website" => "http://karagiorgis.info", "blog" => "http://karagiorgis.info/blog/", "rss" => "www.karagiorgis.info/blog/feed/", "github" => "https://github.com/sotiris84", "military status" => "Completed, January 2004, Limassol, Cyprus", "marital status" => "Single", "api version" => "API v1.0")); 
      break;              
  }

  return $app_info;
}

$possible_url = array("get_app_list", "get_app");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
  switch ($_GET["action"])
    {
      case "get_app_list":
        $value = get_app_list();
        break;
      case "get_app":
        if (isset($_GET["id"]))
          $value = get_app_by_id($_GET["id"]);
        else
          $value = "Missing argument";
        break;
    }
}

//return JSON array
exit(json_encode($value));
?>
