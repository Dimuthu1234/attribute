<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Blade;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('modifyButton', function ($expression) {
            return "<?php echo getModifyButton({$expression}); ?>";
        });

        Blade::directive('modifyButtonTwo', function ($expression) {
            return "<?php echo getModifyButtonTwo({$expression}); ?>";
        });

        Blade::directive('deleteButton', function ($expression) {
            return "<?php echo getDeleteButton({$expression}); ?>";
        });

        Blade::directive('deleteButtonTwo', function ($expression) {
            return "<?php echo getDeleteButtonTwo({$expression}); ?>";
        });

        Blade::directive('boolSymbol', function ($expression) {
            return "<?php echo getBoolSymbol({$expression}); ?>";
        });

        Blade::directive('colorBox', function ($expression) {
            return "<?php echo getColorBox({$expression}); ?>";
        });

        Blade::directive('labels', function ($expression) {
            return "<?php echo getLabels({$expression}); ?>";
        });

        Blade::directive('label', function ($expression) {
            return "<?php echo getLabel({$expression}); ?>";
        });

        Blade::directive('date', function ($expression) {
            return "<?php echo getFormattedDate({$expression}); ?>";
        });

        Blade::directive('dateTime', function ($expression) {
            return "<?php echo getFormattedDateTime({$expression}); ?>";
        });

        Blade::directive('percentage', function ($expression) {
            return "<?php echo getPercentageString({$expression}); ?>";
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
