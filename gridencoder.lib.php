<?php
/**
 * @author Abhishek Shrivastava <i.abhi27[at]gmail.com>
 * @description Contains the encryption and decryption functions
 */

// Encryption method
function gridEncode($text, $evenpadding = 10) {
    static $GRID_ENCODER = false;
    if (intval($text) !== 0)
        if (empty($text) || $text == false) {
            sysWarn("Empty clear text.");
            return false;
        }

    if ($GRID_ENCODER == false) {
        require_once ('grids_encoder.lib.php');
        $GRID_ENCODER = $GRIDENCODE;
    }

    // LPAD 0 till even digits (default is 10)
    if (strlen($text) > $evenpadding) {
        $length = strlen(intval($text));
        if ($length % 2) {
            $evenpadding = $length + 1;
        } else {
            $evenpadding = $length;
        }
    }

    $text = str_pad($text, $evenpadding, "0", STR_PAD_LEFT);
    $segments = explode('|', chunk_split($text, 2, '|'));
    array_pop($segments);
    $codes = array();
    $segments = array_reverse($segments);
    mt_srand($text);
    foreach ($segments as $seg) {

        $gridid = mt_rand(0, 9);
        $codes[] = $GRID_ENCODER[$gridid][intval($seg)] . "$gridid";
    }
    return join('', $codes);
}

// Decryption method
function gridDecode($text) {
    static $GRID_DECODER = false;

    if (empty($text) || $text == false) {
        sysWarn("Empty cipher text.");
        return false;
    }

    if ($GRID_DECODER == false) {
        require_once ('grids_decoder.lib.php');
        $GRID_DECODER = $GRIDDECODE;
    }

    $len = strlen($text);
    if ($len % 3 != 0) {
        sysWarn('Invalid grid decoder cipher : ' . $text);
        return 0;
    }
    $segments = explode('|', chunk_split($text, 3, '|'));
    array_pop($segments);
    $segments = array_reverse($segments);
    $codes = array();
    foreach ($segments as $seg) {
        $gridid = $seg[2];
        if (intval($gridid) > 9) {
            sysWarn('Invalid grid decoder cipher : ' . $text);
            return 0;
        }
        $key = $seg[0] . $seg[1];
        $codes[] = $GRID_DECODER[intval($gridid)][$key];
    }
    return intval(join('', $codes));
}

// Warning handler, modify according to your needs.
function sysWarn($msg) {
	echo $msg;
}
