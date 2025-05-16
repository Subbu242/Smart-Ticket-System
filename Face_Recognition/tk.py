from tkinter import * 
import tkinter as tk
import pydriver
import webbrowser 
import os
import json
from PIL import Image, ImageTk
from gtts import gTTS 
import time
import subprocess
from playsound import playsound
import requests
#from . import _gi
from smart_recognition import get_face_info

def text_to_speech_welcome(name):
	myobj=gTTS(text="Welcome to Smart Metro ticketing system, "+str(name)+", maintain at least one meter distance, while traveling.",lang='en',slow=False)
	myobj.save("welcome_message.mp3") 
	return

def text_to_speech_thank_you(name):
	myobj=gTTS(text="Social distancing is the only way to fight corona virus. Thank you, "+str(name)+", Stay safe.",lang='en',slow=False)
	myobj.save("Thank_you_message.mp3") 
	return

# def send_notification(face_data):
# 	rupee = u'\u20B9'
# 	msg = str(face_data['user_name'])+",\nYou have travelled from\n"+str(face_data['source_station_name'])+" To "+str(face_data['destination_station_name'])+"\nRide cost : "+str(face_data['ride_cost'])+" Rs"+"\nAvail_bal : "+str(face_data['user_balance'])+" Rs"+"\nThank you for using smart metro ticketing system."
# 	url = "https://www.fast2sms.com/dev/bulk"
# 	payload="sender_id=FSTSMS&message="+msg+"&language=english&route=p&numbers="+face_data['user_phone']
# 	headers = {'authorization': "2f73QriyZtaKElkcNXCIjP6dqu4Sns59WmVGDMYbv1xUJLOAeTovPZW7hxSm9Y3BzUEJKtLR51q8Qgy4",'Content-Type': "application/x-www-form-urlencoded",'Cache-Control': "no-cache",}
# 	response = requests.request("POST", url, data=payload, headers=headers)
# 	print(response.text)
# 	print(msg)
# 	return

def send_notification(face_data):
    rupee = u'\u20B9'
    message_content = str(face_data['user_name'])+",\nYou have travelled from\n"+str(face_data['source_station_name'])+" To "+str(face_data['destination_station_name'])+"\nRide cost : "+str(face_data['ride_cost'])+" Rs"+"\nAvailable balance : "+str(face_data['user_balance'])+" Rs"+"\nThank you for using smart metro ticketing system."
    url = "https://www.fast2sms.com/dev/bulkV2"
    payload = f"message={message_content}&language=english&route=q&numbers="+face_data['user_phone']    
    headers = {
        'authorization': "aHEzYfzbsfjWOLPB3iU9aXYpR9AmLBBN64mBBZzSA97OW37cQLbZMX535F3v",
        'Content-Type': "application/x-www-form-urlencoded",
        'Cache-Control': "no-cache",
        }
    response = requests.request("POST", url, data=payload, headers=headers)
    print(response.text)
    return


def start_application():
    # data=get_face_info()
    print("Starting Appn")
    pydriver.drive_application()
    f = open('face_data.json',) 
    data = json.load(f) 
    #for i in data: 
	    #print(i) 
    f.close()
    if(data["user_id"]==0):
        webbrowser.open("http://localhost/smartticket/Entry-Exit-Display/try-again.php")
        time.sleep(5)
        browserExe = "chrome"
        #os.system("pkill "+browserExe)
    elif(data["destination_id"]==-1):
        if(data["user_balance"]<=50):
            webbrowser.open("http://localhost/smartticket/Entry-Exit-Display/balance.php") 
            time.sleep(15)
            browserExe = "chrome"
            #os.system("pkill "+browserExe)
        else:
            text_to_speech_welcome(data["user_name"])  
            webbrowser.open("http://localhost/smartticket/Entry-Exit-Display/welcome.php")
            time.sleep(1)
            playsound('welcome_message.mp3')
            time.sleep(15)
            browserExe = "chrome"
            #os.system("pkill "+browserExe)
    else:
        text_to_speech_thank_you(data["user_name"])
        send_notification(data)
        webbrowser.open("http://localhost/smartticket/Entry-Exit-Display/exit-display.php") 
        time.sleep(5)
        playsound("Thank_you_message.mp3")
        time.sleep(15)
        browserExe = "chrome"
        #os.system("pkill "+browserExe)
    # f.close()


def home_but():
	vlabel.configure(image=root.photo)

def result_eval1():
	vlabel.configure(image=root.photo2)

def result_eval2():
	vlabel.configure(image=root.photo3)

def result_eval3():
	vlabel.configure(image=root.photo4)

def project_flow():
    vlabel.configure(image=root.photo1)
   
def web_browser():
    webbrowser.open('http://localhost/smartticket/', new=2)

def open_files():
    # os.system('nautilus /Users/subhu/OneDrive/Desktop/Finay Year project/CODES')
    webbrowser.open("D:\\Finay Year project\\CODES")

def open_documentation():
    # os.system('nautilus /home/darpan/Desktop/PROJECT/Documentation')
    webbrowser.open("D:\\Finay Year project\\Documentation")

def open_db():
    webbrowser.open('http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=smart-metro&table=admin&pos=0', new=2)

def retrain_model():
    subprocess.call("python3 encode_faces.py --dataset dataset --encodings encodings.pickle --detection-method cnn", shell=True)

def create_folder(directory):
    try:
        if not os.path.exists(directory):
            os.makedirs(directory)
            return 1
    except OSError:
        print ('Error: Creating directory. ' +  directory)
        return 1
        

def new_folder():
    #top=TK()
    #root.geometry("400x150")
    Label(root,text="User ID").place(x=30,y=50)
    e1=str(Entry(root).place(x=100,y=50))
    Label(root,text="Name").place(x=30,y=90)
    e2=str(Entry(root).place(x=100,y=90))
    fname=e1 + "-" + e2
    fname='./dataset/'+fname
    #e3=str(Entry(root).place(x=50,y=130))
    #if(e3==None):
    #    time.sleep(10)
    #if(e3==1):
    #   create_folder(fname)
    #Button(root, command=create_folder(fname), text="Create").place(x=50,y=130)
    #  print("[INFO] creating Folder: ", fname)
    #else:
       # print("[INFO] Folder Creation failed")
    #create_folder(fname)
    #submitb=Button(root,text="Create User",command=create_folder(fname)).place(x=30,y=130)
    #top.mainloop()
    #label=Label(root,text="Enter the folder name in the format, 'UserID-UserName'")
    #label.grid()



def read_image(photo):
	image = Image.open(photo)
	image = image.resize((1300, 700), Image.Resampling.LANCZOS)
	return image

#Header
root = tk.Tk()
root.title("SMART TICKET SYSTEM FOR METRO")
root["bg"] = "light grey"
frame = tk.Frame(root)
frame.grid()
# root.geometry("1300x700")
root.geometry("1550x800")

img= (Image.open("train2.png"))
resized_image= img.resize((1550,800), Image.Resampling.LANCZOS)
root.photo = ImageTk.PhotoImage(resized_image)
root.photo1 = ImageTk.PhotoImage(read_image('project_flow.png'))
root.photo2 = ImageTk.PhotoImage(read_image('res1.png'))
root.photo3 = ImageTk.PhotoImage(read_image('res2.png'))
root.photo4 = ImageTk.PhotoImage(read_image('res3.jpeg'))
vlabel=tk.Label(root,image=root.photo)
vlabel.grid()
  
menubar = Menu(root)

start = Menu(menubar, tearoff=0)  
menubar.add_command(label="Start Application",command=start_application)    

quit = Menu(menubar, tearoff=0)  
menubar.add_command(label="Quit Application",command=root.quit)  

res=Menu(menubar,tearoff=0,fg="green")
res.add_command(label="Result 1", command=result_eval1)
res.add_command(label="Result 2", command=result_eval2)
res.add_command(label="Result 3", command=result_eval3)
res.add_command(label="Project Flow", command=project_flow)
res.add_separator()
res.add_command(label="Home",command=home_but)
menubar.add_cascade(label="Results", menu=res)


sof=Menu(menubar,tearoff=0,fg="blue")
sof.add_command(label="Website",command=web_browser)
sof.add_command(label="Backend Database",command=open_db)
sof.add_separator()
sof.add_command(label="Project Code",command=open_files)
sof.add_command(label="Documentation",command=open_documentation)
menubar.add_cascade(label="Code & Docs",menu=sof)

train=Menu(menubar,tearoff=0,fg="green")
train.add_command(label="Retrain Model",command=retrain_model)
train.add_separator()
train.add_command(label="Add Folder",command=new_folder)
menubar.add_cascade(label="Add User",menu=train)

root.config(menu=menubar)  
root.mainloop()
