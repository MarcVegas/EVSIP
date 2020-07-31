<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Cache;

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
        Schema::defaultStringLength(191);

        $category = collect(['University','College','High School','Elementary']);
        $type = collect(['Public','Private']);
        $affiliation = collect(['Sectarian','Non-sectarian']);
        $exam = collect(['Required','Not required']);
        $gender = collect(['male','female']);
        $course_categ = collect(['Bachelor','Master','Doctorate','High School','Vocational']);
        $duration = collect(['5 Years','4 Years','2 Years','6 Months','3 Months','6 Weeks','3 Weeks']);
        $majors = collect(['English','Mathematics','Filipino','Business Administration','Finance Management']);
        $enrollment = collect(['ongoing','closed']);
        $enrolee = collect(['freshmen','transferee','cross-enrolee','second courser']);

        Cache::forever('category', $category);
        Cache::forever('type', $type);
        Cache::forever('affiliation', $affiliation);
        Cache::forever('exam', $exam);
        Cache::forever('gender', $gender);
        Cache::forever('course_categ', $course_categ);
        Cache::forever('duration', $duration);
        Cache::forever('majors', $majors);
        Cache::forever('enrollment', $enrollment);
        Cache::forever('enrolee', $enrolee);
    }
}
