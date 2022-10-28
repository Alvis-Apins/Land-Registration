import {ref} from "vue";
import axios from "axios";
import {useRouter} from "vue-router";

export default function useLandUnits() {
    const landUnits = ref([])
    const landUnit = ref([])
    const router = useRouter()
    const errors = ref('')

    const getLandUnits = async () => {
        let response = await axios.get('/api/landUnits')
        landUnits.value = response.data.data
    }
    const getLandUnit = async (id) => {
        let response = await axios.get('/api/landUnits/' + id)
        landUnit.value = response.data.data;
    }

    const storeLandUnit = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/landUnits/', data)
            await router.push({name: 'clients.index'})
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const updateLandUnit = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/landUnits/' + id, landUnit.value)
            await router.push({name: 'clients.index'})
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const destroyLandUnit = async (id) => {
        await axios.delete('/api/landUnits/' + id)
    }


    return {
        landUnits,
        landUnit,
        errors,
        getLandUnits,
        getLandUnit,
        storeLandUnit,
        updateLandUnit,
        destroyLandUnit
    }
}
