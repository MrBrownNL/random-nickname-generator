# Changelog

All notable changes to `random-nickname-generator` will be documented in this file

## 3.0.0 - 2021-08-17

- Switched from singleton back to normal class
- Moved custom dictionaries to config parameters
- Moved uniquely generated nicknames to a function parameter instead of storing them to a file.

## 2.0.0 - 2021-08-16

- Switched to singleton class
- Added Laravel support
- Added functions to get or set the uniquely generated nicknames 

## 1.3.0 - 2021-08-15

- Added function to return the number of possible unique nicknames
- Keep track of uniquely generated nicknames
- Added function to return a nickname that has been checked for uniqueness
- Added function to return the number of available unique nicknames
- Added function to clear the uniquely generated nicknames
- Added functions to get or set custom adjectives or names

## 1.2.0 - 2021-08-10

- Switch to animal names
- Added setting for use of adjectives 

## 1.1.0 - 2021-08-10

- Removed names > 4 characters names and possible abusive adjectives
- Add support for custom settings

## 1.0.1 - 2021-08-04

- Bugfix: use correct path for config file and dictionaries

## 1.0.0 - 2021-08-04

- initial release
