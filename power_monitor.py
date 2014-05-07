#! /usr/bin/python
 
"""
HumidityTempZigBee.py
 
Copyright 2012, Helmut Strey
 
This is a python script that receives and outputs the humidity and temperature
that was wirelessly transmitted from a DHT 22 / ZigBee RF module.
 
HumindityTempZigBee is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
 
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with this program.  If not, see http://www.gnu.org/licenses/.
 
"""
 
from xbee import ZigBee
from datetime import datetime
import serial
import struct
 
# PORT = 'COM5' #Select the correct COM
PORT = '/dev/tty.usbserial-A703D14M'
BAUD_RATE = 9600
 
def hex(bindata):
    return ''.join('%02x' % ord(byte) for byte in bindata)
 
# Open serial port
ser = serial.Serial(PORT, BAUD_RATE)
 
# Create API object
xbee = ZigBee(ser,escaped=True)

print 'sensor ID', '\t', 'Date', '\t\t', 'Time', '\t\t', 'Watt', '\t\t', 'Voltage', '\t', 'Current', '\t', 'Energy'
# Continuously read and print packets
while True:
    try:
        response = xbee.wait_read_frame()
        sa = hex(response['source_addr_long'][4:])
        rf = hex(response['rf_data'])
        datalength=len(rf)
        # if datalength is compatible with two floats
        # then unpack the 4 byte chunks into floats
        if datalength==40:
            #print 'test'
            w=struct.unpack('f',response['rf_data'][0:4])[0]
            v=struct.unpack('f',response['rf_data'][4:8])[0]
            i=struct.unpack('f',response['rf_data'][8:12])[0]
            k=struct.unpack('f',response['rf_data'][12:16])[0]
            pf=struct.unpack('f',response['rf_data'][16:20])[0]
            #print sa,' ',rf,' t=',t,'h=',h
            
            print sa, '\t', str(datetime.now().date()), '\t', str(datetime.now().time()) ,w ,'\t', v, '\t' ,i, '\t', k #' pf=',pf
        # if it is not two floats show me what I received
        else:
            print 'test2'
            print sa,' ',rf
    except KeyboardInterrupt:
        break
         
ser.close()
