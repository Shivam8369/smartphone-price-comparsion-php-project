from selenium import webdriver
from time import sleep
# from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By


# from bs4 import BeautifulSoup
# import pandas as pd
driver = webdriver.Chrome()
# driver = webdriver.Chrome(r"C:\Users\shivam\Downloads\chromedriver_win32\chromedriver.exe")


driver.get("https://www.flipkart.com/search?q=smartphone&as=on&as-show=on&otracker=AS_Query_OrganicAutoSuggest_1_2_na_na_na&otracker1=AS_Query_OrganicAutoSuggest_1_2_na_na_na&as-pos=1&as-type=HISTORY&suggestionId=smartphone&requestId=74478e90-4cde-47ac-b010-ee0c8f865ade")


# input_search = driver.find_element_by_class('_3704LK')  = old method
# new method
# input_search = driver.find_element(By.CLASS, '_3704LK')
# search_button = driver.find_element(By.CLASS, 'L0Z3Pu')
# # search_button = driver.find_element_by_class('L0Z3Pu')


# input_search.send_keys("Smartphones")
# search_button.click()
# # sleep(10)



products = []
# for i in range(6):
product = driver.find_element(By.CLASS, '_4rR01T')
for i in product:
      name = i.text
      products.append(name)
      print(products)
#     # next_button = driver.find_element("class name", '_1LKTO3')
#     # next_button.click()

driver.close()
