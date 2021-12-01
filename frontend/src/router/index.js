import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import BlogCategory from '../views/BlogCategory.vue'
import CategoryPost from '../views/CategoryPost.vue'
import Login from '../views/Login.vue'
import Register from '../views/Register.vue'
import Profile from '../views/Profile.vue'
import CreatePost from '../views/CreatePost'
import PostPreview from '../views/PostPreview'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/blog/:slug',
        name: 'BlogCategory',
        component: BlogCategory
    },
    {
        path: '/blog/:slug/:id',
        name: 'CategoryPost',
        component: CategoryPost
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/register',
        name: 'Register',
        component: Register
    },
    {
        path: '/profile',
        name: 'Profile',
        component: Profile
    },
    {
        path: '/create-post',
        name: 'CreatePost',
        component: CreatePost
    },
    {
        path: '/post-preview',
        name: 'PostPreview',
        component: PostPreview
    }
]

const router = createRouter( {
    history: createWebHistory(),
    routes
} )

export default router
