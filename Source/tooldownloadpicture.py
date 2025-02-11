import requests
from bs4 import BeautifulSoup
from urllib.request import urlopen
import os
import io
import sys
from PIL import Image

def getdata(url):
    r = requests.get(url)
    return r.text

def create_folder(folder_name):
    try:
        os.mkdir(folder_name)
    except FileExistsError:
        print("Da ton tai folder nay, hay lam san pham khac")
        return False
    return True

def download_image(download_path, url, file_name):
    image_content = requests.get(url).content
    image_file = io.BytesIO(image_content)
    image = Image.open(image_file)
    file_path = download_path + file_name
    with open(file_path, "wb") as f:
        image.save(f, "PNG")

print("Nhap ten folder:")
folder_name = sys.stdin.readline().strip()
print("URL san pham:")
sp_url = sys.stdin.readline().strip()

file_name = "thongtinsanpham"

if not create_folder(folder_name): exit()

download_path = f"{folder_name}/"

htmldata = getdata(sp_url)
soup = BeautifulSoup(htmldata, 'html.parser')
# name_product = soup.find('div', {"class": "box-product-name"}).find('h1').text
# price = soup.find('p', {"class": "tpt---sale-price"}).text

# file_path = os.path.join(folder_name, file_name)
# with open(file_path, 'w') as file:
#     file.write(name_product)
#     file.write(price)

items = soup.find_all('div', {"class":"swiper-slide button__view-gallery swiper-slide-next swiper-slide-visible"})

index = 0
for item in items:
    img_url = item.find('img')['src']
    print(img_url)
    # download_image(download_path, img_url, f"image{index}.png")
    # index+=1