import './bootstrap';

import { createApp } from 'vue';
const app = createApp({});

import AdminBookList from './../components/AdminBookList.vue';
app.component('admin-book-list', AdminBookList);


import HomePage from './../components/HomePage.vue';
app.component('home-page', HomePage);

import BookForm from './../components/BookForm.vue';
app.component('book-form', BookForm);

/**
 * Routes imports and assigning
 */

import routes from './routes';
app.use(routes);
app.mount('#app');