<?php
/**
 * Copyright © MageWorx. All rights reserved.
 * See LICENSE.txt for license details.
 */
declare(strict_types = 1);

namespace MageWorx\OptionCustomTricks\Observer;

use Magento\Backend\Model\Session;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Message\ManagerInterface;
use MageWorx\OptionCustomTricks\Helper\Data;

/**
 * Clears localStorage after system configuration is changed.
 */
class ClearLocalStorageObserver implements ObserverInterface
{
    /**
     * @var ManagerInterface
     */
    private ManagerInterface $messageManager;

    /**
     * @var Session
     */
    private Session $session;

    /**
     * @param ManagerInterface $messageManager
     * @param Session $session
     */
    public function __construct(
        ManagerInterface $messageManager,
        Session          $session
    ) {
        $this->messageManager = $messageManager;
        $this->session        = $session;
    }

    /**
     * Execute observer method to add JS notification for localStorage clearing.
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer): void
    {
        $flag = Data::CLEAR_LOCAL_STORAGE_FLAG;

        // Store a flag in session to trigger JS on next admin panel load
        if (!$this->session->getData($flag)) {
            $this->session->setData($flag, true);
            $this->messageManager->addWarningMessage(
                __(
                    'Changes to Advanced Product Options require clearing local storage.
             Please refresh the page to apply the changes correctly.'
                )
            );
        }
    }
}
