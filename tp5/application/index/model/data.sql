
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
create table mes
	(
		mesId int primary key auto_increment not null,
		goods varchar(50) not null,
		goodsId int not null,
		addTime int not null,
		addUser varchar(50) not null,
		type varchar(50) not null
		);

insert into user (name,password)
	values 
	("jack",md5(123456)),
	("tom",md5(123456));

insert into mes (mesId,goods,goodsId,addTime,addUser,type)
	values 
	("","啤酒","1234","1","tom","饮料"),
	("","花生","5678","1","tom","零食"),
	("","衬衫","9634","1","jack","衣物");

