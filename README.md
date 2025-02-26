# MageWorx Option Custom Tricks

MageWorx_OptionCustomTricks is a custom Magento 2 module that introduces several optimizations to reduce browser load when handling a large number of custom options in the **Advanced Product Options** extension.

## Features

This module adds a new **Option Tricks** settings block to the **Advanced Product Options** configuration section, providing the following settings:

### 🛠 Collapse Custom Options and Values by Default in Admin Panel
- Prevents the rendering of custom options and values until they are expanded.
- Significantly reduces browser load when working with product forms, especially when custom options are not immediately needed.

### 📄 Number of Custom Options per Page
- Enables pagination for custom options in the admin panel.
- Helps avoid loading a large number of options at once.
- The default Magento setting is `20`, but you can set any desired value.

### 🔢 Number of Values per Page
- Enables pagination for option values (custom option selections).
- Prevents excessive value loading for options with many selections.
- The default Magento setting is `20`, but you can configure it as needed.

## Installation

1. Clone or download the module:
   ```sh
   git clone https://github.com/SiarheyUchukhlebau/MageWorx_OptionCustomTricks.git app/code/MageWorx/OptionCustomTricks
   ```

2. Run the following Magento CLI commands:
   ```sh
   bin/magento module:enable MageWorx_OptionCustomTricks
   bin/magento setup:upgrade
   bin/magento cache:flush
   ```

3. Configure the module settings in the Magento Admin Panel under:  
   **Stores → Configuration → MageWorx → Advanced Product Options → Option Tricks**

## Compatibility
- Magento **2.4.x** (Adobe Commerce)
- MageWorx **Advanced Product Options**

## License
This module is provided under the **MageWorx License**. See [LICENSE.txt](https://support.mageworx.com/genext/license/) for details.

