## 考虑一个熟人表acquaintance(friend1, friend2, class)，表示friend1和friend2是朋友，class表示类别，比如“书友”，“球友”，“酒友”等等。

# 题目一

* 请写出该表的定义语句

	use myschemabase
	create table acquaintance
	(
		'friend1' varchar(45),
		'friend2' varchar(45),
		'class' varchar(45)
		primary key ('friend1','friend2','class')
	)

insert into acquaintance 
 select 'p1','p2','书友' union all select 'p1','p3','书友' union all
 select 'p1','p2','球友' union all select 'p3','p4','球友' union all
 select 'p4','p5','球友' union all select 'p5','p6','球友' union all
 select 'p2','p1','酒友' union all select 'p3','p5','酒友' union all
 select 'p4','p5','酒友';

* 用工具生成一些测试数据
while (select count(1) from acquaintance) < 100
begin
    declare @class varchar(100),@classint int
 select @classint = ceiling(rand()*3)
 select @class = case when @classint=1
         then '书友'
       when @classint=2 
         then '球友'
       when @classint=3
         then '酒友'
     end
    insert into acquaintance
    select char(64+ceiling(rand()*26)),char(64+ceiling(rand()*26)),@class
    delete a from acquaintance a
    where  a.friend1 = a.friend2
           or exists ( select 1
                       from (
          select *
          from  ( select friend1,friend2
            from   acquaintance
            union all
            select friend2,friend1
            from   acquaintance
          ) a
          group by friend1,friend2
          having count(1) > 1 
                            ) b
                       where a.friend1 = b.friend1
                             and a.friend2 = b.friend2
                    )
           or exists ( select 1
                       from (
          select *
          from  ( select friend1,friend2
            from   acquaintance
          ) a
          group by friend1,friend2
          having count(1) > 1 
                            ) b
                       where a.friend1 = b.friend1
                             and a.friend2 = b.friend2
                    )
end                       


# 题目二

* 使用SQL完成以下查询，写出SQL语句，并返回输出结构（结果生成了测试数据）。
	+ 找出互不认识的人。
	with t as 
	(
	select friend1 m from acquaintance
	union 
	select friend2 from acquaintance
	)
	select t1.m as m1, t2.m as m2
	from t t1, t t2
	where t1.m<>t2.m
	and not exists (select * from acquaintance where (friend1=t1.m and friend2=t2.m) or (friend2=t1.m and friend1=t2.m));
 
	+ 找出只在一个类别里都有朋友的人。

	Select * from myschemabase.acquaintance;
	with t as (
	select friend1 sname, class from acuqaintance
	union
	select friend2, class from acquaintance
	)
	select sname from t t1 where not exists(select * from t where sname=t1.sname and class!=t1.class);

	+ 找出每个类别里面朋友最多的人。

	select class,fname,num
	from (
			select class,friend1 as fname,count(*) as num,
			row_number()over(partition by class order by count(*) desc) as rowa 
			from (	select class,friend1
					from acquaintance
					union all
					select class,friend2
					from acquaintance
			) a
			group by class,friend1
		) a
	where rowa = 1;

	+ 找出在同一类别里面通过朋友而结识的其他朋友（朋友的朋友也是朋友）。

	with cte as (
	select t1,friend2 as name1, t2.friend2 as name2
	from acquaintance t1 inner join acquaintance t2 on t1.friend1=t2friend1
	union all
	select t1.friend2 as name1, t2.friend1 as name2
	from acquaintance t1 inner join acquaintance t2 on t1.friend1=t2.friend2
	union all
	select t1.friend1 as name1, t2.friend2 as name2
	from acquaintance t1 inner join acquaintance t2 on t1.friend2=t2.friend1
	union all
	select t1.friend1 as name1,t2.friend1 as name2
	from acquaintance t1 inner join acquaintance t2 on t1.friend2=t2.friend2)
	select * from (select name1,name2 from cte where name!=name2)t;

	+ 找出这样的人，通过他而结识的朋友对最多（p1和p2原本不相识，他们通过p3结识，那么p3的连接度为1，找出连接度最高的人）。

	select * from myschemabase.acquaintance;
	with cte as ( 
	(
	select t1.friend2 as name1, t2.friend2 as name2,t1.friend1 as agent
	from acquaintance t1 inner join acquaintance t2 on t1.friend1=t2.friend1
	union all
	select t1.friend2 as name1, t2.friend1 as name2,t1.friend1 as agent
	from acquaintance t1 inner join acquaintance t2 on t1.friend1=t2.friend2
	union all
	select t1.friend1 as name1, t2.friend2 as name2,t1.friend1 as agent
	from acquaintance t1 inner join acquaintance t2 on t1.friend2=t2.friend1
	union all
	select t1.friend1 as name1, t2.friend1 as name2,t1.friend1 as agent
	from acquaintance t1 inner join acquaintance t2 on t1.friend2=t2.friend2
	)
 
	select * from (
	select middle,count(*) cn from cte group by middle order by cn desc)t;


	+ 找出臭味相投的朋友，他们在所出现的所有类别里面都是朋友（并且不能有这种情况，其中一个在某个类别里出现而另外一个不出现）。

	select friend1,friend2,class from acquaintance t1
	where not exists (select * from acquaintance t2
	where not exists (select * from acquaintance where class=t2.class
	and ((friend1=t1.friend1 and friend2=t1.friend2) or (friend1=t1.friend2 and friend2=t1.friend1))));
