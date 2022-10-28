import {createRouter, createWebHistory} from "vue-router";

import Home from "../components/main/home.vue"
import ClientsIndex from "../components/clients/ClientsIndex.vue";
import ClientsCreate from "../components/clients/ClientsCreate.vue";
import ClientsEdit from "../components/clients/ClientsEdit.vue";
import PropertiesCreate from "../components/properties/PropertiesCreate.vue";
import PropertiesEdit from "../components/properties/PropertiesEdit.vue";
import LandUnitsEdit from "../components/landUnits/LandUnitsEdit.vue";
import LandUsageIndex from "../components/landUsage/LandUsageIndex.vue";
import LandUsageEdit from "../components/landUsage/LandUsageEdit.vue";
import LandUsageCreate from "../components/landUsage/LandUsageCreate.vue";
import LandUnitsCreate from "../components/landUnits/LandUnitsCreate.vue";

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/clients',
        name: 'clients.index',
        component: ClientsIndex
    },
    {
        path: '/clients/create',
        name: 'clients.create',
        component: ClientsCreate
    },
    {
        path: '/clients/:id/edit',
        name: 'clients.edit',
        component: ClientsEdit,
        props: true
    },
    {
        path: '/properties/create',
        name: 'properties.create',
        component: PropertiesCreate,
        props: true
    },
    {
        path: '/properties/:id/edit',
        name: 'properties.edit',
        component: PropertiesEdit,
        props: true
    },
    {
        path: '/landUnits/:id/edit',
        name: 'landUnits.edit',
        component: LandUnitsEdit,
        props: true
    },
    {
        path: '/properties/create',
        name: 'landUnits.create',
        component: LandUnitsCreate,
        props: true
    },
    {
        path: '/land-usage',
        name: 'usage.index',
        component: LandUsageIndex
    },
    {
        path: '/landUsage/:id/edit',
        name: 'usage.edit',
        component: LandUsageEdit,
        props: true
    },
    {
        path: '/landUsage/create',
        name: 'usage.create',
        component: LandUsageCreate,
        props: true
    },
]

export default createRouter({
    history: createWebHistory(),
    routes
})
