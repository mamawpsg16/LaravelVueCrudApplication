import { createRouter, createWebHistory } from 'vue-router'
import pageNotFound from '../components/PageNotFound'
import productList from '../components/products/ProductList'
import productCreate from '../components/products/ProductCreate'
import productEdit from '../components/products/ProductEdit'
import productView from '../components/products/ProductView'
const routes = [
    {
        path:'/',
        component: productList
    },
    {
        path:'/:pathMatch(.*)*',
        component: pageNotFound
    },
    {
        path:'/product/create',
        component: productCreate
    },
    {
        path:'/product/:id',
        component: productView,
        props:true
    },
    {
        path:'/product/edit/:id',
        component: productEdit,
        props:true
    }
]

const router = createRouter({
    history:createWebHistory(),
    routes
})

export default router