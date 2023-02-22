create database if not exists beanstock;
use beanstock;

--
-- Creating table users
--
drop table if exists users;
create table users (
    username varchar(20) not null,
    password varchar(20) not null,
    ssn varchar(20) not null,
    usertype char(1) not null,
    primary key(`username`)
);
--
-- Inserting data for table users
--
insert into users (username, password, ssn, usertype) values
    ('uyvo','uyv','123-45-6789','A'),
    ('steven','ste','222-33-4444','S'),
    ('gina','gin','111-11-1111','B'),
    ('paulleena','pau','666-66-6666','C'),
    ('valentyna','val','999-99-9999','C');

--
-- Creating table customers
--
drop table if exists customers;
create table customers (
    customerid int auto_increment,
    lastname varchar(20) not null,
    firstname varchar(20) not null,
    street varchar(20) not null,
    city varchar(20) not null,
    state varchar(20) not null,
    zipcode varchar(20) not null,
    email varchar(50) not null,
    phone varchar(20) not null,
    ssn varchar(20) not null,
    primary key(customerid)
);
--
-- Inserting data for table customers
--
insert into customers (ssn, lastname, firstname, phone, street,city, state, zipcode, email) values
    ('989-66-3360', 'Nikola', 'Stanimir', '562-358-6309', '491', 'Kalla Rd.', 'Garden Grove', '90680', 'nikola_s@gmail.com'),
    ('341-80-5136', 'Ritika', 'Abraam', '308-224-5087', '693', 'Delroy St.', 'Fullerton', '90621', 'ritika_a@gmail.com'),
    ('348-65-4223', 'Thabani', 'Nell', '562-851-1147', '502', 'Maybelle Ave.', 'Anaheim', '92809', 'thabani_n@gmail.com'),
    ('912-87-5704', 'Margitta', 'Seppo', '308-312-2222', '35', 'Bria Blvd.', 'Stanton', '92804', 'margitta_s@gmail.com'),
    ('230-23-9238', 'Romy', 'Manawydan', '657-558-3570', '254', 'Philander St.', 'Garden Grove', '92703', 'romy_m@gmail.com'),
    ('696-79-6204', 'Aniruddha', 'Sindri', '308-404-5636', '992', 'Rosalyn Rd.', 'Anaheim', '92812', 'aniruddha_s@gmail.com'),
    ('913-35-4760', 'Mileva', 'Lamberto', '657-260-6135', '449', 'Jaslyn Cr.', 'Fullerton', '92832', 'mileva_l@gmail.com'),
    ('217-94-2668', 'Imani', 'Aintzane', '714-374-4827', '783', 'Trafford Ave.', 'Stanton', '90680', 'imani_a@gmail.com'),
    ('622-87-7051', 'Azzurra', 'Shamil', '714-312-3841', '527', 'Darian St.', 'Garden Grove', '92840', 'azzurra_s@gmail.com'),
    ('615-33-1438', 'Lotte', 'Tova', '949-213-1111', '50', 'Sage Blvd.', 'Anaheim', '92802', 'lotte_t@gmail.com'),
    ('168-69-2340', 'Christina', 'Beatrix', '949-213-2222', '83', 'Joelle Cr.', 'Fullerton', '90631', 'christina_b@gmail.com'),
    ('478-89-7048', 'Chlodulf', 'Coy', '949-213-3333', '16', 'Reynard Ave.', 'Anaheim', '92803', 'chlodulf_c@gmail.com'),
    ('777-29-7953', 'Gosia', 'Xiadani', '949-213-4444', '21', 'Valorie Rd.', 'Stanton', '92841', 'gosia_x@gmail.com'),
    ('945-91-5228', 'Glynis', 'Odharnait', '714-111-1111', '35', 'Dudley St.', 'Stanton', '92841', 'glynis_o@gmail.com');

--
-- Creating table stocks
--
drop table if exists stocks;
create table stocks (
    scode 	varchar(10) not null,
    sname 	varchar(50) not null,
    openprice 	double not null,
    ceo 	varchar(50) not null,
    emp_num	double not null,
    address	varchar	(255) not null,
    high	double,
    low		double,
    er		double,
	primary key(scode)
);
--
-- Inserting data for table stocks
--
insert into stocks (code, sname, openprice, ceo,emp_num,address,high,low,er) values
    ('uyvo','uyv','123-45-6789','A'),
    ('steven','ste','222-33-4444','S'),
    ('gina','gin','111-11-1111','B'),
    ('paulleena','pau','666-66-6666','C'),
    ('valentyna','val','999-99-9999','C');

select * from users;
select * from customers;