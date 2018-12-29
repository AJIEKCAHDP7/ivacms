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
    public function handle($request, Closure $next)
    {
        // Если в сегменте локаль языка
        $locale = $request->segment(1);
        // Если нет локали нужной локали в массиме доступных
        if (!in_array($locale, LangHelper::getLangsIdentif()->toArray())) {
            // Сегменты запроса
            $segments = $request->segments();
            $segments[0] = App::getLocale();

            return redirect(implode('/', $segments));
        }
        //session(['language'=>$locale]);
       // dump(Session::has("language"));
        dump(Session::get("language"));
        return $next($request);
    }
}
