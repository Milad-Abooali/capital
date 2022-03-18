create table o_email_log
(
    id         int auto_increment
        primary key,
    subject    varchar(255)                        not null,
    content    blob                                not null,
    user_id    int                                 not null,
    email      varchar(255)                        not null,
    status     int                                 not null,
    created_on timestamp default CURRENT_TIMESTAMP not null,
    created_by int                                 not null
);

create table o_notify
(
    id    int auto_increment
        primary key,
    type  varchar(255) not null,
    alert tinyint      not null,
    email tinyint      not null,
    sms   tinyint      not null
);

create table o_users
(
    id          int auto_increment
        primary key,
    email       varchar(254)                        not null,
    phone       varchar(20)                         null,
    password    text                                not null,
    f_name      varchar(150)                        not null,
    l_name      varchar(150)                        not null,
    country     varchar(100)                        not null,
    city        varchar(100)                        not null,
    status      int                                 not null,
    created_on  timestamp default CURRENT_TIMESTAMP not null,
    created_by  int                                 not null,
    modified_on datetime                            not null,
    modified_by int                                 not null,
    constraint email
        unique (email),
    constraint o_users_phone_uindex
        unique (phone)
)
    engine = InnoDB;

create index emial
    on o_users (email);


