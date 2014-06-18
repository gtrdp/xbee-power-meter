import serial,sys,time

#check the required arguments
if len(sys.argv) < 2:
	print 'To send character you need to declare device address and caracters'

else:
	xbee = serial.Serial('/dev/tty.usbserial-A703D14M', 9600, timeout=3)
	# Get the arguments
	address = sys.argv[1]
	string = sys.argv[2]

	# AT COMMAND for changing the destination address
	xbee.write('+++')					# Start ATCOMMAND with +++
	time.sleep(2)						# Wait to enter AT MODE
	xbee.write('ATDL ' + address + '\r\n')	# Change ATDL
	xbee.write('ATCN\r\n')				# Quit ATCOMMAND

	xbee.write(string)

	xbee.close()             # close port
