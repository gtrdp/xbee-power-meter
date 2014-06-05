XBee Power Meter
================
This program measures power consumption and stores it into MySQL database.

&copy; @gunturdputra 2014.

Setup Instructions
------------------
1. Make sure you have this following software installed on your computer:
	- LAMP Stack.
	- Python.
	- XBee Explorer USB driver (FTDI). 
2. Then install these libraries:
	- [Python MySQLd](http://stackoverflow.com/questions/372885/how-do-i-connect-to-a-mysql-database-in-python).
	- [PySerial](https://pypi.python.org/pypi/pyserial)
	- [Python XBee](https://pypi.python.org/pypi/XBee/2.1.0).
3. Download the source code or clone this repository.
4. Create new database in MySQL using SQL Dump included in this repo.
5. Configure your database connection in db.php.
5. Change this line of code in power_monitor.py according to your device:

		PORT = '/dev/tty.usbserial-A703D14M'

6. Execute power_monitor.py by using this command:

		$ python /path/to/power_meter.py
	
	Then it will print out the obtained information and insert it into database.
7. Open up this url in your browser to see realtime graph:

		http://localhost/xbee-power-meter/


To-Do's
-------
- Write complete documentation.


Development Log
---------------
**Sat May 17 15:24:51 WIB 2014**

- Realtime graph is now working.

**Thu May  8 08:42:27 WIB 2014**

- Configuring database connection: OK
- Initializing dashboard layout with bootstrap
- Initializing graph with morris.js.
- Modifying README.

**Wed May  7 11:04:59 WIB 2014**

- Initiating this project.
- Installing required libraries.