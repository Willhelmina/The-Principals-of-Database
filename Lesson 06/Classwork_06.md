# 常见编译型高级编程语言数据库接口：

C、C++、Delphi、Pascal，Fortran

# 常见解释型高级编程语言数据库接口：

Java、python


# Python编程语言连接数据库的不同方式比较：

* MySQL method1:

import mysql.connector
db = mysql.connector.connect(host='*.*.*.*', port=3306, user='*', passwd='*', charset = 'utf8')      
cursor = db.cursor()
cursor.execute("show databases;")
cursor.execute("use database_name;")
cursor.execute("show tables;")
data = cursor.fetchall()
for item in data:
     print(item[0])
db.close()

* method2:

import MySQLdb
db = mysql.connector.connect(host='*.*.*.*', port=3306, user='*', passwd='*', charset = 'utf8')  
cursor = conn.cursor()
cursor.execute("show databases;")
cursor.execute("use database_name;")
cursor.execute("show tables;")
cursor.execute("select * from tables_name")
data = cursor.fetchall()
for item in data:
    print(item)
cursor.close()

* method3:

import pymysql
cursor = conn.cursor()
cursor.execute("show databases;")
cursor.execute("use database_name;")
cursor.execute("show tables;")
cursor.execute("select * from tables_name")
data = cursor.fetchall()
for item in data:
    print(item[0])
cursor.close()


* Oracle method1

import cx_Oracle
con = cx_Oracle.connect( DataBase Urser Name, password,IP)
cursor = con.cursor()
SQL_Select='select * from tableName where condition1 and condition2 order by Attr1 desc'
cur.execute(SQL_Select)
cursor.close()
con.close()

* method2

import cx_Oracle
dsn = cx_Oracle.makedsn(IP, '1521', SID)
conn = cx_Oracle.connect(DataBase Urser Name, password, dsn)
cur = conn.cursor()
SQL_Select='select * from tableName where condition1 and condition2 order by Attr1 desc'
by Attr1 asc
cur.execute(SQL_Select)
cursor.close()
con.close()
