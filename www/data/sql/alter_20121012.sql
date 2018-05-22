alter table product add search_only_flag tinyint(1) default 0 after slug;
alter table product add search_pc_link varchar(255) after search_only_flag;
alter table product add search_sp_link varchar(255) after search_pc_link;
alter table product add search_mb_link varchar(255) after search_sp_link;
alter table product add search_sub_category varchar(20) after search_mb_link;
create index search_sub_category_idx on product (search_sub_category);
