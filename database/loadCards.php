<?php
	set_time_limit(0);
    ini_set('memory_limit', '1024M');
    header('Content-Type: text/html;charset=utf-8');

    echo "truncate table mtg_cards;";
    echo "truncate table mtg_colors;";
    echo "truncate table mtg_fname;";
    echo "truncate table mtg_legalities;";
    echo "truncate table mtg_printing;";
    echo "truncate table mtg_rulling;";
    echo "truncate table mtg_sets;";
    echo "truncate table mtg_subtypes;";
    echo "truncate table mtg_types;";

	$array = json_decode(file_get_contents('AllSets-x.json'));

	foreach($array as $key => $value){
		echo "insert into mtg_sets(code, type,name,release_date) values (\"$value->code\",\"$value->type\",\"$value->name\",\"$value->releaseDate\");<br>";

		foreach ($value->cards as $card_info) {
			if(isset($card_info->loyalty)){
				$loyalty = $card_info->loyalty;
			} else {
				$loyalty = "NULL";
			}

			if(isset($card_info->number)){
				$number = $card_info->number;
			} else {
				$number = "NULL";
			}

			if(isset($card_info->flavor)){
				$flavor = "\"$card_info->flavor\"";
			} else {
				$flavor = "NULL";
			}

			if(isset($card_info->power )){
				$power  = "\"$card_info->power\"";
			} else {
				$power  = "NULL";
			}

			if(isset($card_info->toughness )){
				$toughness  = "\"$card_info->toughness\"";
			} else {
				$toughness  = "NULL";
			}

			if(isset($card_info->manaCost )){
				$manaCost  = "\"$card_info->manaCost\"";
			} else {
				$manaCost  = "NULL";
			}

			if(isset($card_info->cmc )){
				$cmc  = $card_info->cmc;
			} else {
				$cmc  = "NULL";
			}
			 
			if(isset($card_info->text )){
				$text  = "\"$card_info->text\"";;
			} else {
				$text  = "NULL";
			}

			if(isset($card_info->originalText)){
				$originalText = "\"$card_info->originalText\"";;
			} else {
				$originalText = "NULL";
			}


			if (isset($card_info->colors))
				foreach ($card_info->colors as $key => $value) 
					echo "insert into mtg_colors (multiverseid, color) value ($card_info->multiverseid, \"$value\");<br>";

			if (isset($card_info->types))
				foreach ($card_info->types as $key => $value) 
					echo "insert into mtg_types (multiverseid, type) value ($card_info->multiverseid, \"$value\");<br>";
				
			if (isset($card_info->subtypes))
				foreach ($card_info->subtypes as $key => $value) 
					echo "insert into mtg_subtypes (multiverseid, subtype) value ($card_info->multiverseid, \"$value\");<br>";

			if(isset($card_info->rulings))
				foreach ($card_info->rulings as $key => $value) 	
					echo "insert into mtg_rulling (multiverseid,date,ruling) value ($card_info->multiverseid, \"$value->date\", \"$value->text\");<br>";
				
			if(isset($card_info->foreignNames))
				foreach ($card_info->foreignNames as $key => $value) 
					echo "insert into mtg_fname (multiverseid,lenguage,foreignName) value ($card_info->multiverseid, \"$value->language\",\"$value->name\");<br>";
				
			if(isset($card_info->printings))
				foreach ($card_info->printings as $key => $value) 
					echo "insert into mtg_printing (multiverseid,printing) value ($card_info->multiverseid, \"$value\");<br>";

			if(isset($card_info->legalities))
				foreach ($card_info->legalities as $key => $value) 
					echo "insert into mtg_legalities (multiverseid,legalities) value ($card_info->multiverseid, \"$value\");<br>";

			echo "insert into mtg_cards(multiverseid,layout,name,manaCost,cmc,type,rarity,text,flavor,artist,number,power,toughness,loyalty,originalText,originalType) values ($card_info->multiverseid, \"$card_info->layout\", \"$card_info->name\", $manaCost, $cmc, \"$card_info->type\", \"$card_info->rarity\", $text, $flavor, \"$card_info->artist\", $number, $power, $toughness, $loyalty, $originalText, \"$card_info->originalType\");";
		}	
	}