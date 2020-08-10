-- 创建数据库
create database exam;

use exam;

-- 创建用户表
create table user
	(
		userId int primary key auto_increment,
		name varchar(50) not null,
		password char(32) not null
		);

-- 创建货物表
create table goods
	(
		goodsId int primary key auto_increment not null,
		name varchar(50) not null,
		createtime int not null,
		createuser varchar(50)
		);

insert into user (name,password)
	values 
	("jack",md5(123456)),
	("tom",md5(123456));