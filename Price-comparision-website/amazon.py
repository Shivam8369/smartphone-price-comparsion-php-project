import pandas as pd
import requests
from bs4 import BeautifulSoup
import csv

 
product_name = []
product_prices =[]
product_url = []
# product_image = []

for i in range(2,160):
    
 url= "https://www.amazon.in/s?k=smartphone&sprefix=sMART%2Caps%2C235&ref=nb_sb_ss_softlines-tsdoa-joint-contextual-iss_6_5"+str(i)
 
 r = requests.get(url)
 
 soup = BeautifulSoup(r.text, "lxml")
 
# find name of the product 
 names = soup.find_all("h2", class_ = "a-size-mini a-spacing-none a-color-base s-line-clamp-2")
 for i in names:
      name = i.text
      product_name.append(name.split(')')[0])
     #  print(name.split('('))
     #  print('\n')
      
# find price of the product      
 prices = soup.find_all("span", class_ = "a-price-whole")
 for i in prices:
      price = i.text
      product_prices.append(price)
     #  print(product_prices)
      
# product url    
 urls = soup.find_all("a", class_ = "a-link-normal s-underline-text s-underline-link-text s-link-style a-text-normal")
 for i in urls:
      url = 'https://www.amazon.in'+ i.get('href')
      product_url.append(url)
     #  print(url)
      
#  df = pd.DataFrame({"name":product_name, "price":product_prices, "url":product_url})
#  print (df)
#  df.to_csv ("amazon.csv")
 
 with open('amazon.csv', 'w')as file:
      writer = csv.writer(file)
      writer.writerow(['name','price','url'])
      
      for i in range(len(product_name)):
           writer.writerow([product_name[i],product_prices[i],product_url[i]])
           
      