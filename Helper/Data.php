<?php
/**
 * Copyright © MageWorx. All rights reserved.
 * See LICENSE.txt for license details.
 */
declare(strict_types = 1);

namespace MageWorx\OptionCustomTricks\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\Exception\LocalizedException;
use Magento\Store\Model\ScopeInterface;

/**
 * Helper for retrieving custom options settings.
 */
class Data extends AbstractHelper
{
    /**
     * XML path to the configuration setting that determines whether
     * custom options and values should be collapsed by default in the admin panel.
     */
    public const XML_PATH_COLLAPSE_CUSTOM_OPTIONS =
        'mageworx_apo/option_tricks/collapse_option_and_values_by_default';

    public const XML_PATH_OPTIONS_PAGE_SIZE =
        'mageworx_apo/option_tricks/options_page_size';

    public const XML_PATH_VALUES_PAGE_SIZE =
        'mageworx_apo/option_tricks/values_page_size';

    public const DEFAULT_OPTIONS_PAGE_SIZE = 20;
    public const DEFAULT_VALUES_PAGE_SIZE  = 20;
    public const CLEAR_LOCAL_STORAGE_FLAG  = 'mageworx_apo_clear_local_storage';

    /**
     * Checks if custom options dynamic rows should be collapsed by default in the admin panel.
     *
     * @param int|null $storeId Store ID (null for default scope)
     * @return bool True if options should be collapsed, false otherwise.
     * @throws LocalizedException
     */
    public function isOptionsStateCollapsed(?int $storeId = null): bool
    {
        $configValue = $this->scopeConfig->getValue(
            self::XML_PATH_COLLAPSE_CUSTOM_OPTIONS,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );

        return filter_var($configValue, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Get number of custom options per page from config
     *
     * @param int|null $storeId
     * @return int
     */
    public function getOptionsPageSize(?int $storeId = null): int
    {
        return (int)($this->scopeConfig->getValue(
            self::XML_PATH_OPTIONS_PAGE_SIZE,
            ScopeInterface::SCOPE_STORE,
            $storeId
        ) ?: self::DEFAULT_OPTIONS_PAGE_SIZE);
    }

    /**
     * Get number of values per page from config
     *
     * @param int|null $storeId
     * @return int
     */
    public function getValuesPageSize(?int $storeId = null): int
    {
        return (int)($this->scopeConfig->getValue(
            self::XML_PATH_VALUES_PAGE_SIZE,
            ScopeInterface::SCOPE_STORE,
            $storeId
        ) ?: self::DEFAULT_VALUES_PAGE_SIZE);
    }
}
