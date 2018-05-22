alter table admin_user add shop_id BIGINT after credentials;

CREATE TABLE salon_shop (id BIGINT AUTO_INCREMENT, name VARCHAR(50) NOT NULL, email VARCHAR(255) NOT NULL, mail_subject1 VARCHAR(100) NOT NULL, mail_subject1_mb VARCHAR(100) NOT NULL, mail_subject2 VARCHAR(100) NOT NULL, mail_subject3 VARCHAR(100) NOT NULL, mail_body1 text NOT NULL, mail_body1_mb text NOT NULL, mail_body_top2 text NOT NULL, mail_body_bottom2 text NOT NULL, mail_body_top3 text NOT NULL, mail_body_bottom3 text NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE salon_shop_menu (id BIGINT AUTO_INCREMENT, shop_id BIGINT NOT NULL, name VARCHAR(255) NOT NULL, mb_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX shop_id_idx (shop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE utf8_unicode_ci ENGINE = INNODB;

ALTER TABLE admin_user ADD CONSTRAINT admin_user_shop_id_salon_shop_id FOREIGN KEY (shop_id) REFERENCES salon_shop(id);
ALTER TABLE salon_shop_menu ADD CONSTRAINT salon_shop_menu_shop_id_salon_shop_id FOREIGN KEY (shop_id) REFERENCES salon_shop(id) ON DELETE CASCADE;

/* insert salon_shop data (include mail address) */
/* insert salon_shop_menu data */

update admin_user set shop_id=1 where user_name='salon_staff';

/* mysqldump -uroot -p -c -t cosmedecorte_test salon_reserve > salon_reserve.sql */
/* export LANG=ja_JP.UTF-8 */
/* sed 's/〜/～/g' salon_reserve.sql > salon_reserve_modified.sql */

drop table salon_reserve;
CREATE TABLE salon_reserve (id BIGINT AUTO_INCREMENT, shop_id BIGINT NOT NULL, visit VARCHAR(50) NOT NULL, members_card_id BIGINT, name_sei VARCHAR(20) NOT NULL, name_mei VARCHAR(20) NOT NULL, name_sei_kana VARCHAR(20) NOT NULL, name_mei_kana VARCHAR(20) NOT NULL, age BIGINT, address VARCHAR(255), tel VARCHAR(13) NOT NULL, email VARCHAR(255), hope_date1 VARCHAR(20) NOT NULL, hope_date2 VARCHAR(20), hope_date3 VARCHAR(20), hope_time1 ENUM('---', '11:00～13:00', '13:00～16:00', '16:00～18:00', '午前', '午後', '夕方', '何時でも可') NOT NULL, hope_time2 ENUM('---', '11:00～13:00', '13:00～16:00', '16:00～18:00', '午前', '午後', '夕方', '何時でも可'), hope_time3 ENUM('---', '11:00～13:00', '13:00～16:00', '16:00～18:00', '午前', '午後', '夕方', '何時でも可'), menu VARCHAR(100) NOT NULL, know ENUM('---', 'コスメデコルテHP', '知人・友達の紹介', '家族の紹介', '検索サイト(Yahoo/Google)', 'その他の検索サイト', '雑誌・フリーペーパー', '以前から知っていた', 'その他'), request VARCHAR(1000), reply ENUM('返信済', '未返信'), delete_flag TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX shop_id_idx (shop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE utf8_unicode_ci ENGINE = INNODB;
ALTER TABLE salon_reserve ADD CONSTRAINT salon_reserve_shop_id_salon_shop_id FOREIGN KEY (shop_id) REFERENCES salon_shop(id);
\. salon_reserve_modified.sql
update salon_reserve set shop_id=1;

insert into admin_user (user_name, password, credentials, shop_id, created_at, updated_at) values ('salon_staff02', sha1('salon02'), 'salonstaff', 2, now(), now());

/*
alter table salon_reserve modify column hope_time1 ENUM('---', '11:00～13:00', '13:00～16:00', '16:00～18:00', '午前', '午後', '夕方', '何時でも可') NOT NULL;
alter table salon_reserve modify column hope_time2 ENUM('---', '11:00～13:00', '13:00～16:00', '16:00～18:00', '午前', '午後', '夕方', '何時でも可');
alter table salon_reserve modify column hope_time3 ENUM('---', '11:00～13:00', '13:00～16:00', '16:00～18:00', '午前', '午後', '夕方', '何時でも可');
*/
