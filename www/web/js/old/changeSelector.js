var search_pulldowns = {
	"":{"name":"effect","options":[["","効果・効能から探す"],["moisture_care","保湿ケア"],["whitening_care","美白ケア"],["aging_care","エイジングケア"],["shiny_care","ツヤ／ハリケア"],["pores_care","毛穴ケア"],["stain_care","くすみケア"],["pimple_care","吹き出物／ニキビケア"],["sebum_care","皮脂ケア"],["eye_care","アイケア"],["tightening_care","引き締めケア"],["horny_care","角質ケア"],["puffy_care","むくみケア"],["uv_care","UVケア"],["sensitive_care","低刺激／敏感肌ケア"],["cover","カバー"],["natural","ナチュラル"],["mat","マット"],["shiny","ツヤ"],["lasting","ラスティング"],["uv_cut","UVカット"],["moisture","保湿"],["whitening","美白"],["translucent","透明感"],["lift_up","リフトアップ"],["control","コントロール"]]},
	
	"skincare":{"name":"effect","options":[["","効果・効能から探す"],["moisture_care","保湿ケア"],["whitening_care","美白ケア"],["aging_care","エイジングケア"],["shiny_care","ツヤ／ハリケア"],["pores_care","毛穴ケア"],["stain_care","くすみケア"],["pimple_care","吹き出物／ニキビケア"],["sebum_care","皮脂ケア"],["eye_care","アイケア"],["tightening_care","引き締めケア"],["horny_care","角質ケア"],["puffy_care","むくみケア"],["uv_care","UVケア"],["sensitive_care","低刺激／敏感肌ケア"]]},
	
	"basemake":{"name":"effect","options":[["","効果・効能から探す"],["cover","カバー"],["natural","ナチュラル"],["mat","マット"],["shiny","ツヤ"],["lasting","ラスティング"],["uv_cut","UVカット"],["moisture","保湿"],["whitening","美白"],["translucent","透明感"],["lift_up","リフトアップ"],["control","コントロール"]]},
	
	"pointmake":{"name":"sub_category","options":[["","効果・効能から探す"],["lip_color","リップカラー"],["eye_color","アイカラー"],["mascara","マスカラ"],["eye_liner","アイライナー"],["eye_brow","アイブロウ"],["face_color","フェイスカラー"],["nail_color","ネイルカラー"],["point_make_remover","リムーバー"]]},

	"hair_body":{"name":"sub_category","options":[["","効果・効能から探す"],["hair_care","ヘアケア"],["styling","スタイリング"],["scalp_care","頭皮ケア"],["body_care","ボディケア"],["hand_care","ハンドケア"]]},
	
	"fragrance":{"name":"sub_category","options":[["","効果・効能から探す"],["eau_de_toilette","オードトワレ"],["eau_de_parfum","パルファム"]]},
	
	"accessory":{"name":"sub_category","options":[["","効果・効能から探す"],["skincare_accessory","スキンケア用"],["basemake_accessory","ベースメイク用"],["pointmake_accessory","ポイントメイク用"],["other_accessory","その他化粧雑貨"]]}
};

function setSearchPullDown(targetid, changeid) {
	// 対象のプルダウンの値を取得する
	value = $('#' + targetid).val();

	// 変更プルダウンのアイテムを削除する
	$('#' + changeid).children().remove();

	// 配列から対象のプルダウンの名前を取得する
	changeName = search_pulldowns[value]['name'];
		
	// 配列から対象のプルダウンの配列を取得する
	changePulldown = search_pulldowns[value]['options'];
		
	// セレクトボックスのノードを取得する
	changeSellectNode = window.document.getElementById(changeid);

	// 配列を使ってプルダウンに値を設定する
	for (var i = 0; i < changePulldown.length; i++ ) {
		changeSellectNode.options[i] = new Option(changePulldown[i][1], changePulldown[i][0]);
	}
	changeSellectNode.name = changeName;
	changeSellectNode.selectedIndex = 0;
}
