import urllib.request
import urllib.parse
import json
import requests

serviceurl='http://www.google.com/maps/embed/v1/directions?'
origin= input('Enter the origin: ')
destination= input('Enter the destination: ')

key="AIzaSyBBdiejpO47VtUCt_w42tnBwZzpxuTZ7nw"
url = serviceurl + urllib.parse.urlencode({'key':key,'destination': destination,'origin':origin})
print ('Retrieving', url)