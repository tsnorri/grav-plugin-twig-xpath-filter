# Twig X Path Filter Plugin

The **Twig X Path Filter** Plugin is for [Grav CMS](http://github.com/getgrav/grav). It may be used to filter content with XPath expressions.

## Installation

Installing the Twig X Path Filter plugin can be done in one of two ways. The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

### GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install twig-xpath-filter

This will install the Twig X Path Filter plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/twig-xpath-filter`.

### Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `twig-xpath-filter`. You can find these files on [GitHub](https://github.com/tsnorri/grav-plugin-twig-xpath-filter) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/twig-xpath-filter
	
> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/twig-xpath-filter/twig-xpath-filter.yaml` to `user/config/plugins/twig-xpath-filter.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
```

## Usage

The plugin adds one Twig filter, namely `xpath`. It takes the filtering expression as an argument and returns the HTML from each of the filtered elements concatenated. For example, to select the second `p` element from anywhere in the document:

```
{{ page.content|xpath('(//p)[2]') }}
```
