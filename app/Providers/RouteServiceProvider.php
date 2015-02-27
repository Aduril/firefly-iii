<?php namespace FireflyIII\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/**
 * Class RouteServiceProvider
 *
 * @package FireflyIII\Providers
 */
class RouteServiceProvider extends ServiceProvider
{

    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'FireflyIII\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        $router->before(
            function (Request $request) {

                // put IP in session if not already there.

                $reminders = [];

                if ($request->user()) {
                    //Filter::setSessionDateRange();
                    //Reminders::updateReminders();
                    //Steam::removeEmptyBudgetLimits();
                    //$reminders = Reminders::getReminders();
                }
                //                View::share('reminders', $reminders);
            }
        );
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(
            ['namespace' => $this->namespace], function ($router) {
            /** @noinspection PhpIncludeInspection */
            require app_path('Http/routes.php');
        }
        );
    }

}