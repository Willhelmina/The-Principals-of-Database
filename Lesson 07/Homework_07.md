## 练习可编程SQL章节中的内容

# 存储过程的编写，IN,OUT等参数的使用。

* IN

mysql> delimiter $$
mysql> create procedure in_para(in s_grade int)
    -> begin
    -> 　　select s_grade;
    -> 　　set s_grade=60;
    -> 　　select s_grade;
    -> end$$
mysql> delimiter ;
mysql> set @s_grade=73;

* OUT

mysql> delimiter //
mysql> create procedure out_para(out s_out int)
    ->   begin
    ->     select s_out;
    ->     set s_out=2;
    ->     select p_out;
    ->   end
    -> //
mysql> delimiter ;
mysql> set @s_out=1;

* INOUT

mysql> delimiter $$
mysql> create procedure inout_para(inout s_inout int)
    ->   begin
    ->     select s_inout;
    ->     set s_inout=2;
    ->     select s_inout;
    ->   end
    -> $$
mysql> delimiter ;

# 局部变量的定义。

	use myschemabase
	declare @S_TYPE char(2) 
	declare @S_CUNT numeric(10) 
	set @S_TYPE = 'U'
	set @S_CUNT = 10

# 条件控制的使用。

	CASE sex
	         WHEN '1' THEN '男'
	         WHEN '2' THEN '女'
	ELSE '其他' END

# 循环控制的使用。
	
	WHILE age<20 LOOP
		num:=num+1;
	END LOOP;
