<?php

namespace App\Helpers;

use \App\Models\LangModel;
use App;
use Request;
use Session;

class LangHelper {

    // Инстанс
    private static $_instance = null;
    // Ограничиваем реализацию создания объекта
    private function __construct() {}
    // Ограничивает клонирование объекта
    private function __clone() {}

    private function __wakeup () {}

    // Получение единственного экземпляра
    static public function getInstance() {
        if(is_null(self::$_instance))
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    // Получение установленной локали приложения
    public static function getAppLocale() {
        // Врзвращаем локаль языка
        return App::getLocale();
    }

    // Установка локали приложения
    public static function setAppLocale($locale) {
        // Врзвращаем локаль языка
        App::setLocale($locale);
    }

    // Проверка лоступных языковых локалей
    public static function checkAvailableLocale($locale) {
        // Получаем языки доступные из базы
        $langsIdent = LangModel::getLangsFromCache()->pluck('identif')->toArray();
        // Если в массиве есть доступные идентификаторы локали
        if (in_array($locale, $langsIdent)){
            // Возвращаем пользовательскую локаль
            return $locale;
        }
        else {
            // Возвращаем локаль приложения
            return App::getLocale();
        }
    }

    // Получение всех языклв из базы
    public static function getAllAppLangs() {
        return LangModel::getLangsFromCache();
    }

    // Установка локали языка
    public function setLangLocale($locale) {
        if (Session::has('locale')) {
            Session::get('locale');
        }
        else {
            Session::set('locale', $locale);
        }
        return $locale;
    }


}