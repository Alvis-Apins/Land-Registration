<template>
    <nav-bar></nav-bar>
    <div class="flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px]">
            <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
                {{ errors }}
            </div>

            <form @submit.prevent="saveLandUnit">
                <div class="mb-5">
                    <label for="usage" class="mb-3 block font-medium">Type</label>
                    <select name="type" id="usage" v-model="landUnit.land_usage_id"
                            class="w-full rounded-md border border-black bg-white py-3 px-6 text-base font-medium outline-none">
                        <option disabled selected>Select type</option>
                        <option :value="usage.id" v-for="usage in landUsages" :key="usage.id">{{ usage.type }}</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="cad" class="mb-3 block font-medium">Cadastral Nr.</label>
                    <input type="text" name="cad" id="cad" placeholder="Cadastral Nr."
                           v-model="landUnit.cadastral_nr"
                           class="w-full rounded-md border border-black bg-white py-3 px-6 text-base font-medium outline-none"/>
                </div>
                <div class="mb-5">
                    <label for="area" class="mb-3 block font-medium">Area</label>
                    <input type="text" name="area" id="area" placeholder="Area"
                           v-model="landUnit.area"
                           class="w-full rounded-md border border-black bg-white py-3 px-6 text-base font-medium outline-none"/>
                </div>
                <div class="mb-5">
                    <label for="date" class="mb-3 block font-medium">Border Measurement Date</label>
                    <input type="date" name="date" id="date" placeholder="Border Measurement Date"
                           v-model="landUnit.border_measurement_date"
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
import useLandUnits from "../../composables/landUnits";
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
        const {errors, landUnit, getLandUnit, updateLandUnit} = useLandUnits()
        const {landUsages, getLandUsages} = useLandUsage()

        onMounted(async () => {
            await getLandUnit(props.id);
            await getLandUsages();
        });

        const saveLandUnit = async () => {
            await updateLandUnit(props.id)
        }

        return {
            errors,
            landUnit,
            landUsages,
            saveLandUnit
        }
    }
}
</script>
