/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import 'bootstrap';
import '@popperjs/core';
import {
    createApp
} from 'vue';

import ExampleComponent from './views/detail.js';
import BuildingList from './views/list.js';

const app = createApp({});
app.component('example-component', ExampleComponent);
app.component('building-list', BuildingList);
app.mount('#app');
