DROP TABLE location_data;
DROP TABLE user;
DROP TABLE device_table;
DROP TABLE applet_table;
DROP TABLE geofence_table;
DROP TABLE automation_table;

CREATE TABLE location_data (
Record_ID int(10) AUTO_INCREMENT,
Device_UUID VARCHAR(36) NOT NULL,
Latitude DECIMAL(8, 6) NOT NULL,
Longitude DECIMAL(9, 6) NOT NULL,
Time_Stamp DATETIME NOT NULL,
PRIMARY KEY (Record_ID),
FOREIGN KEY (Device_UUID) REFERENCES device_table(Device_UUID)
);

CREATE TABLE user (
  username VARCHAR(20) NOT NULL,
  password VARCHAR(20) NOT NULL
);

CREATE TABLE device_table (
Device_UUID VARCHAR(40) NOT NULL,
Device_Name VARCHAR(20) NOT NULL,
PRIMARY KEY (Device_UUID)
);

CREATE TABLE applet_table (
Applet_ID int (10) AUTO_INCREMENT,
Device_Name VARCHAR(20) NOT NULL,
Event_Name_1 VARCHAR(20) NOT NULL,
Event_Name_2 VARCHAR(20),
IFTTT_Key VARCHAR(30) NOT NULL,
PRIMARY KEY (Applet_ID)
);

CREATE TABLE geofence_table (
GeoFence_ID int (10) AUTO_INCREMENT,
TL_Lat DECIMAL(8, 6) NOT NULL,
TL_Long DECIMAL(9, 6) NOT NULL,
TR_Lat DECIMAL(8, 6) NOT NULL,
TR_Long DECIMAL(9, 6) NOT NULL,
BL_Lat DECIMAL(8, 6) NOT NULL,
BL_Long DECIMAL(9, 6) NOT NULL,
BR_Lat DECIMAL(8, 6) NOT NULL,
BR_Long DECIMAL(9, 6) NOT NULL,
PRIMARY KEY (GeoFence_ID)
);

CREATE TABLE automation_table (
Automation_ID int(10) AUTO_INCREMENT,
Automation_Name VARCHAR(30) NOT NULL,
Event VARCHAR(30) NOT NULL,
Event_Condition VARCHAR(30) NOT NULL,
PRIMARY KEY (Automation_ID)
);