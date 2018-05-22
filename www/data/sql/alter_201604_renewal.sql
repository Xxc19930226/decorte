alter table product add newitem_rel_info varchar(255) after cafe_link_url;
alter table product add bestcosme_flag tinyint(1) not null after newitem_rel_info;
alter table product drop search_sp_link;
alter table product drop search_mb_link;

alter table line add name_en varchar(255) not null after name;

alter table product_popular add category_id bigint not null after id;
update product_popular set category_id = 1;
alter table product_popular add constraint product_popular_category_id_category_id foreign key (category_id) references category(id) on delete cascade;
/* ここでランキングを計算し直す */
