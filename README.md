XBee Node Dashboard
===================
This program is a dashboard prototype for IoT implementation with XBee. The current version does not contain web and sensor integration but only contains full web-based IoT dashboard.

&copy; @gunturdputra 2014.

If you are using our project in your work, please cite our publication of this project:
> S. B. Wibowo, G. D. Putra and B. S. Hantono, "Development of embedded gateway for Wireless Sensor Network and Internet Protocol interoperability," 2014 6th International Conference on Information Technology and Electrical Engineering (ICITEE), Yogyakarta, 2014, pp. 1-4.
> [doi: 10.1109/ICITEED.2014.7007920](https://doi.org/10.1109/ICITEED.2014.7007920)

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
