<template>
    <nav-bar></nav-bar>
    <div class="flex items-center justify-center w-full pb-10">
        <div class="w-full grid grid-cols-2">
            <div>
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg m-8 h-[370px]">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                #
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <div class="">
                                    <a href="#" class="group relative inline-block text-blue-500 underline hover:text-red-500 duration-300">
                                        <input type="checkbox" id="clients" value="clients" v-model="checkedNames">
                                        <label for="clients">Filter</label>
                                        <!-- Tooltip text here -->
                                        <span class="absolute hidden group-hover:flex -top-2 -right-3 translate-x-full w-48 px-2 py-1 bg-gray-700 rounded-lg text-center text-white text-sm before:content-[''] before:absolute before:top-1/2  before:right-[100%] before:-translate-y-1/2 before:border-8 before:border-y-transparent before:border-l-transparent before:border-r-gray-700">
                                            Filters Clients with no Properties
                                        </span>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-6">
                                State_id
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Phone
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <div class="w-fit bg-black text-white hover:text-red-600 rounded">
                                    <router-link :to="{ name: 'clients.create'}"><div class="p-2"><pre>New Client</pre></div></router-link>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <template v-for="(client,index) in clients" :key="client.id">
                            <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="py-4 px-6 font-sm text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ index + 1 }}
                                </th>
                                <td class="py-4 px-6">
                                    <a v-if="client.type === 2" class="text-green-700">{{ client.name }}</a>
                                    <a v-else class="text-blue-900">{{ client.name }}</a>
                                </td>
                                <td class="py-4 px-6">
                                    <button v-on:click="showProperties(client.id)" class="font-sm text-blue-600 dark:text-blue-500 hover:underline mr-2">Properties</button>
                                </td>
                                <td class="py-4 w-[140px]">
                                    <a v-if="client.type === 2" class="text-green-700"> P.k. {{ client.state_id.slice(0, 6) }} - {{ client.state_id.slice(6) }}</a>
                                    <a v-else class="text-blue-900">Reg.nr. {{ client.state_id }}</a>
                                </td>
                                <td class="py-4 px-6 w-[180px]">
                                    {{ client.phone }}
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <router-link :to="{ name: 'clients.edit', params: { id: client.id } }" class="font-sm text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</router-link>
                                    <button @click="deleteClient(client.id)" class="font-sm text-blue-600 dark:text-blue-500 hover:underline mr-2">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                        </template>
                    </table>
                </div>
                <div v-if="clicked !== false" class="overflow-x-auto relative shadow-md sm:rounded-lg m-8 h-[370px]">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                #
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Cad. Nr.
                            </th>
                            <th scope="col" class="py-3 px-6 flex">
                                <a class="mr-32">Address</a>
                                <div class="">
                                    <a href="#" class="group relative inline-block text-blue-500 underline hover:text-red-500 duration-300">
                                        <input type="checkbox" id="properties" value="properties" v-model="checkedNames">
                                        <label for="properties">Filter</label>
                                        <!-- Tooltip text here -->
                                        <span class="absolute hidden group-hover:flex -top-2 -right-3 translate-x-full w-48 px-2 py-1 bg-gray-700 rounded-lg text-center text-white text-sm before:content-[''] before:absolute before:top-1/2  before:right-[100%] before:-translate-y-1/2 before:border-8 before:border-y-transparent before:border-l-transparent before:border-r-gray-700">
                                            Filters properties with no land units
                                        </span>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Area
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Status
                            </th>
                            <th scope="col" class="py-3 px-6 w-32">
                                <div class="w-fit bg-black text-white hover:text-red-600 rounded">
                                    <router-link :to="{ name: 'properties.create', params: { id: clientId } }"><div class="p-2"><pre>New Property</pre></div></router-link>
                                </div>
                            </th>
                        </tr>
                        </thead>
                            <tbody>
                            <tr>
                                <td v-if="!properties.length" colspan="4" class="text-center">There is no properties yet...</td>
                            </tr>
                            <template v-for="(property,index) in properties" :key="property.id">
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ index + 1 }}
                                </th>
                                <td class="py-4 px-6">
                                    <button v-on:click="showLandUnits(property.id)" class="font-sm text-blue-600 dark:text-blue-500 hover:underline mr-2">{{ property.cadastral_nr }}</button>
                                </td>
                                <td class="py-4 px-6">
                                    {{ property.address }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ parseFloat(total(property)).toFixed(2) }}ha
                                </td>
                                <td class="py-4 px-6">
                                    <a v-if="property.ownership_status === 1" class="text-green-400">Purchase agreement</a>
                                    <a v-else-if="property.ownership_status === 2" class="text-green-600" >Paid</a>
                                    <a v-else-if="property.ownership_status === 3" class="text-green-800">Registered ownership</a>
                                    <a v-else-if="property.ownership_status === 4" class="text-red-600">Sold</a>
                                    <a v-else class="text-orange-400">Its complicated</a>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <router-link :to="{ name: 'properties.edit', params: { id: property.id } }" class="font-sm text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</router-link>
                                    <button @click="deleteProperty(property.id, property.client_id)" class="font-sm text-blue-600 dark:text-blue-500 hover:underline mr-2">Delete</button>
                                </td>
                            </tr>
                            </template>
                            </tbody>
                    </table>
                </div>
            </div>
            <div>
                <div v-if="clicked2 !== false" class="overflow-x-auto relative shadow-md sm:rounded-lg m-8 h-[780px]">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                #
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Cad. Nr.
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Area
                            </th>
                            <th scope="col" class="py-3 px-6 flex">
                                <a class="mr-24">Usage</a>
                                <div class="">
                                    <a href="#" class="group relative inline-block text-blue-500 underline hover:text-red-500 duration-300">
                                        <input type="checkbox" id="units" value="units" v-model="checkedNames">
                                        <label for="units">Filter</label>
                                        <!-- Tooltip text here -->
                                        <span class="absolute hidden group-hover:flex -top-2 -right-3 translate-x-full w-48 px-2 py-1 bg-gray-700 rounded-lg text-center text-white text-sm before:content-[''] before:absolute before:top-1/2  before:right-[100%] before:-translate-y-1/2 before:border-8 before:border-y-transparent before:border-l-transparent before:border-r-gray-700">
                                            Filters land units with no land usage
                                        </span>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <div class="w-fit bg-black text-white hover:text-red-600 rounded">
                                    <router-link :to="{ name: 'landUnits.create', params: { id: propertyId } }"><div class="p-2"><pre>New Land Unit</pre></div></router-link>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td v-if="!landUnits.length" colspan="4" class="text-center">There is no land units yet...</td>
                        </tr>
                        <template v-for="(unit,index) in landUnits" :key="unit.id">
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ index + 1 }}
                                </th>
                                <td class="py-4 px-6">
                                    <button class="font-sm text-blue-600 dark:text-blue-500 hover:underline mr-2">{{ unit.cadastral_nr }}</button>
                                </td>
                                <td class="py-4 px-6">
                                    {{ unit.area.toFixed(2) }} ha
                                </td>
                                <td class="py-4 px-6">
                                    <a v-if="!unit.land_usage_id"> - </a>
                                    <a v-else> {{ landUsages[unit.land_usage_id - 1].type }} </a>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <router-link :to="{ name: 'landUnits.edit', params: { id: unit.id } }" class="font-sm text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</router-link>
                                    <button @click="deleteLandUnit(unit.id, unit.property_id)" class="font-sm text-blue-600 dark:text-blue-500 hover:underline mr-2">Delete</button>
                                </td>
                            </tr>
                        </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import NavBar from "../main/nav-bar.vue";
import useClients from "../../composables/clients";
import {onMounted, reactive, ref} from "vue";
import axios from "axios";
import useProperties from "../../composables/properties";
import useLandUnits from "../../composables/landUnits";

export default {
    components: {NavBar},
    watch: {
        checkedNames: function () {
            this.checkedNames.includes("clients") ? this.filterClients() : this.getClients();
            this.checkedNames.includes("properties") ? this.filterProperties() : (this.clientId ? this.showProperties(this.clientId) : console.log())
            this.checkedNames.includes("units" ) ? this.filterLandUnits() : (this.propertyId ? this.showLandUnits(this.propertyId): console.log())
        }
    },
    setup: function () {
        const {clients, getClients, destroyClient} = useClients();
        const {destroyProperty} = useProperties();
        const {destroyLandUnit} = useLandUnits();
        const clientId = ref()
        const clientsFiltered = reactive([])
        const propertyId = ref()
        const landUsages = ref([])
        const properties = ref([]);
        const landUnits = ref([]);
        const clicked = ref(false);
        const clicked2 = ref(false);
        const checkedNames = ref([])

        onMounted(async () => {
            await getClients();
            await getLandUsages();
        });

        const filterClients = async () => {
            clients.value = clients.value.filter((client)=> {return !client.property.length})
        }

        const filterProperties = async  () => {
            properties.value = properties.value.filter((property) => {return !property.land.length})
        }

        const filterLandUnits = async () => {
            landUnits.value = landUnits.value.filter((unit) => {return !unit.land_usage_id})
        }

        const getLandUsages = async () => {
            let response = await axios.get('/api/landUsage')
            landUsages.value = response.data.data
        }

        const showProperties = async (id) => {
            let response = await axios.get('/api/clients/properties/' + id)
                if (id !== clientId.value)  {
                    clicked2.value = false
            }
            propertyId.value = false;
            clicked.value = true;
            clientId.value = id;
            properties.value = response.data;
        }

        const showLandUnits = async (id) => {
            let response = await axios.get('/api/properties/land-units/' + id)
              clicked2.value = true;
              propertyId.value = id;
              landUnits.value = response.data;
        }

        const deleteClient = async (id) => {
            if (!window.confirm("Are you sure?")) {
                return
            }

            await destroyClient(id);
            await getClients();
        }

        const deleteProperty = async (id, client) => {
            if (!window.confirm("Are you sure?")) {
                return
            }

            await destroyProperty(id);
            await showProperties(client)
        }

        const deleteLandUnit = async (id, unit) => {
            if (!window.confirm("Are you sure?")) {
                return
            }

            await destroyLandUnit(id);
            await showLandUnits(unit)
        }

        const total = (property) => {
            let total = 0
            property.land.map((data) => {
                total = total + data.area
            })
            return total
        }

        return {
            clients,
            clientsFiltered,
            clientId,
            propertyId,
            clicked,
            clicked2,
            checkedNames,
            properties,
            landUnits,
            landUsages,
            showProperties,
            getClients,
            showLandUnits,
            deleteClient,
            deleteProperty,
            deleteLandUnit,
            filterClients,
            filterProperties,
            filterLandUnits,
            total
        }
    }
}
</script>
