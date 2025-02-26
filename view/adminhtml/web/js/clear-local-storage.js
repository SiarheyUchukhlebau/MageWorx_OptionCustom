define(['jquery', 'Magento_Ui/js/modal/alert'], function ($, alert) {
    'use strict';

    return function (shouldClearStorage) {
        if (shouldClearStorage) {
            console.warn('MageWorx: Clearing localStorage for custom options.');

            let appData = localStorage.getItem('appData');
            if (appData) {
                try {
                    let parsedData = JSON.parse(appData);

                    if (parsedData.product_form &&
                        parsedData.product_form.product_form &&
                        parsedData.product_form.product_form.custom_options) {

                        console.warn('MageWorx: Removing custom_options from localStorage.');

                        delete parsedData.product_form.product_form.custom_options;

                        localStorage.setItem('appData', JSON.stringify(parsedData));

                        console.log('MageWorx: custom_options removed successfully.');
                        alert({
                            content: 'Local storage has been cleared. Please refresh the page.'
                        });
                    }
                } catch (e) {
                    console.error('MageWorx: Failed to parse appData', e);
                }
            }
        }
    };
});
