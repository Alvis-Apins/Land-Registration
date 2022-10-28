<template>
    <nav-bar></nav-bar>

    <div class="flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px]">
            <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
                {{ errors }}
            </div>

            <form @submit.prevent="saveProperty">
                <div class="mb-5">
                    <label for="cadaster" class="mb-3 block font-medium">Cadastral Nr.</label>
                    <input type="text" name="cadaster" id="cadaster" placeholder="Cadastral Nr."
                           v-model="property.cadastral_nr"
                           class="w-full rounded-md border border-black bg-white py-3 px-6 text-base font-medium outline-none"/>
                </div>
                <div class="mb-5">
                    <label for="address" class="mb-3 block font-medium">Address</label>
                    <input type="text" name="address" id="address" placeholder="address" v-model="property.address"
                           class="w-full rounded-md border border-black bg-white py-3 px-6 text-base font-medium outline-none"/>
                </div>
                <div class="mb-5">
                    <label for="status" class="mb-3 block font-medium">Status</label>
                    <select name="type" id="status" v-model="property.ownership_status"
                            class="w-full rounded-md border border-black bg-white py-3 px-6 text-base font-medium outline-none">
                        <option disabled selected>Select Status</option>
                        <option value="1">Purchase agreement</option>
                        <option value="2">Paid</option>
                        <option value="3">Registered ownership</option>
                        <option value="4">Sold</option>
                        <option value="5">Its complicated</option>
                    </select>
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
import {onMounted} from "vue";
import useProperties from "../../composables/properties";
export default {
    components: {NavBar},
    props: {
        id: {
            required: true,
            type: String
        }
    },
    setup(props) {
        const {errors, property, getProperty, updateProperty} = useProperties()

        onMounted(getProperty(props.id))

        const saveProperty = async () => {
            await updateProperty(props.id)
        }

        return {
            errors,
            property,
            saveProperty
        }
    }
}
</script>
