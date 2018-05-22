alter table product add search_index text after slug;
create index search_index_idx on product (search_index(255));
