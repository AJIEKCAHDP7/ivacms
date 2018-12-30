<?php

namespace App\Http\Middleware;

use Closure;
use Request;
use Config;
use LangHelper;
use Session;
use App;
use Redirect;


class LangMiddleware
{

    /**
     * Метод обработчик запроса
     * Помошник для установки и обработки локали
     *
     * @param  \Illuminate\Http\Request  $request - запрос пользователя - объект Request
     * @param  \Closure  $next - следующий класс посредник по цепочки
     * @return mixed
     */
    public function handle($request, Closure $next) {
        // Создаём объект класса
        $langhelper = LangHelper::getInstance();
        // Сегменты запроса
        $segments = $request->segments();

        if (count($segments)>0) {
            $locale = $langhelper::checkAvailableLocale(Request::segment(1));
            $segments[0] = $locale;
            $langhelper->setAppLocale($locale);
            // Сохраняем в сесию указанную локаль запроса
            Session::put('locale',$segments[0]);
        }
        else {
            // Если есть локаль в сессии
            if (Session::has('locale')) {
                $segments[0] = Session::get('locale');
            }
            else {
                $segments[0] = App::getLocale();
            }
            // Если в адресе не установлена локаль, делаем перенаправление на локаль
            return redirect(implode('/', $segments));
        }
        return $next($request);
    }

}
