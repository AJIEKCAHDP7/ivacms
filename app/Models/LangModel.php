<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Cache;
use DB;

class LangModel extends Model
{
    /**
     * Таблица, связанная с моделью.
     *
     * @var string
     */
    protected $table = 'languages';
    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = false;

    public static function getAllLangsFromDB() {
        // Получаем все данные из таблицы с языками
        $resultLang = LangModel::get();

        //$resultLang = DB::table('languages')->get()->keyBy('identif');
       // $resultLang = collect($resultLang);
       // $collection = collect($resultLang);
      //  $larray = $collection->toArray();

        // Массив для сортировки по идинтификатору языка
        // $lang_array = new LangModel;
        // Перебераем результат массива
       // foreach ($resultLang as $l) {
        //   $lang_array[$l['identif']] = $l->id;
        //   $lang_array_rev[$l['id']] = $l->identif;
      //  }

        return $resultLang;
    }

    private function setLangsInCache() {
     //  $value = Cache::rememberForever('languages', function() {
            return self::getAllLangsFromDB();
    //   });
    }

    public static function getLangsFromCache() {
       //return Cache::get('languages');
        return self::getAllLangsFromDB();
    }


}
