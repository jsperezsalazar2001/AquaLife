<?php
 
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('home.title'), route('home.index'));
});
// Home > Fish list
Breadcrumbs::for('admin.fish.list', function ($trail) {
    $trail->parent('home');
    $trail->push(__('fish_list.title'), route('admin.fish.list'));
});
 
// Home > Fish list > Fish
Breadcrumbs::for('admin.fish.show', function ($trail, $fish) {
    $trail->parent('admin.fish.list');
    $trail->push($fish->name, route('admin.fish.show', $fish));
});
// Home > Fish list > Fish > Update fish
Breadcrumbs::for('admin.fish.update', function ($trail, $fish) {
    $trail->parent('admin.fish.show', $fish);
    $trail->push(__('fish_update.title'), route('admin.fish.update', $fish));
});

// Home > Order list
Breadcrumbs::for('admin.order.list', function ($trail) {
    $trail->parent('home');
    $trail->push(__('order_list.title'), route('admin.order.list'));
});
 
// Home > Order list > Order
Breadcrumbs::for('admin.order.show', function ($trail, $order) {
    $trail->parent('admin.order.list');
    $trail->push($order->id, route('admin.order.show', $order));
});

// Home > Order list > Order > Update Order
Breadcrumbs::for('admin.order.update', function ($trail, $order) {
    $trail->parent('admin.order.show', $order);
    $trail->push(__('order_update.title'), route('admin.order.update', $order));
});