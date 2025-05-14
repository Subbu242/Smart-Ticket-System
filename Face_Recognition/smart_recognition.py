
#!/usr/bin/env python
import face_recognition
from imutils.video import VideoStream
from imutils.video import FPS
import sql_operations
import argparse
import imutils
import pickle
import time
import cv2
import random
import warnings
warnings.filterwarnings('ignore')

def recognize_face(data, detector):
	
	
	# initialize the video stream and allow the camera sensor to warm up
	print("[INFO] Starting video stream...\n\n")
	vs = VideoStream(src=0).start()
	# vs = VideoStream(usePiCamera=True).start()
	time.sleep(2.0)

	# start the FPS counter
	fps = FPS().start()

	# loop over frames from the video file stream
	t_end = time.time() + 5
	names = []
	print("[INFO] Recognizing face...\n\n")
	while time.time()<t_end:
		# grab the frame from the threaded video stream and resize it
		# to 500px (to speedup processing)
		frame = vs.read()
		frame = imutils.resize(frame, width=500)
		
		# convert the input frame from (1) BGR to grayscale (for face
		# detection) and (2) from BGR to RGB (for face recognition)
		gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
		rgb = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)

		# detect faces in the grayscale frame
		rects = detector.detectMultiScale(gray, scaleFactor=1.1, 
			minNeighbors=5, minSize=(30, 30),
			flags=cv2.CASCADE_SCALE_IMAGE)

		# OpenCV returns bounding box coordinates in (x, y, w, h) order
		# but we need them in (top, right, bottom, left) order, so we
		# need to do a bit of reordering
		boxes = [(y, x + w, y + h, x) for (x, y, w, h) in rects]

		# compute the facial embeddings for each face bounding box
		encodings = face_recognition.face_encodings(rgb, boxes)
		

		# loop over the facial embeddings
		for encoding in encodings:
			# attempt to match each face in the input image to our known
			# encodings
			matches = face_recognition.compare_faces(data["encodings"],
				encoding)
			name = "0-Unknown"

			# check to see if we have found a match
			if True in matches:
				# find the indexes of all matched faces then initialize a
				# dictionary to count the total number of times each face
				# was matched
				matchedIdxs = [i for (i, b) in enumerate(matches) if b]
				counts = {}

				# loop over the matched indexes and maintain a count for
				# each recognized face face
				for i in matchedIdxs:
					name = data["names"][i]
					counts[name] = counts.get(name, 0) + 1

				# determine the recognized face with the largest number
				# of votes (note: in the event of an unlikely tie Python 	
				# will select first entry in the dictionary)
				name = max(counts, key=counts.get)
			
			# update the list of names
			names.append(name)

		# loop over the recognized faces
		for ((top, right, bottom, left), name) in zip(boxes, names):
			# draw the predicted face name on the image
			cv2.rectangle(frame, (left, top), (right, bottom),
				(0, 255, 0), 2)
			y = top - 15 if top - 15 > 15 else top + 15
			cv2.putText(frame, name, (left, y), cv2.FONT_HERSHEY_SIMPLEX,
				0.75, (0, 255, 0), 2)

		# display the image to our screen
		cv2.namedWindow("Smart Metro Ticket System", cv2.WINDOW_NORMAL)
		cv2.resizeWindow("Smart Metro Ticket System", 700, 400)
		cv2.moveWindow("Smart Metro Ticket System", 350,50)
		cv2.imshow("Smart Metro Ticket System", frame)
		key = cv2.waitKey(1) & 0xFF

		# if the `q` key was pressed, break from the loop
		if key == ord("q"):
			break

		
		# update the FPS counter
		fps.update()

	# stop the timer and display FPS information
	fps.stop()
	print("[INFO] elasped time: {:.2f}".format(fps.elapsed()))
	print("[INFO] approx. FPS: {:.2f}\n\n".format(fps.fps()))

	# do a bit of cleanup
	cv2.destroyAllWindows()
	vs.stop()
	return names

def most_frequent(List): 
    return max(set(List), key = List.count) 

def get_face_info():
	
	# load the known faces and embeddings along with OpenCV's Haar
	# cascade for face detection
	data = pickle.loads(open('encodings.pickle', "rb").read())
	detector=cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
	names = recognize_face(data,detector)
	name = most_frequent(names)
	split_string = name.split('-')
	print('recognized id is '+split_string[0]+' and name is '+split_string[1])
	
	dict = {
	 str(split_string[1]) : split_string[0]	 
	}
	#generate camera id
	cam_id_list = [3,8,10,12,13,15,25]
	random.shuffle(cam_id_list)
	dict["camera_id"] = random.sample(cam_id_list,1)[0]
	
	if(split_string[0]=='0'):
		face_data = {"user_id":0, "user_name":"unknown"}
	
	else:
		print("[INFO] Updating database...\n\n")
		face_data = sql_operations.update_database(split_string[0], dict["camera_id"])
		print(face_data)
	return face_data
	# return data,detector

#get_face_info()

# recognize_face(data,detector)





	

