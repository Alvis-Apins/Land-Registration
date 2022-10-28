import {ref} from "vue";
import axios from "axios";
import {useRouter} from "vue-router";

export default function useLandUsage() {
    const landUsages = ref([])
    const landUsage = ref([])
    const router = useRouter()
    const errors = ref('')

    const getLandUsages = async () => {
        let response = await axios.get('/api/landUsage')
        landUsages.value = response.data.data
        return response.data.data
    }

    const getLandUsage = async (id) => {
        let response = await axios.get('/api/landUsage/' + id)
        landUsage.value = response.data.data;
    }

    const storeLandUsage = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/landUsage/', data)
            await router.push({name: 'clients.index'})
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const updateLandUsage = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/landUsage/' + id, landUsage.value)
            await router.push({name: 'usage.index'})
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const destroyLandUsage = async (id) => {
        await axios.delete('/api/landUsage/' + id)
    }

    return {
        landUsages,
        landUsage,
        errors,
        getLandUsages,
        getLandUsage,
        storeLandUsage,
        updateLandUsage,
        destroyLandUsage
    }
}
