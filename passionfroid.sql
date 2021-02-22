create table user (
    id_user 		        int             not null AUTO_INCREMENT,
    firstname	            varchar(30)     not null,        
    lastname                varchar(35)     not null,
    mail                    varchar(50)     not null,
    password                varchar(255)    not null,
    statut                  varchar(10)     not null,
    constraint Pk_user primary key (id_user)
);



create table image (
    id_image   		            int             not null AUTO_INCREMENT,
    name				        varchar(200)	not null,
    type				        varchar(200)	not null,
    with_product                boolean         not null,
    with_human                  boolean         not null,
    institutional               boolean         not null,
    format                      varchar(10)     not null,
    credit                      varchar(250)    not null,
    limited_rights              boolean         not null,
    copyright                   varchar(250)    not null,
    date_end_limited_rights     date            not null,
    constraint Pk_image primary key (id_image)
);


create table tag (
    id_tag   		            int             not null AUTO_INCREMENT,
    name				        varchar(200)	not null,
    id_image   		            int             not null,
    constraint Pk_tag primary key (id_tag),
    constraint Fk_tag_image foreign key (id_image) references image(id_image)
);


INSERT INTO user VALUES(1,"Ynov", "Paris", "contact@ynov.com", "Ynov92", "Admin");