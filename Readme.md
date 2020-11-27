# EXT: host_variants

This extension allows to configure a base variant in TYPO3s Site Configuration depending on the current Host.

## Requirements

* TYPO3 9 LTS or 10 LTS

## Installation and Setup
Install the extension via your preferred way. No further setup is required.
The extension works out of the box.

## What it does
The extension adds a variable `host` to the expression language for the Site Configuration.
This allows configuring multiple domains for the same root page.

## Example

```yaml
base: 'https://main-domain.tld/'
baseVariants:
  -
    base: 'https://another-domain.tld/'
    condition: 'host == "another-domain.tld"'
  -
    base: 'http://%env(DYNAMIC_DOMAIN)%/'
    condition: 'host == "%env(DYNAMIC_DOMAIN)%"'
```

Conditions can also be combined:
```yaml
base: 'https://main-domain.tld/'
baseVariants:
  -
    base: 'https://local1.local/'
    condition: 'applicationContext == "Development" && host == "local1.local"'
  -
    base: 'https://local2.local/'
    condition: 'applicationContext == "Development" && host == "local2.local"'
```

---


_Made by [b13](https://b13.com) with ♥_

[Find more TYPO3 extensions we have developed](https://b13.com/useful-typo3-extensions-from-b13-to-you) that help us deliver value in client projects. As part of the way we work, we focus on testing and best practices to ensure long-term performance, reliability, and results in all our code.
