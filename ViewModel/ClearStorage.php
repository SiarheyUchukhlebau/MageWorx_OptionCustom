<?php
/**
 * Copyright © MageWorx. All rights reserved.
 * See LICENSE.txt for license details.
 */
declare(strict_types = 1);

namespace MageWorx\OptionCustomTricks\ViewModel;

use Magento\Backend\Model\Session;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use MageWorx\OptionCustomTricks\Helper\Data;

class ClearStorage implements ArgumentInterface
{
    protected Session $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * @return bool
     */
    public function getClearStorageFlag(): bool
    {
        $flag        = Data::CLEAR_LOCAL_STORAGE_FLAG;
        $shouldClear = (bool)$this->session->getData($flag);

        if ($shouldClear) {
            // Drop session flag to prevent subsequent executions of the function
            $this->session->setData($flag, false);
        }

        return $shouldClear;
    }
}
