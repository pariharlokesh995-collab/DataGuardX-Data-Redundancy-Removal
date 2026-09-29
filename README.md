DataGuardX - Data Redundancy Removal System

About the Project

DataGuardX is a web-based system developed to detect and prevent duplicate records from being stored in a database.

The system checks the Email and Phone Number of a new record against existing records. If the data already exists, it is treated as a duplicate and the attempt is logged. If the data is unique, it is stored in the database.

Objective

The main objective of this project is to reduce duplicate data and maintain cleaner and more consistent database records.

Features

Duplicate data detection

Unique data verification

Duplicate attempt logging

MySQL database integration

Dashboard for viewing records and statistics

Online cloud hosting

Responsive web interface

Technologies Used

HTML

CSS

PHP

MySQL

InfinityFree

GitHub

How It Works

User enters Name, Email and Phone Number.

The system checks the submitted Email and Phone Number.

If a matching record exists, it is marked as duplicate.

The duplicate attempt is stored in the duplicate log.

If no matching record exists, the new record is saved.

The dashboard displays the current database statistics.

Database

The project uses two main tables:

users

Stores unique records.

duplicate_log

Stores duplicate submission attempts.

Project Files

index.php
check_save.php
dashboard.php
style.css
README.md

Live Website

https://dataguardx26.kesug.com/

Internship

CodeAlpha Cloud Computing Internship - Task 1

Developed by

Bhagat Sen
Email: Bhagatsen20@gmail.com
