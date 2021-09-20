<?php

/**
 * ------------------------------------------------------------
 * List app events and listeners.
 * ------------------------------------------------------------
 */

$events = [
    // ...
];

/**
 * ------------------------------------------------------------
 * Subscribe to app events.
 * ------------------------------------------------------------
 */

foreach ($events as $event => $listeners) {
    foreach ($listeners as $listener) {
        $container->get('event')->subscribe($event, $listener);
    }
}
