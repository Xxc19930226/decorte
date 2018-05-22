alter table salon_shop_menu add priority BIGINT after mb_name;
update salon_shop_menu set priority = id * 10;
insert into salon_shop_menu (shop_id,name,mb_name,priority,created_at,updated_at) values (2, 'ｼﾃｨﾘﾋﾞﾝｸﾞ限定　A　AQﾐﾘｵﾘﾃｨﾌｪｲｼｬﾙｺｰｽ　(100分)　税抜13,000円', 'ｼﾃｨﾘﾋﾞﾝｸﾞ限定 A AQﾐﾘｵﾘﾃｨﾌｪｲｼｬﾙｺｰｽ(100分)', 10, now(), now());
insert into salon_shop_menu (shop_id,name,mb_name,priority,created_at,updated_at) values (2, 'ｼﾃｨﾘﾋﾞﾝｸﾞ限定　B　ﾌｪｲｽｱｯﾌﾟ&ﾓｲｽﾁｭｱｺｰｽ　(120分)　税抜18,000円', 'ｼﾃｨﾘﾋﾞﾝｸﾞ限定 B ﾌｪｲｽｱｯﾌﾟ&ﾓｲｽﾁｭｱｺｰｽ(120分)', 20, now(), now());
insert into salon_shop_menu (shop_id,name,mb_name,priority,created_at,updated_at) values (2, 'ｼﾃｨﾘﾋﾞﾝｸﾞ限定　C　ﾎﾞﾃﾞｨ&ﾌｪｲｼｬﾙｽﾍﾟｼｬﾙｺｰｽ　(160分)　税抜23,000円', 'ｼﾃｨﾘﾋﾞﾝｸﾞ限定 C ﾎﾞﾃﾞｨ&ﾌｪｲｼｬﾙｽﾍﾟｼｬﾙｺｰｽ(160分)', 30, now(), now());

