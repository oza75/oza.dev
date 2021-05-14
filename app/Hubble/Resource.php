<?php
namespace App\Hubble;

use Illuminate\Support\Str;
use Oza75\LaravelHubble\Configuration\Configuration;
use Oza75\LaravelHubble\Configuration\ScreenConfiguration;
use Oza75\LaravelHubble\HubbleResource;

abstract class Resource extends HubbleResource
{
    public function configure(Configuration $configuration)
    {
        $configuration->details(function (ScreenConfiguration $configuration, $model) {
            /** @var string $title */
            $title = $this->getTitle();
            $configuration->setTitle(Str::singular($title) ." #". $model->id);
        });
    }
}
