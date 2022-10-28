<template>
    <nav-bar></nav-bar>
    <div class="flex items-center justify-center w-full pb-10">
            <div>
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg m-8 h-[370px]">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                #
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Category
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Identificator
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Type
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <div class="w-fit bg-black text-white hover:text-red-600 rounded">
                                    <router-link :to="{ name: 'usage.create'}"><div class="p-2"><pre>New Land Usage</pre></div></router-link>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <template v-for="(usage,index) in landUsages" :key="usage.id">
                            <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="py-4 px-6 font-sm text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ index + 1 }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ usage.category }}
                                </td>
                                <td class="py-4 px-6">
                                    0{{ usage.identification }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ usage.type }}
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <router-link :to="{ name: 'usage.edit', params: { id: usage.id } }" class="font-sm text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</router-link>
                                    <button @click="deleteLandUsage(usage.id)" class="font-sm text-blue-600 dark:text-blue-500 hover:underline mr-2">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                        </template>
                    </table>
                </div>
            </div>
    </div>
</template>
<script>
import NavBar from "../main/nav-bar.vue";
import useLandUsage from "../../composables/landUsage";
import {onMounted} from "vue";
export default {
    components: {NavBar},
    setup: function () {
        const {landUsages, getLandUsages, destroyLandUsage} = useLandUsage()

        onMounted(getLandUsages())

        const deleteLandUsage = async (id) => {
            if (!window.confirm("Are you sure?")) {
                return
            }

            await destroyLandUsage(id);
            await getLandUsages();
        }

        return {
            landUsages,
            deleteLandUsage
        }
    }
}
</script>
