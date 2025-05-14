#!/usr/bin/env python
import pymysql
import time
import datetime
def connect_to_database():
    	#database connection
	connection = pymysql.connect(host="localhost", user="root", passwd="", port=3308, database="smart-metro")
	#connection = pymysql.connect(host="127.0.0.1", user="root", passwd="", database="smart-metro")
	
	cursor = connection.cursor()
	print("[INFO] Database connection sucessfull...\n\n")
	return connection, cursor

def close_connection(connection):
	#commiting the connection then closing it.
	connection.commit()
	connection.close()
	print("\n\n[INFO] Database connection closed...\n\n")

def entry_insert(cursor, user_id, station_id):
	# queries for inserting values
	timestamp = datetime.datetime.fromtimestamp(time.time()).strftime('%Y-%m-%d %H:%M:%S')
	insert1 = "INSERT INTO TRAVEL(user_id, source_id, destination_id, travel_date_enter) VALUES(%s,%s,%s,%s);"
	#print(insert1)
	#executing the quires
	cursor.execute(insert1,(user_id, station_id, "-1",timestamp))
	return timestamp

def exit_insert(cursor,user_id, station_id):
	#insert2 = "INSERT INTO ADMIN(admin_id, admin_name, admin_email, admin_password) VALUES(12,'ab','ab@gmail.com','1234');"
	timestamp = datetime.datetime.fromtimestamp(time.time()).strftime('%Y-%m-%d %H:%M:%S')
	
	update1 = "UPDATE TRAVEL SET destination_id=(%s), travel_date_exit=(%s) where destination_id=-1 and user_id=(%s);"
	#executing the quires
	cursor.execute(update1,(station_id, timestamp, user_id))
	return station_id,timestamp

def check_entry_or_exit(cursor,user_id):
	cursor.execute("SELECT user_id FROM TRAVEL WHERE user_id = %s and destination_id = %s",
        (user_id,"-1"))
    	# gets the number of rows affected by the command executed
	row_count = cursor.rowcount
	#print ("[INFO] number of affected rows: {}".format(row_count))
	rows = cursor.fetchall()
	

	if row_count == 0:
		return "entry"
	return "exit"

def calculate_the_cost(cursor, user_id, destination_id, timestamp):
	cursor.execute("SELECT source_id FROM TRAVEL WHERE user_id = %s and travel_date_exit = %s",
        (user_id,timestamp))
    	# gets the number of rows affected by the command executed
	rows = cursor.fetchall()
	#source_id = destination_id
	for row in rows:
		source_id = (row[0])
	number_of_stations = abs(int(destination_id) - int(source_id))
	print('\n\n[INFO] No of stations is '+str(number_of_stations))
	ride_cost_query = "select ride_cost from RIDECOST where no_of_stations=(%s);"
	cursor.execute(ride_cost_query,(number_of_stations))
	rows = cursor.fetchall()
	ride_cost = 0
	for row in rows:
		ride_cost = (row[0])
	print("[INFO] cost for "+str(number_of_stations)+" number of stations is = "+str(ride_cost))

	user_balance_query = "select user_balance from USER where user_id=(%s);"
	cursor.execute(user_balance_query,(user_id))
	rows = cursor.fetchall()
	user_balance = 0
	for row in rows:
		user_balance = (row[0])
	user_balance = float(user_balance) - float(ride_cost)
	update2 = "UPDATE USER SET user_balance=(%s) where user_id=(%s);"
	cursor.execute(update2,(user_balance, user_id))
	print("[INFO] balace of "+str(user_id)+" is = "+str(user_balance))
	return ride_cost, source_id


def write_to_json_file(cursor,user_id,timestamp,ride_cost, source_station_name, destination_station_name):
	dict = {}
	user_data_query = "select user_name,user_balance,user_phone from USER where user_id=(%s);"
	cursor.execute(user_data_query,(user_id))
	rows = cursor.fetchall()
	user_name, user_balance,user_phone = "", 0,""
	for row in rows:
		user_name = row[0]
		user_balance = row[1]
		user_phone = str(row[2])
	travel_data_query = "select * from TRAVEL where travel_date_enter=(%s) or travel_date_exit=(%s);"
	cursor.execute(travel_data_query,(timestamp,timestamp))
	rows = cursor.fetchall()
	#print(dict)
	#print(user_id)
	for row in rows:
		dict["travel_id"] = row[0]
		dict["user_id"] = row[1]
		dict["source_id"] = row[2]
		dict["destination_id"] = row[3]
		dict["travel_date_enter"] = str(row[4])
		dict["travel_date_exit"] = str(row[5])
		dict["ride_cost"] = ride_cost
	#print(dict)
	dict["user_name"] = user_name
	dict["user_balance"] = user_balance
	dict["user_phone"] = user_phone
	dict["source_station_name"] = source_station_name
	dict["destination_station_name"] = destination_station_name
	return dict
	
	
def get_station_name(cursor,source_id, destination_id):
	station_name_query = "select station_name from STATION where station_id=(%s);"
	cursor.execute(station_name_query,(source_id))
	rows = cursor.fetchall()
	source_station_name = ""
	destination_station_name = ""
	for row in rows:
		source_station_name = (row[0])
	if(destination_id != -1):
		station_name_query = "select station_name from STATION where station_id=(%s);"
		cursor.execute(station_name_query,(destination_id))
		rows = cursor.fetchall()
		for row in rows:
			destination_station_name = (row[0])
	return source_station_name, destination_station_name

def update_database(user_id, station_id):
	connection, cursor = connect_to_database()
	face_data = {}
	direction_flag = check_entry_or_exit(cursor,user_id)
	if(direction_flag == "entry"):
		print("\n\n[INFO] IN ENTRY GATE")
		timestamp = entry_insert(cursor, user_id, station_id)
		source_station_name, destination_station_name = get_station_name(cursor,station_id, -1) 
		face_data = write_to_json_file(cursor, user_id, timestamp, 0, source_station_name, destination_station_name)
	else:
		destination_id,timestamp = exit_insert(cursor,user_id, station_id)
		connection.commit()
		print("\n\n[INFO] IN EXIT GATE")
		ride_cost, source_id = calculate_the_cost(cursor, user_id, destination_id, timestamp)
		connection.commit()
		source_station_name, destination_station_name = get_station_name(cursor,source_id, destination_id) 
		face_data =write_to_json_file(cursor, user_id, timestamp, ride_cost,source_station_name, destination_station_name)	
			
	close_connection(connection)
	print('',face_data)
	return face_data


