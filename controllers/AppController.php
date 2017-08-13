<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

/**
 * Description of AppController
 *
 * @author Валим
 */
class AppController extends \yii\web\Controller {
   
    public static function debug($arr) {
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }
    
    public static function getMainText(){
        $text = \app\models\MainText::findOne(1);
        return $text->title;
    }
    
    public static function getMainMenu(){
        $menu = \app\models\MainMenu::find()->orderBy(['position'=>SORT_ASC])->all();
        $menuArr = [];
        foreach ($menu as $item){
            $menuArr[] = [
                'label' => $item->title,
                'url' => [$item->link],
            ];
        };
        return $menuArr;
    }  
}

function getMainText(){
    $text = \app\models\MainText::findOne(1);
    return $text->title;
}
    
function debug($arr) {
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function removeFromUrl($url, $parametr) {
    $parsed = parse_url($url);
    if ($parsed && isset($parsed['query'])) {
        $parsed['query'] = implode('&', array_filter(explode('&', $parsed['query']), function($param) use ($parametr) {
                    return explode('=', $param)[0] !== $parametr;
                }));
        if ($parsed['query'] === '')
            unset($parsed['query']);
        return unparse_url($parsed);
    } else {
        return $url;
    }
}

function change_key($key,$new_key,&$arr,$rewrite=true){
    if(!array_key_exists($new_key,$arr) || $rewrite){
        $arr[$new_key]=$arr[$key];
        unset($arr[$key]);
        return true;
    }
        return false;
}

function unparse_url($parsed_url) {
    $scheme   = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : '';
    $host     = isset($parsed_url['host']) ? $parsed_url['host'] : '';
    $port     = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : '';
    $user     = isset($parsed_url['user']) ? $parsed_url['user'] : '';
    $pass     = isset($parsed_url['pass']) ? ':' . $parsed_url['pass']  : '';
    $pass     = ($user || $pass) ? "$pass@" : '';
    $path     = isset($parsed_url['path']) ? $parsed_url['path'] : '';
    $query    = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '';
    $fragment = isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : '';
    return "$scheme$user$pass$host$port$path$query$fragment";
}

