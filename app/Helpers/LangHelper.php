<?php

namespace App\Helpers;

use \App\Models\LangModel;
use App;
use Request;
use Session;

class LangHelper {

    // Текущий установленный язык приложения
   // static $currentAppLang;

    public static function getAppLocale() {
       // self::currentAppLang = App::getLocale();
       // return self::currentAppLang;

        return App::getLocale();
    }

    public static function getAllLangs() {
        return LangModel::getLangsFromCache();
    }

    public static function getLangsIdentif() {
        $all = LangModel::getLangsFromCache()->pluck('identif');
        return $all;
    }

    // Установка локали языка
    public static function setCurrentLang() {
            $locale = Request::segment(1);
        // Если в сессии оказалось пусто
      //  else {
            // Проверяем есть ли передаваемая локаль в доступных локалях приложения, если есть
            if (in_array($locale, LangHelper::getLangsIdentif()->toArray())) {
                // Устанавливае текущую локаль приложения
                App::setLocale($locale);
                // Записываем локаль в сессию пользователя
                session(['language' => $locale]);
              //  Session::put('language', 'en');
                // И возвращаем саму локаль
                return $locale;
            // Если парамметр локали не соответствует
            } else {
                // Если есть в сессии ключ с языковым парамметром
              //  if (Session::has('language')) {
                    // Значит уже установлена локаль языка
                    $currentLocale =  App::getLocale();//session('language');
                    // Просто возвращаем текущию локадь
                    return $currentLocale;
               //     dump($currentLocale);
             //   }

            }
      //  }
    }


   // public function setLanguage

    /**
     * Получение из базы всех языков сайта
     * @access public
     * @param bool $active
     * @return array
     */
    public function getCMSLangs($active = FALSE) {
        if (self::$language[(int) $active]) {
            return self::$language[(int) $active];
        }
        if ($active) {
            $this->db->where('active', 1);
        }
        $query = $this->db->get('languages');
        if ($query) {
            $query = $query->result_array();
            self::$language[(int) $active] = $query;
        } else {
            show_error($this->db->_error_message());
        }
        return $query;
    }

}