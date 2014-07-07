XBee Node Dashboard
===================
This program is a dashboard prototype for IoT implementation with XBee. The current version does not contain web and sensor integration but only contains full web-based IoT dashboard.

&copy; @gunturdputra 2014.

Setup Instructions
------------------
1. Make sure you have this following software installed on your computer:
	- LAMP Stack, you can use XAMPP, WAMPP, or even native applications.
2. Extract whole content of this source code to your web directory.
3. Import SQL files to your MySQL database.
4. Change these line of codes in script/mysql.php:

		$mysqli = new mysqli('localhost', 'root', 'root', 'xbee_power');

5. Open up this url in your browser to see realtime graph:

		http://localhost/xbee-power-meter/