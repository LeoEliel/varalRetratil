#!/usr/bin/python
# -*- coding: utf-8 -*-
import pymysql
import serial
from serial.tools import list_ports

#Primeiramente precisamos determinar as portas seriais disponiveis na maquina para isso, obtemos a lista de portas seriais e escolhemos manualmente aquela com index 1.
# selectedPortIndex = 1
# selectedDevice = ""
# ports = list_ports.comports()

# print("Avaiable ports:\n%s"%"\n".join(["\t%d: %s"%(portIndex,str(ports[portIndex])) for portIndex in range(len(ports))]))
# selectedDevice = ports[selectedPortIndex].device
# print("Selected device: %s"%selectedDevice)


conexao = pymysql.connect(db='1iot', user='root', passwd='')#formando conexão com banco de dados. Insira seus parâmetros correspondentes
cursor = conexao.cursor()
cursor.execute("select * from previsao")#SQL Query aqui
resultado = cursor.fetchall()#Retorno do Resultado. Observar sobre os comandos cursor.fetchone e cursor.fetchall
print("previsao:") #apenas um cabeçalho para printar na tela
for linha in resultado: # laço que imprime na tela os resultados contidos na variavel "resultado"
    print(linha)
conexao.close()#fecha conexão do BD

serial = serial.Serial('COM3', 9600)

try: # Cada execução lê uma linha da porta serial e separada pela voltagem so solo coletada pelo sensor imprimindo no prompt
    for linha in serial:
        try:
            entrada = linha.decode("utf-8").split("\t")
            solo = int(entrada[0])
            print(u"Voltagem do Solo: %gºC"%(solo))
        except ValueError as e:
            print("E: %s"%linha)
        except IndexError as e:
            print("E: %s"%linha)
except KeyboardInterrupt: # Ao abortar a execução do programa esta exception é chamada deve-se então fechar a porta serial para novas comunicações
    serial.close()
except: #Caso seja um erro não especificado é importante fechar a porta serial para permitir comunicação futura
    serial.close()