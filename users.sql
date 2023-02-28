create table users(
    id bigint not null auto_increment,
    username varchar(200) not null,
    email varchar(200) not null,
    userpassword varchar(200) not null,
    primary key (id)
);