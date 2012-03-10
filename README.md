DirectoryHasher
===============

[![Build Status](https://secure.travis-ci.org/robo47/Robo47_DirectoryHasher.png)](robo47/Robo47_DirectoryHasher)

DirectoryHasher is a small library to create files with hashes and file-informations from a directory-structure to compare it with another result later.

This allows to detect changes on your webspace which may come from intrusions

For compatiblity reasons it should be php 5.2 compliant.

Requirements
============

PHP 5.2
 - DOM
 - SPL

Example
=======

In /examples/ you find some hackish example scripts which create result-files, 
compares them and one which can be used together with a cronjob to regulary
check a directory and send mails if something changes.

Further unimplemented ideas
===========================

 - More flexible Comparator
 - Way to filter differences which can be ignored (eg. based on directory)
