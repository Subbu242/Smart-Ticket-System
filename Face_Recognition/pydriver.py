
import sys, json
import smart_recognition

def write_into_json_file(dictionary):
	# Serializing json  
	json_object = json.dumps(dictionary, indent = 4) 
	  
	# Writing to sample.json 
	with open("face_data.json", "w") as outfile:
		#print(type(json_object))
  		outfile.write(json_object)	
    
def drive_application():
	dict = smart_recognition.get_face_info()
	#print(dict)


	# Generate some data to send to PHP
	#result = {'status': 'Yes', 'id': 1}

	# Send it to stdout (to PHP)
	write_into_json_file(dict)
