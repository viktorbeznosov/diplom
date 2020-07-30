<?php

//Обрезать длинную строку
function cropText($text){
    if (strlen($text) > 15){
        return substr($text, 0, 6) . ' ... ' . substr($text, -6);
    }
    return $text;
}