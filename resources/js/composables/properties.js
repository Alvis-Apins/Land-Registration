import {ref} from "vue";
import axios from "axios";
import {useRouter} from "vue-router";

export default function useProperties() {
    const property = ref([])
    const errors = ref('')
    const router = useRouter()

    const getProperty = async (id) => {
        let response = await axios.get('/api/properties/' + id)
        return property.value = response.data.data;
    }

    const storeProperty = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/properties/', data)
            await router.push({name: 'clients.index'})
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const updateProperty = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/properties/' + id, property.value)
            await router.push({name: 'clients.index'})
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const destroyProperty = async (id) => {
        await axios.delete('/api/properties/' + id)
    }

    return {
        property,
        errors,
        getProperty,
        storeProperty,
        updateProperty,
        destroyProperty
    }
}
