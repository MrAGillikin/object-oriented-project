drop table if exists statement;
drop table if exists author;

create table author(
	authorId binary(16) not null,
	authorAvatarUrl varchar(255),
	authorActivationToken char(32),
	authorEmail varchar(128) not null,
	authorHash char(97) not null,
	authorUsername varchar(32) not null,
	unique(authorEmail),
	unique(authorUsername),
	INDEX(authorEmail),
	primary key(authorId)
);

create table statement(
   statementId binary (32) not null,
   statementContent varchar(255),
   statementAuthor binary (16) not null,
   statementDate varchar(15),
   primary key(statementId),
	foreign key (statementAuthor) references author(authorId)
)