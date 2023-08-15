<?php

return [
    'stubs_dir' => resource_path('stubs'),
    /**
     * When generating views, the views will be generated in the directory specified by the views_template key.
     * The views can be found in [stubs_dir]/views.
     */
    'views_template' => 'tailwind',

    'fields' => [
        /**
         * When enabled, when running cray ModelName will generate form fields from its migration.
         */
        'generate' => true,

        /**
         * Component paths for each field type.
         * For example, `components.text` looks for a file in resources\views\components\text.blade.php.
         */
        'component_paths' => [
            'input_text' => 'components.tailwind.input',
            'input_number' => 'components.tailwind.input',
            'input_checkbox' => 'components.tailwind.checkbox',
            'input_radio' => 'components.tailwind.radio',
            'input_file' => 'components.tailwind.file',
            'input_date' => 'components.tailwind.input',
            'textarea' => 'components.tailwind.textarea',
        ],

        /**
         * Fields under the ignore_fields key will not be generated.
         */
        'ignore' => [
            'id',
            'created_at',
            'updated_at',
            'deleted_at',
        ],

        'localization' => [
            /**
             * When enabled, labels will be generated with __() method.
             */
            'enabled' => false,

            /**
             * /resources/lang/en/messages.php.
             */
            'key_container' => 'messages',

            /**
             * When true, the evaluated value returned from the __() function will be used.
             */
            'render' => false,
        ],
    ],
];
