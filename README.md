personal-api
============

A simple personal RESTful API written in php. It returns data in JSON format. It needs a key to work, and the key currently allows 40 api calls per day. It is build arount the logic of id's as a means to fetch differently groupped information. 

It doesn't use a database, because that would make it more difficult that in needed to be. Due to this fact, it is easier to implement but difficult to maintain and scale because all the information need to be hardcoded into the code. The parse.php file is just a JSON parser to parse and show the data returned from the api. 

If you want to use it you just have to place the `rest_api.php` and `api.php` files somewhere in your web server. To call the api simply point your browser to `http://domain.com/path/to/api/rest_api.php?action=get_app&id=x&key=xxx`

The code is fairly commented so you shouldn't have any problems using it. Just make sure to add your information before using it.
