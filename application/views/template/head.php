<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/icon-plus.png">
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/material-pro/assets/images/favicon.png"> -->
    <title>CRM ICON+ | <?= $title ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Form  -->
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <!--This page css - Morris CSS -->
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/css/colors/blue.css" id="theme" rel="stylesheet">
    <style>
        body {
            color: black;
            font-size: 13px;
        }
        
        .save-button{
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 25px;
        }

        .corner{
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 25px;
        }
        

        .require {
            color: red;
        }
        .activity{
            size: 8px;
            font-weight: bold;
            margin-bottom: 0px;
            padding-top: 10px;
        }
        .card{
            height: max-content;
        }
    </style>
</head>