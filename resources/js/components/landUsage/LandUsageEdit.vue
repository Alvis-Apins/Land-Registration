<template>
    <nav-bar></nav-bar>
    <div class="flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px]">
            <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
                {{ errors }}
            </div>

            <form @submit.prevent="saveLandUsage">
                <div class="mb-5">
                    <label for="category" class="mb-3 block font-medium">Category</label>
                    <input type="text" name="category" id="category" placeholder="category" v-model="landUsage.category"
                           class="w-full rounded-md border border-black bg-white py-3 px-6 text-base font-medium outline-none"/>
                </div>
                <div class="mb-5">
                    <label for="identification" class="mb-3 block font-medium">Phone</label>
                    <input type="text" name="identification" id="identification" placeholder="identification" v-model="landUsage.identification"
                           class="w-full rounded-md border border-black bg-white py-3 px-6 text-base font-medium outline-none"/>
                </div>
                <div class="mb-5">
                    <label for="type" class="mb-3 block font-medium">Type</label>
                    <input type="text" name="email" id="type" placeholder="type" v-model="landUsage.type"
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
import {onMounted} from "vue";
import useLandUsage from "../../composables/landUsage";
export default {
    components: {NavBar},
    props: {
        id: {
            required: true,
            type: String
        }
    },
    setup(props) {
        const {errors, landUsage, getLandUsage, updateLandUsage} = useLandUsage()

        onMounted(getLandUsage(props.id))

        const saveLandUsage = async () => {
            await updateLandUsage(props.id)
        }

        return {
            errors,
            landUsage,
            saveLandUsage
        }
    }
}
</script>
