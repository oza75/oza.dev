<?php

namespace App\Hubble;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Oza75\LaravelHubble\Action;
use Oza75\LaravelHubble\Field;
use Oza75\LaravelHubble\Fields\TextField;
use Oza75\LaravelHubble\Filter;
use Oza75\LaravelHubble\Actions\DeleteAction;

use App\Hubble\Resource;

class SettingResource extends Resource
{

    /**
     * @var string The title will be used as your resource name in the ui
     */
    protected $title = "Settings";

    /**
     * @var string[]
     */
    protected $searchColumns = ['id'];

    /**
     * @var string used to show resource value in relationship
     */
    protected $displayColumn = 'id';

    protected $displayInSidebar = false;

    /**
     * Register all fields that the setting resource should display
     *
     * @return Field[] array of fields
     */
    public function fields()
    {
        return [
            Field::make('id', 'ID')->hideOnForms(),
            TextField::make('available_at', 'Disponible à partir de ?')->displayOnDetailsUsing(function ($value) {
                return Carbon::parse($value)->format('d/m/Y');
            })->type('date')->rules('required', 'date'),
        ];
    }

    /**
     * Register all actions that the setting resource have
     *
     * @return Action[] array of actions
     */
    public function actions()
    {
        return [
            DeleteAction::make(),

        ];
    }

    /**
     * Register all filters that the setting resource have
     *
     * @return Filter[] array of filters
     */
    public function filters()
    {
        return [];
    }

    /**
     * @return Builder
     */
    public function baseQuery(): Builder
    {
        return \App\Models\Setting::query();
    }

    /**
     * Return this resource icon
     *
     * @return string|null
     */
    public function icon()
    {
        return null;
    }
}
