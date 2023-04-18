-- create database if not exists beanstock;
-- use beanstock;
--
-- Drop existing constraints to RE-INITIALIZE beanstock
-- Note: If you're initializing this database for the FIRST TIME, comment these "drop constraint" statements out
--
/*
alter table users drop constraint fk_user_ssn;
alter table employees drop constraint fk_emp_ssn;
alter table employees drop constraint fk_emp_dep;
alter table customers drop constraint fk_cust_ssn;
alter table accounts drop constraint fk_cust_account;
alter table account_transaction drop constraint fk_account_from;
alter table account_transaction drop constraint fk_account_to;
alter table account_transaction drop constraint fk_cust_trans;
alter table stock_transaction drop constraint fk_stock_trans_cust;
alter table stock_transaction drop constraint fk_stock_code;
alter table stock_transaction drop constraint fk_account_stock;
alter table stock_balance drop constraint fk_cust_stock;
alter table stock_balance drop constraint fk_stock_balance;
alter table documents drop constraint fk_doc_cust;
*/
--
-- Creating table users
--

drop table if exists users;
create table users (
    username varchar(20) not null,
    password varchar(255) not null,
    ssn varchar(20) not null,
    usertype char(1) not null,
    primary key(`username`)
);
--
-- Populating data for table users
--

insert into users (username, password, ssn, usertype) values
    ('uyvo@gmail.com','3fd62e67fef0a66dd3193a6c4963d940','123-45-6789','A'),
    ('steven@gmail.com','bea5b6149b5d4e88ad8a6b134e4af2dc','222-33-4444','A'),
    ('gina@gmail.com','38e37889af3551a9a0e517f5bb75f9f4','111-11-1111','C'),
    ('pauleena@gmail.com','6938100662f36e8aa20c810aeba7d537','666-66-6666','C'),
    ('valentyna@gmail.com','0723d6129b44ec838c1f72a4fcdabf49','999-99-9999','C');

--
-- Creating table customers
--
drop table if exists persons;
create table persons (
    person_id 	int auto_increment,
    lastname 	varchar(20) not null,
    firstname 	varchar(20) not null,
    birthday	date not null,
    street 		varchar(20) not null,
    city 		varchar(20) not null,
    state 		varchar(20) not null,
    zipcode 	varchar(20) not null,
    email 		varchar(50) not null,
    phone 		varchar(20) not null,
    ssn 		varchar(20) unique,
    primary key(person_id)
);
--
-- Populating data for table customers
--
insert into persons (ssn, lastname, firstname, birthday, phone, street,city, state, zipcode, email) values
    ('989-66-3360', 'Nikola', 'Stanimir', '2000-02-01', '562-358-6309', '491', 'Kalla Rd.', 'Garden Grove', '90680', 'nikola_s@gmail.com'),
    ('341-80-5136', 'Ritika', 'Abraam', '2000-03-01', '308-224-5087', '693', 'Delroy St.', 'Fullerton', '90621', 'ritika_a@gmail.com'),
    ('348-65-4223', 'Thabani', 'Nell', '2000-04-01', '562-851-1147', '502', 'Maybelle Ave.', 'Anaheim', '92809', 'thabani_n@gmail.com'),
    ('912-87-5704', 'Margitta', 'Seppo', '2000-05-01', '308-312-2222', '35', 'Bria Blvd.', 'Stanton', '92804', 'margitta_s@gmail.com'),
    ('230-23-9238', 'Romy', 'Manawydan', '2000-06-01', '657-558-3570', '254', 'Philander St.', 'Garden Grove', '92703', 'romy_m@gmail.com'),
    ('696-79-6204', 'Aniruddha', 'Sindri', '2000-07-01', '308-404-5636', '992', 'Rosalyn Rd.', 'Anaheim', '92812', 'aniruddha_s@gmail.com'),
    ('913-35-4760', 'Mileva', 'Lamberto', '2000-08-01', '657-260-6135', '449', 'Jaslyn Cr.', 'Fullerton', '92832', 'mileva_l@gmail.com'),
    ('217-94-2668', 'Imani', 'Aintzane', '2000-09-01', '714-374-4827', '783', 'Trafford Ave.', 'Stanton', '90680', 'imani_a@gmail.com'),
    ('622-87-7051', 'Azzurra', 'Shamil', '2000-10-01', '714-312-3841', '527', 'Darian St.', 'Garden Grove', '92840', 'azzurra_s@gmail.com'),
    ('615-33-1438', 'Lotte', 'Tova', '2000-11-01', '949-213-1111', '50', 'Sage Blvd.', 'Anaheim', '92802', 'lotte_t@gmail.com'),
    ('168-69-2340', 'Christina', 'Beatrix', '2000-12-01', '949-213-2222', '83', 'Joelle Cr.', 'Fullerton', '90631', 'christina_b@gmail.com'),
    ('478-89-7048', 'Chlodulf', 'Coy', '2001-01-01', '949-213-3333', '16', 'Reynard Ave.', 'Anaheim', '92803', 'chlodulf_c@gmail.com'),
    ('777-29-7953', 'Gosia', 'Xiadani', '2002-01-01', '949-213-4444', '21', 'Valorie Rd.', 'Stanton', '92841', 'gosia_x@gmail.com'),
    ('945-91-5228', 'Glynis', 'Odharnait', '2002-01-01', '714-111-1111', '35', 'Dudley St.', 'Stanton', '92841', 'glynis_o@gmail.com'),
    ('123-45-6789', 'Uy', 'Vo', '2000-01-05', '714-111-1111', '1038', 'Main St.', 'Stanton', '92841', 'uyvo01@gmail.com'),
    ('222-33-4444', 'Steven', 'Ly', '2000-01-06', '714-111-1111', '3038', 'Main St.', 'Stanton', '92841', 'steven_ly@gmail.com'),
    ('999-99-9999', 'Valentyna', 'Shyyan', '2000-01-07', '714-111-1111', '4038', 'Main St.', 'Stanton', '92841', 'valentyna_shyyan@gmail.com'),
    ('111-11-1111', 'Gina', 'Lee', '2000-01-08', '714-111-1111', '5038', 'Main St.', 'Stanton', '92841', 'gina_lee@gmail.com'),
    ('666-66-6666', 'Pauleena', 'Phan', '2000-01-09', '714-111-1111', '5038', 'Main St.', 'Stanton', '92841', 'pauleena_phan@gmail.com')
    ;

--
-- Creating table employees
--
drop table if exists employees;
create table employees (
    employee_id 	int auto_increment,
    ssn				varchar(20) not null,
	contract_no 	varchar(50) not null,
    contract_date	date	not null,
    contract_type	varchar(20) not null,
    position		varchar(20) not null,
    department_id	int,
    salary			decimal,
    primary key(employee_id)
);

--
-- Creating table customers
--
drop table if exists customers;
create table customers (
    customer_id 	int auto_increment ,
    ssn 			varchar(20) not null,
    customer_status	varchar(10) not null,
    customer_type	varchar(20) not null,
    description		varchar(250),
    primary key(customer_id)
);
--
-- Creating table accounts
--
drop table if exists accounts;
create table accounts (
    customer_id int not null,
    account_no int auto_increment,
    account_type varchar(20) not null,
    balance decimal,
    primary key(account_no)
);
--
-- Populating data for table account
--
--
-- Creating table accounts
--
drop table if exists stock_balance;
create table stock_balance (
    customer_id int not null,
    stock_code varchar(10),
    stock_balance decimal,
    primary key(customer_id,stock_code)
);
--
-- Creating table stocks
--
drop table if exists stocks;
create table stocks (
    stock_code 	varchar(10) not null,
    stoc_name	varchar(50) not null,
    ceo 		varchar(50) not null,
    founded 	int(4) not null,
    emp_num		double not null,
    address		varchar	(255) not null,
	openprice 	double,
    high52		double,
    low52		double,
    er			double,
    dividend	double,
	primary key(stock_code)
);
--
-- Populating data for table stocks
--
insert into stocks values
('AAPL','Apple, Inc.','Timothy Donald Cook',1976,164000,'Cupertino, California',147.08,179.61,124.17,25.13,0.62),
('TSLA','Tesla, Inc.','Elon Reeve Musk',2003,127855,'Austin, Texas',210.59,384.29,101.81,57.34,null),
('MRNA','Moderna, Inc.','Stephane Bancel',2010,3900,'Cambridge, Massachusetts',138.13,217.25,115.03,6.88,null),
('UAL','United Airlines Holdings, Inc.','J.Scott Kirby',1968,92800,'Chicago, Illiois',50.62,53.26,30.54,22.71,null),
('BA','The Boeing Co.','David L.Calhoun',1916,156000,'Arlington, Virginia',201.00,221.33,113.02,-24.18,null);

--
-- Creating table account_transaction
--
drop table if exists account_transaction;
create table account_transaction (
    transaction_id 		int auto_increment,
    transaction_type 	varchar(20) not null,
	customer_id			int,
    account_from 		int,
    account_to 			int,
    amount				double not null,
	transaction_date	datetime not null,	
    primary key(transaction_id)
);

--
-- Creating table stock_transaction
--
drop table if exists stock_transaction;
create table stock_transaction (
    transaction_id 		int auto_increment,
    transaction_type 	varchar(20) not null,
	customer_id			int not null,
    account_no			int not null,
    stock_code 			varchar(10) not null,
	stock_amount		double,
    balance_amount		double not null,
	transaction_date	datetime not null,	
    primary key(transaction_id)
);

--
-- Creating table documents
--
drop table if exists documents;
create table documents (
    document_id			int auto_increment,
	customer_id			int not null,
	term_type			char(1),				
    gain_loss			double,
    doc_year			year,
    primary key(document_id,customer_id,term_type)
);

--
-- Populating constraints
--
alter table users add constraint fk_user_ssn
foreign key (ssn) references persons (ssn);
alter table employees add constraint fk_emp_ssn
foreign key (ssn) references persons (ssn);
alter table customers add constraint fk_cust_ssn
foreign key (ssn) references persons (ssn);
alter table accounts add constraint fk_cust_account
foreign key (customer_id) references customers (customer_id);
alter table stock_balance add constraint fk_cust_stock
foreign key (customer_id) references customers (customer_id);
alter table stock_balance add constraint fk_stock_balance
foreign key (stock_code) references stocks (stock_code);
alter table account_transaction add constraint fk_account_from
foreign key (account_from) references accounts (account_no);
alter table account_transaction add constraint fk_account_to
foreign key (account_to) references accounts (account_no);
alter table account_transaction add constraint fk_cust_trans
foreign key (customer_id) references customers (customer_id);
alter table stock_transaction add constraint fk_stock_trans_cust
foreign key (customer_id) references customers (customer_id);
alter table stock_transaction add constraint fk_stock_code
foreign key (stock_code) references stocks (stock_code);
alter table stock_transaction add constraint fk_account_stock
foreign key (account_no) references accounts (account_no);
alter table documents add constraint fk_doc_cust
foreign key (customer_id) references customers (customer_id);

select * from users;
select * from customers;