#!/usr/bin/python
# -*- coding: utf-8 -*-
import pymysql
import serial
import time
from serial.tools import list_ports

def lerProbabChuva():
    conexao = pymysql.connect(db='1iot', user='root', passwd='')
    cursor = conexao.cursor()
    cursor.execute("select * from previsao")
    resultado = cursor.fetchall()
    print("previsao:") 
    for info_bd in resultado: 
        print(info_bd)
    conexao.close()
    return info_bd[4]

def lerSerial():    
    info_sensor = serial.readline()
    print("Serial: \n",info_sensor)      
    return info_sensor    

def ligarMotor():        
    print("\n")        
    humidSensor = lerSerial()
    probabChuva = lerProbabChuva()
    if probabChuva >=50 and humidSensor >= b'512\r\n':        
        serial.write(bytes("L",'utf-8'))
        print ("Chuva detectada! Sinal p/ LED e Motor: ATIVAR")  
        time.sleep(1800)
        humidSensor = lerSerial()
        if humidSensor < b'512\r\n':
            serial.write(bytes("D",'utf-8'))
            print ("Chuva não detectada! Sinal p/ LED e Motor: DESATIVAR")  
    else:
        print("Chuva não detectada. Sinal p/ LED e Motor: NONE")            
        time.sleep(5)
    ligarMotor()

serial = serial.Serial('COM3', 9600)
ligarMotor()