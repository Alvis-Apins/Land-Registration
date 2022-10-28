<template>
    <nav-bar></nav-bar>
    <div class="flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px]">
            <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
                {{ errors }}
            </div>

            <form @submit.prevent="saveClient">
                <div class="mb-5">
                    <label for="name" class="mb-3 block font-medium">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name"
                           v-model="client.name"
                           class="w-full rounded-md border border-black bg-white py-3 px-6 text-base font-medium outline-none"/>
                </div>
                <div class="mb-5">
                    <label for="type" class="mb-3 block font-medium">Type</label>
                    <select name="type" id="type" v-model="client.type"
                            class="w-full rounded-md border border-black bg-white py-3 px-6 text-base font-medium outline-none">
                        <option disabled selected>Select type</option>
                        <option value="1">Individual</option>
                        <option value="2">Company</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="state_id" class="mb-3 block font-medium">Registration Number Or Person Identification</label>
                    <input type="text" name="state_id" id="state_id" placeholder="569847135288" v-model="client.state_id"
                           class="w-full rounded-md border border-black bg-white py-3 px-6 text-base font-medium outline-none"/>
                </div>
                <div class="mb-5">
                    <label for="address" class="mb-3 block font-medium">Address</label>
                    <input type="text" name="address" id="address" placeholder="address" v-model="client.address"
                           class="w-full rounded-md border border-black bg-white py-3 px-6 text-base font-medium outline-none"/>
                </div>
                <div class="mb-5">
                    <label for="phone" class="mb-3 block font-medium">Phone</label>
                    <input type="text" name="phone" id="phone" placeholder="phone" v-model="client.phone"
                           class="w-full rounded-md border border-black bg-white py-3 px-6 text-base font-medium outline-none"/>
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-3 block font-medium">Email</label>
                    <input type="text" name="email" id="email" placeholder="email" v-model="client.email"
                           class="w-full rounded-md border border-black bg-white py-3 px-6 text-base font-medium outline-none"/>
                </div>
                <div>
                    <button type="submit" class="hover:text-red-600 rounded-md bg-black text-white py-3 px-8">Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import NavBar from "../main/nav-bar.vue";
import useClients from "../../composables/clients";
import {onMounted} from "vue";
export default {
    components: {NavBar},
    props: {
        id: {
            required: true,
            type: String
        }
    },
    setup(props) {
        const {errors, client, getClient, updateClient} = useClients()

        onMounted(getClient(props.id))

        const saveClient = async () => {
            await updateClient(props.id)
        }

        return {
            errors,
            client,
            saveClient
        }
    }
}
</script>
