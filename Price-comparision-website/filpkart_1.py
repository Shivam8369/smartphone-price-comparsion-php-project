import pandas as pd
import requests
from bs4 import BeautifulSoup

 
product_name = []
product_prices =[]
product_image = []
product_url = []

for i in range(2,300):
    
 url= " https://www.flipkart.com/search?q=smartphone&sid=tyy%2C4io&as=on&as-show=on&otracker=AS_QueryStore_OrganicAutoSuggest_1_4_na_na_ps&otracker1=AS_QueryStore_OrganicAutoSuggest_1_4_na_na_ps&as-pos=1&as-type=RECENT&suggestionId=smartphone%7CMobiles&requestId=4b1777fa-1fb3-42db-b741-8bc6cdb3f94b&as-backfill=on"+str(i)
 
 r = requests.get(url)
 
 soup = BeautifulSoup(r.text, "lxml")
 
# find name of the product 
 names = soup.find_all("div", class_ = "_4rR01T")
 for i in names:
      name = i.text
      product_name.append(name)
     #  print(name)
      
 # find price of the product      
 prices = soup.find_all("div", class_ = "_30jeq3 _1_WHN1")
 for i in prices:
      price = i.text.split('₹')[1]
      product_prices.append(price)
      print(price)
      
      
# find image link of the product       
 images = soup.find_all("img", class_ = "_396cs4")
 for i in images:
      image = i.get('src')
      product_image.append(image)
     #  print(image)
      
# find each product url of the product       
 urls = soup.find_all("a", class_ = "_1fQZEK")
 for i in urls:
      url = 'https://www.filpkart.com'+ i.get('href')
      product_url.append(url)
     #  print(url)
      
            
 # make csv file to store data   
 df = pd.DataFrame({"name":product_name, "price":product_prices, "url":product_url})
 print (df)
 df.to_csv ("filpkart.csv")

