<?php

namespace App\Providers;

use App\Leave;
use App\Task;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
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
        view()->composer('admin.*', function ($view) {
                $leaves = Leave::where('status','Pending')->get();
                $tasks = Task::where('status','Pending')->get();
                $count = count($leaves)+count($tasks);
                $view->with('data',$count)->with('newLeaves',$leaves)->with('newTasks',$tasks);
        });

        view()->composer('employee.*', function ($view) {
                $leaves = Leave::where('user_id', Auth::id())->where('status','Active')->get();
                $ntasks = Task::where('user_id', Auth::id())->where('status','Requested')->get();
                $rtasks = Task::where('user_id', Auth::id())->where('status','Rejected')->get();
                $ctasks = [];
                $count = count($leaves)+count($ntasks)+count($rtasks)+count($ctasks);
                $view->with('data',$count)->with('newLeaves',$leaves)->with('newTasks',$ntasks)->with('rejTasks',$rtasks)->with('comTasks',$ctasks);
        });

        view()->composer('manager.*', function ($view) {
                $leaves = Leave::where('user_id', Auth::id())->where('status','Active')->get();
                $ntasks = Task::where('user_id', Auth::id())->where('status','Requested')->get();
                $rtasks = Task::where('user_id', Auth::id())->where('status','Rejected')->get();
                $ctasks = [];
                $count = count($leaves)+count($ntasks)+count($rtasks)+count($ctasks);
                $view->with('data',$count)->with('newLeaves',$leaves)->with('newTasks',$ntasks)->with('rejTasks',$rtasks)->with('comTasks',$ctasks);
        });

    }
}
