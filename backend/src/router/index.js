import {createRouter, createWebHistory} from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import Login from "../views/Auth/Login.vue";
import RequestPassword from "../views/Auth/RequestPassword.vue";
import ResetPassword from "../views/Auth/ResetPassword.vue";
import AppLayout from "../components/AppLayout.vue";
import store from "../store/index.js";
import Products from "../views/Products/Products.vue";
import NotFound from "../views/NotFound.vue";
import Users from "../views/Users/Users.vue";
import Orders from "../views/Orders/Orders.vue";
import OrderView from "../views/Orders/OrderView.vue";
import Customers from "../views/Customers/Customers.vue";
import CustomerView from "../views/Customers/CustomerView.vue";
import Register from "../views/Auth/Register.vue";
import ServiceView from "../views/Service/ServiceView.vue";
import ProducerView from "../views/Producer/ProducerView.vue";
import TypeView from "../views/Type/TypeView.vue";
import CarView from "../views/Car/CarView.vue";
import Cars from "../views/Car/Cars.vue";
import OwnerView from "../views/Owner/OwnerView.vue";
import Owners from "../views/Owner/Owners.vue";
import OwnerCars from "../views/OwnerCars/OwnerCars.vue";
import AddCarOwner from "../views/OwnerCars/AddCarOwner.vue";
import BookServiceView from "../views/BookService/BookServiceView.vue";
import CreateService from "../views/CarService/createService.vue";
import BookService from "../views/BookService/BookService.vue";
import CarServiceDetails from "../views/CarService/CarServiceDetails.vue";
import EditOwner from "../views/Owner/EditOwner.vue";

const routes = [
    {
        path: '/app',
        name: 'app',
        component: AppLayout,
        meta: {
            requiresAuth: true,
        },
        children: [
            {
                path: 'dashboard',
                name: 'app.dashboard',
                component: Dashboard,
            },
            {
                path: 'products',
                name: 'app.products',
                component: Products,
            },
            {
                path: 'orders',
                name: 'app.orders',
                component: Orders,
            },
            {
                path: 'orders/:id',
                name: 'app.orders.view',
                component: OrderView
            },
            {
                path: 'users',
                name: 'app.users',
                component: Users,
            },
            {
                path: 'customers',
                name: 'app.customers',
                component: Customers,
            },
            {
                path: 'customers/:id',
                name: 'app.customers.view',
                component: CustomerView,
            },
            {
                path: 'service',
                name: 'app.service.view',
                component: ServiceView,
            },
            {
                path: 'producer',
                name: 'app.producer.view',
                component: ProducerView,
            },
            {
                path: 'type/:id',
                name: 'app.type.view',
                component: TypeView,
            },
            {
                path: 'car/:id',
                name: 'app.car.view',
                component: CarView,
            },
            {
                path: 'cars',
                name: 'app.cars',
                component: Cars,
            },
            {
                path: 'owner',
                name: 'app.owners.view',
                component: OwnerView,
            },
            {
                path: 'owner/:owner',
                name: 'app.owner.edit',
                component: EditOwner,
            },
            {
                path: 'owners',
                name: 'app.owners',
                component: Owners,
            },
            {
                path: 'ownerCars',
                name: 'app.owner.cars',
                component: OwnerCars,
            },
            {
                path: 'addCarOwner/:id',
                name: 'app.addCarOwner.view',
                component: AddCarOwner,
            },
            {
                path: 'BookService/:book_id',
                name: 'app.BookService.view',
                component: BookServiceView,
            },
            {
                path: 'createService/:book_id',
                name: 'app.CreateService',
                component: CreateService,
            },
            {
                path: 'bookService',
                name: 'app.bookService',
                component: BookService,
            },
            {
                path: 'CarServiceDetails/:book_id',
                name: 'app.CarServiceDetails',
                component: CarServiceDetails,
            },
        ]
    },

    {
        path: '/login',
        name: 'login',
        meta: {
            requiresGuest: true
        },
        component: Login,
    },
    {
        path: '/register',
        name: 'register',
        meta: {
            requiresGuest: true
        },
        component: Register,
    },
    {
        path: '/request-password',
        name: 'requestPassword',
        meta: {
            requiresGuest: true
        },
        component: RequestPassword,
    },
    {
        path: '/reset-password',
        name: 'resetPassword',
        meta: {
            requiresGuest: true
        },
        component: ResetPassword,
    },
    {
        path: '/:pathMatch(.*)',
        name: 'notfound',
        component: NotFound,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    if (to.path === '/') {
        next({name: 'login'})
    } else if (to.meta.requiresAuth && !store.state.user.user.token) {
        next({name: 'login'})
    } else if (to.meta.requiresGuest && store.state.user.user.token) {
        next({name: 'app.dashboard'})
    } else {
        next()
    }
})

export default router
