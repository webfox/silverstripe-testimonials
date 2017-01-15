<?php

class TestimonialsExtension extends SiteTreeExtension
{

    private static $has_many = [
        'Testimonials' => 'Testimonial'
    ];

    public function updateCMSFields(FieldList $fields)
    {

        /** @var GridFieldConfig $gridConfig */
        $gridConfig = GridFieldConfig::create();

        $gridConfig
            ->addComponent(new GridFieldButtonRow('before'))
            ->addComponent(new GridFieldAddNewButton('buttons-before-left'))
            ->addComponent(new GridFieldToolbarHeader())
            ->addComponent(new  GridFieldSortableHeader())
            ->addComponent(new GridFieldOrderableRows('SortOrder'))
            ->addComponent($dataColumns = new GridFieldDataColumns())
            ->addComponent(new GridFieldEditButton())
            ->addComponent(new GridFieldDeleteAction())
            ->addComponent(new GridFieldDetailForm());

        $dataColumns->setDisplayFields([
            'Title' => 'Author',
            'Testimonial.Summary' => 'Testimonial Preview',
        ]);

        /** @var TabSet $rootTab */
        //We need to repush Metadata to ensure it is the last tab
        $rootTab = $fields->fieldByName('Root');
        $fields->removeByName('Testimonials');
        
        if ($this->owner->exists()) {
            $rootTab->push(Tab::create('Testimonials'));
            $GridField = GridField::create('Testimonials', 'Testimonials', $this->owner->Testimonials(), $gridConfig);
            $fields->addFieldToTab('Root.Testimonials', $GridField);
        }

        return $fields;
    }
}
