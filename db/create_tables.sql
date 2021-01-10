/* Create tables */
create table Users (
    user_id     varchar(16) primary key,
    nickname    varchar(32) not null,
    hashed_pw   varchar(64) not null,
    is_operator int not null default 0
);

create table Questions (
    question_id int primary key auto_increment,
    user_id varchar(16) not null,
    title varchar(64) not null,
    body varchar(2048) not null,
    tweet varchar(128), date datetime not null,
    visible int not null default 1,
    foreign key (user_id) references Users(user_id) on delete restrict
);

create table Valuations (
    question_id int,
    user_id varchar(16),
    primary key (question_id, user_id),
    foreign key (user_id) references Users(user_id) on delete restrict,
    foreign key (question_id) references Questions(question_id) on delete restrict
);

create table Answers (
    question_id int,
    user_id varchar(16),
    body varchar(2048) not null,
    date datetime not null,
    visible int not null default 1,
    foreign key (user_id) references Users(user_id) on delete restrict,
    foreign key (question_id) references Questions(question_id) on delete restrict
);