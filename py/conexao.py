import pymysql
conexao = pymysql.connect(db='1iot', user='root', passwd='')
cursor = conexao.cursor()
cursor.execute("select * from previsao")
resultado = cursor.fetchall()

print("previsao:")

for linha in resultado:
    print(linha)
conexao.close()
    