#! /usr/bin/python

import time
from datetime import datetime
from xbee import ZigBee
import serial


PORT = 'COM27'
BAUD_RATE = 9600

# Open serial port
ser = serial.Serial(PORT, BAUD_RATE)

# Create API object
xbee = ZigBee(ser,escaped=True)
import pprint
#pprint.pprint(xbee.api_responses)

DEST_ADDR_LONG = "\x00\x13\xA2\x00\x40\x9f\x40\xe8"
DEST_ADDR_LONG2 = "\x00\x13\xa2\x00\x40\x9f\x40\xde"
#DEST_ADDR_LONG = "\x00\x13\xa2\x00\x40\x9f\x40\xde"

#part to discovery shot 16-bit address
xbee.send("tx",data="1000",dest_addr_long=DEST_ADDR_LONG,dest_addr="\xff\xfe")
response = xbee.wait_read_frame()
short_addr = response["dest_addr"]
time.sleep(2)
xbee.send("tx",data="1000",dest_addr_long=DEST_ADDR_LONG2,dest_addr="\xff\xfe")
response = xbee.wait_read_frame()
short_addr2 = response["dest_addr"]

# Continuously read and print packets
while True:
    try:
        print "send data"
        tstart = datetime.now()
        xbee.send("tx",data="1000",dest_addr_long=DEST_ADDR_LONG,dest_addr=short_addr)
        response = xbee.wait_read_frame()
        tend = datetime.now()
        print tend - tstart
        #print short_addr
        print response
        time.sleep(2)
        xbee.send("tx",data="0100",dest_addr_long=DEST_ADDR_LONG,dest_addr=short_addr)
        time.sleep(2)
        xbee.send("tx",data="1000",dest_addr_long=DEST_ADDR_LONG2,dest_addr=short_addr2)
        response = xbee.wait_read_frame()
        print response
        time.sleep(2)
        xbee.send("tx",data="0100",dest_addr_long=DEST_ADDR_LONG2,dest_addr=short_addr2)
        time.sleep(2)
        
    except KeyboardInterrupt:
        break
        
ser.close()
