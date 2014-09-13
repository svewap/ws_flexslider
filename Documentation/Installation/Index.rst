.. include:: Images.txt

.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. ==================================================
.. DEFINE SOME TEXTROLES
.. --------------------------------------------------
.. role::   underline
.. role::   typoscript(code)
.. role::   ts(typoscript)
   :class:  typoscript
.. role::   php(code)


Installation
============

- Login to the backend of TYPO3 as a user with Administrator privileges

- Download and install the extension EXT:ws\_flexslider by the **Extension Manager**

- Add the template of the extension to your main template

- Add a new content element to a page and select the **Flexslider** element

|image05|


Configuration
-------------

You can edit the Flexslider settings by template constants, TypoScript or
via the extension settings in the content element directly.

.. important::
    It is important that you set the size of the image file. To crop images,
    add the letter “c” (crop) at the end of the number, e.g. “200c”.
