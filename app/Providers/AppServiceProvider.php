<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->_makeViewNamesAvailableGlobally();
    }

    /**
     * Create variables for view name, and corresponding js and css partials, then make these
     * variables available to all views for easy inclusion of view-specific CSS & JS files.
     *
     * So, now from within Blade views:
     *
     * View: {{ $currentView }}
     * View JS: {{ $currentViewJs }}
     * View CSS: {{ $currentViewCss }}
     *
     * @return void
     */
    private function _makeViewNamesAvailableGlobally()
    {
        view()->composer('*', function ($view) {
            $viewFullName = $view->getName();
            $viewPieces = explode('.', $viewFullName);
            $viewName = array_pop($viewPieces);
            $viewPartialsPath = implode('.', $viewPieces).'.partials.';
            $viewJsName = $viewPartialsPath.'_js_'.$viewName;
            $viewCssName = $viewPartialsPath.'_css_'.$viewName;
            view()->share('currentView', $viewFullName);    // make this variable available to all views
            view()->share('currentViewJs', $viewJsName);    // make this variable available to all views
            view()->share('currentViewCss', $viewCssName);  // make this variable available to all views
        });
    }

}
