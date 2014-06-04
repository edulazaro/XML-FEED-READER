XMLFEEDREADER
=======================================
NOTE: This application uses CodeIgniter with HMVC module. There's a controller and a view for the homepage and the feed 
is a module (you can find it in the /application/modules folder). It was done for testing purposes and self learning, so 
it's not intended for direct deployment as it will need customization.

This application reads XML Feeds from other websites, lists the feeds on the screen and allows to view each feed of 
the articles separated. The Feeds are saved in JSON files that act as a cache, so that when the file is more than 15 minutes old, 
the application checks for new updates of the feeds. By this way the server load is lower.

The feeds are called in the home view (\application\views\home.php).

The data is stored in a database for different opperations, for example, view the separate feeds without the need to 
access the file.

In the feeds module, there are the feed_model and the feed_item_model models. It's a simple task for using object oriented 
PHP in this structures but it's good to think in future impovements or in case more features are added.

The views are separated of the code so there's a clear difference between front-end and back-end.

In the controller of the feed, there's the function listTitles where is called the function to display the feeds.
All the logic of the main feed is into the the feed_model class and the view in feedList, where is also displayed 
the javasscript needed for the AJAX calls the the item view, displayed in an overlay. This javascript calls a function 
located at scripts.js

BootStrap used in the front-end.

SETUP
======================================
The config file for the database is located at /application/config/database.php at line 51.
The database file is xmlfeedreader.sql and is located in the / folder.
To configure the database, import the database and then change username, password and database name to fit your 
database configuration in the database.php file.

By default:
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = '';
$db['default']['database'] = 'xmlfeedreader';
