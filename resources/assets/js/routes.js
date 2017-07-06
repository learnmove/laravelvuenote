import VueRouter from 'vue-router';
import Example from './components/Example';
import About from'./components/About';
import Vision from './components/Vision'
import Form from './components/Form';
import Register from'./components/Register';
import Login from'./components/Login';

let routes=[
    {
        path:'/',
        component:Example,
    },
    {
        path:'/about',
        component:About,
    },
    {
        path:'/vision',
        component:Vision
    },
     {
        path:'/form',
        component:Form,
    },
    {
        path:'/register',
        component:Register
    },
    {
        path:'/login',
        component:Login
    }
];
export default new VueRouter({
    routes
});