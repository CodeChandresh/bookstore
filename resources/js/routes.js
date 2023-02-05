import { createRouter, createWebHistory } from 'vue-router'

export default createRouter({
  history: createWebHistory(),
  routes: [
    {
        path: '/',
        component: () =>  import('../components/HomePage.vue'),
    },
    {
      path: '/book/:id',
      component: () =>  import('../components/BookPage.vue'),
    },
    {
        path: '/*',
        component: () =>  import('../components/NotFound.vue'),
      },
  ],
})
