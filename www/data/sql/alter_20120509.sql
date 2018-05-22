alter table line add search_index text after slug;

update line set search_index='AQMW' where slug='aq_mw';
update line set search_index='ミリオリティー MELIORITY MERIORITY MERIOLITY' where slug='aq_meliority';
update line set search_index='バイタルサイエンス サイエンスプレミアム VS VSP VITAL SCIENCE SCIENSE SIENCE SIENSE PREMIUM PLEMIUM PLEMIAM PREMIAM' where slug='vital_science';
update line set search_index='ホワイトサイエンスプレミアム サイエンスプレミアム SCIENCE SCIENSE SIENCE SIENSE PREMIUM PLEMIUM PLEMIAM PREMIAM WS WSP' where slug='white_science';
update line set search_index='FUTURE SCIENCE SCIENSE SIENCE SIENSE FS' where slug='future_science';
update line set search_index='モイスチャー モイスチャ モイスチャーリポソーム モイスチャリポソーム MOISTURE LIPOSOME RIPOSOME' where slug='moisture_liposome';
update line set search_index='WHITE LOGIST ROGIST LOJIST ROJIST' where slug='whitelogist';
update line set search_index='ヴィタドレーブ ヴィタドレープ ドレープ VITA DE REVE' where slug='vita_de_reve';
update line set search_index='CYCLIC CYCLIK CYCLICK CYCRIC CYCRIK CYCRICK CYCLICKEY CYCLIKKEY CYCLICKKEY CYCRICKEY CYCRIKKEY CYCRICKKEY CYCLIC-KEY CYCLIK-KEY CYCLICK-KEY CYCRIC-KEY CYCRIK-KEY CYCRICK-KEY サイクリッキー サイクリッキィ' where slug='cyclic_key';
update line set search_index='LACOUTURE LACUTURE LACUTUR RACOUTURE RACUTURE RACUTUR' where slug='lacouture';
update line set search_index='ETERNIA' where slug='eternia';
update line set search_index='マキーエクスペール マキーエキスペール マキーエクスペル マキーエキスペル MAQUI MAQUEE MAQUIEXPERT MAQUEEEXPERT' where slug='maquiexpert';
update line set search_index='MAGIE MAGEE MAGY MAGIEDECO MAGEEDECO MAGYDECO DECO' where slug='magie_deco';
update line set search_index='ドゥラヴィ ドゥラビ ドゥラ ラヴィ ラビ DE DU LA VIE DELAVIE DELAVI' where slug='de_la_vie';
update line set search_index='バイスアンドバーチュ バイスアンドバーチュー ヴァイスアンドバーチュ ヴァイスアンドバーチュー バイス・アンド・バーチュ バイス・アンド・バーチュー ヴァイス・アンド・バーチュ ヴァイス・アンド・バーチュー バイス・バーチュ バイス・バーチュー ヴァイス・バーチュ ヴァイス・バーチュー バイスバーチュ バイスバーチュー ヴァイスバーチュ ヴァイスバーチュー ヴァイス バーチュー VICE VIRTURE AND マルセル マルセルワンダース ワンダーズ マルセルワンダーズ マルセルワンダー ワンダー マルセル マルセルワンダース マルセルワンダーズ ワンダース ワンダーズ バイスアンドバーチュ バイス アンド バーチュ バイスアンドバーチェ バイス アンド バーチェ アンド バーチェ オードパルファン' where slug='vice_virtue';
