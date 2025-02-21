<?php
/**
 * Copyright © MageWorx. All rights reserved.
 * See LICENSE.txt for license details.
 */
declare(strict_types = 1);

namespace MageWorx\OptionCustom\Plugin;

use Magento\Catalog\Ui\DataProvider\Product\Form\ProductDataProvider;

class ProductDataProviderPlugin
{
    /**
     * Collapse custom options by modifying the meta configuration
     *
     * @param ProductDataProvider $subject
     * @param array $result
     * @return array
     */
    public function afterGetMeta(ProductDataProvider $subject, array $result)
    {
        $groupCustomOptionsName = 'custom_options';
        $optionContainerName    = 'record';

        // Check if the meta contains custom options group
        if (isset($result[$groupCustomOptionsName]['children']['options']['children'][$optionContainerName])) {
            $record = &$result[$groupCustomOptionsName]['children']['options']['children'][$optionContainerName];

            // Iterate through all options and collapse them
            if (isset($record['children'])) {
                foreach ($record['children'] as &$option) {
                    if (isset($option['arguments']['data']['config'])) {
                        $option['arguments']['data']['config']['collapsible'] = true;
                        $option['arguments']['data']['config']['opened']      = false;
                    }
                }
            }
        }

        return $result;
    }
}
