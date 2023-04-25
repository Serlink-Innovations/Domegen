<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description"
            content="Domégen offers a new form of class and style for you to create the perfect personalized gift for any occassion.">

        <?php wp_head(); ?>

    </head>

    <body <?php body_class(); ?>>

        <?php include_once 'inc/preloader.php'; ?>

        <header class="main__header">

            <div class="notice">

                <div class="notice__container">

                    <p class="notice-item">
                        Free shipping on orders over 1000TTD
                    </p>
                    <p class="notice-item">
                        For Rush Orders Contact Us
                    </p>
                    <p class="notice-item">
                        Choose a specific delivery date (Feature Coming Soon)
                    </p>

                </div>

            </div>

            <?php require_once "inc/navigation.php"; ?>

        </header>