# EXT: host_variants

This extension allows to configure a base variant in TYPO3s Site Configuration depending
on the current Host.

## When is it useful?

This extension can be useful when dealing with multiple sites in one TYPO3 instance
with different domains:

Let's say you have a primary domain `primary-domain.tld` with a site configuration.
Backend editors log in to this primary domain.

You have a site config with an own page tree for a second domain `another-domain.tld`.
Editors create content for the second domain on a hidden page. When previewing that
page from within the backend, `another-domain.tld/some-page-slug` will be shown. Since
editors are logged in to the primary domain, the backend user cookie will not be sent by
the browser for the secondary domain, the frontend does not see a logged in backend
user and will show a 404.

The extension now allows configuring a site base variant for the secondary domain that
kicks in when backend preview is called from the main domain, and calls the frontend
of the secondary site as a sub path of the main domain instead.


## Requirements

* TYPO3 9 LTS, 10 LTS, 11 LTS, 12 LTS

## Installation and Setup
Install the extension via your preferred way. No further setup is required.
The extension works out of the box.

## What it does
The extension adds a variable `host` to the expression language for the Site Configuration.
This allows configuring multiple domains for the same root page.

## Example

Basic:

```yaml
base: 'https://another-domain.tld/'
baseVariants:
  -
    base: 'https://primary-domain.tld/some-sub-path'
    condition: 'host == "primary-domain.tld"'
```

Using some ENV variable:

```yaml
base: 'https://another-domain.tld/'
baseVariants:
  -
    base: 'https://%env(MAIN_DOMAIN)%/some-sub-path'
    condition: 'host == "%env(MAIN_DOMAIN)%"'
```

Combining conditions:

```yaml
base: 'https://another-domain.tld/'
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
