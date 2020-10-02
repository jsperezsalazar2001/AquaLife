<?php
 
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('home.title'), route('home.index'));
});

// Home > create Fish
Breadcrumbs::for('admin.fish.create', function ($trail) {
    $trail->parent('home');
    $trail->push(__('fish_create.title'), route('admin.fish.create'));
});

// Home > Fish list
Breadcrumbs::for('admin.fish.list', function ($trail) {
    $trail->parent('home');
    $trail->push(__('fish_list.title'), route('admin.fish.list'));
});
 
// Home > Fish list > Fish
Breadcrumbs::for('admin.fish.show', function ($trail, $fish) {
    $trail->parent('admin.fish.list');
    $trail->push($fish->getName(), route('admin.fish.show', $fish));
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
    $trail->push($order->getId(), route('admin.order.show', $order));
});

// Home > Order list > Order > Update Order
Breadcrumbs::for('admin.order.update', function ($trail, $order) {
    $trail->parent('admin.order.show', $order);
    $trail->push(__('order_update.title'), route('admin.order.update', $order));
});

// Home > create Accessory
Breadcrumbs::for('admin.accessory.create', function ($trail) {
    $trail->parent('home');
    $trail->push(__('accessory_create.title'), route('admin.accessory.create'));
});

// Home > Accessory list
Breadcrumbs::for('admin.accessory.list', function ($trail) {
    $trail->parent('home');
    $trail->push(__('accessory_list.title'), route('admin.accessory.list'));
});
 
// Home > Accessory list > Accessory
Breadcrumbs::for('admin.accessory.show', function ($trail, $accessory) {
    $trail->parent('admin.accessory.list');
    $trail->push($accessory->getName(), route('admin.accessory.show', $accessory));
});

// Home > Accessory list > Accessory > Update Accessory
Breadcrumbs::for('admin.accessory.update', function ($trail, $accessory) {
    $trail->parent('admin.accessory.show', $accessory);
    $trail->push(__('accessory_update.title'), route('admin.accessory.update', $accessory));
});

// Home > create EC
Breadcrumbs::for('admin.environmental_condition.create', function ($trail) {
    $trail->parent('home');
    $trail->push(__('environmental_condition_create.title'), route('admin.environmental_condition.create'));
});

// Home > EC list
Breadcrumbs::for('admin.environmental_condition.list', function ($trail) {
    $trail->parent('home');
    $trail->push(__('environmental_condition_list.title'), route('admin.environmental_condition.list'));
});
 
// Home > EC list > EC
Breadcrumbs::for('admin.environmental_condition.show', function ($trail, $environmental_condition) {
    $trail->parent('admin.environmental_condition.list');
    $trail->push($environmental_condition->getId(), route('admin.environmental_condition.show', $environmental_condition));
});

// Home > EC list > EC > Update EC
Breadcrumbs::for('admin.environmental_condition.update', function ($trail, $environmental_condition) {
    $trail->parent('admin.environmental_condition.show', $environmental_condition);
    $trail->push(__('environmental_condition_update.title'), route('admin.environmental_condition.update', $environmental_condition));
});