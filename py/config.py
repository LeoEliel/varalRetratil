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
    info_sensor = None    
    info_sensor = serial.readline()
    print("Serial: \n",info_sensor)      
    return info_sensor    

def ligarMotor(x):        
    chuva = x
    print("\n")        
    humidSensor = lerSerial()
    probabChuva = lerProbabChuva()

    if probabChuva >=50 and humidSensor >= b'512\r\n' and chuva is False:        
        serial.write(bytes("L",'utf-8'))
        print ("Chuva detectada! Sinal p/ LED e Motor: ATIVAR")  
        time.sleep(60) 
        chuva = True
    elif humidSensor < b'512\r\n' and chuva is True:
        print("Chuva não detectada. Sinal p/ LED e Motor: DESATIVAR")            
        serial.write(bytes("D",'utf-8'))
        chuva = False
    time.sleep(5)
    ligarMotor(chuva)

serial = serial.Serial('COM3', 9600)
chv = False
ligarMotor(chv)