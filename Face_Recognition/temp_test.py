import requests
def send_notification_1(temp):
    url = "https://www.fast2sms.com/dev/bulkV2"
    message_content = "This%20is%20a%20test%20message"

    payload = f"message={message_content}&language=english&route=q&numbers=7892487188"
    headers = {
        'authorization': "aHEzYfzbsfjWOLPB3iU9aXYpR9AmLBBN64mBBZzSA97OW37cQLbZMX535F3v",
        'Content-Type': "application/x-www-form-urlencoded",
        'Cache-Control': "no-cache",
        }

    response = requests.request("POST", url, data=payload, headers=headers)

    print(response.text)

send_notification_1("")