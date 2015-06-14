drop table IF EXISTS c_phone;
drop table IF EXISTS sales;
drop table IF EXISTS inventory;
drop table IF EXISTS employee_data;
drop table IF EXISTS e_phone;
drop table IF EXISTS customer;
drop table IF EXISTS employee;
drop table IF EXISTS departments;
drop table IF EXISTS cities;

create table cities(
	Zip numeric(5,0) not null,
	City varchar(35),
	State varchar(25),
	County varchar(35),
	primary key(Zip)) TYPE=INNODB;

create table departments(
	Dept_name varchar(25) not null,
	Zip numeric(5,0),
	Budget numeric(11,0),
	primary key(dept_name),
	foreign key(Zip) references
	cities(Zip)) TYPE=INNODB;

create table employee(
	E_ID varchar(5) not null,
	F_Name varchar(25),
	M_Name varchar(25),
	L_Name varchar(25),
	Address_1 varchar(50),
	Zip numeric(5,0),
	Birthday date,
	primary key (E_ID),
	foreign key (Zip) references cities(Zip)) TYPE=INNODB;

create table customer(
	Cust_ID varchar(5) not null,
	Business_Name varchar(35),
	F_Name varchar(25),
	M_Name varchar(25),
	L_Name varchar(25),
	Address_1 varchar(50),
	Address_2 varchar(50),
	Zip numeric(5,0),
	Cell_Number numeric(10,0),
	Home_Number numeric(10,0),
	primary key (Cust_ID),
	foreign key(Zip) references cities(Zip)) TYPE=INNODB;

create table e_phone(
	E_ID varChar(5) not null,
	phone_type varchar(5) not null,
	phone_number numeric(10,0),
	primary key (E_ID,phone_type),
	foreign key (E_ID) references employee(E_ID)) TYPE=INNODB;
	
create table employee_data(
	E_ID varchar(5) not null,
	Hire_Date date,
	Salary numeric(11,2) check (salary>0),
	Title varchar(25),
	Dept_Name varchar(25),
	primary key(E_ID, Hire_Date),
	foreign key(E_ID) references employee(E_ID),
	foreign key(Dept_Name) references departments(Dept_Name)) TYPE=INNODB;

create table inventory(
	Item_No varchar(5) not null,
	Description varchar(35),
	QOH numeric(9,0),
	Reorder_Level numeric(9,0),
	Price numeric(9,2),
	primary key (Item_No))TYPE=INNODB;

create table sales(
	Order_No varchar(5) not null,
	Salesperson_ID varchar(5),
	Customer_ID varchar(5),
	Item_NO varchar(5),
	QTY numeric(9,0) check (QTY > 0),
	Order_Date date,
	Shipped_Date date,
	primary key (Order_No, Order_Date),
	foreign key (Salesperson_ID) references employee(E_ID),
	foreign key (Customer_ID) references customer(Cust_ID),
	foreign key (Item_No) references inventory(Item_No)) TYPE=INNODB;

create table c_phone(
	C_ID varChar(5) not null,
	phone_type varchar(5) not null,
	phone_number numeric(10,0),
	primary key (C_ID,phone_type),
	foreign key (C_ID) references customer(Cust_ID)) TYPE=INNODB;