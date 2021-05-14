<?php

namespace App\Hubble;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder;
use Oza75\LaravelHubble\Action;
use Oza75\LaravelHubble\Field;
use Oza75\LaravelHubble\Fields\DateTimeField;
use Oza75\LaravelHubble\Fields\SelectField;
use Oza75\LaravelHubble\Fields\TextareaField;
use Oza75\LaravelHubble\Fields\TextField;
use Oza75\LaravelHubble\Filter;
use Oza75\LaravelHubble\Actions\DeleteAction;

use App\Hubble\Resource;

class ContactResource extends Resource
{

    /**
     * @var string The title will be used as your resource name in the ui
     */
    protected $title = "Contacts";

    /**
     * @var string[]
     */
    protected $searchColumns = ['id', 'email', 'full_name'];

    /**
     * @var string used to show resource value in relationship
     */
    protected $displayColumn = 'id';

    /**
     * Register all fields that the contact resource should display
     *
     * @return Field[] array of fields
     */
    public function fields()
    {
        return [
            Field::make('id', 'ID')->hideOnForms(),
            TextField::make('full_name', "Nom complet")->rules('required', 'min:3'),
            TextField::make('email', "Email")->type('email')->rules('required', 'email'),
            SelectField::make('site_type', 'Type de site')->options(array_flip(Contact::$types))->displayUsingLabel()->rules('required'),
            TextareaField::make('description', 'Description')->rules('required', 'min:30')->hideOnIndex(),
            TextField::make('country', 'Pays')->rules('nullable'),
            TextField::make('ip_address', 'IP')->hideOnIndex(),
            DateTimeField::make('created_at', 'Date de création')->format('d/m/Y à h:i')->hideOnForms(),
        ];
    }

    /**
     * Register all actions that the contact resource have
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
     * Register all filters that the contact resource have
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
        return \App\Models\Contact::query();
    }

    /**
     * Return this resource icon
     *
     * @return string|null
     */
    public function icon()
    {
        return asset('assets/images/icons/agenda.svg');
    }
}
