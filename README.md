# kobframework
KOB Framework is a PHP framework for web development.

![Version](https://img.shields.io/badge/version-1.0.1-blue.svg)
![License](https://img.shields.io/badge/license-MIT-blue.svg)
[![Author](https://img.shields.io/badge/author-Tavon_Seesenpila-green.svg)](https://facebook.com)

call mvc website
`http://localhost/kobframework/home` or 
`http://localhost/kobframework/home/index`

call REST Api
`http://localhost/kobframework/api/home/apiList`

my website
www.kobframework.com

# KOB CLI

Command Line Interface for KOB Framework, Your can use a easy way to create a new controller and basic view.You can be testing ClI with the following command.
```bash
php kob
```
### CLI For Create Controller

You can call the command line interface to create a new controller.
This command will create a new controller in the `app/controllers` directory.

```bash
php kob new:controller [controller_name]
```
Example:
```bash
php kob new:controller AppController
```
And we have a mini method for create a new controller with REST rules.
```bash
php kob new:controller [controller_name] --rest || php kob new:controller [controller_name] -r
```
Example:
```bash
php kob new:controller AppController --rest
```
This command will create a new controller with REST rules in the `app/controllers` directory.

### CLI For Create Basic HTML (View)

You can call the command line interface to create a new basic HTML.
This command will create a new basic HTML in the `app/views` directory.

```bash
php kob new:view [view_name]
```
Example:
```bash
php kob new:view app
```