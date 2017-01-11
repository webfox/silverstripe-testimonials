<?php


class Testimonial extends DataObject
{

    private static $db = [
        'Title' => 'Varchar(255)',
        'Company' => 'Varchar(255)',
        'Date' => 'Date',
        'Testimonial' => 'HTMLText',
        'SortOrder' => 'Int'
    ];

    private static $has_one = [
        'OwnerObject' => 'DataObject',
        'Image' => 'Image'
    ];

    private static $default_sort = 'SortOrder';

    private static $field_labels = [
        'Title' => 'Author',
        'Testimonial' => 'Testimonial'
    ];

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {

            $fields->addFieldsToTab('Root.Main', [
                TextField::create('Title', 'Author'),
                TextField::create('Company', 'Company'),
                DateField::create('Date', 'Date')->setConfig('showcalendar', true),
                UploadField::create('Image', 'Image'),
                HtmlEditorField::create('Testimonial', 'Testimonial')->setRows(20)
            ]);

            $fields->removeByName('SortOrder');
           $fields->removeByName('OwnerObjectID');
        });

        $fields = parent::getCMSFields();

        return $fields;
    }

    public function canView($member = null)
    {
        return true;
    }

    public function canEdit($member = null)
    {
        return true;
    }

    public function canDelete($member = null)
    {
        return true;
    }

    public function canCreate($member = null)
    {
        return true;
    }
}
