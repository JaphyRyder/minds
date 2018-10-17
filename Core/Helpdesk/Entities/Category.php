<?php

namespace Minds\Core\Helpdesk\Entities;

use Minds\Api\Factory;
use Minds\Traits\MagicAttributes;

/**
 * Class Category
 * @package Minds\Core\Helpdesk\Entities
 * @method string getUuid()
 * @method Category setUuid(string $value)
 * @method string getTitle()
 * @method Category setTitle(string $value)
 * @method string getParentUuid()
 * @method Category setParentUuid(string $value)
 * @method Category getParent()
 * @method Category setParent(Category $value)
 * @method string getBranch()
 * @method Category setBranch(string $value)
 * @method array getQuestions()
 * @method Category setQuestions(array $value)
 */
class Category
{
    use MagicAttributes;

    protected $uuid;
    protected $title;
    protected $parent_uuid;
    /** @var Category */
    protected $parent;
    protected $branch;
    protected $questions;

    public function export()
    {
        $export = [];
        $export['uuid'] = $this->getUuid();
        $export['title'] = $this->getTitle();
        $export['parent_uuid'] = $this->getParentUuid();
        $export['parent'] = $this->getParent() ? $this->getParent()->export() : null;
        $export['branch'] = $this->getBranch();
        $export['questions'] = $this->getQuestions() ? Factory::exportable($this->getQuestions()) : [];

        return $export;
    }
}