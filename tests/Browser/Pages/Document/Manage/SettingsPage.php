<?php

namespace Tests\Browser\Pages\Document\Manage;

use App\Models\Doc as Document;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class SettingsPage extends BasePage
{
    public $document;

    public function __construct(Document $document)
    {
        $this->document = $document;
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return route('documents.manage.settings', [$this->document], false);;
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@submitBtn' => '#content form button[type=submit]',
            '@addPageBtn' => '.document-pages-toolbar .add-page',
        ];
    }
}
