import requests
import urllib.request
import json
from bs4 import BeautifulSoup

def spider():
	baseurl='http://zeenews.india.com'
	url='http://zeenews.india.com/economy'
	source_code=requests.get(url)
	plain_text=source_code.text
	soup=BeautifulSoup(plain_text,'html.parser')
	data=[]
	for link in soup.findAll('div',{'class': 'lead-health-nw'}):
		href=baseurl+link.find('span').find('a')['href']
		p=str(link.find('p').string.replace("'","").replace('"',"").replace("\u00a0"," "))
		title=str(link.find('span').find('a').string.replace("'","").replace('"',"").replace("\u00a0"," "))
		t={'title':title,'href':href,'p':p}
		data.append(t)
	js=json.dumps(data)
	fh=open('try.json','w')
	fh.write("data = '")
	fh.write(js)
	fh.write("';")

	#print (js)

def crawl_images():
	baseurl='http://zeenews.india.com'
	url='http://zeenews.india.com/economy'
	source_code=requests.get(url)
	plain_text=source_code.text
	count=0
	soup=BeautifulSoup(plain_text,'html.parser')
	for link in soup.findAll('div',{'class': 'lead-health-nw'}):
		src=link.find('img')['src']
		urllib.request.urlretrieve(src,str(count)+'.jpg')
		print(src)
		count+=1

spider()
crawl_images()