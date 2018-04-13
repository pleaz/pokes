<?php

return [

    'login' => [
        'log' => 'Login',
        'mail' => 'E-mail',
        'password' => 'Password',
        'remember' => 'Remember Me',
        'login' => 'Login',
        'forgot' => 'Forgot Your Password?'
    ],

    'register' => [
        'reg' => 'Register',
        'name' => 'Name',
        'conf_password' => 'Confirm Password',
        'register' => 'Register'
    ],

    'reset' => [
        'res' => 'Reset Password',
        'reset' => 'Reset Password',
        'send' => 'Send Password Reset Link'
    ],

    'logout' => 'Logout',
    'home' => 'Home',
    'settings' => 'Settings',
    'bounty' => 'Bounty',
    'reports' => 'Reports',
    'dashboard' => 'Dashboard',
    'logged' => 'You are logged in!',
    'pokes' => 'Pokes',

    'form-bounty-add' => [
        'title' => 'Adding bounty',
        'name' => 'Name',
        'twitter_url' => 'Twitter url',
        'twitter_number' => 'Spreadsheet number (Twitter)',
        'twitter_tags' => 'Twitter hashtags (without #)',
        'first_day' => 'First day for reports',
        'period' => 'Period for reports',
        'close' => 'Close',
        'save' => 'Save changes'
    ],

    'form-bounty-edit' => [
        'title' => 'Editing bounty'
    ],

    'form-bounty-delete' => [
        'title' => 'Delete confirmation',
        'cancel' => 'Cancel',
        'delete' => 'Delete'
    ],

    'bounty-page' => [
        'title' => 'Bounty',
        'add_button' => 'Add new bounty',
        'edit_button' => 'Edit',
        'delete_button' => 'Delete',
        'bounty_title' => 'Bounty #'
    ],

    'report' => [
        'title' => 'Reports',
        'show_button' => 'Show',
        'not_found' => 'No bounty founded!',
        'bounty_title' => 'Bounty #',
        'show_hide_button' => 'show/hide',
        'generate_button' => 'Generate report'
    ],

    'setting' => [
        'title' => 'Settings',
        'twitter' => 'Twitter',
        'logout' => 'Log out',
        'sign' => 'Sign in with Twitter',
        'template' => 'Twitter template',
        'save' => 'Save'
    ],

    'errors' => [
        'no_report' => 'No reports founded!',
        'no_bounty' => 'Bounty not found!',
        'permission' => 'You don\'t have permission to access!',
        'twitter_error' => 'Crab! Something went wrong while signing you up!',
        'twitter_exist' => 'This Twitter account is already registered.',
        'twitter_login' => 'We could not log you in on Twitter.',
        'twitter_in_use' => 'This Twitter account cannot be used for your account.',
        'report_date' => 'Wrong date!',
        'report_period' => 'Wrong period!',
        'report_twitter' => 'Need twitter auth first!',
        'report_token' => 'Need twitter re-auth!',
        'report_bounty' => 'Bounty didn\'t have tags and url!',
        'report_exist' => 'Report already exist!'
    ],

    'status' => [
        'signed' => 'Congrats! You\'ve successfully signed in!',
        'logged' => 'You\'ve successfully logged out!'
    ]

];