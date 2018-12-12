<?php
declare(strict_types=1);

namespace Veriteworks\EditorCustom\Plugin\Cms;

use Magento\Cms\Model\Wysiwyg\DefaultConfigProvider;
use \Magento\Framework\DataObject;

class CustomConfig
{

    public function afterGetConfig(
        DefaultConfigProvider $subject,
        DataObject $config
    ) : DataObject
    {
        $data = $config->getData('tinymce4');
        $data['toolbar'] = 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | '
                    . 'bullist numlist outdent indent | link table charmap | fontsizeselect forecolor';
        $data['plugins'] = implode(
                    ' ',
                    [
                        'advlist',
                        'autolink',
                        'lists',
                        'link',
                        'charmap',
                        'media',
                        'noneditable',
                        'table',
                        'contextmenu',
                        'paste',
                        'code',
                        'help',
                        'table',
                        'colorpicker',
                        'textcolor'
                    ]
                );

        $config->setData('tinymce4', $data);

        return $config;
    }
}