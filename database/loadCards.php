<?php
	set_time_limit(0);
    ini_set('memory_limit', '1024M');
    header('Content-Type: text/html;charset=utf-8');

	function sanear_string($string)
	{

	    $string = trim($string);

	    $string = str_replace(
	        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
	        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
	        $string
	    );

	    $string = str_replace(
	        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
	        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
	        $string
	    );

	    $string = str_replace(
	        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
	        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
	        $string
	    );

	    $string = str_replace(
	        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
	        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
	        $string
	    );

	    $string = str_replace(
	        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
	        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
	        $string
	    );

	    $string = str_replace(
	        array('ñ', 'Ñ', 'ç', 'Ç'),
	        array('n', 'N', 'c', 'C',),
	        $string
	    );

	    //Esta parte se encarga de eliminar cualquier caracter extraño
	    $string = str_replace(
	        array("\\", "¨", "º", "-", "~",
	             "#", "@", "|", "!", "\"",
	             "·", "$", "%", "&", "/",
	             "(", ")", "?", "'", "¡",
	             "¿", "[", "^", "`", "]",
	             "+", "}", "{", "¨", "´",
	             ">", "< ", ";", ",", ":",
	             ".", " "),
	        '',
	        $string
	    );


	    return strtoupper($string);
	}

	$mysqli = new mysqli("localhost", "root", "", "mtgtrade");

	/* comprobar la conexión */
	if ($mysqli->connect_errno) {
	    printf("Falló la conexión: %s\n", $mysqli->connect_error);
	    exit();
	}

	if (!$mysqli->set_charset("utf8")) {
	    printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
	} else {
	    printf("Conjunto de caracteres actual: %s\n", $mysqli->character_set_name());
	}

	$error = false;

	if(isset($_GET["drop"]) && $_GET["drop"] == true) {
	    if(!$mysqli->query("truncate table mtg_cards;")){
	    	echo $mysqli->error;
	    	$error=true;
	    }
	    if(!$mysqli->query("truncate table mtg_colors;")){
	    	echo $mysqli->error;
	    	$error=true;
	    }
	    if(!$mysqli->query("truncate table mtg_fname;")){
	    	echo $mysqli->error;
	    	$error=true;
	    }
	    if(!$mysqli->query("truncate table mtg_legalities;")){
	    	echo $mysqli->error;
	    	$error=true;
	    }
	    if(!$mysqli->query("truncate table mtg_printing;")){
	    	echo $mysqli->error;
	    	$error=true;
	    }
	    if(!$mysqli->query("truncate table mtg_rulling;")){
	    	echo $mysqli->error;
	    	$error=true;
	    }
	    if(!$mysqli->query("truncate table mtg_sets;")){
	    	echo $mysqli->error;
	    	$error=true;
	    }
	    if(!$mysqli->query("truncate table mtg_subtypes;")){
	    	echo $mysqli->error;
	    	$error=true;
	    }
	    if(!$mysqli->query("truncate table mtg_types;")){
	    	echo $mysqli->error;
	    	$error=true;
	    }
	
	    if($error)
	    	die("error dropeando");
	}

	$files = scandir("./FILES/");
	$files = array_diff($files,array("." , ".."));
	foreach ($files as $filename) {
		echo "Se va a procesar el archivo $filename<br>";
		$array = json_decode(file_get_contents("./FILES/$filename"));
		$contExp = 0;
			if(!$mysqli->query("insert into mtg_sets(code, type,name,release_date) values (\"$array->code\",\"$array->type\",\"$array->name\",\"$array->releaseDate\");")){
				echo $mysqli->error;
				$error=true;
			} else {
				$contExp++;
				echo "insert $array->name<br>$contExp<br>";
			}
			$contCard = 0;
			foreach ($array->cards as $card_info) {
				if(isset($card_info->loyalty)){
					$loyalty = $card_info->loyalty;
				} else {
					$loyalty = "NULL";
				}

				if(isset($card_info->number)){
					$number = "\"$card_info->number\"";
				} else {
					$number = "NULL";
				}

				if(isset($card_info->flavor)){
					$flavor = "\"" . str_replace("\"", "'", $card_info->flavor) . "\"";
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
					$text = "\"" . str_replace("\"", "'", $card_info->text) . "\"";
				} else {
					$text  = "NULL";
				}

				if(isset($card_info->originalText)){
					$originalText = "\"" . str_replace("\"", "'", $card_info->originalText) . "\"";
				} else {
					$originalText = "NULL";
				}


				if (isset($card_info->colors))
					foreach ($card_info->colors as $key => $value) 
						if(!$mysqli->query("insert into mtg_colors (multiverseid, color) value ($card_info->multiverseid, \"$value\");")){
							echo $mysqli->error;
							$error=true;
						}

				if (isset($card_info->types))
					foreach ($card_info->types as $key => $value) 
						if(!$mysqli->query("insert into mtg_types (multiverseid, type) value ($card_info->multiverseid, \"$value\");")){
							echo $mysqli->error;
							$error=true;
						}
					
				if (isset($card_info->subtypes))
					foreach ($card_info->subtypes as $key => $value) 
						if(!$mysqli->query("insert into mtg_subtypes (multiverseid, subtype) value ($card_info->multiverseid, \"$value\");")){
							echo $mysqli->error;
							$error=true;
						}

				if(isset($card_info->rulings))
					foreach ($card_info->rulings as $key => $value) {
						$rulingtext = $value->text;
						$rulingtext = str_replace( "\"" , "'",$rulingtext);
						if(!$mysqli->query("insert into mtg_rulling (multiverseid,date,ruling) value ($card_info->multiverseid, \"$value->date\", \"$rulingtext\");")){
							echo $mysqli->error;
							$error=true;
						}
					}
					
				if(isset($card_info->foreignNames))
					foreach ($card_info->foreignNames as $key => $value) 
						if(!$mysqli->query("insert into mtg_fname (multiverseid,lenguage,foreignName) value ($card_info->multiverseid, \"$value->language\",\"$value->name\");")){
							echo $mysqli->error;
							$error=true;
						}
					
				if(isset($card_info->printings))
					foreach ($card_info->printings as $key => $value) 
						$print = str_replace( "\"" , "'",$value);
						if(!$mysqli->query("insert into mtg_printing (multiverseid,printing) value ($card_info->multiverseid, \"$print\");")){
							echo $mysqli->error;
							$error=true;
						}

				if(isset($card_info->legalities))
					foreach ($card_info->legalities as $key => $value) 
						if(!$mysqli->query("insert into mtg_legalities (multiverseid,legalities) value ($card_info->multiverseid, \"$value\");")){
							echo $mysqli->error;
							$error=true;
						}

				$searchfield = sanear_string($card_info->name);				
				if(!$mysqli->query("insert into mtg_cards(multiverseid,layout,name,manaCost,cmc,type,rarity,text,flavor,artist,number,power,toughness,loyalty,originalText,originalType,searchfield,expancion) values ($card_info->multiverseid, \"$card_info->layout\", \"$card_info->name\", $manaCost, $cmc, \"$card_info->type\", \"$card_info->rarity\", $text, $flavor, \"$card_info->artist\", $number, $power, $toughness, $loyalty, $originalText, \"$card_info->originalType\", \"$searchfield\" , \"$array->code\");")){
					echo $mysqli->error;
					$error=true;
				}
				$contCard++;
				echo $contCard . "<br>";
			}

		if($error) {
				die("error $card_info->multiverseid<br>");
			} else {
				if (!$mysqli->commit()) {
				    echo "Falló el commit<br>";
				    exit();
				} 
			}

	}

	$mysqli->close();