# 打开MySQL:

mysql _uroot _proot

# 创建数据库：

CREATE SCHEMA `processon_er` ;

# 建表：

CREATE TABLE `processon_er`.`students_on` (
  `id_student` INT NOT NULL AUTO_INCREMENT,
  `stu_name` VARCHAR(45) NOT NULL,
  `stu_age` INT NOT NULL,
  `stu_sex` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));
CREATE TABLE `processon_er`.`teacher_on` (
 `id_teacher` INT NOT NULL AUTO_INCREMENT,
 `tea_name` VARCHAR(45) NOT NULL,
 `tea_age` INT NOT NULL,
 `tea_sex` VARCHAR(45) NOT NULL,
 PRIMARY KEY (`id_teacher`));
 
CREATE TABLE `processon_er`.`lesson` (
 `id_lesson` INT NOT NULL AUTO_INCREMENT,
 `tea_name` VARCHAR(45) NOT NULL,
 `student_num` VARCHAR(45) NOT NULL,
 PRIMARY KEY (`id_lesson`));
 
ALTER TABLE `processon_er`.`lesson` 
RENAME TO  `processon_er`.`lesson_on` ;

CREATE TABLE `processon_er`.`gra_design` (
 `id_gradesign` INT NOT NULL AUTO_INCREMENT,
 `id_student` INT NOT NULL,
 `stu_name` VARCHAR(45) NOT NULL,
 `tea_name` VARCHAR(45) NOT NULL,
PRIMARY KEY (`id_gradesign`));
CREATE TABLE `processon_er`.`gra_tur_teacher` (
 `id_teacher` INT NOT NULL,
 `tea_name` VARCHAR(45) NOT NULL,
 `tea_age` INT NOT NULL,
  PRIMARY KEY (`id_teacher`));

# 定义索引

use processon_er;
CREATE UNIQUE INDEX allstu_id
ON students_on (id_student) ;

# 定义外键约束：

alter table gra_tur_teacher Add constraint ID_teacher 
foreign key (id_teacher) references teacher_on (id_teacher);

# 定义约束：

alter table students_on add constraint ID_STU unique (id_student asc);
alter table teacher_on add constraint ID_TEA unique (id_teacher asc);
alter table gra_design add constraint ID_DES unique (id_gradesign asc);
