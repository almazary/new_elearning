<?php

class com_wiris_util_xml_WCharacterBase {
	public function __construct(){}
	static $NEGATIVE_THIN_SPACE = 57344;
	static $ROOT = 61696;
	static $ROOT_VERTICAL = 61727;
	static $ROOT_NO_TAIL = 61728;
	static $ROOT_NO_TAIL_VERTICAL = 61759;
	static $ROOT_LEFT_TAIL = 61760;
	static $ROOT_VERTICAL_LINE = 61761;
	static $ROUND_BRACKET_LEFT = 40;
	static $ROUND_BRACKET_RIGHT = 41;
	static $COMMA = 44;
	static $FULL_STOP = 46;
	static $SQUARE_BRACKET_LEFT = 91;
	static $SQUARE_BRACKET_RIGHT = 93;
	static $CIRCUMFLEX_ACCENT = 94;
	static $LOW_LINE = 95;
	static $CURLY_BRACKET_LEFT = 123;
	static $VERTICAL_BAR = 124;
	static $CURLY_BRACKET_RIGHT = 125;
	static $TILDE = 126;
	static $MACRON = 175;
	static $COMBINING_LOW_LINE = 818;
	static $MODIFIER_LETTER_CIRCUMFLEX_ACCENT = 710;
	static $CARON = 711;
	static $EN_QUAD = 8192;
	static $EM_QUAD = 8193;
	static $EN_SPACE = 8194;
	static $EM_SPACE = 8195;
	static $THICK_SPACE = 8196;
	static $MID_SPACE = 8197;
	static $SIX_PER_EM_SPACE = 8198;
	static $FIGIRE_SPACE = 8199;
	static $PUNCTUATION_SPACE = 8200;
	static $THIN_SPACE = 8201;
	static $HAIR_SPACE = 8202;
	static $ZERO_WIDTH_SPACE = 8203;
	static $ZERO_WIDTH_NON_JOINER = 8204;
	static $ZERO_WIDTH_JOINER = 8205;
	static $DOUBLE_VERTICAL_BAR = 8214;
	static $DOUBLE_HORIZONTAL_BAR = 9552;
	static $NARROW_NO_BREAK_SPACE = 8239;
	static $MEDIUM_MATHEMATICAL_SPACE = 8287;
	static $WORD_JOINER = 8288;
	static $PLANCKOVER2PI = 8463;
	static $LEFTWARDS_ARROW = 8592;
	static $UPWARDS_ARROW = 8593;
	static $RIGHTWARDS_ARROW = 8594;
	static $DOWNWARDS_ARROW = 8595;
	static $LEFTRIGHT_ARROW = 8596;
	static $UP_DOWN_ARROW = 8597;
	static $LEFTWARDS_ARROW_FROM_BAR = 8612;
	static $RIGHTWARDS_ARROW_FROM_BAR = 8614;
	static $LEFTWARDS_ARROW_WITH_HOOK = 8617;
	static $RIGHTWARDS_ARROW_WITH_HOOK = 8618;
	static $LEFTWARDS_HARPOON_WITH_BARB_UPWARDS = 8636;
	static $RIGHTWARDS_HARPOON_WITH_BARB_UPWARDS = 8640;
	static $LEFTWARDS_DOUBLE_ARROW = 8656;
	static $RIGHTWARDS_DOUBLE_ARROW = 8658;
	static $LEFT_RIGHT_DOUBLE_ARROW = 8660;
	static $LEFTWARDS_ARROW_OVER_RIGHTWARDS_ARROW = 8646;
	static $RIGHTWARDS_ARROW_OVER_LEFTWARDS_ARROW = 8644;
	static $LEFTWARDS_HARPOON_OVER_RIGHTWARDS_HARPOON = 8651;
	static $RIGHTWARDS_HARPOON_OVER_LEFTWARDS_HARPOON = 8652;
	static $RIGHTWARDS_ARROW_ABOVE_SHORT_LEFTWARDS_ARROW = 10562;
	static $SHORT_RIGHTWARDS_ARROW_ABOVE_LEFTWARDS_ARROW = 10564;
	static $LONG_RIGHTWARDS_ARROW = 10230;
	static $LONG_LEFTWARDS_ARROW = 10229;
	static $LONG_LEFT_RIGHT_ARROW = 10231;
	static $LONG_LEFTWARDS_DOUBLE_ARROW = 10232;
	static $LONG_RIGHTWARDS_DOUBLE_ARROW = 10233;
	static $LONG_LEFT_RIGHT_DOUBLE_ARROW = 10234;
	static $TILDE_OPERATOR = 8764;
	static $LEFT_CEILING = 8968;
	static $RIGHT_CEILING = 8969;
	static $LEFT_FLOOR = 8970;
	static $RIGHT_FLOOR = 8971;
	static $TOP_PARENTHESIS = 9180;
	static $BOTTOM_PARENTHESIS = 9181;
	static $TOP_SQUARE_BRACKET = 9140;
	static $BOTTOM_SQUARE_BRACKET = 9141;
	static $TOP_CURLY_BRACKET = 9182;
	static $BOTTOM_CURLY_BRACKET = 9183;
	static $MATHEMATICAL_LEFT_ANGLE_BRACKET = 10216;
	static $MATHEMATICAL_RIGHT_ANGLE_BRACKET = 10217;
	static $DOUBLE_STRUCK_ITALIC_CAPITAL_D = 8517;
	static $DOUBLE_STRUCK_ITALIC_SMALL_D = 8518;
	static $DOUBLE_STRUCK_ITALIC_SMALL_E = 8519;
	static $DOUBLE_STRUCK_ITALIC_SMALL_I = 8520;
	static $EPSILON = 949;
	static $VAREPSILON = 1013;
	static function isDigit($c) {
		if(48 <= $c && $c <= 57) {
			return true;
		}
		if(1632 <= $c && $c <= 1641) {
			return true;
		}
		if(1776 <= $c && $c <= 1785) {
			return true;
		}
		if(2790 <= $c && $c <= 2799) {
			return true;
		}
		return false;
	}
	static function isIdentifier($c) {
		return com_wiris_util_xml_WCharacterBase::isLetter($c) || $c === 95;
	}
	static function isLarge($c) {
		return com_wiris_util_xml_WCharacterBase::binarySearch(com_wiris_util_xml_WCharacterBase::$largeOps, $c);
	}
	static function isVeryLarge($c) {
		return com_wiris_util_xml_WCharacterBase::binarySearch(com_wiris_util_xml_WCharacterBase::$veryLargeOps, $c);
	}
	static function isBinaryOp($c) {
		return com_wiris_util_xml_WCharacterBase::binarySearch(com_wiris_util_xml_WCharacterBase::$binaryOps, $c);
	}
	static function isRelation($c) {
		return com_wiris_util_xml_WCharacterBase::binarySearch(com_wiris_util_xml_WCharacterBase::$relations, $c);
	}
	static function binarySearch($v, $c) {
		$min = 0;
		$max = $v->length - 1;
		do {
			$mid = Math::floor(($min + $max) / 2);
			$cc = $v[$mid];
			if($c === $cc) {
				return true;
			} else {
				if($c < $cc) {
					$max = $mid - 1;
				} else {
					$min = $mid + 1;
				}
			}
			unset($mid,$cc);
		} while($min <= $max);
		return false;
	}
	static $binaryOps;
	static $relations;
	static $largeOps;
	static $veryLargeOps;
	static $tallLetters;
	static $longLetters;
	static $negations;
	static $mirrorDictionary;
	static $horizontalLTRStretchyChars;
	static $tallAccents;
	static $PUNCTUATION_CATEGORY = "P";
	static $OTHER_CATEGORY = "C";
	static $LETTER_CATEGORY = "L";
	static $MARK_CATEGORY = "M";
	static $NUMBER_CATEGORY = "N";
	static $SYMBOL_CATEGORY = "S";
	static $SEPARATOR_CATEGORY = "Z";
	static $UNICODES_WITH_CATEGORIES = "@P:21-23,25-2A,2C-2F,3A-3B,3F-40,5B-5D,5F,7B,7D,A1,A7,AB,B6-B7,BB,BF,37E,387,55A-55F,589-58A,5BE,5C0,5C3,5C6,5F3-5F4,609-60A,60C-60D,61B,61E-61F,66A-66D,6D4,700-70D,7F7-7F9,830-83E,85E,964-965,970,AF0,DF4,E4F,E5A-E5B,F04-F12,F14,F3A-F3D,F85,FD0-FD4,FD9-FDA,104A-104F,10FB,1360-1368,1400,166D-166E,169B-169C,16EB-16ED,1735-1736,17D4-17D6,17D8-17DA,1800-180A,1944-1945,1A1E-1A1F,1AA0-1AA6,1AA8-1AAD,1B5A-1B60,1BFC-1BFF,1C3B-1C3F,1C7E-1C7F,1CC0-1CC7,1CD3,2010-2027,2030-2043,2045-2051,2053-205E,207D-207E,208D-208E,2308-230B,2329-232A,2768-2775,27C5-27C6,27E6-27EF,2983-2998,29D8-29DB,29FC-29FD,2CF9-2CFC,2CFE-2CFF,2D70,2E00-2E2E,2E30-2E44,3001-3003,3008-3011,3014-301F,3030,303D,30A0,30FB,A4FE-A4FF,A60D-A60F,A673,A67E,A6F2-A6F7,A874-A877,A8CE-A8CF,A8F8-A8FA,A8FC,A92E-A92F,A95F,A9C1-A9CD,A9DE-A9DF,AA5C-AA5F,AADE-AADF,AAF0-AAF1,ABEB,FD3E-FD3F,FE10-FE19,FE30-FE52,FE54-FE61,FE63,FE68,FE6A-FE6B,FF01-FF03,FF05-FF0A,FF0C-FF0F,FF1A-FF1B,FF1F-FF20,FF3B-FF3D,FF3F,FF5B,FF5D,FF5F-FF65,10100-10102,1039F,103D0,1056F,10857,1091F,1093F,10A50-10A58,10A7F,10AF0-10AF6,10B39-10B3F,10B99-10B9C,11047-1104D,110BB-110BC,110BE-110C1,11140-11143,11174-11175,111C5-111C9,111CD,111DB,111DD-111DF,11238-1123D,112A9,1144B-1144F,1145B,1145D,114C6,115C1-115D7,11641-11643,11660-1166C,1173C-1173E,11C41-11C45,11C70-11C71,12470-12474,16A6E-16A6F,16AF5,16B37-16B3B,16B44,1BC9F,1DA87-1DA8B,1E95E-1E95F@C:AD,600-605,61C,6DD,70F,8E2,180E,200B-200F,202A-202E,2060-2064,2066-206F,D800,DB7F-DB80,DBFF-DC00,DFFF-E000,F8FF,FEFF,FFF9-FFFB,110BD,1BCA0-1BCA3,1D173-1D17A@L:41-5A,61-7A,AA,B5,BA,C0-D6,D8-F6,F8-2C1,2C6-2D1,2E0-2E4,2EC,2EE,370-374,376-377,37A-37D,37F,386,388-38A,38C,38E-3A1,3A3-3F5,3F7-481,48A-52F,531-556,559,561-587,5D0-5EA,5F0-5F2,620-64A,66E-66F,671-6D3,6D5,6E5-6E6,6EE-6EF,6FA-6FC,6FF,710,712-72F,74D-7A5,7B1,7CA-7EA,7F4-7F5,7FA,800-815,81A,824,828,840-858,8A0-8B4,8B6-8BD,904-939,93D,950,958-961,971-980,985-98C,98F-990,993-9A8,9AA-9B0,9B2,9B6-9B9,9BD,9CE,9DC-9DD,9DF-9E1,9F0-9F1,A05-A0A,A0F-A10,A13-A28,A2A-A30,A32-A33,A35-A36,A38-A39,A59-A5C,A5E,A72-A74,A85-A8D,A8F-A91,A93-AA8,AAA-AB0,AB2-AB3,AB5-AB9,ABD,AD0,AE0-AE1,AF9,B05-B0C,B0F-B10,B13-B28,B2A-B30,B32-B33,B35-B39,B3D,B5C-B5D,B5F-B61,B71,B83,B85-B8A,B8E-B90,B92-B95,B99-B9A,B9C,B9E-B9F,BA3-BA4,BA8-BAA,BAE-BB9,BD0,C05-C0C,C0E-C10,C12-C28,C2A-C39,C3D,C58-C5A,C60-C61,C80,C85-C8C,C8E-C90,C92-CA8,CAA-CB3,CB5-CB9,CBD,CDE,CE0-CE1,CF1-CF2,D05-D0C,D0E-D10,D12-D3A,D3D,D4E,D54-D56,D5F-D61,D7A-D7F,D85-D96,D9A-DB1,DB3-DBB,DBD,DC0-DC6,E01-E30,E32-E33,E40-E46,E81-E82,E84,E87-E88,E8A,E8D,E94-E97,E99-E9F,EA1-EA3,EA5,EA7,EAA-EAB,EAD-EB0,EB2-EB3,EBD,EC0-EC4,EC6,EDC-EDF,F00,F40-F47,F49-F6C,F88-F8C,1000-102A,103F,1050-1055,105A-105D,1061,1065-1066,106E-1070,1075-1081,108E,10A0-10C5,10C7,10CD,10D0-10FA,10FC-1248,124A-124D,1250-1256,1258,125A-125D,1260-1288,128A-128D,1290-12B0,12B2-12B5,12B8-12BE,12C0,12C2-12C5,12C8-12D6,12D8-1310,1312-1315,1318-135A,1380-138F,13A0-13F5,13F8-13FD,1401-166C,166F-167F,1681-169A,16A0-16EA,16F1-16F8,1700-170C,170E-1711,1720-1731,1740-1751,1760-176C,176E-1770,1780-17B3,17D7,17DC,1820-1877,1880-1884,1887-18A8,18AA,18B0-18F5,1900-191E,1950-196D,1970-1974,1980-19AB,19B0-19C9,1A00-1A16,1A20-1A54,1AA7,1B05-1B33,1B45-1B4B,1B83-1BA0,1BAE-1BAF,1BBA-1BE5,1C00-1C23,1C4D-1C4F,1C5A-1C7D,1C80-1C88,1CE9-1CEC,1CEE-1CF1,1CF5-1CF6,1D00-1DBF,1E00-1F15,1F18-1F1D,1F20-1F45,1F48-1F4D,1F50-1F57,1F59,1F5B,1F5D,1F5F-1F7D,1F80-1FB4,1FB6-1FBC,1FBE,1FC2-1FC4,1FC6-1FCC,1FD0-1FD3,1FD6-1FDB,1FE0-1FEC,1FF2-1FF4,1FF6-1FFC,2071,207F,2090-209C,2102,2107,210A-2113,2115,2119-211D,2124,2126,2128,212A-212D,212F-2139,213C-213F,2145-2149,214E,2183-2184,2C00-2C2E,2C30-2C5E,2C60-2CE4,2CEB-2CEE,2CF2-2CF3,2D00-2D25,2D27,2D2D,2D30-2D67,2D6F,2D80-2D96,2DA0-2DA6,2DA8-2DAE,2DB0-2DB6,2DB8-2DBE,2DC0-2DC6,2DC8-2DCE,2DD0-2DD6,2DD8-2DDE,2E2F,3005-3006,3031-3035,303B-303C,3041-3096,309D-309F,30A1-30FA,30FC-30FF,3105-312D,3131-318E,31A0-31BA,31F0-31FF,3400,4DB5,4E00,9FD5,A000-A48C,A4D0-A4FD,A500-A60C,A610-A61F,A62A-A62B,A640-A66E,A67F-A69D,A6A0-A6E5,A717-A71F,A722-A788,A78B-A7AE,A7B0-A7B7,A7F7-A801,A803-A805,A807-A80A,A80C-A822,A840-A873,A882-A8B3,A8F2-A8F7,A8FB,A8FD,A90A-A925,A930-A946,A960-A97C,A984-A9B2,A9CF,A9E0-A9E4,A9E6-A9EF,A9FA-A9FE,AA00-AA28,AA40-AA42,AA44-AA4B,AA60-AA76,AA7A,AA7E-AAAF,AAB1,AAB5-AAB6,AAB9-AABD,AAC0,AAC2,AADB-AADD,AAE0-AAEA,AAF2-AAF4,AB01-AB06,AB09-AB0E,AB11-AB16,AB20-AB26,AB28-AB2E,AB30-AB5A,AB5C-AB65,AB70-ABE2,AC00,D7A3,D7B0-D7C6,D7CB-D7FB,F900-FA6D,FA70-FAD9,FB00-FB06,FB13-FB17,FB1D,FB1F-FB28,FB2A-FB36,FB38-FB3C,FB3E,FB40-FB41,FB43-FB44,FB46-FBB1,FBD3-FD3D,FD50-FD8F,FD92-FDC7,FDF0-FDFB,FE70-FE74,FE76-FEFC,FF21-FF3A,FF41-FF5A,FF66-FFBE,FFC2-FFC7,FFCA-FFCF,FFD2-FFD7,FFDA-FFDC,10000-1000B,1000D-10026,10028-1003A,1003C-1003D,1003F-1004D,10050-1005D,10080-100FA,10280-1029C,102A0-102D0,10300-1031F,10330-10340,10342-10349,10350-10375,10380-1039D,103A0-103C3,103C8-103CF,10400-1049D,104B0-104D3,104D8-104FB,10500-10527,10530-10563,10600-10736,10740-10755,10760-10767,10800-10805,10808,1080A-10835,10837-10838,1083C,1083F-10855,10860-10876,10880-1089E,108E0-108F2,108F4-108F5,10900-10915,10920-10939,10980-109B7,109BE-109BF,10A00,10A10-10A13,10A15-10A17,10A19-10A33,10A60-10A7C,10A80-10A9C,10AC0-10AC7,10AC9-10AE4,10B00-10B35,10B40-10B55,10B60-10B72,10B80-10B91,10C00-10C48,10C80-10CB2,10CC0-10CF2,11003-11037,11083-110AF,110D0-110E8,11103-11126,11150-11172,11176,11183-111B2,111C1-111C4,111DA,111DC,11200-11211,11213-1122B,11280-11286,11288,1128A-1128D,1128F-1129D,1129F-112A8,112B0-112DE,11305-1130C,1130F-11310,11313-11328,1132A-11330,11332-11333,11335-11339,1133D,11350,1135D-11361,11400-11434,11447-1144A,11480-114AF,114C4-114C5,114C7,11580-115AE,115D8-115DB,11600-1162F,11644,11680-116AA,11700-11719,118A0-118DF,118FF,11AC0-11AF8,11C00-11C08,11C0A-11C2E,11C40,11C72-11C8F,12000-12399,12480-12543,13000-1342E,14400-14646,16800-16A38,16A40-16A5E,16AD0-16AED,16B00-16B2F,16B40-16B43,16B63-16B77,16B7D-16B8F,16F00-16F44,16F50,16F93-16F9F,16FE0,17000,187EC,18800-18AF2,1B000-1B001,1BC00-1BC6A,1BC70-1BC7C,1BC80-1BC88,1BC90-1BC99,1D400-1D454,1D456-1D49C,1D49E-1D49F,1D4A2,1D4A5-1D4A6,1D4A9-1D4AC,1D4AE-1D4B9,1D4BB,1D4BD-1D4C3,1D4C5-1D505,1D507-1D50A,1D50D-1D514,1D516-1D51C,1D51E-1D539,1D53B-1D53E,1D540-1D544,1D546,1D54A-1D550,1D552-1D6A5,1D6A8-1D6C0,1D6C2-1D6DA,1D6DC-1D6FA,1D6FC-1D714,1D716-1D734,1D736-1D74E,1D750-1D76E,1D770-1D788,1D78A-1D7A8,1D7AA-1D7C2,1D7C4-1D7CB,1E800-1E8C4,1E900-1E943,1EE00-1EE03,1EE05-1EE1F,1EE21-1EE22,1EE24,1EE27,1EE29-1EE32,1EE34-1EE37,1EE39,1EE3B,1EE42,1EE47,1EE49,1EE4B,1EE4D-1EE4F,1EE51-1EE52,1EE54,1EE57,1EE59,1EE5B,1EE5D,1EE5F,1EE61-1EE62,1EE64,1EE67-1EE6A,1EE6C-1EE72,1EE74-1EE77,1EE79-1EE7C,1EE7E,1EE80-1EE89,1EE8B-1EE9B,1EEA1-1EEA3,1EEA5-1EEA9,1EEAB-1EEBB,20000,2A6D6,2A700,2B734,2B740,2B81D,2B820,2CEA1,2F800-2FA1D@M:300-36F,483-489,591-5BD,5BF,5C1-5C2,5C4-5C5,5C7,610-61A,64B-65F,670,6D6-6DC,6DF-6E4,6E7-6E8,6EA-6ED,711,730-74A,7A6-7B0,7EB-7F3,816-819,81B-823,825-827,829-82D,859-85B,8D4-8E1,8E3-903,93A-93C,93E-94F,951-957,962-963,981-983,9BC,9BE-9C4,9C7-9C8,9CB-9CD,9D7,9E2-9E3,A01-A03,A3C,A3E-A42,A47-A48,A4B-A4D,A51,A70-A71,A75,A81-A83,ABC,ABE-AC5,AC7-AC9,ACB-ACD,AE2-AE3,B01-B03,B3C,B3E-B44,B47-B48,B4B-B4D,B56-B57,B62-B63,B82,BBE-BC2,BC6-BC8,BCA-BCD,BD7,C00-C03,C3E-C44,C46-C48,C4A-C4D,C55-C56,C62-C63,C81-C83,CBC,CBE-CC4,CC6-CC8,CCA-CCD,CD5-CD6,CE2-CE3,D01-D03,D3E-D44,D46-D48,D4A-D4D,D57,D62-D63,D82-D83,DCA,DCF-DD4,DD6,DD8-DDF,DF2-DF3,E31,E34-E3A,E47-E4E,EB1,EB4-EB9,EBB-EBC,EC8-ECD,F18-F19,F35,F37,F39,F3E-F3F,F71-F84,F86-F87,F8D-F97,F99-FBC,FC6,102B-103E,1056-1059,105E-1060,1062-1064,1067-106D,1071-1074,1082-108D,108F,109A-109D,135D-135F,1712-1714,1732-1734,1752-1753,1772-1773,17B4-17D3,17DD,1885-1886,18A9,1920-192B,1930-193B,1A17-1A1B,1A55-1A5E,1A60-1A7C,1A7F,1AB0-1ABE,1B00-1B04,1B34-1B44,1B6B-1B73,1B80-1B82,1BA1-1BAD,1BE6-1BF3,1C24-1C37,1CD0-1CD2,1CD4-1CE8,1CED,1CF2-1CF4,1CF8-1CF9,1DC0-1DF5,1DFB-1DFF,20D0-20F0,2CEF-2CF1,2D7F,2DE0-2DFF,302A-302F,3099-309A,A66F-A672,A674-A67D,A69E-A69F,A6F0-A6F1,A802,A806,A80B,A823-A827,A880-A881,A8B4-A8C5,A8E0-A8F1,A926-A92D,A947-A953,A980-A983,A9B3-A9C0,A9E5,AA29-AA36,AA43,AA4C-AA4D,AA7B-AA7D,AAB0,AAB2-AAB4,AAB7-AAB8,AABE-AABF,AAC1,AAEB-AAEF,AAF5-AAF6,ABE3-ABEA,ABEC-ABED,FB1E,FE20-FE2F,101FD,102E0,10376-1037A,10A01-10A03,10A05-10A06,10A0C-10A0F,10A38-10A3A,10A3F,10AE5-10AE6,11000-11002,11038-11046,1107F-11082,110B0-110BA,11100-11102,11127-11134,11173,11180-11182,111B3-111C0,111CA-111CC,1122C-11237,1123E,112DF-112EA,11300-11303,1133C,1133E-11344,11347-11348,1134B-1134D,11357,11362-11363,11366-1136C,11370-11374,11435-11446,114B0-114C3,115AF-115B5,115B8-115C0,115DC-115DD,11630-11640,116AB-116B7,1171D-1172B,11C2F-11C36,11C38-11C3F,11C92-11CA7,11CA9-11CB6,16AF0-16AF4,16B30-16B36,16F51-16F7E,16F8F-16F92,1BC9D-1BC9E,1D165-1D169,1D16D-1D172,1D17B-1D182,1D185-1D18B,1D1AA-1D1AD,1D242-1D244,1DA00-1DA36,1DA3B-1DA6C,1DA75,1DA84,1DA9B-1DA9F,1DAA1-1DAAF,1E000-1E006,1E008-1E018,1E01B-1E021,1E023-1E024,1E026-1E02A,1E8D0-1E8D6,1E944-1E94A@N:30-39,B2-B3,B9,BC-BE,660-669,6F0-6F9,7C0-7C9,966-96F,9E6-9EF,9F4-9F9,A66-A6F,AE6-AEF,B66-B6F,B72-B77,BE6-BF2,C66-C6F,C78-C7E,CE6-CEF,D58-D5E,D66-D78,DE6-DEF,E50-E59,ED0-ED9,F20-F33,1040-1049,1090-1099,1369-137C,16EE-16F0,17E0-17E9,17F0-17F9,1810-1819,1946-194F,19D0-19DA,1A80-1A89,1A90-1A99,1B50-1B59,1BB0-1BB9,1C40-1C49,1C50-1C59,2070,2074-2079,2080-2089,2150-2182,2185-2189,2460-249B,24EA-24FF,2776-2793,2CFD,3007,3021-3029,3038-303A,3192-3195,3220-3229,3248-324F,3251-325F,3280-3289,32B1-32BF,A620-A629,A6E6-A6EF,A830-A835,A8D0-A8D9,A900-A909,A9D0-A9D9,A9F0-A9F9,AA50-AA59,ABF0-ABF9,FF10-FF19,10107-10133,10140-10178,1018A-1018B,102E1-102FB,10320-10323,10341,1034A,103D1-103D5,104A0-104A9,10858-1085F,10879-1087F,108A7-108AF,108FB-108FF,10916-1091B,109BC-109BD,109C0-109CF,109D2-109FF,10A40-10A47,10A7D-10A7E,10A9D-10A9F,10AEB-10AEF,10B58-10B5F,10B78-10B7F,10BA9-10BAF,10CFA-10CFF,10E60-10E7E,11052-1106F,110F0-110F9,11136-1113F,111D0-111D9,111E1-111F4,112F0-112F9,11450-11459,114D0-114D9,11650-11659,116C0-116C9,11730-1173B,118E0-118F2,11C50-11C6C,12400-1246E,16A60-16A69,16B50-16B59,16B5B-16B61,1D360-1D371,1D7CE-1D7FF,1E8C7-1E8CF,1E950-1E959,1F100-1F10C@S:24,2B,3C-3E,5E,60,7C,7E,A2-A6,A8-A9,AC,AE-B1,B4,B8,D7,F7,2C2-2C5,2D2-2DF,2E5-2EB,2ED,2EF-2FF,375,384-385,3F6,482,58D-58F,606-608,60B,60E-60F,6DE,6E9,6FD-6FE,7F6,9F2-9F3,9FA-9FB,AF1,B70,BF3-BFA,C7F,D4F,D79,E3F,F01-F03,F13,F15-F17,F1A-F1F,F34,F36,F38,FBE-FC5,FC7-FCC,FCE-FCF,FD5-FD8,109E-109F,1390-1399,17DB,1940,19DE-19FF,1B61-1B6A,1B74-1B7C,1FBD,1FBF-1FC1,1FCD-1FCF,1FDD-1FDF,1FED-1FEF,1FFD-1FFE,2044,2052,207A-207C,208A-208C,20A0-20BE,2100-2101,2103-2106,2108-2109,2114,2116-2118,211E-2123,2125,2127,2129,212E,213A-213B,2140-2144,214A-214D,214F,218A-218B,2190-2307,230C-2328,232B-23FE,2400-2426,2440-244A,249C-24E9,2500-2767,2794-27C4,27C7-27E5,27F0-2982,2999-29D7,29DC-29FB,29FE-2B73,2B76-2B95,2B98-2BB9,2BBD-2BC8,2BCA-2BD1,2BEC-2BEF,2CE5-2CEA,2E80-2E99,2E9B-2EF3,2F00-2FD5,2FF0-2FFB,3004,3012-3013,3020,3036-3037,303E-303F,309B-309C,3190-3191,3196-319F,31C0-31E3,3200-321E,322A-3247,3250,3260-327F,328A-32B0,32C0-32FE,3300-33FF,4DC0-4DFF,A490-A4C6,A700-A716,A720-A721,A789-A78A,A828-A82B,A836-A839,AA77-AA79,AB5B,FB29,FBB2-FBC1,FDFC-FDFD,FE62,FE64-FE66,FE69,FF04,FF0B,FF1C-FF1E,FF3E,FF40,FF5C,FF5E,FFE0-FFE6,FFE8-FFEE,FFFC-FFFD,10137-1013F,10179-10189,1018C-1018E,10190-1019B,101A0,101D0-101FC,10877-10878,10AC8,1173F,16B3C-16B3F,16B45,1BC9C,1D000-1D0F5,1D100-1D126,1D129-1D164,1D16A-1D16C,1D183-1D184,1D18C-1D1A9,1D1AE-1D1E8,1D200-1D241,1D245,1D300-1D356,1D6C1,1D6DB,1D6FB,1D715,1D735,1D74F,1D76F,1D789,1D7A9,1D7C3,1D800-1D9FF,1DA37-1DA3A,1DA6D-1DA74,1DA76-1DA83,1DA85-1DA86,1EEF0-1EEF1,1F000-1F02B,1F030-1F093,1F0A0-1F0AE,1F0B1-1F0BF,1F0C1-1F0CF,1F0D1-1F0F5,1F110-1F12E,1F130-1F16B,1F170-1F1AC,1F1E6-1F202,1F210-1F23B,1F240-1F248,1F250-1F251,1F300-1F6D2,1F6E0-1F6EC,1F6F0-1F6F6,1F700-1F773,1F780-1F7D4,1F800-1F80B,1F810-1F847,1F850-1F859,1F860-1F887,1F890-1F8AD,1F910-1F91E,1F920-1F927,1F930,1F933-1F93E,1F940-1F94B,1F950-1F95E,1F980-1F991,1F9C0@Z:20,A0,1680,2000-200A,2028-2029,202F,205F,3000@";
	static function getCategoriesUnicode() {
		$categoriesUnicode = new Hash();
		$categoriesUnicode->set(com_wiris_util_xml_WCharacterBase::$PUNCTUATION_CATEGORY, "PunctuationUnicodeCategory");
		$categoriesUnicode->set(com_wiris_util_xml_WCharacterBase::$LETTER_CATEGORY, "LetterUnicodeCategory");
		$categoriesUnicode->set(com_wiris_util_xml_WCharacterBase::$MARK_CATEGORY, "MarkUnicodeCategory");
		$categoriesUnicode->set(com_wiris_util_xml_WCharacterBase::$NUMBER_CATEGORY, "NumberUnicodeCategory");
		$categoriesUnicode->set(com_wiris_util_xml_WCharacterBase::$SYMBOL_CATEGORY, "SymbolUnicodeCategory");
		$categoriesUnicode->set(com_wiris_util_xml_WCharacterBase::$SEPARATOR_CATEGORY, "SeparatorUnicodeCategory");
		$categoriesUnicode->set(com_wiris_util_xml_WCharacterBase::$OTHER_CATEGORY, "OtherUnicodeCategory");
		return $categoriesUnicode;
	}
	static function getUnicodeCategoryList($category) {
		$indexStart = _hx_index_of(com_wiris_util_xml_WCharacterBase::$UNICODES_WITH_CATEGORIES, "@" . $category . ":", null);
		$unicodes = _hx_substr(com_wiris_util_xml_WCharacterBase::$UNICODES_WITH_CATEGORIES, $indexStart + 3, null);
		$indexEnd = _hx_index_of($unicodes, "@", null);
		$unicodes = _hx_substr($unicodes, 0, $indexEnd);
		$inputList = _hx_explode(",", $unicodes);
		$unicodeList = new _hx_array(array());
		$i = 0;
		while($i < $inputList->length) {
			$actual_range = $inputList[$i];
			if(_hx_index_of($actual_range, "-", null) !== -1) {
				$firstRangeValueHex = com_wiris_util_xml_WCharacterBase::hexStringToUnicode(_hx_array_get(_hx_explode("-", $actual_range), 0));
				$lastRangeValueHex = com_wiris_util_xml_WCharacterBase::hexStringToUnicode(_hx_array_get(_hx_explode("-", $actual_range), 1));
				$actualValue = $firstRangeValueHex;
				while($actualValue <= $lastRangeValueHex) {
					$unicodeList->push(com_wiris_util_xml_WCharacterBase_0($actualValue, $actual_range, $category, $firstRangeValueHex, $i, $indexEnd, $indexStart, $inputList, $lastRangeValueHex, $unicodeList, $unicodes));
					$actualValue++;
				}
				unset($lastRangeValueHex,$firstRangeValueHex,$actualValue);
			} else {
				$actualValue = com_wiris_util_xml_WCharacterBase::hexStringToUnicode($actual_range);
				$unicodeList->push(com_wiris_util_xml_WCharacterBase_1($actualValue, $actual_range, $category, $i, $indexEnd, $indexStart, $inputList, $unicodeList, $unicodes));
				unset($actualValue);
			}
			$i++;
			unset($actual_range);
		}
		return $unicodeList;
	}
	static function hexStringToUnicode($unicode) {
		return Std::parseInt("0x" . $unicode);
	}
	static $invisible;
	static function getMirror($str) {
		$mirroredStr = "";
		$i = 0;
		while($i < strlen($str)) {
			$c = _hx_char_code_at($str, $i);
			$j = 0;
			while($j < com_wiris_util_xml_WCharacterBase::$mirrorDictionary->length) {
				if($c === com_wiris_util_xml_WCharacterBase::$mirrorDictionary[$j]) {
					$c = com_wiris_util_xml_WCharacterBase::$mirrorDictionary[$j + 1];
					break;
				}
				$j += 2;
			}
			$mirroredStr .= com_wiris_util_xml_WCharacterBase_2($c, $i, $j, $mirroredStr, $str);
			++$i;
			unset($j,$c);
		}
		return $mirroredStr;
	}
	static function isStretchyLTR($c) {
		$i = 0;
		while($i < com_wiris_util_xml_WCharacterBase::$horizontalLTRStretchyChars->length) {
			if($c === com_wiris_util_xml_WCharacterBase::$horizontalLTRStretchyChars[$i]) {
				return true;
			}
			++$i;
		}
		return false;
	}
	static function getNegated($c) {
		$i = 0;
		while($i < com_wiris_util_xml_WCharacterBase::$negations->length) {
			if(com_wiris_util_xml_WCharacterBase::$negations[$i] === $c) {
				return com_wiris_util_xml_WCharacterBase::$negations[$i + 1];
			}
			$i += 2;
		}
		return -1;
	}
	static function getNotNegated($c) {
		$i = 1;
		while($i < com_wiris_util_xml_WCharacterBase::$negations->length) {
			if(com_wiris_util_xml_WCharacterBase::$negations[$i] === $c) {
				return com_wiris_util_xml_WCharacterBase::$negations[$i - 1];
			}
			$i += 2;
		}
		return -1;
	}
	static function isLetter($c) {
		if(com_wiris_util_xml_WCharacterBase::isDigit($c)) {
			return false;
		}
		if(65 <= $c && $c <= 90) {
			return true;
		}
		if(97 <= $c && $c <= 122) {
			return true;
		}
		if(192 <= $c && $c <= 696 && $c !== 215 && $c !== 247) {
			return true;
		}
		if(867 <= $c && $c <= 1521) {
			return true;
		}
		if(1552 <= $c && $c <= 8188) {
			return true;
		}
		if($c === 8472 || $c === 8467 || com_wiris_util_xml_WCharacterBase::isDoubleStruck($c) || com_wiris_util_xml_WCharacterBase::isFraktur($c) || com_wiris_util_xml_WCharacterBase::isScript($c)) {
			return true;
		}
		if(com_wiris_util_xml_WCharacterBase::isChinese($c)) {
			return true;
		}
		if(com_wiris_util_xml_WCharacterBase::isKorean($c)) {
			return true;
		}
		return false;
	}
	static function isUnicodeMathvariant($c) {
		return com_wiris_util_xml_WCharacterBase::isDoubleStruck($c) || com_wiris_util_xml_WCharacterBase::isFraktur($c) || com_wiris_util_xml_WCharacterBase::isScript($c);
	}
	static function isRequiredByQuizzes($c) {
		return $c === 120128 || $c === 8450 || $c === 8461 || $c === 8469 || $c === 8473 || $c === 8474 || $c === 8477 || $c === 8484;
	}
	static function isDoubleStruck($c) {
		return $c >= 120120 && $c <= 120171 || $c === 8450 || $c === 8461 || $c === 8469 || $c === 8473 || $c === 8474 || $c === 8477 || $c === 8484;
	}
	static function isFraktur($c) {
		return $c >= 120068 && $c <= 120119 || $c === 8493 || $c === 8460 || $c === 8465 || $c === 8476 || $c === 8488;
	}
	static function isScript($c) {
		return $c >= 119964 && $c <= 120015 || $c === 8458 || $c === 8459 || $c === 8466 || $c === 8464 || $c === 8499 || $c === 8500 || $c === 8492 || $c === 8495 || $c === 8496 || $c === 8497 || $c === 8475;
	}
	static function isLowerCase($c) {
		return $c >= 97 && $c <= 122 || $c >= 224 && $c <= 255 || $c >= 591 && $c >= 659 || $c >= 661 && $c <= 687 || $c >= 940 && $c <= 974;
	}
	static function isWord($c) {
		if(com_wiris_util_xml_WCharacterBase::isDevanagari($c) || com_wiris_util_xml_WCharacterBase::isChinese($c) || com_wiris_util_xml_WCharacterBase::isHebrew($c) || com_wiris_util_xml_WCharacterBase::isThai($c) || com_wiris_util_xml_WCharacterBase::isGujarati($c) || com_wiris_util_xml_WCharacterBase::isKorean($c)) {
			return true;
		}
		return false;
	}
	static function isArabianString($s) {
		$i = strlen($s) - 1;
		while($i >= 0) {
			if(!com_wiris_util_xml_WCharacterBase::isArabian(_hx_char_code_at($s, $i))) {
				return false;
			}
			--$i;
		}
		return true;
	}
	static function isArabian($c) {
		if($c >= 1536 && $c <= 1791 && !com_wiris_util_xml_WCharacterBase::isDigit($c)) {
			return true;
		}
		return false;
	}
	static function isHebrew($c) {
		if($c >= 1424 && $c <= 1535) {
			return true;
		}
		return false;
	}
	static function isChinese($c) {
		if($c >= 13312 && $c <= 40959) {
			return true;
		}
		return false;
	}
	static function isKorean($c) {
		if($c >= 12593 && $c <= 52044) {
			return true;
		}
		return false;
	}
	static function isGreek($c) {
		if($c >= 945 && $c <= 969) {
			return true;
		} else {
			if($c >= 913 && $c <= 937 && $c !== 930) {
				return true;
			} else {
				if($c === 977 || $c === 981 || $c === 982) {
					return true;
				}
			}
		}
		return false;
	}
	static function isDevanagari($c) {
		if($c >= 2304 && $c < 2431) {
			return true;
		}
		return false;
	}
	static function isGujarati($c) {
		if($c >= 2689 && $c < 2788 || $c === 2800 || $c === 2801) {
			return true;
		}
		return false;
	}
	static function isThai($c) {
		if(3585 <= $c && $c < 3676) {
			return true;
		}
		return false;
	}
	static function isDevanagariString($s) {
		$i = strlen($s) - 1;
		while($i >= 0) {
			if(!com_wiris_util_xml_WCharacterBase::isDevanagari(_hx_char_code_at($s, $i))) {
				return false;
			}
			--$i;
		}
		return true;
	}
	static function isRTL($c) {
		if(com_wiris_util_xml_WCharacterBase::isHebrew($c) || com_wiris_util_xml_WCharacterBase::isArabian($c)) {
			return true;
		}
		return false;
	}
	static function isTallLetter($c) {
		if(97 <= $c && $c <= 122 || 945 <= $c && $c <= 969) {
			return com_wiris_util_xml_WCharacterBase::binarySearch(com_wiris_util_xml_WCharacterBase::$tallLetters, $c);
		}
		return true;
	}
	static function isLongLetter($c) {
		if(97 <= $c && $c <= 122 || 945 <= $c && $c <= 969) {
			return com_wiris_util_xml_WCharacterBase::binarySearch(com_wiris_util_xml_WCharacterBase::$longLetters, $c);
		} else {
			if(65 <= $c && $c <= 90) {
				return false;
			}
		}
		return true;
	}
	static function isInvisible($c) {
		return com_wiris_util_xml_WCharacterBase::binarySearch(com_wiris_util_xml_WCharacterBase::$invisible, $c);
	}
	static $horizontalOperators;
	static function isHorizontalOperator($c) {
		return com_wiris_util_xml_WCharacterBase::binarySearch(com_wiris_util_xml_WCharacterBase::$horizontalOperators, $c);
	}
	static $latinLetters;
	static $greekLetters;
	static function latin2Greek($l) {
		$index = -1;
		if($l < 100) {
			$index = _hx_index_of(com_wiris_util_xml_WCharacterBase::$latinLetters, "@00" . _hx_string_rec($l, "") . "@", null);
		} else {
			if($l < 1000) {
				$index = _hx_index_of(com_wiris_util_xml_WCharacterBase::$latinLetters, "@0" . _hx_string_rec($l, "") . "@", null);
			} else {
				$index = _hx_index_of(com_wiris_util_xml_WCharacterBase::$latinLetters, "@" . _hx_string_rec($l, "") . "@", null);
			}
		}
		if($index !== -1) {
			$s = _hx_substr(com_wiris_util_xml_WCharacterBase::$greekLetters, $index + 1, 4);
			return Std::parseInt($s);
		}
		return $l;
	}
	static function greek2Latin($g) {
		$index = -1;
		if($g < 100) {
			$index = _hx_index_of(com_wiris_util_xml_WCharacterBase::$greekLetters, "@00" . _hx_string_rec($g, "") . "@", null);
		} else {
			if($g < 1000) {
				$index = _hx_index_of(com_wiris_util_xml_WCharacterBase::$greekLetters, "@0" . _hx_string_rec($g, "") . "@", null);
			} else {
				$index = _hx_index_of(com_wiris_util_xml_WCharacterBase::$greekLetters, "@" . _hx_string_rec($g, "") . "@", null);
			}
		}
		if($index !== -1) {
			$s = _hx_substr(com_wiris_util_xml_WCharacterBase::$latinLetters, $index + 1, 4);
			return Std::parseInt($s);
		}
		return $g;
	}
	static function isOp($c) {
		return com_wiris_util_xml_WCharacterBase::isLarge($c) || com_wiris_util_xml_WCharacterBase::isVeryLarge($c) || com_wiris_util_xml_WCharacterBase::isBinaryOp($c) || com_wiris_util_xml_WCharacterBase::isRelation($c) || $c === _hx_char_code_at(".", 0) || $c === _hx_char_code_at(",", 0) || $c === _hx_char_code_at(":", 0);
	}
	static function isTallAccent($c) {
		$i = 0;
		while($i < com_wiris_util_xml_WCharacterBase::$tallAccents->length) {
			if($c === com_wiris_util_xml_WCharacterBase::$tallAccents[$i]) {
				return true;
			}
			++$i;
		}
		return false;
	}
	static function isDisplayedWithStix($c) {
		if($c >= 592 && $c <= 687) {
			return true;
		}
		if($c >= 688 && $c <= 767) {
			return true;
		}
		if($c >= 8215 && $c <= 8233 || $c >= 8241 && $c <= 8303) {
			return true;
		}
		if($c >= 8304 && $c <= 8351) {
			return true;
		}
		if($c >= 8400 && $c <= 8447) {
			return true;
		}
		if($c >= 8448 && $c <= 8527) {
			return true;
		}
		if($c >= 8528 && $c <= 8591) {
			return true;
		}
		if($c >= 8592 && $c <= 8703) {
			return true;
		}
		if($c >= 8704 && $c <= 8959) {
			return true;
		}
		if($c >= 8960 && $c <= 9215) {
			return true;
		}
		if($c >= 9312 && $c <= 9471) {
			return true;
		}
		if($c >= 9472 && $c <= 9599) {
			return true;
		}
		if($c >= 9600 && $c <= 9631) {
			return true;
		}
		if($c >= 9632 && $c <= 9727) {
			return true;
		}
		if($c >= 9728 && $c <= 9983) {
			return true;
		}
		if($c >= 9984 && $c <= 10175) {
			return true;
		}
		if($c >= 10176 && $c <= 10223) {
			return true;
		}
		if($c >= 10224 && $c <= 10239) {
			return true;
		}
		if($c >= 10240 && $c <= 10495) {
			return true;
		}
		if($c >= 10496 && $c <= 10623) {
			return true;
		}
		if($c >= 10624 && $c <= 10751) {
			return true;
		}
		if($c >= 10752 && $c <= 11007) {
			return true;
		}
		if($c >= 11008 && $c <= 11263) {
			return true;
		}
		if($c >= 12288 && $c <= 12351) {
			return true;
		}
		if($c >= 57344 && $c <= 65535) {
			return true;
		}
		if($c >= 119808 && $c <= 119963 || $c >= 120224 && $c <= 120831) {
			return true;
		}
		if($c === 12398 || $c === 42791 || $c === 42898) {
			return true;
		}
		return false;
	}
	static function isSupported($c) {
		return com_wiris_util_xml_WCharacterBase::isArabian($c) || com_wiris_util_xml_WCharacterBase::isDisplayedWithStix($c) || com_wiris_util_xml_WCharacterBase::isGreek($c) || com_wiris_util_xml_WCharacterBase::isHorizontalOperator($c) || com_wiris_util_xml_WCharacterBase::isInvisible($c) || com_wiris_util_xml_WCharacterBase::isLetter($c) || com_wiris_util_xml_WCharacterBase::isOp($c) || com_wiris_util_xml_WCharacterBase::isStretchyLTR($c) || com_wiris_util_xml_WCharacterBase::isTallAccent($c) || com_wiris_util_xml_WCharacterBase::isWord($c);
	}
	function __toString() { return 'com.wiris.util.xml.WCharacterBase'; }
}
com_wiris_util_xml_WCharacterBase::$binaryOps = new _hx_array(array(43, 45, 47, 177, 183, 215, 247, 8226, 8722, 8723, 8724, 8726, 8727, 8728, 8743, 8744, 8745, 8746, 8760, 8768, 8846, 8851, 8852, 8853, 8854, 8855, 8856, 8857, 8858, 8859, 8861, 8862, 8863, 8864, 8865, 8890, 8891, 8900, 8901, 8902, 8903, 8905, 8906, 8907, 8908, 8910, 8911, 8914, 8915, 8966, 9021, 9675, 10678, 10789, 10794, 10797, 10798, 10799, 10804, 10805, 10812, 10815, 10835, 10836, 10837, 10838, 10846, 10847, 10851));
com_wiris_util_xml_WCharacterBase::$relations = new _hx_array(array(60, 61, 62, 8592, 8593, 8594, 8595, 8596, 8597, 8598, 8599, 8600, 8601, 8602, 8603, 8604, 8605, 8606, 8608, 8610, 8611, 8614, 8617, 8618, 8619, 8620, 8621, 8622, 8624, 8625, 8627, 8630, 8631, 8636, 8637, 8638, 8639, 8640, 8641, 8642, 8643, 8644, 8645, 8646, 8647, 8648, 8649, 8650, 8651, 8652, 8653, 8654, 8655, 8656, 8657, 8658, 8659, 8660, 8661, 8666, 8667, 8669, 8693, 8712, 8713, 8715, 8716, 8733, 8739, 8740, 8741, 8742, 8764, 8765, 8769, 8770, 8771, 8772, 8773, 8774, 8775, 8776, 8777, 8778, 8779, 8781, 8782, 8783, 8784, 8785, 8786, 8787, 8788, 8789, 8790, 8791, 8793, 8794, 8795, 8796, 8799, 8800, 8801, 8802, 8804, 8805, 8806, 8807, 8808, 8809, 8810, 8811, 8812, 8814, 8815, 8816, 8817, 8818, 8819, 8820, 8821, 8822, 8823, 8824, 8825, 8826, 8827, 8828, 8829, 8830, 8831, 8832, 8833, 8834, 8835, 8836, 8837, 8838, 8839, 8840, 8841, 8842, 8843, 8847, 8848, 8849, 8850, 8866, 8867, 8869, 8871, 8872, 8873, 8874, 8875, 8876, 8877, 8878, 8879, 8882, 8883, 8884, 8885, 8886, 8887, 8888, 8904, 8909, 8912, 8913, 8918, 8919, 8920, 8921, 8922, 8923, 8926, 8927, 8930, 8931, 8934, 8935, 8936, 8937, 8938, 8939, 8940, 8941, 8994, 8995, 9123, 10229, 10230, 10231, 10232, 10233, 10234, 10236, 10239, 10501, 10514, 10515, 10531, 10532, 10533, 10534, 10535, 10536, 10537, 10538, 10547, 10550, 10551, 10560, 10561, 10562, 10564, 10567, 10574, 10575, 10576, 10577, 10578, 10579, 10580, 10581, 10582, 10583, 10584, 10585, 10586, 10587, 10588, 10589, 10590, 10591, 10592, 10593, 10606, 10607, 10608, 10620, 10621, 10869, 10877, 10878, 10885, 10886, 10887, 10888, 10889, 10890, 10891, 10892, 10901, 10902, 10909, 10910, 10913, 10914, 10927, 10928, 10933, 10934, 10935, 10936, 10937, 10938, 10949, 10950, 10955, 10956, 10987, 11005));
com_wiris_util_xml_WCharacterBase::$largeOps = new _hx_array(array(8719, 8720, 8721, 8896, 8897, 8898, 8899, 10756, 10757, 10758, 10759, 10760));
com_wiris_util_xml_WCharacterBase::$veryLargeOps = new _hx_array(array(8747, 8748, 8749, 8750, 8751, 8752, 8753, 8754, 8755, 10763, 10764, 10765, 10766, 10767, 10768, 10774, 10775, 10776, 10777, 10778, 10779, 10780));
com_wiris_util_xml_WCharacterBase::$tallLetters = new _hx_array(array(98, 100, 102, 104, 105, 106, 107, 108, 116, 946, 948, 950, 952, 955, 958));
com_wiris_util_xml_WCharacterBase::$longLetters = new _hx_array(array(103, 106, 112, 113, 121, 946, 947, 950, 951, 956, 958, 961, 962, 966, 967, 968));
com_wiris_util_xml_WCharacterBase::$negations = new _hx_array(array(61, 8800, 8801, 8802, 8764, 8769, 8712, 8713, 8715, 8716, 8834, 8836, 8835, 8837, 8838, 8840, 8839, 8841, 62, 8815, 60, 8814, 8805, 8817, 8804, 8816, 10878, 8817, 10877, 8816, 8776, 8777, 8771, 8772, 8773, 8775, 8849, 8930, 8850, 8931, 8707, 8708, 8741, 8742));
com_wiris_util_xml_WCharacterBase::$mirrorDictionary = new _hx_array(array(40, 41, 41, 40, 60, 62, 62, 60, 91, 93, 93, 91, 123, 125, 125, 123, 171, 187, 187, 171, 3898, 3899, 3899, 3898, 3900, 3901, 3901, 3900, 5787, 5788, 5788, 5787, 8249, 8250, 8250, 8249, 8261, 8262, 8262, 8261, 8317, 8318, 8318, 8317, 8333, 8334, 8334, 8333, 8712, 8715, 8713, 8716, 8714, 8717, 8715, 8712, 8716, 8713, 8717, 8714, 8725, 10741, 8764, 8765, 8765, 8764, 8771, 8909, 8786, 8787, 8787, 8786, 8788, 8789, 8789, 8788, 8804, 8805, 8805, 8804, 8806, 8807, 8807, 8806, 8808, 8809, 8809, 8808, 8810, 8811, 8811, 8810, 8814, 8815, 8815, 8814, 8816, 8817, 8817, 8816, 8818, 8819, 8819, 8818, 8820, 8821, 8821, 8820, 8822, 8823, 8823, 8822, 8824, 8825, 8825, 8824, 8826, 8827, 8827, 8826, 8828, 8829, 8829, 8828, 8830, 8831, 8831, 8830, 8832, 8833, 8833, 8832, 8834, 8835, 8835, 8834, 8836, 8837, 8837, 8836, 8838, 8839, 8839, 8838, 8840, 8841, 8841, 8840, 8842, 8843, 8843, 8842, 8847, 8848, 8848, 8847, 8849, 8850, 8850, 8849, 8856, 10680, 8866, 8867, 8867, 8866, 8870, 10974, 8872, 10980, 8873, 10979, 8875, 10981, 8880, 8881, 8881, 8880, 8882, 8883, 8883, 8882, 8884, 8885, 8885, 8884, 8886, 8887, 8887, 8886, 8905, 8906, 8906, 8905, 8907, 8908, 8908, 8907, 8909, 8771, 8912, 8913, 8913, 8912, 8918, 8919, 8919, 8918, 8920, 8921, 8921, 8920, 8922, 8923, 8923, 8922, 8924, 8925, 8925, 8924, 8926, 8927, 8927, 8926, 8928, 8929, 8929, 8928, 8930, 8931, 8931, 8930, 8932, 8933, 8933, 8932, 8934, 8935, 8935, 8934, 8936, 8937, 8937, 8936, 8938, 8939, 8939, 8938, 8940, 8941, 8941, 8940, 8944, 8945, 8945, 8944, 8946, 8954, 8947, 8955, 8948, 8956, 8950, 8957, 8951, 8958, 8954, 8946, 8955, 8947, 8956, 8948, 8957, 8950, 8958, 8951, 8968, 8969, 8969, 8968, 8970, 8971, 8971, 8970, 9001, 9002, 9002, 9001, 10088, 10089, 10089, 10088, 10090, 10091, 10091, 10090, 10092, 10093, 10093, 10092, 10094, 10095, 10095, 10094, 10096, 10097, 10097, 10096, 10098, 10099, 10099, 10098, 10100, 10101, 10101, 10100, 10179, 10180, 10180, 10179, 10181, 10182, 10182, 10181, 10184, 10185, 10185, 10184, 10187, 10189, 10189, 10187, 10197, 10198, 10198, 10197, 10205, 10206, 10206, 10205, 10210, 10211, 10211, 10210, 10212, 10213, 10213, 10212, 10214, 10215, 10215, 10214, 10216, 10217, 10217, 10216, 10218, 10219, 10219, 10218, 10220, 10221, 10221, 10220, 10222, 10223, 10223, 10222, 10627, 10628, 10628, 10627, 10629, 10630, 10630, 10629, 10631, 10632, 10632, 10631, 10633, 10634, 10634, 10633, 10635, 10636, 10636, 10635, 10637, 10640, 10638, 10639, 10639, 10638, 10640, 10637, 10641, 10642, 10642, 10641, 10643, 10644, 10644, 10643, 10645, 10646, 10646, 10645, 10647, 10648, 10648, 10647, 10680, 8856, 10688, 10689, 10689, 10688, 10692, 10693, 10693, 10692, 10703, 10704, 10704, 10703, 10705, 10706, 10706, 10705, 10708, 10709, 10709, 10708, 10712, 10713, 10713, 10712, 10714, 10715, 10715, 10714, 10741, 8725, 10744, 10745, 10745, 10744, 10748, 10749, 10749, 10748, 10795, 10796, 10796, 10795, 10797, 10798, 10798, 10797, 10804, 10805, 10805, 10804, 10812, 10813, 10813, 10812, 10852, 10853, 10853, 10852, 10873, 10874, 10874, 10873, 10877, 10878, 10878, 10877, 10879, 10880, 10880, 10879, 10881, 10882, 10882, 10881, 10883, 10884, 10884, 10883, 10891, 10892, 10892, 10891, 10897, 10898, 10898, 10897, 10899, 10900, 10900, 10899, 10901, 10902, 10902, 10901, 10903, 10904, 10904, 10903, 10905, 10906, 10906, 10905, 10907, 10908, 10908, 10907, 10913, 10914, 10914, 10913, 10918, 10919, 10919, 10918, 10920, 10921, 10921, 10920, 10922, 10923, 10923, 10922, 10924, 10925, 10925, 10924, 10927, 10928, 10928, 10927, 10931, 10932, 10932, 10931, 10939, 10940, 10940, 10939, 10941, 10942, 10942, 10941, 10943, 10944, 10944, 10943, 10945, 10946, 10946, 10945, 10947, 10948, 10948, 10947, 10949, 10950, 10950, 10949, 10957, 10958, 10958, 10957, 10959, 10960, 10960, 10959, 10961, 10962, 10962, 10961, 10963, 10964, 10964, 10963, 10965, 10966, 10966, 10965, 10974, 8870, 10979, 8873, 10980, 8872, 10981, 8875, 10988, 10989, 10989, 10988, 10999, 11000, 11000, 10999, 11001, 11002, 11002, 11001, 11778, 11779, 11779, 11778, 11780, 11781, 11781, 11780, 11785, 11786, 11786, 11785, 11788, 11789, 11789, 11788, 11804, 11805, 11805, 11804, 11808, 11809, 11809, 11808, 11810, 11811, 11811, 11810, 11812, 11813, 11813, 11812, 11814, 11815, 11815, 11814, 11816, 11817, 11817, 11816, 12296, 12297, 12297, 12296, 12298, 12299, 12299, 12298, 12300, 12301, 12301, 12300, 12302, 12303, 12303, 12302, 12304, 12305, 12305, 12304, 12308, 12309, 12309, 12308, 12310, 12311, 12311, 12310, 12312, 12313, 12313, 12312, 12314, 12315, 12315, 12314, 65113, 65114, 65114, 65113, 65115, 65116, 65116, 65115, 65117, 65118, 65118, 65117, 65124, 65125, 65125, 65124, 65288, 65289, 65289, 65288, 65308, 65310, 65310, 65308, 65339, 65341, 65341, 65339, 65371, 65373, 65373, 65371, 65375, 65376, 65376, 65375, 65378, 65379, 65379, 65378, 9115, 9118, 9116, 9119, 9117, 9120, 9118, 9115, 9119, 9116, 9120, 9117, 9121, 9124, 9122, 9125, 9123, 9126, 9124, 9121, 9125, 9122, 9126, 9123, 9127, 9131, 9130, 9134, 9129, 9133, 9131, 9127, 9134, 9130, 9133, 9129, 9128, 9132, 9132, 9128));
com_wiris_util_xml_WCharacterBase::$horizontalLTRStretchyChars = new _hx_array(array(com_wiris_util_xml_WCharacterBase::$LEFTWARDS_ARROW, com_wiris_util_xml_WCharacterBase::$RIGHTWARDS_ARROW, com_wiris_util_xml_WCharacterBase::$LEFTRIGHT_ARROW, com_wiris_util_xml_WCharacterBase::$LEFTWARDS_ARROW_FROM_BAR, com_wiris_util_xml_WCharacterBase::$RIGHTWARDS_ARROW_FROM_BAR, com_wiris_util_xml_WCharacterBase::$LEFTWARDS_ARROW_WITH_HOOK, com_wiris_util_xml_WCharacterBase::$RIGHTWARDS_ARROW_WITH_HOOK, com_wiris_util_xml_WCharacterBase::$LEFTWARDS_HARPOON_WITH_BARB_UPWARDS, com_wiris_util_xml_WCharacterBase::$RIGHTWARDS_HARPOON_WITH_BARB_UPWARDS, com_wiris_util_xml_WCharacterBase::$LEFTWARDS_DOUBLE_ARROW, com_wiris_util_xml_WCharacterBase::$RIGHTWARDS_DOUBLE_ARROW, com_wiris_util_xml_WCharacterBase::$TOP_CURLY_BRACKET, com_wiris_util_xml_WCharacterBase::$BOTTOM_CURLY_BRACKET, com_wiris_util_xml_WCharacterBase::$TOP_PARENTHESIS, com_wiris_util_xml_WCharacterBase::$BOTTOM_PARENTHESIS, com_wiris_util_xml_WCharacterBase::$TOP_SQUARE_BRACKET, com_wiris_util_xml_WCharacterBase::$BOTTOM_SQUARE_BRACKET, com_wiris_util_xml_WCharacterBase::$LEFTWARDS_ARROW_OVER_RIGHTWARDS_ARROW, com_wiris_util_xml_WCharacterBase::$RIGHTWARDS_ARROW_OVER_LEFTWARDS_ARROW, com_wiris_util_xml_WCharacterBase::$LEFTWARDS_HARPOON_OVER_RIGHTWARDS_HARPOON, com_wiris_util_xml_WCharacterBase::$RIGHTWARDS_HARPOON_OVER_LEFTWARDS_HARPOON));
com_wiris_util_xml_WCharacterBase::$tallAccents = new _hx_array(array(com_wiris_util_xml_WCharacterBase::$LEFTWARDS_ARROW_OVER_RIGHTWARDS_ARROW, com_wiris_util_xml_WCharacterBase::$RIGHTWARDS_ARROW_OVER_LEFTWARDS_ARROW, com_wiris_util_xml_WCharacterBase::$LEFTWARDS_HARPOON_OVER_RIGHTWARDS_HARPOON, com_wiris_util_xml_WCharacterBase::$RIGHTWARDS_HARPOON_OVER_LEFTWARDS_HARPOON));
com_wiris_util_xml_WCharacterBase::$invisible = new _hx_array(array(8289, 8290, 8291));
com_wiris_util_xml_WCharacterBase::$horizontalOperators = new _hx_array(array(175, 818, 8592, 8594, 8596, 8612, 8614, 8617, 8618, 8636, 8637, 8640, 8641, 8644, 8646, 8651, 8652, 8656, 8658, 8660, 8764, 9140, 9141, 9180, 9181, 9182, 9183, 9552, 10562, 10564, 10602, 10605));
com_wiris_util_xml_WCharacterBase::$latinLetters = "@0065@0066@0067@0068@0069@0070@0071@0072@0073@0074@0075@0076@0077@0078@0079@0080@0081@0082@0083@0084@0085@0086@0087@0088@0089@0090" . "@0097@0098@0099@0100@0101@0102@0103@0104@0105@0106@0107@0108@0109@0110@0111@0112@0113@0114@0115@0116@0117@0118@0119@0120@0121@0122@";
com_wiris_util_xml_WCharacterBase::$greekLetters = "@0913@0914@0935@0916@0917@0934@0915@0919@0921@0977@0922@0923@0924@0925@0927@0928@0920@0929@0931@0932@0933@0962@0937@0926@0936@0918" . "@0945@0946@0967@0948@0949@0966@0947@0951@0953@0966@0954@0955@0956@0957@0959@0960@0952@0961@0963@0964@0965@0982@0969@0958@0968@0950@";
function com_wiris_util_xml_WCharacterBase_0(&$actualValue, &$actual_range, &$category, &$firstRangeValueHex, &$i, &$indexEnd, &$indexStart, &$inputList, &$lastRangeValueHex, &$unicodeList, &$unicodes) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar($actualValue);
		return $s->toString();
	}
}
function com_wiris_util_xml_WCharacterBase_1(&$actualValue, &$actual_range, &$category, &$i, &$indexEnd, &$indexStart, &$inputList, &$unicodeList, &$unicodes) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar($actualValue);
		return $s->toString();
	}
}
function com_wiris_util_xml_WCharacterBase_2(&$c, &$i, &$j, &$mirroredStr, &$str) {
	{
		$s = new haxe_Utf8(null);
		$s->addChar($c);
		return $s->toString();
	}
}
